<?php


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Super Blog</title>
	<link rel="stylesheet" type="text/css" href="blog.css">

</head>
<body>
	<h1>Mon super blog !</h1>
	<p>Derniers billets du blog :</p>

	<?php
	// 1 : Connexion a la base de donnees
	try
	{
		// Etablir la connexion
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		// En cas d'erreur, afficher un message et tout arreter
		die('Erreur : ' . $e->getMessage());
	}


	// 2 : Recuperer les 5 dernieres news
	$reponse = $bdd->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%b/%Y à %Hh%i et %s\'\'")  AS date FROM blog_billets ORDER BY date_creation DESC LIMIT 0, 5');

	// 3 : Afficher les resultats
	while ($donnees = $reponse->fetch())
	{
	?>		
	
	<div class="news">
		<h3><?php echo htmlspecialchars($donnees['titre']); ?>;
		<i>&nbsp;&nbsp;&nbsp;le 
		<?php echo htmlspecialchars($donnees['date']); ?>;
		</i></h3>
		<p>
		<!-- contenu, en respectant les \n dans le texte -->
		<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>;
		<!-- lien vers les commentaires -->
		<br />
		<a href="blog_commentaires.php?news=<?php echo $donnees['id']; ?>">Voir les commentaires</a>
		</p></div>
	<?php
	}
	$reponse->closeCursor();
	?>

</body>
</html>