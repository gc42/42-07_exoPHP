<?php
require('controller.php');

// On reset pseudo only
if (isset($_GET['reset']))
{
    if ($_GET['reset'] == "resetPseudo")
    {
        resetPseudo();
    }
    elseif ($_GET['reset'] == "resetAll")
    {
        resetAll();
    }
}
elseif (isset($_POST['submit']))
{
    if  ($_POST['submit'] == "Valider")
    {
        OnValidate();
    }
}
else
{
    listPosts();
}