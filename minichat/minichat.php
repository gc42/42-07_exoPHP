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
		.date
		{
		    font-size: x-small;
		    color: #777777;
		}
	</style>
</head>
<body>
	<h1>Minichat'</h1>
	Le plus grand site d'echange de blabla dans l'univers !<br /><i>Enjoy and be happy to diffuse ;-)</i><br /><br />

	<!-- Le formulaire -->
	<form method="post" action="minichat_post.php">
		<label for="pseudo">Saisissez votre pseudo (12 caracteres maxi)</label><br />
		<input type="text" name="pseudo" id="pseudo" placeholder="Your pseudo"
			<?php
				if (isset($_COOKIE['c_pseudo']) && $_COOKIE['c_pseudo'] !== 'nobody')
				{
					// Si le pseudo est defini, le mettre en valeur pas defaut
					echo 'value="' . htmlspecialchars($_COOKIE['c_pseudo']) . '"';
				}
				else
				{
					// Si le pseudo n'est pas defini, mettre le focus
					echo "autofocus";
				}
			?>
			size="13" maxlength="12" required onfocus="this.value=''" />
		<br />
		<label for="message">Rédigez votre message (255 caracteres maxi)</label><br />
		<textarea name="message" id="message" rows="5" cols="50" maxlength="255" required autofocus></textarea><br />
		<input type="submit" name="Valider" value="Valider" id="valider">
	</form>




	<?php
	// 1 : Connexion BDD
	require_once('minichat_bdd.php');
	

	// 2 : Recupere les 10 derniers messages 
	$reponse = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_creation, "%d/%m/%Y &agrave; %Hh%i") AS date FROM minichat ORDER BY id DESC LIMIT 0, 10');
	

	// 3 : Affichage des resultats
	while ($donnees = $reponse->fetch())
	{
	?>
		<p>
		<!-- 1 : La date -->
		<i><span class="date">
		<?php echo $donnees['date']; ?>
		</span></i>&nbsp;&nbsp;&nbsp;

		<!-- 2 : Le pseudo, en couleur si c'est le pseudo courant -->
		<span
			<?php
				if (    isset($_COOKIE['c_pseudo'])
					&& strtolower($donnees['pseudo']) === strtolower($_COOKIE['c_pseudo'])
					)
				{
					echo ' style="color: #AA0000;"';
				}
			?>
		>
		<strong>
		<?php echo htmlspecialchars($donnees['pseudo']); ?>
		</strong> : </span>

		<!-- 3 : Le message -->
		<?php echo nl2br(    htmlspecialchars($donnees['message'])    ); ?>
		</p>
	<?php
	}
	$reponse->closeCursor();
	?>


	<!-- Les boutons de reset & refresh -->
	<form method="post" action="minichat_reset.php">
		<input type="button" name="Refresh" value="Refresh messages" onclick='window.location.reload()' id="refresh">
		<br /><br />
		<input type="submit" name="resetpseudo" value="Reset default pseudo" id="resetpseudo">
		<input type="submit" name="reset" value="Reset All" id="reset">
	</form>

</body>
</html>