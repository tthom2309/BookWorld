<?php
	session_start();
	require 'models/book.php';
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$books = book::getAll();
	
	$isbn=$_POST['isbn'];
	$label=$_POST['label'];
	$author=$_POST['author'];
	$publisher=$_POST['publisher'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	//$image=$_POST['picture'];
	$synopsis=$_POST['synopsis'];
	
	foreach($books as $book){
		if($book->getIsbn()==$isbn){
			echo '<div class="alert alert-danger" role="alert">Ce livre a déjà été ajouté.</div>'; 
			header('location: newbook');
		}
	}
	
	if($price<=0){
		echo '<div class="alert alert-danger" role="alert">Le prix ne peut pas être négatif ou égal à 0.</div>'; 
			header('location: newbook');
	}
	
	if($quantity<0){
		echo '<div class="alert alert-danger" role="alert">La quantité ne peut pas être négatif.</div>'; 
			header('location: newbook');
	}
	
	$image='images/'.$isbn.'.jpg';
	move_uploaded_file($_FILES['picture']['tmp_name'],$image);
	Book::add($isbn,$label,$author,$publisher,$category,$price,$quantity,$image,$synopsis);
	header('location: bookmanagement');
?>