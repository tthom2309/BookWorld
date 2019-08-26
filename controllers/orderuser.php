<?php
	require_once 'models/order.php';
	require_once 'models/bookorder.php';
	session_start();
	$orders = order::getall();
	include('views/orderuser.php');
?>