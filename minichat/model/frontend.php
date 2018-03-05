<?php
function dbConnect()
{
	$host    = 'localhost';	// Data base host address
	$bddname = 'test';		// Data base name
	$user    = 'root';		// Data base user name
	$pass    = 'root';		// Data base pass word ('root' à la maison; 'toto' à 42)
	
	try
	{
		$db = new PDO('mysql:host='.$host.';dbname='.$bddname.';charset=utf8', $user, $pass,
		array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		// If an error occures, display an error message and stop everything
		die('Erreur de connexion a la BDD (verifier user/pwd): ' . $e->getMessage());
	}
	return $db;
}




function getPosts()
{
	// 1 : Connexion at DB
	$db = dbConnect();
	

	// 2 : Request the 10 last posts 
	$req = $db->query('SELECT pseudo, message, DATE_FORMAT(creation_date, "%d/%m/%Y &agrave; %Hh%i") AS date FROM minichat ORDER BY id DESC LIMIT 0, 10');
	// $request->closeCursor();
	
    return $req;
}

// Init the cookie `c_pseudo`
function createCookie()
{
	$timestamp_expire = strtotime('+1 day');	// Cookie expire in x days
	setcookie('c_pseudo',  'nobody', $timestamp_expire, null, null, false, true);
	$_COOKIE['c_pseudo'] = 'nobody';
}

// Set pseudo in the cookie
function setCookieValue()
{
	$timestamp_expire = strtotime('+1 day');	// Cookie expire in x days
	setcookie('c_pseudo',  htmlspecialchars($_POST['pseudo']), $timestamp_expire, null, null, false, true);
	$_COOKIE['c_pseudo'] = htmlspecialchars($_POST['pseudo']);
}

// Suppress COOKIE
function resetCookie()
{
	setcookie('c_pseudo');
	// $_COOKIE['c_pseudo'] = NULL;
	header('Location: .');
}


function resetData($nbr_keep_messages)
{
	// 1 : Connect at DB
	$db = dbConnect();
	
	// The DELETE request
	$req = $db->prepare('DELETE FROM minichat WHERE id > :nb');
	$req->execute(array('nb' => $nbr_keep_messages));
	// $request->closeCursor();
	header('Location: .');
}



function addNewPosts($pseudo, $message)
{
	// 1 : Connect at DB
	$db = dbConnect();

	// 2 : Request to INSERT the new data in the table
	$req = $db->prepare('INSERT INTO minichat (pseudo, message) VALUES(:new_pseudo, :new_message)');
	$req->execute(array(
		'new_pseudo'  => $pseudo,
		'new_message' => $message,
	));

	// ALTERNATIVE : an other kind of writing, using "bindValue"
	// $request->bindValue('pseudo', $_POST['pseudo']);
	// $request->bindValue('message', $_POST['message']);
	// $request->execute();

	// $request->closeCursor();
}
