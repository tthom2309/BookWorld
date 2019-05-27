<?php
	session_start();
	require 'models/book.php';
	$isbn = $_GET['isbn'];
	$book = book::get($isbn);
	include('views/details.php');
?>