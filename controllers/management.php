<?php
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	include('views/management.php');
	
?>