<?php
require('controller/frontend.php');

try { // Debut des essais
    if (isset($_GET['action']))
    {
        if ($_GET['action'] ==       "resetPseudo")
        {
            resetPseudo();
        }
        elseif ($_GET['action'] ==   "resetAll")
        {
            resetAll();
        }
        elseif ($_GET['action'] ==   "refresh")
        {
            listPosts();
        }
    }
    elseif (isset($_POST['action']))
    {
        if  ($_POST['action'] == "Valider")
        {
            if (!empty($_POST['pseudo']) && !empty($_POST['message']))
            {
                OnValidate();
            }
            else {
                // Une erreur est detectee
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        else {
            // Autre erreur
            throw new Exception('Le bouton Valider n\'a pas ete utilise');
        }
    }
    else
    {
        listPosts();
    }
}
catch(Exception $e) { // Si il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}