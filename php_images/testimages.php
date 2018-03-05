<?php

header ("Content-type: image/png");
$image = imagecreate(200,200);

$orange = imagecolorallocate($image, 255, 128, 0);
$bleu = imagecolorallocate($image, 0, 0, 255);
$bleuclair = imagecolorallocate($image, 156, 227, 254);
$noir = imagecolorallocate($image, 0, 0, 0);
$blanc = imagecolorallocate($image, 255, 255, 255);

imagestring($image, 4, 35, 15, "Salut les Zeros !", $blanc);

// ImageSetPixel ($image, $x, $y, $couleur);
ImageSetPixel ($image, 100, 100, $noir);

// ImageLine ($image, $x1, $y1, $x2, $y2, $couleur);
ImageLine ($image, 30, 30, 120, 120, $noir);

// ImageEllipse ($image, $x, $y, $largeur, $hauteur, $couleur);
ImageEllipse ($image, 100, 100, 100, 50, $noir);

// ImageRectangle ($image, $x1, $y1, $x2, $y2, $couleur);
ImageRectangle ($image, 30, 30, 160, 120, $noir);

// ImagePolygon ($image, $array_points, $nombre_de_points, $couleur);
$points = array(10, 40, 120, 50, 160, 160);
ImagePolygon ($image, $points, 3, $noir);

// imagecolortransparent($image, $couleur);
imagecolortransparent($image, $orange); // On rend le fond orange transparent




imagepng($image);



header("Content-type: image/jpeg");
$image = imagecreatefromjpeg("coucher_soleil.jpeg");
imagejpeg($image);

?>
