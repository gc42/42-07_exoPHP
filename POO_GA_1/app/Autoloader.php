<?php
namespace App;
/**
 * Class Autoloader
 * @package App
 */
class Autoloader
{
	/**
	 * Enregistre l'Autoloader
	 */
	static function register()
	{
		\spl_autoload_register(array(__CLASS__, 'autoload'));
	}


	/**
	 * Inclut le fichier correspondant a la classe
	 * @param $class string Le nom de la classe a charger
	 */
	static function autoload($class)
	{
		if (strpos($class, __NAMESPACE__ . '\\') === 0) // Si NAMESPACE en debut de string
		{
			$class = str_replace(__NAMESPACE__ . '\\', '', $class); // Supprime le namespace
			$class = str_replace('\\', '/', $class); // Remplace anti-slash par slash
			require __DIR__ . '/' . $class . '.php'; // Va chercher le fichier de la classe dans le dossier parent
		}
	}
}