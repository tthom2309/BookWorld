<?php
	require 'models/user.php';
	session_start();
	if($_SESSION['role']!=1){
			header('location: welcome');
	}
	$users = user::getAll();
	foreach($users as $user){
		if($user->getId_user()==$_GET['id_user']){
			user::updateToAdmin($user->getId_user());
			header('location: usermanagement');
		}
	}
?>