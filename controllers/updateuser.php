<?php
	require_once 'models/user.php';
	session_start();
	$userSESS = user::getUserById($_SESSION['id_user']);
	include('views/updateUser.php');
?>