<?php
$source = imagecreatefromjpeg("coucher_soleil.jpeg");
$destination = imagecreatetruecolor(200, 150); // Creation de la miniature vide

// recup de la largeur hauteur des images
$largeur_source = imagesx($source);
$hauteur_source = imagesy($source);
$largeur_destination = imagesx($destination);
$hauteur_destination = imagesx($destination);

// On cree la miniature
imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination,	$hauteur_destination, $largeur_source, $hauteur_source);

// On enregistre la miniature avec le prefixe "mini_" suivi du nom original de l'image
imagejpeg($destination, "mini_coucher_soleil.jpeg");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reduction</title>
</head>
<body>
	<img src="coucher_soleil.jpeg" alt="Coucher de soleil" />
	<img src="mini_coucher_soleil.jpeg" alt="Coucher de soleil" />
</body>
</html>