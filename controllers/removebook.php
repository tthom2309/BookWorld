<?php
	require 'models/book.php';
	session_start();
	if($_SESSION['role']!=1 and $_SESSION['role']!=2){
			header('location: welcome');
	}
	$books = book::getAll();
	foreach($books as $book){
		if($book->getIsbn()==$_GET['isbn']){
			book::removeById($_GET['isbn']);
			$image='images/'.$_GET['isbn'].'.jpg';
			unlink($image);
			header('location: bookmanagement');
		}	
	}
?>