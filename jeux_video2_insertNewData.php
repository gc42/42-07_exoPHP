<?php
try
{
	// Connexion a la bese de donnees
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrete tout
	die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on continue
// Pour ce test, definition des variables (autrement recuperees d'un $_POST).
$nom = 'monjeu';
$possesseur = 'Moi';
$console = 'mac';
$prix = 42;
$nbre_joueurs_max = 3000;
$commentaires = 'Le jeu le plus crevant du monde';

// Ajout d'une entree dans la table jeux_video
$req = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console, prix, nbre_joueurs_max, commentaires)
	 VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
$req->execute(array(
'nom' => $nom,
'possesseur' => $possesseur,
'console' => $console,
'prix' => $prix,
'nbre_joueurs_max' => $nbre_joueurs_max,
'commentaires' => $commentaires
));

echo "Le nouveau jeu a ete ajoute !";

?>
