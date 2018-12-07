<?php
    $Xo=$_POST['Xo'];
    $Xf=$_POST['Xf'];
    $Yo=$_POST['Yo'];
    $Yf=$_POST['Yf'];
    header("Content-Type: image/png");
    $im = imagecreate(1500, 1000);//crea una nueva imagen(blanco)
    imagecolorallocate($im, 255, 255, 255);//asignamos color a la imagen 
    $color=imagecolorallocate($im,255,0,0);//asignamos color a la imagen
    $m=($Yf-$Yo)/($Xf-$Xo);
    $b=($Yo-$m*$Xo);
    $x=$Xo;
    $y=$Yo;
    while($x<$Xf+1)
    {
        imagesetpixel($im,$x+750,round(($y+500),0),$color);
        $x=$x+1;
        $y=$m*$x+$b;
    }
    imagepng($im);
    imagedestroy($im);
?>