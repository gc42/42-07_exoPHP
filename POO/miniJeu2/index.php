<?php
// On enregistre notre autoload.
function chargerClasse($classname)
{
	require $classname.'.php';
}

spl_autoload_register('chargerClasse');



// SESSION
session_start(); // On appelle session_start() APRÈS avoir enregistré l'autoload.

if (isset($_GET['deconnexion']))
{
	session_destroy();
	header('Location: .');
	exit();
}



// CONNEXION DB
$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'toto');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On émet une alerte à chaque fois qu'une requête a échoué.

$manager = new PersonnagesManager($db);

if (isset($_SESSION['perso'])) // Si la session perso existe, on restaure l'objet.
{
	$perso = $_SESSION['perso'];
}




// Si on a voulu créer un personnage.
if (isset($_POST['creer']) && isset($_POST['nom'])) 
{
	switch ($_POST['type'])
	{
		case 'magicien':
			$perso = new Magicien(['nom' => $_POST['nom']]);
			break;
		
		case 'guerrier':
			$perso = new Guerrier(['nom' => $_POST['nom']]);
			break;

		default :
			$message = 'Le type du personnage est invalide.';
			break;
	}
	// Si le type de personnage est valide, le personnage a ete cree
	// Verifications
	if (isset($perso))
	{
		// Si le nom n'est pas valide, on supprime le personnage
		if (!$perso->nomValide())
		{
			$message = 'Le nom choisi est invalide.';
			unset($perso); // Destruction du personnage
		}

		// Si le nom est deja pris, on supprime le personnage
		elseif ($manager->exists($perso->getNom()))
		{
			$message = 'Le nom du personnage est déjà pris.';
			unset($perso); // Destruction du personnage
		}

		else
		{
			// Si OK, on ajoute le personnage dans la DB
			$manager->add($perso);
		}
	}
}





// Si on a voulu utiliser un personnage.
elseif (isset($_POST['utiliser']) && isset($_POST['nom'])) 
{
	if ($manager->exists($_POST['nom'])) // Si celui-ci existe.
	{
		$perso = $manager->get($_POST['nom']);
	}
	else
	{
		$message = 'Ce personnage n\'existe pas !'; // S'il n'existe pas, on affichera ce message.
	}
}





// Si on a cliqué sur un personnage pour le frapper.
elseif (isset($_GET['frapper'])) 
{
	if (!isset($perso))
	{
		$message = 'Merci de créer un personnage ou de vous identifier.';
	}

	else
	{
		if (!$manager->exists((int) $_GET['frapper']))
		{
			$message = 'Le personnage que vous voulez frapper n\'existe pas !';
		}
		
		else
		{
			$persoAFrapper = $manager->get((int) $_GET['frapper']);
	//################# <DEBUG>
			// echo '<pre>$persoAFrapper: '; print_r($persoAFrapper); echo '</pre>'; //################# DEBUG
			// echo '<pre>$perso: '; print_r($perso); echo '</pre>'; //################# DEBUG
	//################# </DEBUG>

			// On stocke dans $retour les éventuelles erreurs ou messages que renvoie la méthode frapper.
			$retour = $perso->frapper($persoAFrapper);


	//################# <DEBUG>			
			// echo 'retour: '; print_r($retour); //############################ DEBUG
	//################# </DEBUG>


			switch ($retour)
			{
				case Personnage::CEST_MOI :
					$message = 'Mais... pourquoi voulez-vous vous frapper ???';
					break;
				
				case Personnage::PERSONNAGE_FRAPPE :
					$message = 'Le personnage a bien été frappé !';
					
					$manager->update($perso);
					$manager->update($persoAFrapper);
					
					break;
				
				case Personnage::PERSONNAGE_TUE :
					$message = 'Vous avez tué le personnage '.$persoAFrapper->getNom().' !!';
					
					$manager->update($perso);
					$manager->delete($persoAFrapper);
									
					break;

				case Personnage::PERSO_ENDORMI :
					$message = 'Vous etes endormi, vous ne pouvez pas frapper de personnage !';
					break;
			}
		}
	}
}



// Si on a cliqué sur 'Lancer un sort' pour ensorceler un personnage'.
elseif (isset($_GET['ensorceler']))
{

	if (!isset($perso))
	{
		$message = 'Merci de creer un personnage ou de vous identifier.';
	}

	else
	{
		// Verifier que le personnage est un magicien
		if ($perso->getType() != 'magicien')
		{
			$message = 'Seuls les magiciens peuvent ensorceler les personnages !';
		}

		else
		{
			if (!$manager->exists((int) $_GET['ensorceler']))
			{
				$message = 'Le personnage que vous voulez frapper n\'existe pas !';
			}
			else
			{
				$persoAEnsorceler = $manager->get((int) $_GET['ensorceler']);
				$retour = $perso->lancerUnSort($persoAEnsorceler);
	//################# <DEBUG>
			// echo '<pre>$persoAEnsorceler: '; print_r($persoAEnsorceler); echo '</pre>'; //################# DEBUG
			// echo '<pre>$perso: ';            print_r($perso);            echo '</pre>'; //################# DEBUG
			// echo 'retour: ';                 print_r($retour);                          //############################ DEBUG
	//################# </DEBUG>

				switch ($retour)
				{
					case Personnage::CEST_MOI :
						$message = 'Mais... pourquoi tu t\'ensorcelle toi meme ???';
						break;

					case Personnage::PERSONNAGE_ENSORCELE :
						$message = 'Le personnage a bien ete encorcele !';

						$manager->update($perso);
						$manager->update($persoAEnsorceler);
						break;

					case Personnage::PAS_DE_MAGIE :
						$message = 'Vous n\'avez pas assez de magie';
						break;

					case Personnage::PERSO_ENDORMI:
						$message = 'Vous etes endormi, vous ne pouvez pas lancer de sort !';
						break;
				}
			}
		}
	}
}








