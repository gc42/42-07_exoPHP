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
	// 3 : Afficher les resultats
	while ($donnees = $req->fetch())
	{
	?>		
	
	<div class="news">
		<h3>
			<?php echo htmlspecialchars($donnees['titre']); ?>;
			<i>&nbsp;&nbsp;&nbsp;le 
			<?php echo htmlspecialchars($donnees['date']); ?>;
			</i>
		</h3>
		<p>
		<!-- contenu, en respectant les \n dans le texte -->
		<?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?>;
		<!-- lien vers les commentaires -->
		<br />
		<a href="blog_commentaires.php?news=<?php echo $donnees['id']; ?>">Voir les commentaires</a>
		</p></div>
	<?php
	}
	$req->closeCursor();
	?>

</body>
</html>