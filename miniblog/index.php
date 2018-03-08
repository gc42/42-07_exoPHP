<?php
require('controller/frontend.php');

try {       // DEBUT DES ESSAIS
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listPosts')
        {
                listPosts();
        }
        elseif ($_GET['action'] == 'post' OR $_GET['action'] == 'edit')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                post();
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Aucun identifiant de billet envoye (rooter index.php)');
            }
        }
        elseif ($_GET['action'] == 'edit')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 AND
                isset($_GET['id_comment']) && $_GET['id_comment'] > 0)
            {
                edit($_GET['id'], $_GET['id_comment']);
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Aucun identifiant de billet envoye (rooter index.php)');
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
                    throw new Exception('Tous les champs ne sont pas remplis ! (rooter index.php)');
                }
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'updateComment')
        {
            if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0 &&
                isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['comment']))
                {
                    updateComment($_GET['id'], $_GET['id_comment'], $_POST['comment']);
                }
                else
                {
                    // Error ! Stop all and return exception => jump to catch
                    throw new Exception('Le champ Commentaire n\'est pas rempli ! (rooter index.php/updateComment)');
                }
            }
        }
        elseif ($_GET['action'] == 'deleteComment')
        {
            if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0 &&
            isset($_GET['id']) && $_GET['id'] > 0)
            {
                if (!empty($_POST['comment']))
                {
                    deleteComment($_GET['id'], $_GET['id_comment'], $_POST['comment']);
                }
                else
                {
                    // Error ! Stop all and return exception => jump to catch
                    throw new Exception('Impossible de supprimer le commentaire (rooter index.php/deleteComment)');
                }
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