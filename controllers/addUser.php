<?php
	require 'models/user.php';
	try
	{
		
		$adresse = $_POST['street']." ".$_POST['numberS'].", ".$_POST['postalcode']." ".$_POST['city'];
		$password = password_hash($_POST['password'],PASSWORD_DEFAULT);
		if((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))){
			throw new Exception('Adresse mail invalide.');
		}
		user::addUser($_POST['login'],$password,$_POST['name'],$_POST['surname'],$adresse,$_POST['email'],3);
		$user = user::getUser($_POST['login']);
		session_start();
		$_SESSION['login'] = $user->getLogin();
		$_SESSION['role'] = $user->getRole(); 
		$_SESSION['id_user'] = $user->getId_user();		
		header('Location: welcome'); 
	}catch(Exception $e){
		if($e->getMessage()=="SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '".$_POST['login']."' for column 'ids1' at row 1"){
			echo "<script>alert('Ce pseudo est déjà pris.')</script>";
		}
		elseif($e->getMessage()=="SQLSTATE[HY000]: General error: 1366 Incorrect integer value: '".$_POST['email']."' for column 'ids2' at row 1"){
			echo "<script>alert('Cette adresse mail est déjà enregistrée.')</script>";
		}
		else{
			echo "<script>alert('".$e->getMessage()."')</script>";
		}
		
	}
	include('views/signin.php');
?>