<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mon formulaire</title>
	</head>

	<body>
		<p>Cette page ne contient que du HTML</p>

		<form method="post" action="cible.php" enctype="multipart/form-data">
		<!-- <p>
			<h2>Formulaire pour envoi de fichier</h2></br>
			<input type="text" name="prenom"/></br></br>
			<textarea name="message" rows="8" cols="45">
				Votre message par defaut ici.
			</textarea><br>

			<select name="choix">
				<option value="choix1">Choisissez une option</option>
				<option value="choix1">Choix1</option>
				<option value="choix2">Choix2</option>
				<option value="choix3">Choix3</option>
				<option value="choix4">Choix4</option>

			</select><br>

			<input type="checkbox" name="case" id="case1" value="c1"/>	        <label for="case1">Ma case a cocher1<br></label>
			<input type="checkbox" name="case" id="case2" value="c2"/>          <label for="case2">Ma case a cocher2<br></label>
			<input type="checkbox" name="case" id="case3" value="c3" checked /> <label for="case3">Ma case a cocher3<br></label>
			Avec des frites ?</br>
			<input type="radio" name="frites" value="oui" id="oui" checked /> <label for="oui">Oui</label>
			<input type="radio" name="frites" value="non" id="non" checked /> <label for="non">Non<br/></label>

			<input type="hidden" name="pseudo" value="toto" />
			</br>
		</p> -->
		<p>
			<input type="file" name="monfichier" /><br />






			</br>
			<input type="submit" name="Valider" value="Valider les infos"/>
			<input type="reset"  name="Annuler" value="Annuler"/>
		</p>

		</form>

	</body>
</html>
