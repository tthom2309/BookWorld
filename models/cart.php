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
	
	function modifyQuantity($isbn,$qty){
		for($i = 0; $i < count($_SESSION['cart']['isbnBook']); $i++){
			if ($_SESSION['cart']['isbnBook'][$i] == $isbn){
				$_SESSION['cart']['quantity'][$i] +=$qty;
				if($_SESSION['cart']['quantity'][$i]==0){
					removeFromCart($isbn);
				}
			}
		}	
	}
	
	function removeFromCart($isbn){
		for($i = 0; $i < count($_SESSION['cart']['isbnBook']); $i++){
			if ($_SESSION['cart']['isbnBook'][$i] == $isbn){
				\array_splice($_SESSION['cart']['isbnBook'],$i,1); 
				\array_splice($_SESSION['cart']['titleBook'],$i,1); 
				\array_splice($_SESSION['cart']['quantity'],$i,1); 
				\array_splice($_SESSION['cart']['price'],$i,1); 
			}
		}	
	}
	
	function priceCart(){
		$total=0;
		for($i = 0; $i < count($_SESSION['cart']['isbnBook']); $i++){
			$total += $_SESSION['cart']['quantity'][$i] * $_SESSION['cart']['price'][$i];
		}
		return $total;
	}
	
	function updateQuantityDB($i){
		$bookTMP = book::get($_SESSION['cart']['isbnBook'][$i]);
		$qtyTMP =$bookTMP->getQuantity_Available();
		$qtyTMP -= $_SESSION['cart']['quantity'][$i];
		book::updateQuantityAfterOrder($_SESSION['cart']['isbnBook'][$i],$qtyTMP);
	}
	
	function clearCart(){
		unset($_SESSION['cart']);
	}
	
	function numberBookCart(){
		return count($_SESSION['cart']['isbnBook']);
	}
?>