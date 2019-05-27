<?php
	//require 'models/cart.php';
	session_start();
	
	if(empty($_SESSION['login'])){
		header('location: welcome');
	}
	$total=0;
	
	include('views/cart.php');
?>	