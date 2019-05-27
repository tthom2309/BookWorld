<?php
	require 'models/user.php';
	session_start();
	if($_SESSION['role']==3){
			header('location: welcome');
	}
	$users = user::getAll();
	include('views/usermanagement.php');
	
?>