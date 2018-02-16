<?php
	// 1 : Suppression du COOKIE
	setcookie('c_pseudo');
	
	// 2 : Connexion a la base de donnees
	try
	{
		// On etablit la connexion
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		// En cas d'erreur, affichage d'un message et on stoppe tout
		die('Erreur : ' . $e->getMessage());
	}


	

	// 3 : Requete de suppression des messages 
	// jeu de variables
	$nbr_messages_conserves = 5;
	// La requete preparee
	$req = $bdd->prepare('DELETE FROM minichat WHERE id > :nb');
	$req->execute(array('nb' => $nbr_messages_conserves));

	header('Location: minichat.php');
?>