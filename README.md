# WideImage Php
I have modified some code of wide image lib.
Uses
-------
background code <br />
$bg = imagecolorallocatealpha($image->getHandle(), 0, 0, 0, 70); <br />
here rgb=0,0,0 <br />
transparent=70 <br />
uses $bg <br />
$canvas->useFont('lib/fonts/Vera.ttf', 30, $image->allocateColor(255, 255, 255),$bg); <br />
we can use wordwrap method for new line  <br />
$wrappedtext = wordwrap('I am mobasshir ahmad background image testing background', 20, "\n"); <br />

code-> <br />

$canvas->writeText('center', 'center', $wrappedtext,0); <br />



final code lookes like-> <br />
<?php <br />

include("lib/WideImage.php"); <br />

$randomImage = '186feed0-c60e-4d52-a17e-5bf350e22991.jpg'; <br />
$image = WideImage::load($randomImage); <br />

$canvas = $image->getCanvas(); <br />

$bg = imagecolorallocatealpha($image->getHandle(), 0, 0, 0, 70); <br />

$canvas->useFont('lib/fonts/Vera.ttf', 30, $image->allocateColor(255, 255, 255),$bg); <br />
//new line based on 20. you can increase and decrease here <br />
$wrappedtext = wordwrap('I am mobasshir ahmad background image testing background', 20, "\n"); <br />


$canvas->writeText('center', 'center', $wrappedtext,0); <br />


$newimg = 'output.jpg'; <br />

$image->saveToFile($newimg);<br />


?>
<img src="output.jpg" />


