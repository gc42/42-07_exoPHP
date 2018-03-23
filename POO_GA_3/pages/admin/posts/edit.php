<?php
	$postTable = App::getInstance()->getTable('Post');

	if (!empty($_POST))
	{
		$result = $postTable->update($_GET['id'], [
			'titre' => $_POST['titre'],
			'contenu' => $_POST['contenu'],
			'category_id' => $_POST['category_id']
		]);


		printGC($result);
		// die();
		if ($result)
		{
			?>
			<div class="alert alert-success">L'artice a bien été modifié</div>
			<?php
		}
	}






	$post = $postTable->find($_GET['id']); // Recup article selectionne par 'id'
	$form = new \Core\HTML\BootstrapForm($post); // Instance des formulaires
	
	$categories = App::getInstance()->getTable('Category')->extractList('id', 'titre');
	?>

<form action="#" method="post">
	<div class="form-control">
		<?= $form->input('titre', 'Titre de l\'article'); ?>
		<?= $form->input('contenu', 'Contenu', ['type' => 'textarea']); ?>
		<?= $form->select('category_id', 'Categorie', $categories); ?>
	</div>
		<?= $form->submit('Sauvegarder'); ?>
</form>

<?= '<br>$post: <br>'; ?>
<?= print_r($post); ?>
