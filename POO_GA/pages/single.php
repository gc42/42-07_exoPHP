<?php

use App\App;
use App\Table\Categorie;
use App\Table\Article;


$post = Article::find($_GET['id']);
if ($post === false)
{
	App::notFound();
}
// Set le titre de la page
App::setTitle($post->titre);

// $categorie = Categorie::find($post->category_id);
?>

<h1>My Single article page</h1>

<p><a href="index.php?p=home">< Return to home page</a></p>

<div class="row">
	<div class="col-sm-9">

		<h2><?= ucfirst($post->titre); ?></h2>

		<p><em><?= ucfirst($post->categorie); ?></em></p>

		<p><?= $post->contenu; ?></p>

		<!-- <?php //echo'<pre>'; var_dump($post); echo '</pre>'; ?> -->
		</div><!-- / FIN AFFICHAGE COLONNE DE DROITE -->
</div>
