<?php
// 1 : on ouvre le fichier
$monfichier = fopen('compteur.txt', 'r+');

// 2 : operations sur le fichier
// fgetc // lecture `c`aractere par caractere
// fgets // lecture `s`tring ligne a ligne

// 2 : on lit la premiere ligne du fichier, puis les suivantes
$i = 0;
while ($i < 5)
{
	$ligne = fgets($monfichier);
	echo $ligne . '<br />';
	$i++;
}

// 3 : ecrire dans le fichier
// fputs($fd , string $string [, int $length ] )  // ecriture ligne a ligne (alias de fwrite)
// fseek($fd, $offset, $whence)  // modifie la position du pointeur, en octets, depuis le debut du fichier, avec $whence parmis (SEEK_SET: par rapport au debut + offset, SEEK_CUR: par rapport a la position courante + offset, SEEK_END: par rapport a la fin + offset).
fseek($monfichier, 0, SEEK_END);
fputs($monfichier, "5 Texte a ajouter\n");
fputs($monfichier, "6 Texte a ajouter\n");
fputs($monfichier, "7 Texte a ajouter\n");
fputs($monfichier, "8 Texte a ajouter\n");

// 3 : Quand on a fini de l'utiliser, on ferme le fichier.
fclose($monfichier);
?>