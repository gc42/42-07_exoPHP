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
if (    !empty($_POST['pseudo']) AND !empty($_POST['message']) AND
	     isset($_POST['pseudo']) AND isset($_POST['message'])    )
{
	// 0 : Memo des parametres post
 	$pseudo  = $_POST['pseudo'];
	$message = $_POST['message'];

	// 1 : Connexion BDD
	require_once('minichat_bdd.php');

	// 2 : Requete preparee pour l'ajout des donnees dans la table
	$request = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(:new_pseudo, :new_message)');
	$request->execute(array(
		'new_pseudo'  => $pseudo,
		'new_message' => $message,
	));

	// ALTERNATIVE : autre façon de l'écrire, avec "bindValue"
	// $request->bindValue('pseudo', $_POST['pseudo']);
	// $request->bindValue('message', $_POST['message']);
	// $request->execute();

	$req->closeCursor();
}

// Redirection du visiteur vers la page du minichat'
header('Location: minichat.php');
?>
<!-- A remettre en phase de test, si le header('Location:...) n'est pas utilisable. -->
<!-- <br /> -->
<!-- <a href="minichat.php">Retour</a> -->