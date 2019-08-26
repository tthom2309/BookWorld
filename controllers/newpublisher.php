<?php
	require_once 'models/publisher.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$publishers = publisher::getAll();
	include('views/newpublisher.php');
?>