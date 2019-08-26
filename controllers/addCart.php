<?php
    session_start();

    require 'models/database.php';
    require 'models/user.php';
    require 'models/book.php';
    require 'models/cart.php';
	
	$isbn = $_GET['isbn'];
    $user = User::getUser($_SESSION['login']);
	$book = book::get($isbn);

    addToCart($book->getIsbn(),$book->getLabel(),$book->getPrice(),1);
	header('Location: listing'); 
?>