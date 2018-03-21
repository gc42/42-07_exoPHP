<?php


?>

<h1>My Home page</h1>



<div class="row">
	<div class="col-sm-8">
		<?php foreach (App::getInstance()->getTable('Post')->getLastPosts() as $post): ?>

			<h2><a href=" <?= $post->url; ?>" ><?= ucfirst($post->titre); ?></a></h2>

			<p><em><?= $post->categorie; ?></em></p>

			<p><?= $post->extrait; ?></p>

			<!-- <?php echo'<pre>'; var_dump($post); echo '</pre>'; ?> -->

		<?php endforeach; ?>
	</div>

	<div class="col-sm-4"> <!-- AFFICHAGE COLONNE DE DROITE -->
		<ul>
		
			<?php foreach(App::getInstance()->getTable('Category')->all() as $categorie): ?>
				<li>
					<!-- <?php echo'<pre>$categorie: '; var_dump($categorie); echo '</pre>'; ?> -->
					<a href="<?= $categorie->url; ?>"><?= $categorie->titre; ?></a>
				</li>

			<?php endforeach; ?>
		</ul>
	</div><!-- / FIN AFFICHAGE COLONNE DE DROITE -->
</div>




