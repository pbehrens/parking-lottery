<?php

    // if you want to input them by number, just remove the 'letter' => from each line...
    $lots = array(
        'a' => array(421,434,431,413,473,424,473,449,446,445),
        'b' => array(403,470,419,437,473,452,473,487,436,482),
        'c' => array(131,475,109,437,125,428,146,464),
        'd' => array(148,464,127,427,145,416,167,452),
        'e' => array(107,436,83,391,100,382,125,427),
        'f' => array(127,427,101,382,121,371,144,415),
        'g' => array(83,390,58,341,73,332,100,382),
        'h' => array(74,331,93,319,119,370,101,380),
        'i' => array(70,322,58,287,64,286,58,254,71,251,76,284,88,312),
        'j' => array(67,136,89,133,89,180,73,238,58,237,65,205,59,205,67,172),
        'k' => array(122,136,164,147,166,158,122,152),
        'l' => array(85,67,149,73,145,92,88,88),
        'm' => array(149,74,193,89,193,107,181,104,146,92),
        'n' => array(88,107,88,89,146,96,139,113),
        'o' => array(139,115,146,97,191,107,196,130),
    );
    // to make the new, smaller image.......
    $img = imagecreatefrompng("./lots.png");

    // turn on alpha blending
    imagealphablending($img, true);

    `// get my orangey red color
    $redtrans = imagecolorallocatealpha($img, 255, 72, 0, (int)(127*.50));

    // get the string
    $drawLots = explode(',',$_REQUEST['l']);
    foreach($drawLots as $l)
    {
        // is it in the array?
        if(isset($lots[$l]))
        {
            // draw the polygon
            imagefilledpolygon($img, $lots[$l], count($lots[$l])/2, $redtrans);
        }
    }

    // output an image
    header("Content-type: image/gif");
    imagegif($img);

    // kill the image so as to take no ram
    imagedestroy($img);

?> 