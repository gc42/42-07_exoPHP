<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>
<body>
    <?= $content ?>
		
	<?php
	if (isset($_GET['action']) && $_GET['action'] == 'editComment')
	{
		echo $form_update;
	}
	else
	{
		echo $form_new;
	}
	?>



<pre> Get:<?= print_r($_GET); ?> </pre>
<pre> Post:<?= print_r($_POST); ?> </pre>
</body>
</html>