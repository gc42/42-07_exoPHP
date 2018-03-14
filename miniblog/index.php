<?php
require('controller/frontend.php');

try {       // DEBUT DES ESSAIS
    if (isset($_GET['action']))
    {




        // ACTION = listPosts
        if ($_GET['action'] == 'listPosts' OR $_GET['action'] == "wantNewPost")
        {
            listPosts();
        }





        // ACTION = addPost
        elseif ($_GET['action'] == 'addPost')
        {
            if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['content']))
            {
                addPost($_POST['author'], $_POST['title'], $_POST['content']);
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Tous les champs ne sont pas remplis ! (rooter index.php)');
            }
        }




        
        // ACTION = wantDeletePost
        elseif ($_GET['action'] == 'wantDeletePost')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                listposts();
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Probleme pour supprimer cette news, id inconnu (rooter index.php/deleteComment)');
            }
        }




        // ACTION = deletePost
        elseif ($_GET['action'] == 'deletePost')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                deletePost($_GET['id']);
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Impossible de supprimer cette news (rooter index.php/deleteComment)');
            }
        }




        // ACTION = post
        elseif ($_GET['action'] == 'post' OR $_GET['action'] == 'wantNewComment')
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




        // ACTION = addComment
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



        // ACTION = editComment
        elseif ($_GET['action'] == 'editComment')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0 AND
                isset($_GET['id_comment']) && $_GET['id_comment'] > 0)
            {
                editComment($_GET['id'], $_GET['id_comment']);
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Aucun identifiant de post ou de comment envoye (rooter index.php)');
            }
        }

        
        // ACTION = updateComment
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




        // ACTION = wantDeleteComment
        elseif ($_GET['action'] == 'wantDeleteComment')
        {
            if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0 &&
            isset($_GET['id']) && $_GET['id'] > 0)
            {
                //deleteComment($_GET['id'], $_GET['id_comment']);
                post();
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Impossible de supprimer le commentaire (rooter index.php/deleteComment)');
            }
        }


        // ACTION = deleteCommand
        elseif ($_GET['action'] == 'deleteComment')
        {
            if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0 &&
            isset($_GET['id']) && $_GET['id'] > 0)
            {
                deleteComment($_GET['id'], $_GET['id_comment']);
            }
            else
            {
                // Error ! Stop all and return exception => jump to catch
                throw new Exception('Impossible de supprimer le commentaire (rooter index.php/deleteComment)');
            }
        }
        else
        {
            listPosts();
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