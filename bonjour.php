<?php
if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter'])) // Si on a le nom et le prenom et repetitions
{
	// On force la conversion vers un entier. Si autre => c'est 0
	$_GET['repeter'] = (int) $_GET['repeter'];
	
	// Le nombre doit etre compris entre 1 et 100
	if ($_GET['repeter'] >= 1 AND $_GET['repeter'] <= 100)
	{
		$i = 0;
		while ($i < $_GET['repeter'])
		{
		echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] .' !<br />';
		$i++;
		}
	}
	else {
		echo 'La valeur de repetition est invalide';
	}
}
else
{
	echo 'Il faut renseigner le nom et le prenom et le nombre de repetition!';
}
?>
