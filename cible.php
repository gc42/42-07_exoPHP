<p>Bonjour !</p>

<p>Tu t'appelle <?php echo $_POST['prenom']; ?>!</p>

<p>Si tu veux changer de prénom, <a href="index.php">clique ici</a> pour revenir au formulaire.php.</p>

<pre>
    <?php
    print_r($_POST);
    ?>
    </pre>