?>
<!DOCTYPE html>
<html>
<head>
	<title>TP : Mini jeu de combat</title>
	
	<meta charset="utf-8" />
</head>
<body>
	<p>Nombre de personnages créés : <?= $manager->count() ?>
	
<!-- ZONE PERSONNAGES EXISTANTS		 -->
<?php
	// Pour lister les personnages qui existent deja
	$retourPersos = $manager->getList('0');

	if (!empty($retourPersos))
	{
		echo ' (';
		foreach ($retourPersos as $unPerso)
		{
			echo '<i>', htmlspecialchars($unPerso->getNom()), '</i>, ';
		}
		echo ')<br /></p>';
	}
?>



<!-- ZONE MESSAGES A AFFICHER		 -->
<?php
	if (isset($message)) // On a un message à afficher ?
	{
		echo '<p>Message: ', $message, '</p>'; // Si oui, on l'affiche.
	}
	else
	{
		echo '<p><i>Pas de message...</i></p>'; // Si pas de messages en attente.
	}

	if (isset($perso)) // Si on utilise un personnage (nouveau ou pas).
	{
?>
		<p style="text-align:right"><a href="?deconnexion=1">Déconnexion</a></p>

		



<!-- ZONE MES INFORMATIONS	SOUS FORME DE TABLEAU	 -->
		<fieldset>
			<legend>Mes informations</legend>
			<table>
				<tr>
					<td>Nom :</td>
					<td><strong><?= htmlspecialchars($perso->getNom()) ?></strong></td>
				</tr>
				<tr>
					<td>Type : </td>
					<td><?= ucfirst($perso->getType()) ?></td>
				</tr>
				<tr>
					<td>Dégâts :</td>
					<td><?= $perso->getDegats() ?></td>
				</tr>
				<tr>
					<td>
				
<?php
						switch ($perso->getType())
						{
							case 'magicien':
								echo 'Magie : ';
								break;

							case 'guerrier':
								echo 'Protection : ';
								break;
						}
?>
					</td>
					<td><?= $perso->getAtout(); ?></td>
				</tr>
				<tr>
					<td>Id :</td>
					<td><?= $perso->getId() ?></td>
				</tr>
			</table>
		</fieldset>
		



<!-- ZONE QUI ATTAQUER -->
		<fieldset>
			<legend>Qui attaquer ?</legend>
			<p>
<?php
				// On récupère tous les personnages par ordre alphabétique,
				// dont le nom est différent de celui de notre personnage
				// (on va pas se frapper nous-même :p).
				$retourPersos = $manager->getList($perso->getNom());
// ##########################   DEBUG
				// echo '<pre>$manager: '; print_r($manager); echo '</pre>';
				// echo '<pre>$retourPersos: '; print_r($retourPersos); echo '</pre>';
				// echo '<pre>$perso: '; print_r($perso); echo '</pre>';
				// echo '<pre>$perso: '; print_r($perso->getNom()); echo '</pre>';
				// echo '<pre>$perso: '; print_r($perso->getNom()); echo '</pre>';
// ##########################   DEBUG
				if (empty($retourPersos))
				{
					echo 'Personne à frapper !';
				}
				else
				{
					if ($perso->estEndormi())
					{
						echo '<p style="color:red;">Vous etes endormi. Vous allez vous reveiller dans ', $perso->reveil(), '.</p>';
					}
					else
					{
?>
						<table>
<?php
						foreach ($retourPersos as $unPerso)
						{
?>
							<tr>
								<td>
									<a href="?frapper= <?= $unPerso->getId(); ?>">
									<?= htmlspecialchars($unPerso->getNom()); ?></a>
								</td>
								<td>
								<?= $unPerso->getType() ?> | id: <?= $unPerso->getId(); ?> | dégâts: <?= $unPerso->getDegats() ?> 
								</td>
								<td>

									<!-- // Ajout d'un lien pour lancer un sort si le personnage est un magicien -->
<?php							
									if ($perso->getType() == 'magicien')
									{
										echo ' <a href="?ensorceler=', $unPerso->getId(), '">Lancer un sort sur ce quidam</a>';
									}
								
?>
								</td>
								<td>
									<?= $unPerso->estEndormi() ? 'Dors encore ' : 'Reveillé'; ?>
<?php
									if($unPerso->estEndormi()) { echo $unPerso->reveil(); }
?> 
								</td>
							<tr/>
<?php
						}
?>
						</table>
<?php
					}
				}
?>
			</p>
		</fieldset>





<?php
	}
	else
	{
?>
		<form action="" method="post">
			<p>
				Nom : <input type="text" name="nom" maxlength="50" />
				<input type="submit" value="Utiliser ce personnage" name="utiliser" />
				Type :
				<select name="type">
					<option value="magicien">Magicien</option>
					<option value="guerrier">Guerrier</option>
				</select>
				<input type="submit" value="Créer ce personnage" name="creer" />
			</p>
		</form>
<?php
	}
?>

<pre>GET:  <?= print_r($_GET);  ?></pre>
<pre>POST: <?= print_r($_POST); ?></pre>
<pre>$perso: <?= print_r($perso); ?></pre>
<pre>$SESSION: <?= print_r($_SESSION); ?></pre>
<pre>$persoAFrapper: <?= print_r($persoAFrapper); ?></pre>
<pre>$persoAEnsorceler: <?= print_r($persoAEnsorceler); ?></pre>


</body>
</html>
<?php
if (isset($perso)) // Si on a créé un personnage, on le stocke dans une variable session afin d'économiser une requête SQL.
{
	$_SESSION['perso'] = $perso;
}