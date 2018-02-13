<?php
// Ouvrir tout de suite la session
session_start();
?>
	<!-- Les valeurs sont encore dans la superglobale -->
	<p>Preuve: <pre><?php print_r($_SESSION);?></pre><br />
	</p>

<?php
// Destruction des variables de session
session_unset();

// Finalement, on detruit la session
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Deconnexion</title>
</head>
<body>
	<p>Votre session est terminee. Merci de votre visite.
	</p>
	<p>Preuve: <?php echo $_SESSION['prenom'];?><br />
	</p>
	<p>Preuve: <pre><?php print_r($_SESSION);?></pre><br />
	</p>

</body>
</html>
