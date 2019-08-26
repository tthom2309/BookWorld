<?php
	session_start();
	require 'models/author.php';
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$authors = author::getAll();
	foreach($authors as $author){
		if($author->getName()==$_POST['name']){
			echo '<div class="alert alert-danger" role="alert">Cet auteur est déjà enregistré.</div>'; 
			header('location: newauthor');
		}
	} 
	author::add($_POST['name']);
	header('location: bookmanagement');
?>	