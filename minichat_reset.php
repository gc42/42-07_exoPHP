<?php
if (empty($_COOKIE['c_pseudo'])) {
	setcookie('c_pseudo');
}
header('Location: minichat.php');
?>