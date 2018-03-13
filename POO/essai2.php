<?php
// Pour charger la classe a la vollee
function chargerClasse($classe)
{
  require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}

spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

$perso1 = new Personnage([
    'nom' => 'Victor',
    'forcePerso' => 5,
    'degats' => 0,
    'niveau' => 1,
    'experience' => 0
  ]);

  $perso2 = new Personnage([
    'nom' => 'Totor',
    'forcePerso' => 6,
    'degats' => 0,
    'niveau' => 2,
    'experience' => 0
  ]);

  $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'toto');
  $manager = new PersonnagesManager($db);

  $manager->add($perso1);
  $manager->add($perso2);

  echo '<pre>';
  echo 'forcePerso  p1/p2: ', $perso1->forcePerso(), '/', $perso2->forcePerso(), '<br />';  
  echo 'expe        p1/p2: ', $perso1->experience(), '/', $perso2->experience(), '<br />';  
  echo 'degats      p1/p2: ', $perso1->degats(),     '/', $perso2->degats(),     '<br /><br />';  
  echo '</pre>';