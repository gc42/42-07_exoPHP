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


	<!-- AFFICHAGE DE LA NEWS SELECTIONNEE -->
	<div class="news"><h3>
		<?= htmlspecialchars($post['title']); ?>
		<i>&nbsp;&nbsp;&nbsp;le 
			<?= htmlspecialchars($post['creation_date_fr']); ?>
		</i></h3>
		<p>
			<?= htmlspecialchars($post['content']); ?>
		</p>
	</div>
	
	<?php
	// IMPORTANT : Liberation du curseur pour la prochaine requete
	$req->closeCursor();
	?>



<!-- AFFICHAGE DES COMMENTAIRES -->

	<h2>Commentaires</h2>

	<?php
	// 2 : Recuperer les commentaires
	
	?>

	<?php
	// 3 : Afficher les resultats
	while ($data = $comments->fetch())
	{
		// echo '<pre>'; print_r($data); echo '</pre>';
	
	?>
		<div class="commentaires">
			<p>
				<span class="who"><i>
				<strong>
				<?= htmlspecialchars($data['author']); ?>
				</strong>
				<small>le 
				<?= $data['comment_date_fr']; ?>
				</small>
				</i></span><br />
				
				<?= nl2br(htmlspecialchars($data['comment'])); ?>
			</p>
		</div>
	
	<?php
	} // Fin de la boucle des commentaires
	$req->closeCursor();
	?>

</body>
</html>