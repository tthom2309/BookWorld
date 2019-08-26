<?php
	require 'models/user.php';
	require 'models/cart.php';
	
	if(!empty($_POST)){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			$user = user::getUser($_POST['login']);
			if($user && $user->isPassword($_POST['password'])){     
				session_start();
				$_SESSION['login'] = $user->getLogin();
				$_SESSION['role'] = $user->getRole(); 
				$_SESSION['id_user'] = $user->getId_user();
				createCart();
				header('Location: welcome'); 
			}
			else
			{
				echo "<script>alert('Pseudo ou mot de passe invalide.');</script>";
			}
			
		}
	}

	include('views/login.php');
?>