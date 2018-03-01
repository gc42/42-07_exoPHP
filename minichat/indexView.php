
<?php
// TEST: Affichage des COOKIES
echo "<pre>COOKIE: "; print_r($_COOKIE); echo "</pre>";
echo "<pre>POST: ";   print_r($_POST);   echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Minichat</title>
	<link rel="stylesheet" type="text/css" href="minichat.css">
	
</head>
<body>
	<h1>Minichat'</h1>
	Le plus grand site d'echange de blabla dans l'univers !<br /><i>Enjoy and be happy to diffuse ;-)</i><br /><br />

	<!-- Le formulaire -->
	<form method="post" action="index.php">
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
					// If pseudo is not define, set focus
					echo "autofocus";
				}
			?>
			size="13" maxlength="12" required onfocus="this.value=''" />
		<br />
		<label for="message">Rédigez votre message (255 caracteres maxi)</label><br />
		<textarea name="message" id="message" rows="5" cols="50" maxlength="255" placeholder="Your message" required autofocus></textarea><br />
		<input type="submit" name="submit" value="Valider" id="valider">
	</form>




<!-- Display posts history -->
	

	<?php
	// 0 : Display quiery result
	while ($data = $posts->fetch())
	{
	?>
		<p>
		<!-- 1 : The date -->
		<i><span class="date">
		<?= $data['date']; ?>
		</span></i>&nbsp;&nbsp;&nbsp;

		<!-- 2 : The pseudo, in coulor if it is the current pseudo -->
		<span
			<?php
				if (    isset($_COOKIE['c_pseudo'])
					&& strtolower($data['pseudo']) === strtolower($_COOKIE['c_pseudo'])
					)
				{
					echo ' style="color: #AA0000;"';
				}
			?>
		>
		<strong>
		<?= htmlspecialchars($data['pseudo']); ?>
		</strong> : </span>

		<!-- 3 : The message -->
		<?= nl2br(htmlspecialchars($data['message'])); ?>
		</p>
	<?php
	}
	$posts->closeCursor();
	?>


	<!-- The buttons reset & refresh -->
	<!-- <form method="post" action="minichat_reset.php"> -->
	<form method="get" action="">
		<input type="button" name="refresh" value="refreshMessages" onclick='window.location.reload()' id="refresh">
		<br /><br />
		<input type="submit" name="reset" value="resetPseudo" id="resetpseudo">
		<input type="submit" name="reset" value="resetAll" id="reset">
	</form>

</body>
</html>