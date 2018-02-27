<?php

try
{
	$db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} 
catch (Exception $e)
{
	die('Impossible de se connecter à la base de donnée.');
}