<?php
// 1 : Connect to DB
$host    = 'localhost';	// Data base host address
$bddname = 'test';		// Data base name
$user    = 'root';		// Data base user name
$pass    = 'toto';		// Data base pass word

try
{
	// Get connexion
	$bdd = new PDO('mysql:host='.$host.';dbname='.$bddname.';charset=utf8', $user, $pass,
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	// If an error occures, display an error message and stop everything
	die('Erreur de connexion a la BDD (verifier user/pwd): ' . $e->getMessage());
}