<?php
	session_start();
	require 'models/category.php';
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$categories = category::getAll();
	foreach($categories as $category){
		if($category->getName_cat()==$_POST['name']){
			echo '<div class="alert alert-danger" role="alert">Cet auteur est déjà enregistré.</div>'; 
			header('location: newcategory');
		}
	} 
	category::add($_POST['name']);
	header('location: bookmanagement');
?>	