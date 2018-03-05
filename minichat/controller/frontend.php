<?php
require('model/frontend.php');

function resetPseudo()
{
    resetCookie();
 
    $posts = getPosts();
    require('view/frontend/listPostsView.php');
}

function resetAll()
{
    $nbr_of_keeped_entries = 5;
    resetCookie();
    resetData($nbr_of_keeped_entries);

    $posts = getPosts();
    require('view/frontend/listPostsView.php');
}

function OnValidate()
{
    // Create the cookie if nessessary
    if (!(isset($_COOKIE['c_pseudo'])) || empty($_COOKIE['c_pseudo']))
    {
        createCookie();
    }

    // Set the current cookie value if pseudo exist
    if ($_POST['pseudo'] !== '' && $_COOKIE['c_pseudo'] === 'nobody' )
    {
        setCookieValue();
    }

    // Add new entries in database
    if (    isset($_POST['pseudo'])  &&
            isset($_POST['message']) &&
            !empty($_POST['pseudo']) &&
            !empty($_POST['message']) 
        )
    {
        // 0 : Remember POST parameters
		$pseudo  = $_POST['pseudo'];
        $message = $_POST['message'];
        
        addNewPosts($pseudo, $message);
    }

    $posts = getPosts();
    require('view/frontend/listPostsView.php');

}

function listPosts()
{
    $posts = getPosts();
    require('view/frontend/listPostsView.php');
 
}
