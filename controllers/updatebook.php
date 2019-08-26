<?php
	session_start();
	require 'models/book.php';
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}

	$isbn=$_POST['isbn'];
	$label=$_POST['label'];
	$author=$_POST['author'];
	$publisher=$_POST['publisher'];
	$category=$_POST['category'];
	$price=$_POST['price'];
	$quantity=$_POST['quantity'];
	$synopsis=$_POST['synopsis'];
	
	if($price<=0){
		echo '<div class="alert alert-danger" role="alert">Le prix ne peut pas être négatif ou égal à 0.</div>'; 
			header('location: modifybook');
	}
	
	if($quantity<0){
		echo '<div class="alert alert-danger" role="alert">La quantité ne peut pas être négatif.</div>'; 
			header('location: modifybook');
	}
	
	$image='images/'.$isbn.'.jpg';
	if(file_exists($_FILES['picture']['tmp_name'])){
		unlink($image);
        move_uploaded_file($_FILES['picture']['tmp_name'], $image);
	}
	
	Book::modify($isbn,$label,$author,$publisher,$category,$price,$quantity,$image,$synopsis);
	header('location: bookmanagement');
?>	