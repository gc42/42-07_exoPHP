<p>Bonjour !</p>

<p>Tu t'appelles <?php echo htmlspecialchars($_POST['prenom']); ?> !</p>

<p>Si tu veux changer de prenom, <a href="formulaire.php">Clique ici</a> pour revenir a la page du formulaire.
</p>

<pre>
<?php
print_r($_POST);
?>
</pre>
