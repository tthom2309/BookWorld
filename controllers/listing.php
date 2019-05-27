<?php
	session_start();
	require 'models/book.php';
	require 'models/cart.php';
	$books = book::getAll();

	include('views/listing.php');
?>