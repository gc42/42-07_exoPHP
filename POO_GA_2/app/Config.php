<?php

namespace App;

class Config
{
	private $settings = [];	// INITIALISE UN ARRAY VIDE
	private static $_instance;




	// MISE EN PLACE DU 'SIGLETON', pour que class Config ne soit instancié qu'une fois
	public static function getInstance()
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new Config();
		}
		return self::$_instance;
	}



	// RECUP DE LA 'CONFIG' DANS '$this->settings'
	public function __construct()
	{
		$this->settings = require dirname(__DIR__) . '/config/config.php';  // CHARGE LE FICHIER CONFIG DANS LE ARRAY
	}


	// RECUP D'UNE DES ENTREES DES SETTINGS
	public function get($key)
	{
		if (!isset($this->settings[$key]))  // Si la key n'existe pas, retourner 'null'
		{
			return null;
		}
		return $this->settings[$key];
	}





	





}
