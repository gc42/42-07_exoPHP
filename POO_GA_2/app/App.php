<?php
namespace App;
class App
{
	public $title = "Mon site GA";
	private static $_instance;
	private $db_instance;
	
		
	// MISE EN PLACE DU 'SIGLETON', pour que la class App ne soit instanciée qu'une fois
	public static function getInstance()
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new App();
		}
		return self::$_instance;
	}




	// TROUVE LE NOM DE LA TABLE A PARTIR DU NOM PASSE EN PARAMETRE
	public function getTable($name)
	{
		$class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
		return new $class_name();
	}



	// GESTION DE LA BDD
	public function getDB()
	{
		$config = Config::getInstance();
		if (is_null($this->db_instance))
		{
			$this->db_instance = new Database($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
		}
		return $this->db_instance;
	}












// ANCIEN CODE... N'EST PLUS UTILISE
/*
	public static function getDb()
	{
		if (self::$database === null)
		{
			self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
		}
		return self::$database;
	}



	public static function notFound()
	{
		header("HTTP/1.0 404 Not Found");
		header('Location:index.php?p=404');
	}



	public static function getTitle()
	{
		return self::$title;
	}

	public static function setTitle($title)
	{
		self::$title = $title . '|' . self::$title;
	}
*/
}