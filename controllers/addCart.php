<?php
    session_start();

    require 'models/database.php';
    require 'models/user.php';
    require 'models/book.php';
    require 'models/cart.php';
	
	$isbn = $_GET['isbn'];
    $user = User::getUser($_SESSION['login']);
	$book = book::get($isbn);

    Cart::add($user->getId_user(), $book->getIsbn());
	header('Location: listing'); 
?>