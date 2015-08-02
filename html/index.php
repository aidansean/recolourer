<?php
$title = 'Recolourer' ;
$stylesheets = array('style.css') ;
$js_scripts  = array('functions.js') ;
include($_SERVER['FILE_PREFIX'] . '/_core/preamble.php') ;
?>
  <div class="right">
    <h3>Recolourer</h3>
    <div class="blurb">
      <p>This page takes an image and changes its color space.  Here's a sample:</p>
      <table class="images">
        <tbody>
          <tr>
            <th class="images">Before</th>
            <th class="images">After</th>
          </tr>
          <tr>
            <td class="images"><img src="sample_before.png" width="" height="" alt="Sample before recolouring" title="Sample before recolouring" /></td>
            <td class="images"><img src="sample_after.png"  width="" height="" alt="Sample after recolouring"  title="Sample after recolouring"  /></td>
          </tr>
        </tbody>
      </table>
    </div>
    <h3>Make your own image!</h3>
    <div class="blurb">
      <p>This can take a few seconds...</p>
      <table id="table_form">
        <tbody>
          <tr>
            <th class="left">Image url: </th>
            <td class="right"><input id="input_uri" type="text" name="uri" value="sample.png" /></td>
          </tr>
          <tr>
            <th></th>
            <td class="right"><input type="submit" onclick="reload_image()" value="Recolour" /></td>
          </tr>
        </tbody>
      </table>
      <div id="image_wrapper"><img id="img_recoloured" src="sample_after.png" /></div>
    </div>
  </div>
  
  <div class="right">
    <h3>The transformation</h3>
    <div class="blurb">
    <p>The transformation maps the red, green and blue values according to the following rules:</p>
    \[
      r_{out} = 0
    \]
    \[
      g_{out} = r_{in}
    \]
    \[
      b_{out} = (g_{in}+b_{in})/2
    \]
    <p>This was the first step in a mini project to make a tool for colour blind physicists reading plots.  It never got past this stage though.  Colour blindness is tricky.</p>
    </div>
  </div>
 
<?php foot() ; ?>