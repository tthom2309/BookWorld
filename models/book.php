<?php
	require_once 'database.php';
	require_once 'publisher.php';
	require_once 'author.php';
	
	class Book {
		public $isbn;
		public $label;
		public $author;
		public $publisher;
		public $category;
		public $price;
		public $quantity;
		
		public function __construct(){
			
		}
	}
	
?>