<?php
use Core\Auth\DBAuth;



define('ROOT', dirname(__DIR__));

require ROOT .'/app/App.php';
App::load();




if (isset($_GET['p']))
{
	$p = $_GET['p'];
} else {
	$p = 'home';
}



// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDB());
if (!$auth->logged())
{
	$app->forbidden();
}





ob_start();
	switch ($p) :
		case 'home' :
			require ROOT . '/pages/admin/posts/index.php'; break;

		case 'posts.show' :
			require ROOT . '/pages/admin/posts/show.php'; break;
			
		case 'posts.category' :
			require ROOT . '/pages/admin/posts/category.php'; break;

		case 'posts.edit' :
			require ROOT . '/pages/admin/posts/edit.php'; break;

			





		case '404' :
			require ROOT . '/pages/404.php'; break;
			
		default :
			require ROOT . '/pages/admin/posts/index.php';
	endswitch;

$content = ob_get_clean();


require ROOT . '/pages/templates/defaultTemplate.php';








// AMELIORATION DE print_r()
function printGC($mixed = null)
{
	echo '<pre>';
	// print_r($mixed);
	var_dump($mixed);
	echo '</pre>';
	return null;
}


