<?php
// Demarrage de la session
session_start();

// Quelques variables de session
$_SESSION['prenom'] = 'Jean';
$_SESSION['nom'] = 'CARON';
$_SESSION['age'] = '57';
$_SESSION['taille'] = '1.73';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sessions</title>
	</head>
	<body>
		<p> Bonjour <?php echo $_SESSION['prenom']; ?> !<br />
			Tu viens de penetrer en terre inconnue...
			Veux-tu aller sur une autre page ?
		</p>
		<p>
			<a href="mapage.php">Pour acceder a mapage</a><br />
			<a href="monscript.php">Pour aller a monscript</a><br />
			<a href="informations.php">Pour voir des informations</a><br />
			
		</p>

	</body>
</html>