<?php
$r=$_POST['r'];
$xc=$_POST['xc'];
$yc=$_POST['yc'];
header("Content-Type: image/png");
$im = imagecreate(1500, 1000);
imagecolorallocate($im, 255, 255, 255);
$color=imagecolorallocate($im,255,0,0);
$xi=0;
$y=0;
for($xi=-$r;$xi<=$r;$xi++)
{
    $y=$yc+sqrt(pow($r,2)-pow(($xc-$xi),2));
    imagesetpixel($im,$xi+750,round(($y+500),0),$color);
    $y=$yc-sqrt(pow($r,2)-pow(($xc-$xi),2));
    imagesetpixel($im,$xi+750,round(($y+500),0),$color);
}

imagepng($im);
imagedestroy($im);
?>