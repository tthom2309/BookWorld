<?php
	require 'models/cart.php';
	session_start();
	if(empty($_SESSION['login'])){
		header('location: welcome');
	}
	modifyQuantity($_GET['isbn'],-1);
	header('location: cart');
?>