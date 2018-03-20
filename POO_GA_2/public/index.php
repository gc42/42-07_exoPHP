<?php
require '../app/Autoloader.php';
App\Autoloader::register();

// AMELIORATION DE print_r()
function printGC($mixed = null)
{
	echo '<pre>';
	// print_r($mixed);
	var_dump($mixed);
	echo '</pre>';
	return null;
}

$app = App\App::getInstance();
printGC($app->getTable('Users'));
printGC($app->getTable('Posts'));
printGC($app->getTable('categories'));


/*
$config = App\Config::getInstance();
printGC($config);
$config = App\Config::getInstance()->get('db_user');
printGC($config);
$config = App\Config::getInstance()->get('db_pass');
printGC($config);

$app = App\App::getInstance();
$app->title = "Super titre";
echo $app->title;
*/




  









// require '../pages/templates/defaultTemplate.php';

// ANCIEN CODE N'EST PLUS UTILISE
/*
	if (isset($_GET['p']))
	{
		$p = $_GET['p'];
	} else {
		$p = 'home';
	}  

	// TESTER LE CONTENU DE $p
	ob_start();

		switch ($p) :
			case 'home' :
				require '../pages/home.php'; break;

			case 'article' :
				require '../pages/single.php'; break;
				
			case 'categorie' :
				require '../pages/categorie.php'; break;
				
			case '404' :
				require '../pages/404.php'; break;
				
			default :
				require '../pages/home.php';
			
			
		endswitch;

	$content = ob_get_clean();


	require '../pages/templates/defaultTemplate.php';
*/

