<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mon formulaire</title>
		<style type="text/css">
			label{
				font-size: small;
			}
		</style>
	</head>

	<body>
		<p>Uploader une image sur le site:</p>

		<form method="post" action="cible_envoi.php" enctype="multipart/form-data">
			<label for="icone">Icone du fichier (JPG, JPEG, PNG ou GIF, max 15 Ko) :</label><br />
			<input type="hidden" name="MAX_FILE_SIZE" value="15360" />
			<input type="file" name="icone" id="icone" /><br /><br />

			<label for="mon_fichier">Fichier (JPG, JPEG, PNG ou GIF, max 1 Mo) :</label><br />
			<input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
			<input type="file" name="mon_fichier" id="mon_fichier" /><br /><br />

			<label for="titre">Titre du fichier (max. 50 caracteres) :</label><br />
			<input type="text" name="titre" id="titre" value="Titre du fichier"><br /><br />

			<label for="description">Description de votre fichier (max. 255 caracteres) :</label><br />
			<textarea name="description" id="description"></textarea><br /><br />


			</br>
			<input type="submit" name="Valider" value="Valider les infos et uploader le fichier"/>
			<input type="reset"  name="Annuler" value="Annuler"/>
		</p>

		</form>

	</body>
</html>
