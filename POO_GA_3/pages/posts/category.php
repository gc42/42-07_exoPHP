<?php

$app = App::getInstance();

$categorie = $app->getTable('Category')->find($_GET['id']);
if ($categorie === false)
{
	$app->notFound();
}


$articles    = $app->getTable('Post')->getLastPostsByCategory($_GET['id']);
$categories  = $app->getTable('Category')->all();



?>


<h1>My articles by category</h1>

<p><a href="index.php?p=home">< Return to home page</a></p>


<div class="row">
	<div class="col-sm-8">
		<?php foreach ($articles as $post): ?>

			<h2><a href=" <?= $post->url; ?>" ><?= ucfirst($post->titre); ?></a></h2>

			<!-- <?= printGC($post); ?> -->

			<p><em><?= ucfirst($post->category); ?></em></p>

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