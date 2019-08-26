<?php
	require 'models/order.php';
	require 'models/bookorder.php';
	//require 'models/book.php';
	require 'models/cart.php';
	session_start();
	$idOrder = order::addOrder($_SESSION['id_user'],1);
	$nbBook = numberBookCart();
	for($i = 0; $i < $nbBook; $i++){
		bookorder::addBookOrder($idOrder,$_SESSION['cart']['isbnBook'][$i],$_SESSION['cart']['price'][$i],$_SESSION['cart']['quantity'][$i]);
		updateQuantityDB($i);
	}
	clearCart();
	createCart();
	header('Location: welcome'); 
?>