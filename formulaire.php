<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Page protégée par un mot de passe</title>
	</head>
	<body>
		<p>
		Bonjour .<br />
		Vous allez être connecté au site de la NASA.<br /><br />

		L'accès est sécurisé.<br />
		Veuillez saisir votre mot de passe à l'abri des regards :<br />
		</p>

		<form method="post" action="secret.php">
			<p>
			<!-- Un champ texte caché -->
			<input type="password" name="mot_de_passe" size="20" />
			<br /><br />
			<input type="submit" name="Valider">
			</p>
		</form>

		<p>Cette page est réservée au personel dument autorisé. Si vous souhaitez sauver notre civilisation, passez votre chemin.</p>

	</body>
</html>
