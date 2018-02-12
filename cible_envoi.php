<?php
// Testons si le fichier a bien ete envoye et pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
		// Testons si le fichier n'est pas trop gros
		if ($_FILES['monfichier']['size'] <= 1000000)
		{
				// Testons si l'extension est autorisee
				$infosfichier = pathinfo($_FILES['monfichier']['name']); // pathinfo renvoie un array
				$extension_upload = $infosfichier['extension'];
				$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
				if (in_array($extension_upload, $extensions_autorisees))
				{
						// On peut valider le fichier et le stocker définitivement
						move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
						echo "L'envoi a bien été effectué !";
				}
		}
}

?>