<?php
require('controller/frontend.php');

try {       // DEBUT DES ESSAIS
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPosts')
        {
                listPosts();
        }
        elseif ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post();
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Aucun identifiant de billet envoye');
            }
        }
        elseif ($_GET['action'] == 'addComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['author']) && !empty($_POST['comment']))
                {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else
                {
                    // Error ! Stop all and return exception => jump to catch
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
    }
    else
    {
        listPosts();
    }
}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}