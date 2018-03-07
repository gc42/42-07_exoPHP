<?php $title = 'Super Blog'; ?>

<?php ob_start(); ?>

<pre><? echo "GET: ";  print_r($_GET); ?></pre>
<pre><? echo "POST: "; print_r($_POST); ?></pre>
<p>Une erreur est survenue !<br />Veuillez prendre connaissance du message ci-dessous.</p>
<p><?= $errorMessage ?></p>

<form action="index.php?action=<?= $_POST['oldAction'] ?>&amp;id=<?= $_GET['id'] ?>" 
      method="post">
        <div>
            <input type="submit" value="OK" />
        </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('view/errorTemplate.php'); ?>

