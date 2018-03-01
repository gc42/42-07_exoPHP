<?php
	// 1 : Suppression du COOKIE
	setcookie('c_pseudo');
		
	// Si Reset All, nettoyage de la BDD
	if ($_POST['reset'] == "Reset All")
	{
		// 2 : Connexion a la base de donnees
		require_once('minichat_bdd.php');
		

		// 3 : Requete de suppression des messages 
		// jeu de variables
		$nbr_messages_conserves = 5;
		// La requete preparee
		$req = $bdd->prepare('DELETE FROM minichat WHERE id > :nb');
		$req->execute(array('nb' => $nbr_messages_conserves));
	}
	
	header('Location: minichat.php');
?>