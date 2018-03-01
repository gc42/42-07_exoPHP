<?php
require('minichat_model.php');

// Reset pseudo only
if (isset($_GET['reset']) && $_GET['reset'] == "resetPseudo")
{
    resetCookie();
}

// Reset All: delete pseudo and entries in database
if (isset($_GET['reset']) && $_GET['reset'] == "resetAll")
{
    $nbr_of_keeped_entries = 5;
    resetCookie();
    resetData($nbr_of_keeped_entries);
}

// Manage COOKIE
if (isset($_POST['submit']) && $_POST['submit'] == "Valider")
{
    // Create the cookie if nessessary
    if (isset($_COOKIE['c_pseudo']) || empty($_COOKIE['c_pseudo']))
    {
        createCookie();
    }

    // Set the current cookie value if pseudo exist
    if ($_POST['pseudo'] !== '' && $_COOKIE['c_pseudo'] === 'nobody')
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
}

$posts = getPosts();

require('indexView.php');
