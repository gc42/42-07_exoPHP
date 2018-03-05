<?php
// on spécifie le type de fichier créer (ici une image de type jpeg)
header ("Content-type: image/jpeg");

// on crée deux variables contenant les chemins d'accès à nos deux fichiers : $fichier_source contenant le lien vers l'image à "copyrighter", $fichier_copyright contenant le lien vers la petite vignette contenant le copyright (bien sur, on prendra soin de placer les images sources dans un répertoire "caché" sinon le copyright ne sert à rien si les visiteurs ont accès aux images sources)
$fichier_source = "./coucher_soleil.jpg";
$fichier_copyright = "./logo.png";

// on crée nos deux ressources de type image (par le biais de la fonction ImageCreateFromJpeg)
$im_source = ImageCreateFromJpeg ($fichier_source);
$im_copyright = ImageCreateFromJpeg ($fichier_copyright);

// on calcule la largeur de l'image qui va être copyrightée
$larg_destination = imagesx ($im_source);

// on calcule la largeur de l'image correspondant à la vignette de copyright
$larg_copyright = imagesx ($im_copyright);
// on calcule la hauteur de l'image correspondant à la vignette de copyright
$haut_copyright = imagesy ($im_copyright);

// on calcule la position sur l'axe des abscisses de la vignette
$x_destination_copyright = $larg_destination - $larg_copyright;

// on réalise la superposition, le dernier paramètre étant le degré de transparence de la vignette (cependant, allez voir la fin de ce même tutorial pour une définition complète de tous les arguments de cette fonction)
@imageCopyMerge ($im_source, $im_copyright,
    $x_destination_copyright, 0, 0, 0, $larg_copyright,
    $haut_copyright, 70);

// on affiche notre image copyrightée
Imagejpeg ($im_source);
?>