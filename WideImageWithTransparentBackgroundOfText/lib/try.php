<?php
include 'WideImage.php';


$image = WideImage::load('2.jpg');
//Then, access the Canvas object of the image:

$canvas = $image->getCanvas();
//To set active font, use the useFont() method:

$canvas->useFont('C:\wamp64\www\wideimage-11.02.19-full\demo\fonts\vera.ttf', 72, $image->allocateColor(0, 0, 0));
//Draw the text into the lower right corner. The writeText() method supports smart coordinates for TTF fonts.

$canvas->writeText('center', 'center', 'Hello, world!');
//Now we draw white text over it, shifted by 1 pixel to the left and up:

$canvas->useFont('C:\wamp64\www\wideimage-11.02.19-full\demo\fonts\vera.ttf', 16, $image->allocateColor(0, 0, 0));
$canvas->writeText('right', 'bottom', 'Hello, world!');
//And save the image:

$image->saveToFile('image-with-text.jpg');


?>

<img src = "image-with-text.jpg" >
