<?php $title = "Minichat'"; ?>


<?php ob_start(); ?>
<h1>Il y a eu des erreurs</h1>
<p>Reflechis un peu, et arrete de faire des conneries ;-)</p>
<p><?= $errorMessage; ?></p>

<?php $errors = ob_get_clean(); ?>


<?php require('view/errorTemplate.php'); ?>