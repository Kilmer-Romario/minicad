<?php
    $xc=$_POST['xc'];
    $yc=$_POST['yc'];
    $rx=$_POST['rx'];
    $ry=$_POST['ry'];
    header("Content-Type: image/png");
    $im = imagecreate(1500, 1000);
    imagecolorallocate($im, 255, 255, 255);
    $color=imagecolorallocate($im,255,0,0);
    


    if($rx>$ry)
    {
        for($i=0;$i<=360;$i++)
        {
            $x=$xc+$rx*(1/cos($i));
            $y=$yc+$ry*tan($i);
            imagesetpixel($im,$x+750,$y+500,$color); 
        }
    }
    else
    {
        if($ry>$rx)
        {
            for($j=0;$j<=360;$j++)
            {
                $x=$xc+$rx*tan($j);
                $y=$yc+$ry*(1/cos($j));
                imagesetpixel($im,$x+750,$y+500,$color); 
            }
        }
        else
        {
            if($rx==$ry)
            {
                for($i=0;$i<=360;$i++)
                {
                    $x=$xc+$rx*(1/cos($i));
                    $y=$yc+$rx*tan($i);
                    imagesetpixel($im,$x+750,$y+500,$color); 
                }
                for($i=0;$i<=360;$i++)
                {
                    $x=$xc+$rx*tan($i);
                    $y=$yc+$rx*(1/cos($i));
                    imagesetpixel($im,$x+750,$y+500,$color); 
                }
            }
        }
    }
    imagepng($im);
    imagedestroy($im);
?>