# WideImagePhp
I have modified some code of wide image lib.
Uses
-------
background code
$bg = imagecolorallocatealpha($image->getHandle(), 0, 0, 0, 70);
here rgb=0,0,0
transparent=70
uses $bg
$canvas->useFont('lib/fonts/Vera.ttf', 30, $image->allocateColor(255, 255, 255),$bg);
we can use wordwrap method for new line 
$wrappedtext = wordwrap('I am mobasshir ahmad background image testing background', 20, "\n");

code->

$canvas->writeText('center', 'center', $wrappedtext,0);



final code lookes like->
<?php

include("lib/WideImage.php");

$randomImage = '186feed0-c60e-4d52-a17e-5bf350e22991.jpg';
$image = WideImage::load($randomImage);

$canvas = $image->getCanvas();

$bg = imagecolorallocatealpha($image->getHandle(), 0, 0, 0, 70);

$canvas->useFont('lib/fonts/Vera.ttf', 30, $image->allocateColor(255, 255, 255),$bg);
//new line based on 20. you can increase and decrease here
$wrappedtext = wordwrap('I am mobasshir ahmad background image testing background', 20, "\n");


$canvas->writeText('center', 'center', $wrappedtext,0);


$newimg = 'output.jpg';

$image->saveToFile($newimg);


?>
<img src="output.jpg" />


