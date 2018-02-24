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
	<a href="index.php">Retour vers les news</a>

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
	?>





	<?php
	// AFFICHAGE DE LA NEWS SELECTIONNEE
	// 2 : Recuperer la news selectionnee
	$req = $bdd->prepare('SELECT titre, contenu, DATE_FORMAT(date_creation, "%d/%b/%Y à %Hh%i et %s\'\'")  AS date FROM blog_billets WHERE id = ?');
	$req->execute(array($_GET['news']));

	// 3 : Afficher les resultats
	$donnees = $req->fetch();
	?>

	<div class="news"><h3>
	<?php echo htmlspecialchars($donnees['titre']); ?>
	<i>&nbsp;&nbsp;&nbsp;le 
	<?php echo htmlspecialchars($donnees['date']); ?>
	</i></h3>
	<p>
	<?php echo htmlspecialchars($donnees['contenu']); ?>
	</p></div>
	
	<?php
	// IMPORTANT : Liberation du curseur pour la prochaine requete
	$req->closeCursor();
	?>




	<h2>Commentaires</h2>

	<?php
	// AFFICHAGE DES COMMENTAIRES
	// 2 : Recuperer les commentaires
	$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%b/%Y à %Hh%i et %s\'\'")  AS date
		FROM blog_commentaires
		WHERE id_billet = ?
		ORDER BY date_commentaire DESC
		LIMIT 0, 10
		');
	$req->execute(array($_GET['news']));
	// 3 : Afficher les resultats
	while ($donnees = $req->fetch())
	{
		// echo '<pre>'; print_r($donnees); echo '</pre>';
	
	?>
		<div class="commentaires">
			<p>
				<span class="who"><i>
				<strong>
				<?php echo htmlspecialchars($donnees['auteur']); ?>
				</strong>
				<small>le 
				<?php echo $donnees['date']; ?>
				</small>
				</i></span><br />
				
				<?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?>
			</p>
		</div>
	
	<?php
	} // Fin de la boucle des commentaires
	$req->closeCursor();
	?>

</body>
</html>