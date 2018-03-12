<?php
// Ouvrir la session en premier
session_start();
?>

Je te reconnais <?php $_SESSION['prenom']; ?>, tu es deja venu.

Retourner a la page sesssions <a href="session.php">ici</a>.