<?php
$request = $db->query('SELECT
    p_id,
    p_nom,
    p_forcePerso,
    p_degats,
    p_niveau,
    p_experience
    FROM poo_personnages');

while ($donnees = $request->fetch(PDO::FETCH_ASSOC))
{
    $perso = new Personnage($donnees);

    echo $perso->nom(), ' a ',
     $perso->forcePerso(), ' de force, ',
     $perso->degats(), ' de dégâts, ',
     $perso->experience(), ' d\'expérience et est au niveau ',
     $perso->niveau();
}
