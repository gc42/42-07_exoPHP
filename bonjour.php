<?php

print_r($_GET);

?>
<?php
if (isset($_GET['prenom'], $_GET['nom'], $_GET['repeter'])) // si les variables existent et different de NULL
{
	// 1 : On force la conversion vers un entier
	$_GET['repeter'] = (int) $_GET['repeter'];

	// 2 : Le nombre est compris entre 1 et 100
	if ($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 100)
	{
		echo '</br>';
		for ($i = 0; $i < $_GET['repeter'] ; $i++)
		{
			echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !</br>';
		}
	} else
	{
		echo '</br>Renseignez un nombre de validations entre 1 et 100';
	}
} else
{
	echo '</br>Il vous faut renseigner votre nom et prenom, ainsi que le nombre de repetitions ...';
}


