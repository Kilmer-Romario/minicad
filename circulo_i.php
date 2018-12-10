<?php
$r=$_POST['r'];
$xc=$_POST['xc'];
$yc=$_POST['yc'];
header("Content-Type: image/png");
$im = imagecreate(1500, 1000);
imagecolorallocate($im, 255, 255, 255);
$color=imagecolorallocate($im,255,0,0);
$color=imagecolorallocate($im,255,0,255);
$color1=imagecolorallocate($im,0,0,0);
$dalfa=0;$cost=0;$sent=0;$x=0;$y=0;$xtemp=0;
$fi=1;
$dalfa=1/$r;
$cost=cos($dalfa);
$sent=sin($dalfa);
$x=0;$y=$r;

while($y>$x)
{
    imagesetpixel($im,round(($xc+$x+750),0),round((($yc+$y*$fi)+500),0),$color);
    imagesetpixel($im,round(($xc-$x+750),0),round((($yc+$y*$fi)+500),0),$color);
    imagesetpixel($im,round(($xc+$x+750),0),round((($yc-$y*$fi)+500),0),$color);
    imagesetpixel($im,round(($xc-$x+750),0),round((($yc-$y*$fi)+500),0),$color);
    /*imagesetpixel($im,round(($xc+$y+750),0),round((($yc+$y*$fi)+500),0),$color);
    imagesetpixel($im,round(($xc-$y+750),0),round((($yc+$y*$fi)+500),0),$color);
    imagesetpixel($im,round(($xc+$y+750),0),round((($yc-$y*$fi)+500),0),$color);
    imagesetpixel($im,round(($xc-$y+750),0),round((($yc-$y*$fi)+500),0),$color);*/
    $xtemp=$x;
    $x=($x*$cost-$y*$sent);
    $y=($y*$cost+$xtemp*$sent);
}
imagepng($im);
imagedestroy($im);
?>