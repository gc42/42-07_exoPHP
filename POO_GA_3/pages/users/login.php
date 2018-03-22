<?php
if (!empty($_POST))
{
	$auth = new \Core\Auth\DBAuth(App::getInstance()->getDB());
	if ($auth->login($_POST['username'], $_POST['password']))
	{
		// die ('You are connected'); // Juste pour tester si ca marche
		header('Location: admin.php');
	} else {
		// die ('Not connected'); // Juste pour tester si ca marche
?>
		<div class="alert alert-danger">
			Identifiants incorrects
		</div>
<?php
	}
}

$form = new \Core\HTML\BootstrapForm($_POST);
?>

<form action="#" method="post">
<div class="form-row">
	<?= $form->input('username', 'Pseudo'); ?>
	<?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
</div>
	<?= $form->submit(); ?>
</form>

<?= print_r($_POST); ?>