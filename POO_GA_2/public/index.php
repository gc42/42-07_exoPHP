<?php
require '../app/Autoloader.php';

App\Autoloader::register();

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

