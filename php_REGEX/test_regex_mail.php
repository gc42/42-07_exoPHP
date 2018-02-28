<p>
<?php
if (isset($_POST['mail']))
{
    $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail']))
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
    }
    else
    {
        echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
    }
}
?>
</p>

<form method="post">
<p>
    <label for="mail">Votre mail ?</label> <input id="mail" name="mail" /><br /> 
    <input type="submit" value="Vérifier le mail" />
</p>
</form>


<?php
/*
Adresse email
1: a-z 0-9 . - _
2: @
3: a-z 0-9 . - _ deux caracteres minimum
4: .## extension de deux a quatre caracteres (.fr, .info etc.)
ex: j.dupont_2@orange.fr
#^$#                                         // Que le mail
#^[a-z0-9._-]+$#                             // un ou plusieurs fois 
#^[a-z0-9._-]+@[a-z0-9._-]{2,}$#             // puis '@' et de nouveau plusieurs fois, deux caracteres mini
#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.$#           // puis le point
#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$# // puis l'extension


*/
?>