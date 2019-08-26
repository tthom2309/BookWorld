<?php
	session_start();
	require 'models/cart.php';
	createCart();
	include('views/signin.php');
	
?>