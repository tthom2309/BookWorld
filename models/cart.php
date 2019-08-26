<?php
	require_once 'database.php';
	require_once 'book.php';
	require_once 'user.php';
	

	function createCart(){
		if (!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
			$_SESSION['cart']['isbnBook'] = array();
			$_SESSION['cart']['titleBook'] = array();
			$_SESSION['cart']['quantity'] = array();
			$_SESSION['cart']['price'] = array();
		}   
	}
	
	function addToCart($isbn,$title,$price,$qty){
		 $checkBook = array_search($isbn,  $_SESSION['cart']['isbnBook']);

		if ($checkBook !== false){
			$_SESSION['cart']['quantity'][$checkBook] += $qty ;
		}
		else
		{
			array_push($_SESSION['cart']['isbnBook'],$isbn);
			array_push($_SESSION['cart']['titleBook'],$title);
			array_push($_SESSION['cart']['quantity'],$qty);
			array_push($_SESSION['cart']['price'],$price);
		}
	}
	
	function removeFromCart($isbn){
		$tmp=array();
		$tmp['isbn'] = array();
		$tmp['title'] = array();
		$tmp['price'] = array();
		$tmp['quantity'] = array();

		for($i = 0; $i < count($_SESSION['cart']['isbnBook']); $i++){
			if ($_SESSION['cart']['isbnBook'][$i] !== $isbn){
				array_push( $tmp['isbn'],$_SESSION['cart']['isbnBook'][$i]);
				array_push( $tmp['title'],$_SESSION['cart']['titleBook'][$i]);
				array_push( $tmp['quantity'],$_SESSION['cart']['quantity'][$i]);
				array_push( $tmp['price'],$_SESSION['cart']['price'][$i]);
			}
		}
		$_SESSION['cart'] =  $tmp;
		unset($tmp);
	}
	
	function priceCart(){
		$total=0;
		for($i = 0; $i < count($_SESSION['cart']['isbnBook']); $i++){
			$total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['price'][$i];
		}
		return $total;
	}
	
	function clearCart(){
		unset($_SESSION['cart']);
	}
	
	function numberBookCart(){
		return count($_SESSION['cart']['isbnBook']);
	}
?>