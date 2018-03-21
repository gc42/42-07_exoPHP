<?php

	$app = App::getInstance();
	$post = $app->getTable('Post')->find($_GET['id']);
	if ($post === false)
	{
		$app->notFound();
	}

	// Set le titre de la page
	$app->title = $post->titre;
?>

<h1>My Single article page</h1>

<p><a href="index.php?p=home">< Return to home page</a></p>

<div class="row">
	<div class="col-sm-9">

		<h2><?= ucfirst($post->titre); ?></h2>

		<p><em><?= ucfirst($post->category); ?></em></p>

		<p><?= $post->contenu; ?></p>

	</div><!-- / FIN AFFICHAGE COLONNE DE DROITE -->
</div>
