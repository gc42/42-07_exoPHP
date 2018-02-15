<?php
$timestamp_expire = strtotime('+1 day');	// Le cookie expire dans x jours

// Creation du cookie pseudo s'il n'existe pas
if (empty($_COOKIE['c_pseudo']))
{
	setcookie('c_pseudo', 'nobody', $timestamp_expire, null, null, false, true);
}

// Creation du cookie message s'il n'existe pas
if (empty($_POST['message']))
{
	setcookie('c_message', false, $timestamp_expire, null, null, false, true);
} else
{
	setcookie('c_message', true, $timestamp_expire, null, null, false, true);
}




echo "<pre> COOKIE: "; print_r($_COOKIE); echo "</pre>";
echo "<pre> POST: ";   print_r($_POST);   echo "</pre>";


										#############################
										#Verifier la presence et les bonnes valeurs du cookie !!!!!!!!!!!!!!!!!!!!!!!!


// Initialisation du cookie par le pseudo si le cookie est 'nobody'
// if (isset($_POST['pseudo'] AND $_COOKIE['c_pseudo'] === 'nobody')
// if (isset($_POST['pseudo']) AND empty($_POST['pseudo'])) {
	// echo "post pseudo exist";



 
$_COOKIE['c_pseudo'] = $_POST['pseudo'];






/*
// Recup et verification des variables
if (!empty($_POST['pseudo']) AND !empty($_POST['message']))
{
	// 0 : memo des parametres post
 	$pseudo  = $_POST['pseudo'];
	$message = $_POST['message'];

	// 1 : Connexion a la base de donnees
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	
	// 2 : Requete preparee
	$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(:new_pseudo, :new_message)');
	$req->execute(array('new_pseudo'  => $pseudo, 'new_message' => $message));
	$req->closeCursor();
} //else
*/
// Redirection du visiteur vers la page du minichat'
// header('Location: minichat.php');
?>
<br />
<a href="minichat.php">Retour</a>