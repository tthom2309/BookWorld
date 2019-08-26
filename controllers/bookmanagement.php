<?php
	require 'models/book.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$books = book::getAll();
	include('views/bookmanagement.php');
	
?>