<?php
	require_once 'models/author.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$authors = author::getAll();
	include('views/newauthor.php');
?>