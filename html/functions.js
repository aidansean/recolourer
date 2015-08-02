function start(){} ;
function reload_image(){
  Get("img_recoloured").src = "recolour.php?uri=" + Get("input_uri").value ;
}
function Get(id){ return document.getElementById(id) ; }
