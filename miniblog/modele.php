<?php
function getBillets()
{
    try
    {
        // Etablir la connexion
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'toto',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        // En cas d'erreur, afficher un message et tout arreter
        die('Erreur : ' . $e->getMessage());
    }
    
    
    // 2 : Recuperer les 5 dernieres news
    $req = $db->query('SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%b/%Y à %Hh%i et %s\'\'")  AS date FROM blog_billets ORDER BY date_creation DESC LIMIT 0, 5');
    
    return $req;
}
?>