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
	if (isset($_GET['action']) && $_GET['action'] == 'edit')
	{
		echo $form_updateComment;
	}
	else
	{
		echo $form_newComment;
	}
	?>

</body>
</html>