<?php
	require 'models/cart.php';
	require_once 'models/book.php';
	session_start();
	if(empty($_SESSION['login'])){
		header('location: welcome');
	}
	include('views/cart.php');
?>	