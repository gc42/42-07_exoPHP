<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Codes secrets pour détruire la civilisation</title>
	</head>
	<body>
		<?php
		// Vérification du mot de passe et protection contre les codes malveillants
		if (isset($_POST['mot_de_passe']) AND htmlspecialchars($_POST['mot_de_passe']) == "kangourou")
		{
		// Si tout est OK, affichage des codes secrets
		?>
			<p>Les codes secrets de destruction de notre civilisation sont les suivants :<br /></p>

			<p>
				<ul>
					<li>Rouler à l'essence;</li>
					<li>Chauffer au charbon;</li>
					<li>Manger de l'industriel</li>
					<li>Entasser nos déchets</li>
					<li>Raser nos forets primaires</li>
					<li>Elir des Trump</li>
					<li>Produire à l'excès</li>
					<li>Et tout un tas d'autres actions que nous menons sans même y réfléchir</li>
					<li>...</li>

				</ul>
			</p>

			<p><strong>ATTENTION</strong> A MANIPULER AVEC DISCRETION<br />
			NE PAS METRE ENTRE TOUTES LES MAINS ;-)</p>
		
		<?php
		}
		else
		{ ?>
			<p>Vous n'avez pas le bon mot de passe !<br />
			C'est une chance pour la planète ;-)</p>

		<?php
		}
		?>

	</body>
</html>
