<?php
// if (preg_match("#MON REGEX#", "Phrase dans laquelle est faite la recherche"))
// {
// 	echo "VRAI";
// } else
// {
// 	echo "FAUX";
// }
?>








<?php
/*. EXEMPLES DE RECHERCHES

#guitare|piano#		// l'un OU l'autre
#^toto#				// ^ pour debut de chaine
#toto$#				// $ pour fin de chaine

Classe de caracteres
#gr[ioa]s#			// [ioa] definit une 'classe de caracteres': l'une ou l'autre de ces lettres
#[aeiouy]$#			// Se termine par une voyelle
#[A-Z0-9]#			// Definit un 'intervale de classe': un caractere entre A et Z
#[^0-9]#			// Dans une classe, signifie: 'exclusion' ou tout sauf...

Repetitions
?	// 0 ou 1 fois
+	// 1 ou plusieurs
*	// 0, 1 ou plusieurs
#Ay(ay|oy)*#		// 'ay' OU 'oy' repete 0, 1 ou plusieurs fois
#[0-9]+#			// un nombre de n'importe quelle longueur
#^Yaho+$#			// Commencer et finir par 'Yaho' 'Yahoo' 'Yahooooooo' etc.

Quantificateurs
#a{3}#				// repete 'a' 3 fois
#a{3,5}#			//            entre 3 et 5 fois
#a{3,}#				//                       l'infini
{0,1} idem que ?
{1,}  idem que +
{0,}  idem que *

Metacaracteres
# ! ^ $ ( ) [ ] { } ? + * . \ |
#Quoi \?#			// recherche 'Quoi ?' en echappant le metacaractere '?'
#[a-z?+*{}]#		// dans une classe, pas besoin d'echapper
					// sauf # (fin de REGEX),  toujours echapper
					// sauf ] (fin de classe), toujours echapper
[a-z0-9-]			// sauf - (intervale),     mettre au debut ou a la fin des caracteres de la classe

Raccourcis (classes abregees)
\d // Chiffre, idem que [0-9]
\D // pas un chiffre, idem que [^0-9]
\w // Caractere alphanum et underscore, idem que [a-zA-Z0-9_]
\W // pas un mot, idem que [^a-zA-Z0-9_]
\t // tabulation
\n // nouvelle ligne
\r // retour chariot
\s // espace blanc
\S // pas un espace blanc (pas \t \n \r)
.  // tout caractere sauf 'entree' (\n)
#[0-9].#s // l'option 's' de PCRE pour que le point '.' signifie tout y compris 'entree'

POSIX
Pas de delimiteurs
Pas d'options
Pas de classes abregees, sauf le '.' pour tout caractere

Capture et Remplacement
Fonction 'preg_replace('recherche', 'remplace', $texte) au lieu de 'preg_match'
() definit une variable qui contient ce qu'elle entoure
#\[b\](.+)\[/b\]#isU	// cherche '[b]' suivi de 1 ou plusieurs caracteres, suivi de '[/b]', sans distinguer min/maj
Exemple:
$texte = preg_replace('#\[b\](.+)\[/b\]#isU', '<strong>$1</strong>', $texte);
$texte = preg_replace('#\[i\](.+)\[/i\]#isU', '<em>$1</em>', $texte);
$0 toujours cree
$1 a $n en comptant les parentheses ouvrantes.


*/
?>

