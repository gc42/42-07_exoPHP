<?php
namespace Core\Auth;
use Core\Database\Database;

class DBAuth
{
	private $db;



	public function __construct(Database $db)
	{
		$this->db = $db;
	}



	public function getUserId()
	{
		if ($this->logged())
		{
			return $_SESSION['Auth']; // user's Id
		}
		return false;
	}


	/**
	 * @param $username
	 * @param $password
	 * @return boolean true if valid user, else false
	 */
	public function login($username, $password)
	{
		$user = $this->db->prepare('
			SELECT * FROM users
			WHERE username = ?',
			[$username], null, true
		); // Cherche le username dans la table des users.



		// Si on trouve un utilisateur, on verifie son mot de passe
		if ($user)
		{
			if ($user->password === sha1($password))
			{
				$_SESSION['Auth'] = $user->id;
				return true;
			}
		}
		return false;
	}

	public function logged()
	{
		return isset($_SESSION['auth']); // Return 'true' if user is identified
	}
}