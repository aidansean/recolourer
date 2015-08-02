<?php

$tolerance = 3 ;
$double = false ;
if(isset($_GET['double'   ])) $double    = true ;
if(isset($_GET['tolerance'])) $tolerance = $_GET['tolerance'] ;
$image = false ;

$imageURI = (isset($_GET['uri'])) ? $_GET['uri'] : 'sample.jpeg' ;
$image_extension = substr(strrchr($imageURI, '.'), 1) ;

// Taken from http://stackoverflow.com/questions/3114147/100-safe-photo-upload-script
$mime_mapping = array('png' => 'image/png', 'gif' => 'image/gif', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg') ;
$info = getimagesize($imageURI);
if(!$info){ exit('Not an image.') ; }
$type = $mime_mapping[$image_extension] ;
if($info['mime']!=$type){ exit('Wrong extension given.') ; }

switch($type){
	case 'image/jpeg': $image = imagecreatefromjpeg($imageURI) ; break ;
	case 'image/gif' : $image = imagecreatefromgif ($imageURI) ; break ;
	case 'image/png' : $image = imagecreatefrompng ($imageURI) ; break ;
	default : exit('File type not known.') ; break ;
}

if($image==false) exit('Cannot make the image.') ;

$w = imagesx($image) ;
$h = imagesy($image) ;
$imageout = ($double==true) ? imagecreatetruecolor(2*$w, $h) : imagecreatetruecolor($w, $h) ;
if($double==true) imagecopy($imageout, $image, $w, 0, 0, 0, $w, $h) ;

for($i=0 ; $i<$w ; $i++){
  for($j=0 ; $j<$h ; $j++){
    $color = imagecolorat($image, $i, $j) ;
    $r = ($color >> 16) & 0xFF ;
    $g = ($color >> 8)  & 0xFF ;
    $b = $color         & 0xFF ;
    $color = transformColor($r, $g, $b) ;
    $color = getColor($imageout, $color[0], $color[1], $color[2]) ;
    imagesetpixel($imageout, $i, $j, $color) ;
  }
}

switch($type){
  case 'image/jpeg' :
  header('content-type: image/jpeg') ;
  imagejpeg($imageout) ;
  break ;
  
  case 'image/png' :
  header('content-type: image/png') ;
  imagepng($imageout) ;
  break ;
  
  case 'image/gif' :
  header('content-type: image/gif') ;
  imagegif($imageout) ;
  break ;
}

imagedestroy($image) ;
imagedestroy($imageout) ;

function transformColor($r, $g, $b){
  global $tolerance ;
  if(abs($r-$g)<$tolerance AND abs($r-$b)<$tolerance){
    $color[0] = $r ;
    $color[1] = $r ;
    $color[2] = $r ;
    return $color ;
  }
  $g = 0.5*$g ;
  $b = 0.5*$b ;
  $b = $g + $b ;
  $g = $r ;
  $r = 0 ;
  $color = array() ;
  $color[0] = $r ;
  $color[1] = $g ;
  $color[2] = $b ;
  return $color ;
}

function getColor($image,$r,$g,$b){
  $color = imagecolorexact($image,$r,$g,$b) ;
  if($color==-1){
    $color = imagecolorallocate($image,$r,$g,$b) ;
    if($color == -1){
      $color = imagecolorclosest($image,$r,$g,$b) ;
    }
  }
  return $color;
}

?>