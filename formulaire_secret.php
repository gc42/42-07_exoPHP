<!DOCTYPE html>
<html>
<head lang="en">
	<title>NASA private acces</title>
	<meta charset="utf-8">
</head>
<body >
	<h1 style="text-align: center;">Page d'acces au site securise de la NASA</h1>

	<form action="secret.php" method="post" style="padding-left: 25%;">
		<label>Veuillez saisir votre login (max. 20):</label><br />
		<input type="text" name="login" size="20" autocomplete="off" autofocus required /><br /><br />

		<label for="userPassword">Veuillez saisir votre mot de passe a l'abri des regards (entre 4 et 8 chiffres):</label><br />
		<input type="password" name="password" id="userPassword" minlength="4" maxlength="8" size="8" required /><br /><br />

		<input type="submit" name="Valider" value="Valider">
		<input type="reset"  name="Reinitialiser" value="Reinitialiser">

	</form>

</body>
</html>