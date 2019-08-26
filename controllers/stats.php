<?php
	require_once 'models/bookorder.php';
	require_once 'models/book.php';
	session_start();
	if($_SESSION['role']!=1 or $_SESSION['role']!=2){
			header('location: welcome');
	}
	$graph = bookorder::getThreebest();
	include('views/stats.php');
?>
