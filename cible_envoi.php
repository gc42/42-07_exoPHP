<pre>
<?php print_r($_FILES['icone']); ?>
</pre>
<?php
// ########################  //
// Upload de l'icone
$maxsize = 106*1024; // Taille maximum de l'icone a Uploader en octets

// Testons si le fichier a bien ete envoye et sans erreurs
if (isset($_FILES['icone']) AND $_FILES['icone']['error'] == 0)
{
	// Test fichier pas trop gros
	if ($_FILES['icone']['size'] <= $maxsize)
	{
		//Recup de l'extension du fichier
		$infos_fichier = pathinfo($_FILES['icone']['name']);
			echo "<pre>Retour de pathinfo dans infos_fichiers:</br>"; print_r($infos_fichier); echo "</pre>";
		$extension_fichier = strtolower($infos_fichier['extension']);
			echo "Extension: <strong>" . $extension_fichier . "</strong>";

		// Test si l'extension est parmi les extensions valides
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
		if (in_array($extension_fichier, $extensions_autorisees))
		{
			// On peut valider le fichier et le stocker definitivement
			echo " est une extension autorisee<br/>";
			move_uploaded_file($_FILES['icone']['tmp_name'], 'Downloads_php/' . basename($_FILES['icone']['name']));
			echo "L'envoi de \"" .  $_FILES['icone']['name'] . "\" a bien ete effectue";
		} else echo "pas une extension autorisee.";
	}
} else
{
	echo "L'icone n'est pas conforme et n'a pas pu etre upload. Verifiez l'extension, la taille et le poids.";
}
?>
<pre>
<?php print_r($_FILES['mon_fichier']); ?>
</pre>
<?php
// ########################  //
// Upload de l'image
$maxsize = 1024*1024; // Taille maximum de l'image a Uploader en octets

// Testons si le fichier a bien ete envoye et sans erreurs
if (isset($_FILES['mon_fichier']) AND $_FILES['mon_fichier']['error'] == 0)
{
	// Test fichier pas trop gros
	if ($_FILES['mon_fichier']['size'] <= $maxsize)
	{
		//Recup de l'extension du fichier
		$infos_fichier = pathinfo($_FILES['mon_fichier']['name']);
			echo "<pre>Retour de pathinfo dans infos_fichiers:</br>"; print_r($infos_fichier); echo "</pre>";
		$extension_fichier = strtolower($infos_fichier['extension']);
			echo "Extension: <strong>" . $extension_fichier . "</strong>";

		// Test si l'extension est parmi les extensions valides
		$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
		if (in_array($extension_fichier, $extensions_autorisees))
		{
			// On peut valider le fichier et le stocker definitivement
			echo " est une extension autorisee<br/>";
			move_uploaded_file($_FILES['mon_fichier']['tmp_name'], 'Downloads_php/' . basename($_FILES['mon_fichier']['name']));
			echo "L'envoi de \"" .  $_FILES['mon_fichier']['name'] . "\" a bien ete effectue";
		} else echo "pas une extension autorisee.";
	}
} else
{
	echo "L'image' n'est pas conforme et n'a pas pu etre upload. Verifiez l'extension, la taille et le poids.";
}
?>
