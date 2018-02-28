<p>
<?php
	if (isset($_POST['telephone']))
	{
	    $_POST['telephone'] = htmlspecialchars($_POST['telephone']); // On rend inoffensives les balises HTML que le visiteur a pu entrer

	    if (preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $_POST['telephone']))
	    {
	        echo 'Le ' . $_POST['telephone'] . ' est un numéro <strong>valide</strong> !';
	    }
	    else
	    {
	        echo 'Le ' . $_POST['telephone'] . ' n\'est pas valide, recommencez !';
	    }
	}
?>
</p>

<form method="post">
	<p>
	    <label for="telephone">Votre téléphone ?</label> <input id="telephone" name="telephone" /><br />
	    <input type="submit" value="Vérifier le numéro" />
	</p>
</form>

<?php
/*
1/ Numero de telephone type 0142554969
#^$#
#^0$#
#^0[1-68]$#
#^0[1-68][0-9]{8}$#

2/ Numero de telephone type 01 42 55 49 69 ou 01.42... ou 01-42...
donc:
0153789999
01 53 78 99 99
01-53-78-99-99
01.53.78.99.99
0153 78 99 99
0153.78 99-99 etc.
#^0[1-68]$#
#^0[1-68][-. ]?$#
#^0[1-68]([-. ]?[0-9]{2}){4}$#
*/
?>