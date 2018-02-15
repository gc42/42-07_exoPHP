<?php
/*	 // Afficher tous les cookies

	 if (isset($_COOKIE)) {
	 	echo "<pre>"; print_r($_COOKIE);echo "</pre>"; 
	 } else
	 	echo "pas de cookie defini";
	 ?>

	 <?php
*/	 // Suppression des cookies
	 // setcookie('pseudo', "", time() - 3600);
	 setcookie('pseudo');
	 setcookie('pays');
	 ?>

	 <?php
	 if (isset($_COOKIE['pseudo'])) {
	 	// Afficher tous les cookies
	 	echo "cookie 'pseudo' trouvé<br />";
	 	echo "<pre>"; print_r($_COOKIE); echo "</pre>"; 
	 } else
	 	echo "plus de cookie";
	 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<meta charset="utf-8">
	 	<title>Supp cookies</title>
	 </head>
	 <body>
	 	<br />
	 	<a href="cookies.php">Retour sur la page cookies.php</a>
	 
	 </body>
 </html>