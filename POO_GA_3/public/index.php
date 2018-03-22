<?php
define('ROOT', dirname(__DIR__));

require ROOT .'/app/App.php';
App::load();




if (isset($_GET['p']))
{
	$p = $_GET['p'];
} else {
	$p = 'home';
}

ob_start();
	switch ($p) :
		case 'home' :
			require ROOT . '/pages/posts/home.php'; break;

		case 'posts.show' :
			require ROOT . '/pages/posts/show.php'; break;
			
		case 'posts.category' :
			require ROOT . '/pages/posts/category.php'; break;
			
		case '404' :
			require ROOT . '/pages/404.php'; break;
			
		case 'login' :
			require ROOT . '/pages/users/login.php'; break;
			
		default :
			require ROOT . '/pages/posts/home.php';
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


