<?php
	require 'models/user.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$users = user::getAll();
	include('views/usermanagement.php');
	
?>