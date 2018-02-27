<?php

//Connexion Base de donnée
require_once('db.php');

$pseudo = ''; //Pour memorisation et affichage du pseudo après envoi du formulaire.

//Traitement du formulaire si envoyé 
require_once('minichat_post.php');

?>

<!doctype html>
<html lang="fr">
	<head>
		  <meta charset="utf-8">
		  <title>Mini chat</title>
	</head>
	<body>
		<h1>Mini-chat</h1>

		<?php 

		//On affichage un message indiquant qu'il y a des erreurs, s'il y en a.
		if (!empty($errors)){
			echo '<p>Plusieurs erreurs sont présentes, merci de les corriger.</p>';
		}

		?>

		<form action="" method="POST">
			<?php
				//Affichage des erreurs sur le pseudo s'il y en a
				if(isset($errors['pseudo']) && $errors['pseudo'] != "") {
					echo $errors['pseudo'], '<br>';
				}
			?>
			Pseudo : <input type="text" name="pseudo" value="<?= htmlspecialchars($pseudo) ?>"/><br>

			<?php
				//Affichage des erreurs sur le message s'il y en a
				if(isset($errors['message']) && $errors['message'] != "") {
					echo $errors['message'], '<br/>';
				}
			?>
			Message : <input type="text" name="message"/><br>

			<input type="submit" name="submit" value="Envoyer"/>
		</form>

	</body>
</html>

<?php

//Affichage des 10 derniers messages.
$request = $db->query('SELECT pseudo, message, DATE_FORMAT(date, \'%d/%m/%Y à %Hh%imin%ss\') as date FROM mini_chat ORDER BY id DESC LIMIT 10');
$lastMessages = $request->fetchAll(PDO::FETCH_ASSOC);

if (empty($lastMessages)){
	echo '<p>Aucun message n\'a été posté.<br>Soyez le premier à écrire un message!</p>';
} 
else {
	?>
	<h2>Les 10 derniers messages</h2>

	<?php

	foreach($lastMessages as $message)
	{
		echo '<div><p><strong>', htmlspecialchars($message['pseudo']), '</strong>, le ',$message['date'],' : </p><p>', htmlspecialchars($message['message']), '</p></div><br>';
	}
}

$request->closeCursor();