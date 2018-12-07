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
    if(((abs($m)<1)&&($Xi>$Xf))||((abs($m)>1)&&($Yi>$Yf)))
    {
        $b=$Xf;$Xf=$Xo;$Xo=$b;// CAMBIAMOS DE POSICION LOS PUNTOS
        $b=$Yf;$Yf=$Yo;$Yo=$b;// FINAL A INICIAL Y VICEVERSA SI ES QUE FUERA NECESARIO
    }
    imagesetpixel($im,$Xo+750,$Yo+500,$color);
    if(abs($m)<1)
    {
        $yr=$Yo;
        for($x=($Xo+1);$x<=($Xf-1);$x++)
        {
            $yr=$yr+$m;
            imagesetpixel($im,$x+750,round(($yr+750),0),$color);
        }
    }
    else
    {
        $minversa=1/$m;
        $xr=$Xo;
        for($y=($Yo+1);$y<=($Yf-1);$y++)
        {
            $xr=$xr+$minversa;
            imagesetpixel($im,round(($xr+750),0),$y+500,$color);
        }
        imagesetpixel($im,$Xf+750,$Yf+500,$color);
    }
    imagepng($im);
    imagedestroy($im);
?>