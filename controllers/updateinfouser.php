<?php
	require_once 'models/user.php';
	session_start();
	
	$nom = $_POST['name'];
	$prenom = $_POST['surname'];
	$adresse = $_POST['adress'];
	$mail = $_POST['email'];
	user::updateUser($_SESSION['id_user'],$nom,$prenom,$adresse,$mail);
	header('Location: profile');
?>