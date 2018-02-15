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




// Preparation de la requete preparee
$req = $bdd->prepare('SELECT nom, prix FROM jeux_video WHERE possesseur = :possesseur AND prix <= :prixmax ORDER BY prix');
$req->execute(array('possesseur' => $_GET['possesseur'], 'prixmax' => $_GET['prix_max']));

echo "<ul>";
while ($donnees = $req->fetch())
{
	echo '<li>' . $donnees['nom'] . ' (' . $donnees['prix'] . ' EUR)</li>';
}
echo '</ul>';
$req->closeCursor();

?>
