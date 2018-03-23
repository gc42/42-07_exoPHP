<?php
//
// ############  TEST DES VARIABLES D'AUTHENTIFICATION ###########
//
/*
use Core\Auth\DBAuth;

echo sha1(toto) . '<br>';


// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDB());
// if (!$auth->logged())
if (!$auth->logged()) // ATTENTION, INVERSION DE COMPORTEMENT
{
	echo 'je suis loggé';
}

echo '<pre>'; 
echo '<br>$auth->logged() return :<br>'; print_r($auth);
echo '<br>$auth->logged() return :<br>'; var_dump($auth->logged()); echo '<br>;';
echo '<br>$_SESSION return :<br>'; var_dump($_SESSION);
echo '<br>$_SESSION return :<br>'; print_r($_SESSION);

echo '<br>login return :<br>'; var_dump($auth->login(toto, toto));

echo '<br>isset($_SESSION[\'Auth\']) return :<br>'; var_dump(isset($_SESSION['Auth']));


echo '</pre>';
*/
//
// //// FIN ############  TEST DES VARIABLES D'AUTHENTIFICATION ###########
//
?>

<?php
echo 'prout';
$posts = App::getInstance()->getTable('Post')->all();
echo 'prout';
?>


<h1>Administrer les articles</h1>

<table class="table">
	<thead>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($posts as $post): ?>
			<tr>
				<td><?= $post->id; ?></td>
				<td><?= $post->titre; ?></td>
				<td>
					<a class="btn btn-primary" href="?p=posts.edit&id=<?= $post->id; ?>">Editer</a></td>
				</td>



			</tr>

		<?php endforeach; ?>
	</tbody>

</table>