<?php

namespace Core;

class Config
{
	private $settings = [];	// INITIALISE UN ARRAY VIDE
	private static $_instance;




	// MISE EN PLACE DU 'SIGLETON', pour que class Config ne soit instancié qu'une fois
	public static function getInstance($file)
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new Config($file);
		}
		return self::$_instance;
	}



	// RECUP DE LA 'CONFIG' puis stockage dans '$this->settings'
	public function __construct($file)
	{
		$this->settings = require($file);  // CHARGE LE FICHIER CONFIG DANS LE ARRAY VIDE '$settings'
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
