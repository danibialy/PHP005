<?php
header('Content-Type: image/jpeg');

$file = "017040";
if (isset($_GET['file'])) {
    $file = $_GET['file'];
}

$w = 500;
if (isset($_GET['width'])) {
    $w = $_GET['width'];
}

$imgname = "images/" . $file . ".jpg";
$img = imagecreatefromjpeg($imgname);
$newimg = imagescale($img, $w, $w);

$fontFile = realpath('font/Lato-Heavy.ttf');
$textColor = imagecolorallocate($newimg, 255, 255, 255);

if (isset($_GET['text1']) && isset($_GET['size1'])) {
    imagettftext($newimg, $_GET['size1'], 0, 20, $_GET['size1'] + 30, $textColor, $fontFile, $_GET['text1']);
}

if (isset($_GET['text2']) && isset($_GET['size2'])) {
    imagettftext($newimg, $_GET['size2'], 0, 20, $w - 30, $textColor, $fontFile, $_GET['text2']);
}

imagejpeg($newimg);
?>