<?php
/*
$prenom = array ('François', 'Ambre','Maxence','Florence');
$prenom[] = 'Guillaume';
echo '<pre>';
print_r ($prenom);
echo '</pre>';
echo $prenom[2];

for ($i = 0; $i < 5; $i++)
{
	echo $prenom[$i] . '</br>';
}
**/
/*
$coordonnees = array (
	'prenom'  => 'Guillaume',
	'nom'     => 'CARON',
	'adresse' => '57 rue Damrémont',
	'ville'   => 'PARIS');
echo '<pre>';
print_r ($coordonnees);
echo '</pre>';

if (array_key_exists('nomme', $coordonnees))
{
	echo 'La clé "nom" existe dans les coordonnees';
} else
	echo 'pas trouvé';

if (in_array('Guillaumy', $coordonnees))
{
	echo 'La valeur "Guillaume" existe dans coordonnees';
} else
	echo 'pas trouvé le prénom';

$key = array_search('Guillaume', $coordonnees);
	echo 'La clé associée à "Guillaume" est ' . $key;
*/
function VaTeFaireVoir($nom)
{
	echo 'Va te faire voir chez ' . $nom . '</br>';
}

VaTeFaireVoir('Margueritte');
VaTeFaireVoir('les Zoulous');
VaTeFaireVoir('Paulinette');


?>
