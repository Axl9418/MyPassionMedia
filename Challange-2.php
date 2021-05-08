<?php
 
$img_width = 800;
$img_height = 600;
 
$img = imagecreatetruecolor($img_width, $img_height);
 
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);
$red = imagecolorallocate($img, 212, 86, 86);
$green = imagecolorallocate($img, 35, 176, 87);
$yellow = imagecolorallocate($img, 255, 200, 0);
$brown = imagecolorallocate($img, 189, 152, 49);
$blue = imagecolorallocate($img, 203, 226, 242);
$gray = imagecolorallocate($img, 179, 179, 174);
 
imagefill($img, 0, 0, $white);
 
imagefilledrectangle($img, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*8/10, $red);
//Wall
imagefilledrectangle($img, $img_width*4/10, $img_height*5/10, $img_width*8/10, $img_height*8/10, $gray);

//Window
imagefilledrectangle($img, $img_width*5/10, $img_height*7/10, $img_width*7/10, $img_height*6/10, $blue);

//line width
imagesetthickness($img, 4);
imageline($img, 480, 420, 480, 360, $black);
imageline($img, 560, 390, 400, 390, $black);

//Top
imagefilledpolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*2/10, $img_height*5/10, $img_width*4/10, $img_height*5/10], 3, $gray);
//Roof
imagefilledpolygon($img, [$img_width*3/10, $img_height*2/10, $img_width*7/10, $img_height*2/10, $img_width*8/10, $img_height*5/10, $img_width*4/10, $img_height*5/10], 4, $red);

//Sun
imagefilledarc($img, 700, 100, 100, 100, 0, 360, $yellow, IMG_ARC_PIE);
//Door
imagefilledrectangle($img, $img_width*2/8, $img_height*6/10, $img_width*3/8.5, $img_height*8/10, $brown);
//Door look
imagefilledarc($img, 209, 425, 20, 20, 0, 360, $black, IMG_ARC_PIE);

//Grass
imageline($img, 0, $img_height*8/10, $img_width, $img_height*8/10, $green);
 
imagepng($img,"passionmedia.png");;
 
?>

<img src="passionmedia.png">