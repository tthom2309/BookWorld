<?php
	require_once 'models/order.php';
	require_once 'models/bookorder.php';
	require_once 'models/user.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	
	$orders = order::getall();
	include('views/ordermanagement.php');
	
?>