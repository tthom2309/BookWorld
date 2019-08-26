<?php
	require 'models/cart.php';
	session_start();
	clearCart();
	createCart();
	header('Location: cart');
?>