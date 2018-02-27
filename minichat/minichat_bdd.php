	<?php
	// 1 : Connexion a la base de donnees
	$host   = 'localhost';	// Hôte de la Base de Données
	$bddname = 'test';		// Nom de la Base de Données
	$user   = 'root';		// Nom d'utilisateur de la Base de Données
	$pass   = 'root';		// Mot de passe de la Base de Données

	try
	{
		// On etablit la connexion
		$bdd = new PDO('mysql:host='.$host.';dbname='.$bddname.';charset=utf8', $user, $pass,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		// En cas d'erreur, affichage d'un message et on stoppe tout
		die('Erreur de connexion a la BDD (verifier user/pwd): ' . $e->getMessage());
	}
