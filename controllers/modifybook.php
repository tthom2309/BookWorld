<?php
	session_start();
	require_once 'models/book.php';
	require_once 'models/publisher.php';
	require_once 'models/author.php';
	require_once 'models/category.php';
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$isbn = $_GET['isbn'];
	$book = book::get($isbn);
	$authors = author::getAll();
	$publishers = publisher::getAll();
	$categories = category::getAll();
	include('views/modifybook.php');
?>