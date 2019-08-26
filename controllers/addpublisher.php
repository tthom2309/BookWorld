<?php
	session_start();
	require 'models/publisher.php';
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$publishers = publisher::getAll();
	foreach($publishers as $publisher){
		if($publisher->getName()==$_POST['name']){
			echo '<div class="alert alert-danger" role="alert">Cet auteur est déjà enregistré.</div>'; 
			header('location: newpublisher');
		}
	} 
	publisher::add($_POST['name']);
	header('location: bookmanagement');
?>	