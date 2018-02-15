<?php
try
{
	// Connexion a la bese de donnees
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto');
}
catch (Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrete tout
	die('Erreur : ' . $e->getMessage());
}

// Si tout va bien, on continue

// On recupere le contenu de la table 'jeux_video'
// $reponse = $bdd->query('SELECT * FROM jeux_video');
$reponse = $bdd->query('SELECT nom FROM jeux_video ORDER BY nom');

// On affiche les reponses une a une
while ($donnees = $reponse->fetch())
{
?>
	<!-- <p>
		<strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
    Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
    Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
    <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <br /><em><?php echo $donnees['commentaires']; ?></em>
	</p> -->

	<?PHP echo $donnees['nom'] . '<br />'; ?>


<?php
}
$reponse->closeCursor(); 
?>
