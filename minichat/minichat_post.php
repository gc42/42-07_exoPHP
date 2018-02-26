<?php
$timestamp_expire = strtotime('+1 day');	// Le cookie expire dans x jours


// Initialisation Cookie `c_pseudo`
if (empty($_COOKIE['c_pseudo']))
{
	setcookie('c_pseudo',  'nobody', $timestamp_expire, null, null, false, true);
	$_COOKIE['c_pseudo'] = 'nobody';
}


//#################################
// Valeur du COOKIE c_pseudo
if ($_POST['pseudo'] !== '' AND $_COOKIE['c_pseudo'] === 'nobody')
{
	setcookie('c_pseudo',  htmlspecialchars($_POST['pseudo']), $timestamp_expire, null, null, false, true);
	$_COOKIE['c_pseudo'] = htmlspecialchars($_POST['pseudo']);
}



// ############################################################################
// TEST: Affichage des variables globales. => desactiver header('Location...)')
// echo "<pre> POST: ";   print_r($_POST);   echo "</pre>";
// echo "<pre> COOKIE: "; print_r($_COOKIE); echo "</pre>";



// ################################################################
// BDD: Insertion dans la table `minichat` du nouvel enregistrement
if (!empty($_POST['pseudo']) AND !empty($_POST['message']))
{
	// 0 : Memo des parametres post
 	$pseudo  = $_POST['pseudo'];
	$message = $_POST['message'];

	// 1 : Connexion a la base de donnees, en mode error visible
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	// 2 : Requete preparee pour l'ajout des donnees dans la table
	$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(:new_pseudo, :new_message)');
	$req->execute(array('new_pseudo'  => $pseudo, 'new_message' => $message));
	$req->closeCursor();
}

// Redirection du visiteur vers la page du minichat'
header('Location: minichat.php');
?>
<!-- A remettre en phase de test, si le header('Location:...) n'est pas utilisable. -->
<!-- <br /> -->
<!-- <a href="minichat.php">Retour</a> -->