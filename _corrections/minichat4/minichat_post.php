<?php

$errors = [];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//Validation pseudo
	if (isset($_POST['pseudo']) && $_POST['pseudo'] != ""){
		if (strlen($_POST['pseudo']) < 3 || strlen($_POST['pseudo']) > 15){
			$errors['pseudo'] = "Votre pseudo doit être compris entre 3 et 15 caractères.";
		}

		$pseudo = $_POST['pseudo'];
	}
	else
	{
		$errors['pseudo'] = "Votre pseudo ne peut être vide.";
	}

	//Validation message
	if (isset($_POST['message']) && $_POST['message'] != ""){
		if (strlen($_POST['pseudo']) > 1000){
			$errors['message'] = "Erreur. Votre message doit contenir moins de 1000 caractères.";
		}
	}
	else
	{
		$errors['message'] = "Votre message ne peut être vide.";
	}

	//Insertion du message.
	if(empty($errors))
	{
		$request = $db->prepare('INSERT INTO mini_chat (pseudo, message, date) VALUES(:pseudo, :message , NOW())');
		$request->bindValue('pseudo', $_POST['pseudo']);
		$request->bindValue('message', $_POST['message']);
		$request->execute();
	
	}

}