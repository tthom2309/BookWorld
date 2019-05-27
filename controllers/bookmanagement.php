<?php
	require 'models/book.php';
	session_start();
	if($_SESSION['role']==3){
			header('location: welcome');
	}
	$books = book::getAll();
	include('views/bookmanagement.php');
	
?>