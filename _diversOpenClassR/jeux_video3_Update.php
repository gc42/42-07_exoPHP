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






// Faire des modifications de valeurs, en recuperant le nombre de modifications
// $nbr_modifs = $bdd->exec('UPDATE jeux_video SET prix = 14, nbre_joueurs_max = 21 WHERE possesseur = \'Moi\'');
// echo $nbr_modifs . " modification(s) effectuee(s)";


// Idem avec une requete preparee
// 1 : preparation des variables, dans le cadre de cet exercice (autrement $_POST[''])
$newprix = 15;
$new_nbre_joueurs = 9;
$proprio = Moi;
// 2 : ecriture de la requete preparee pour faire la modif
$req = $bdd->prepare('UPDATE jeux_video SET prix = :newprix, nbre_joueurs_max = :new_nbre_joueurs WHERE possesseur = :proprio');
$req->execute(array(
	'newprix' => $newprix,
	'new_nbre_joueurs' => $new_nbre_joueurs,
	'proprio' => $proprio
	));
?>
