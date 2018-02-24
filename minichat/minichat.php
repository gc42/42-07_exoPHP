<?php
// TEST: Affichage des COOKIES
// echo "<pre>COOKIE: "; print_r($_COOKIE); echo "</pre>";
// echo "<pre>POST: ";   print_r($_POST);   echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Minichat</title>
	<style type="text/css">
		label {
			font-size: small;
		}
		#valider, #refresh {
			color: black;
			background-color: lightgrey;
			border-radius: 20px;
			box-shadow: 4px 4px 8px #888888;
		}
		#valider {
			margin-left: 265px;
		}
		#reset, #resetpseudo  {
			color: red;
			background-color: white;
			border-radius: 20px;
			box-shadow: 4px 4px 8px #888888;
		}
	</style>
</head>
<body>
	<h1>Minichat'</h1>
	Le plus grand site d'echange de blabla dans l'univers !<br /><i>Enjoy and be happy to diffuse ;-)</i><br /><br />
	<form method="post" action="minichat_post.php">
		<label for="pseudo">Saisissez votre pseudo (12 caracteres maxi)</label><br />
		<input type="text" name="pseudo" id="pseudo" placeholder="Your pseudo"
			<?php if ($_COOKIE['c_pseudo'] !== 'nobody') {echo 'value="' . htmlspecialchars($_COOKIE['c_pseudo']) . '"';} ?>
			size="13" maxlength="12" required onfocus="this.value=''"
			<?php if (empty($_COOKIE['c_pseudo'])) {echo "autofocus";} ?>
			/>
		<br />
		<label for="message">Rédigez votre message (255 caracteres maxi)</label><br />
		<textarea name="message" id="message" rows="5" cols="50" maxlength="255" required autofocus></textarea><br />
		<input type="submit" name="Valider" value="Valider" id="valider">
	</form>




	<?php
	// 1 : Connexion a la base de donnees
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


	

	// 2 : Recupere les 10 derniers messages 
	$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY id DESC LIMIT 0, 10');
	
	

	// 3 : Affichage des resultats
	while ($donnees = $reponse->fetch())
	{
		echo '<p';
		if (strtolower($donnees['pseudo']) === moi)
		{
			echo ' style="color:red;"';
		}
		echo '><strong>' .
			htmlspecialchars($donnees['pseudo']) . '</strong> : ' .
			htmlspecialchars($donnees['message']) .
			'</p>';
	}
	$reponse->closeCursor();
	?>



	<form method="post" action="minichat_reset.php">
		<input type="button" name="Refresh" value="Refresh messages" onclick='window.location.reload()' id="refresh">
		<br /><br />
		<input type="submit" name="reset" value="Reset All" id="reset">
		<input type="submit" name="resetpseudo" value="Reset Pseudo" id="resetpseudo">
	</form>

</body>
</html>