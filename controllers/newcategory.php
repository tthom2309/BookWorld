<?php
	require_once 'models/category.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$categories = category::getAll();
	include('views/newcategory.php');
?>