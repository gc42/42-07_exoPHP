<?php
// TEST: Formulaire de saisie et affichage des anciens messages
echo "<pre>COOKIE: "; print_r($_COOKIE); echo "</pre>";
echo "<pre>POST: ";   print_r($_POST);   echo "</pre>";

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
		#valider {
			color: black;
			background-color: lightgrey;
			border-radius: 20px;
			box-shadow: 4px 4px 8px #888888;
			margin-left: 265px;
		}
		#reset  {
			color: red;
			background-color: white;
			border-radius: 20px;
			box-shadow: 4px 4px 8px #888888;
		}
	</style>
</head>
<body>
	<h1>Minichat'</h1>
	Le plus grand site d'echange de blabla dans l'univers !<br /><i>Enjoy and bee happy to diffuse ;-)</i><br /><br />
	<form method="post" action="minichat_post.php">
		<label for="pseudo">Saisissez votre pseudo (12 caracteres maxi)</label><br />
		<input type="text" name="pseudo" id="pseudo" 
			<?php if ($_COOKIE['c_pseudo'] !== 'nobody') {
				echo 'value="' . htmlspecialchars($_COOKIE['c_pseudo']) . '"';
			} ?>
			 size="13" maxlength="12" required onfocus="this.value=''"
			<?php if (empty($_COOKIE['c_pseudo_valide'])) {
			 	echo "autofocus";
			 } ?> />

		<!-- <?php// if ($_COOKIE['c_pseudo_valide'] === '0') {
			//echo '<span style="color:red; font-size:small;">* Saisissez votre pseudo</span>';
		}?> -->

		<br />
		<label for="message">Rédigez votre message (255 caracteres maxi)</label><br />
		<textarea name="message" id="message" rows="5" cols="50" maxlength="255" required autofocus></textarea><br />

		<!-- <?php// if ($_COOKIE['c_message'] === '0') {
			//echo '<span style="color:red; font-size:small;">* Saisissez le contenu du message</span><br />';
		}?> -->
		<input type="submit" name="Valider" value="Valider" id="valider">
	</form>




	<?php
	// 1 : Connexion a la base de donnees
	try
	{
		// Connexion bdd
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		// En cas d'erreur, message et stop tout
		die('Erreur : ' . $e->getMessage());
	}	// Si tout va bien on continue


	

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
		<input type="submit" name="reset" value="Reset" id="reset">
	</form>

</body>
</html>