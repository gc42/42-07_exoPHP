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



// Faire des SUPPRESSIONS de valeurs
// comme : DELETE FROM jeux_video WHERE nom='monjeu'
// jeu de variables
$theId = 52;
// La requete preparee
$req = $bdd->prepare('DELETE FROM jeux_video WHERE id = :theId');
$req->execute(array(
	'theId' => $theId
	));
?>
