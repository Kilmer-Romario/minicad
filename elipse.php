<?php
    $xc=$_POST['xc'];
    $yc=$_POST['yc'];
    $rx=$_POST['rx'];
    $ry=$_POST['ry'];
    header("Content-Type: image/png");
    $im = imagecreate(1500, 1000);
    imagecolorallocate($im, 255, 255, 255);
    $color=imagecolorallocate($im,255,0,0);
    $rx2=pow($rx,2);
    $ry2=pow($ry,2);
    $try2=2*$ry2;
    $trx2=2*$rx2;
    $x=0;$y=$ry;
    imagesetpixel($im,$x+750,$y+500,$color);
    $p=round($ry2-$rx2*$ry+(0.25*$rx2));
    $px=0;
    $py=$trx2*$y;
    while($px<$py)//region1
    {
        $x=$x+1;
        $px=$px+$try2;
        if($p<0)
        {
            $p=$p+$ry2+$px;
        }
        else
        {
            $y=$y-1;
            $py=$py-$trx2;
            $p=$p+$ry2+$px-$py;
        }
        imagesetpixel($im,$x+750,$y+500,$color); //4to cuadrante
        imagesetpixel($im,$x+750,-$y+500,$color);  //1er cuadrante
        imagesetpixel($im,-$x+750,$y+500,$color);  //3er cuadrante   
        imagesetpixel($im,-$x+750,-$y+500,$color);  //2do cuadrante   
     
    }
    $p=round($ry2*($x+0.5)*($x+0.5)+$rx2*($y-1)*($y-1)-$rx2*$ry2);
    $px=0;
    $py=$trx2*$y;
    while($y>0)//region2
    {
        $y=$y-1;
        $py=$py-$trx2;
        if($p>0)
        {
            $p=$p+$rx2-$py;
        }
        else
        {
            $x=$x+1;
            $px=$px+$try2;
            $p=$p+$rx2-$py+$px;
        }
        imagesetpixel($im,$x+750,$y+500,$color); //1er Cuadrante
        imagesetpixel($im,$x+750,-$y+500,$color); //4to cuadrante
        imagesetpixel($im,-$x+750,$y+500,$color);  //2do cuadrante   
        imagesetpixel($im,-$x+750,-$y+500,$color);  //3er cuadrante   
    }
    imagepng($im);
    imagedestroy($im);
?>