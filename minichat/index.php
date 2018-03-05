<?php
require('controller/frontend.php');

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
        OnValidate();
    }
}
else
{
    listPosts();
}