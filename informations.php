<?php
// Ouvrir tout de suite la session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Informations</title>
</head>
<body>
	<p>Re-bonjour <?php echo $_SESSION['prenom'];?>,</p>
	<p>
		Je me rappelle de toi, tu as 
		<?php echo $_SESSION['age'];?>
		 ans et du haut de tes 
		<?php echo$_SESSION['taille'];?>
		  tu ne devrais pas devisser des lustres suspendus au plafond !!
	</p>
	Retourner a la page sesssions <a href="session.php">ici</a>.

</body>
</html>