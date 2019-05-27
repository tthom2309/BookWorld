<?php
	
	session_start();
	if($_SESSION['role']==3){
			header('location: welcome');
	}
	
	include('views/ordermanagement.php');
	
?>