<?php

use App\App;
use App\Table\Article;
use App\Table\Categorie;

$categorie   = Categorie::find($_GET['id']);
if ($categorie === false)
{
	App::notFound();
}


$articles    = Article::getLastByCategorie($_GET['id']);
$categories  = Categorie::all();

// echo'<pre>$categorie: ';  var_dump($categorie);  echo '</pre>';
// echo'<pre>$categories: '; var_dump($categories); echo '</pre>';
// echo'<pre>$article: ';    var_dump($articles);   echo '</pre>';

?>


<h1>My articles by category</h1>

<p><a href="index.php?p=home">< Return to home page</a></p>


<div class="row">
	<div class="col-sm-8">
		<?php foreach ($articles as $post): ?>

			<h2><a href=" <?= $post->url; ?>" ><?= ucfirst($post->titre); ?></a></h2>

			<p><em><?= ucfirst($post->categorie); ?></em></p>

			<p><?= $post->extrait; ?></p>

			<!-- <?php echo'<pre>'; var_dump($post); echo '</pre>'; ?> -->

		<?php endforeach; ?>
	</div>

	<div class="col-sm-4">
		<ul>
			<?php foreach($categories as $categorie): ?>
				<li>
					<!-- <?php echo'<pre>$categorie: '; var_dump($categorie); echo '</pre>'; ?> -->
					<a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</div>