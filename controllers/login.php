<?php
	require 'models/user.php';
	$error='';
	
	if(!empty($_POST)){
		if(!empty($_POST['login']) && !empty($_POST['password'])){
			

			$user = user::getUser($_POST['login']);
			
			if($user && $user->isPassword($_POST['password'])){     
				session_start();
				$_SESSION['login'] = $user->login;
				$_SESSION['role'] = $user->role; 
				$_SESSION['id_user'] = $user->id_user;
				
				
				
				
				header('Location: welcome'); 
			}
			else
			{
				
				//$error='';
			}
			
		}
	}
	else
	{
		//$error = 'Veuillez inscrire vos identifiants svp !';
	}
	
	

	
	include('views/login.php');
?>