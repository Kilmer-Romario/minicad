<?php
$Xo=$_POST['Xo'];
$Xf=$_POST['Xf'];
$Yo=$_POST['Yo'];
$Yf=$_POST['Yf'];
$Xo=$Xo+750;
    $Xf=$Xf+750;
    $Yo=$Yo+500;
    $Yf=$Yf+500;
header("Content-Type: image/png");
$im = imagecreate(1500, 1000);
imagecolorallocate($im, 255, 255, 255);
$color=imagecolorallocate($im,255,0,0);
$dx=$Xf-$Xo;
$dy=$Yf-$Yo;
$e=0;
$c=0;
if($dy<0)
{
    $b=$Xf;$Xf=$Xo;$Xo=$b;
    $b=$Yf;$Yf=$Yo;$Yo=$b;
    $dy=-$dy;$dx=-$dx;
}
$x=$Xo;$y=$Yo;
if($dx>=0)
{
    if($dx>=$dy) //CASO 1 
    {
        for($c=1;$c<=($dx-1);$c++)
        {
            if($e<0)
            {
                $x=$x+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+$dy;
            }
            else
            {
                $x=$x+1;
                $y=$y+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+($dy-$dx);
            }
        }
    }
    else // CASO 2
    {
        for($c=1;$c<=($dy-1);$c++)
        {
            if($e<0)
            {
                $x=$x+1;
                $y=$y+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+$dy-$dx;
            }
            else
            {
                $y=$y+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e-$dx;
            }
        }
    }
}
else
{
    if($dx>=$dy) //CASO 3
    {
        for($c=1;$c<=($dx-1);$c++)
        {
            if($e<0)
            {
                $x=$x-1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+$dy;
            }
            else
            {
                $x=$x-1;
                $y=$y+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+$dx+$dy;
            }
        }
    }
    else // CASO 4
    {
        for($c=1;$c<=($dy-1);$c++)
        {
            if($e<0)
            {
                $x=$x-1;
                $y=$y+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+$dx+$dy;
            }
            else
            {
                $y=$y+1;
                imagesetpixel($im,$x,$y,$color);
                $e=$e+$dx;
            }
        }
    }  
}
imagesetpixel($im,$x,$y,$color);


/*
if($Xo==$Xf)
{
    for($i=$Yo;$i<=$Yf;$i++)
    {
        imagesetpixel($im,$Xo,$i,$color);
    }
}
else
{
    if($Yo==$Yf)
    {
        for($i=$Xo;$i<=$Xf;$i++)
        {
            imagesetpixel($im,$i,$Yo,$color);
        }
    }
}
*/
imagepng($im);
imagedestroy($im);
?>
