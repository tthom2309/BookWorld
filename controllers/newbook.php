<?php
	require 'models/book.php';
	require_once 'models/publisher.php';
	require_once 'models/author.php';
	require_once 'models/category.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$authors = author::getAll();
	$publishers = publisher::getAll();
	$categories = category::getAll();
	include('views/newbook.php');
?>