<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="public/css/my_style.css">

</head>
<body>
    <?= $content ?>
		
	<?php
		if (isset($_GET['action']) && ($_GET['action'] == 'editComment' OR $_GET['action'] == 'editPost'))
		{
			echo $form_update;
		}
		else
		{
			echo $form_new;
		}
	?>



</body>
</html>