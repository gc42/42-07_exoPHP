<?php
setcookie('pseudo', 'Guillaume', time() + 3600, null, null, false, true);
$_COOKIE['pseudo'] = 'Guillaume2';
setcookie('pays',   'Chine',     time() + 3600, null, null, false, true);
$_COOKIE['pays'] = 'Chine2';
setcookie('pays',   'Nederland', strtotime('+1 hour'), null, null, false, true);
$_COOKIE['pays'] = 'Nederland2';
/*
// setcookie(1, 2, 3, 4, 5, 6, 7)
// Signification des parametres de setcookie, valeurs par defaut:
1	string 	$name
2	string 	$value
3	int		$expire //peut s'exprimer strtotime('+1 day');
4	string 	$path  //comme /my-sous-dossier/
5	string 	$domain
6	bool 	$secure = false
7	bool 	$httponly = false

Apres setcookie, on peut utiliser $_COOKIE ou $_REQUEST
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ma page cookies</title>
</head>
<body>
	<p>Contenu de ma page</p>
	<p>Tu es <?php echo htmlspecialchars($_COOKIE['pseudo']);?>
	 et tu viens de <?php echo htmlspecialchars($_COOKIE['pays']);?></p>

	 <?php
	 // Afficher tous les cookies
	 echo "<pre>"; print_r($_COOKIE); echo "</pre>";
	 ?>

	 <a href="cookies_suppression.php">Page de suppression des cookies</a>
	 
	 

</body>
</html>