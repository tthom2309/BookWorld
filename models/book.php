<?php
	require_once 'database.php';
	require_once 'publisher.php';
	require_once 'author.php';
	require_once 'category.php';
	
	class Book {
		private $isbn;
		private $label;
		private $author;
		private $publisher;
		private $category;
		private $price;
		private $quantity_available;
		
		private $publisher_name;
		private $author_name;
		private $category_label;
		
		private $connection;
		
		public function __construct(){
			
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM book');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'book');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}

		
		public static function get($id) {
			$db = getDB();
			$query = 'SELECT * FROM book WHERE isbn = :id';
			
			$reponse = $db->prepare($query);
			$reponse->execute(array(':id' => $id));
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'book');
			$donnees = $reponse->fetch();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public function getIsbn(){
			return $this->isbn;
		}
		
		public function getLabel(){
			return $this->label;
		}
		
		public function getAuthor(){
			return $this->author;
		}
		
		public function getPublisher(){
			return $this->publisher;
		}
		
		public function getCategory(){
			return $this->category;
		}
		
		public function getPrice(){
			return $this->price;
		}
		
		public function getQuantity_Available(){
			return $this->quantity_available;
		}
		
		
		private function setPublisher_Name(){
			$tmpPublisher = Publisher::get(array('id_publisher' => $this->publisher));
			$this->publisher_name = $tmpPublisher->getName();
		}
		
		public function getPublisher_Name(){
			$this->setPublisher_Name();
			return $this->publisher_name;
		}
		
		private function setAuthor_Name(){
			$tmpAuthor = Author::get(array('id_author' => $this->author));
			$this->author_name = $tmpAuthor->getName();
		}
		
		public function getAuthor_Name(){
			$this->setAuthor_Name();
			return $this->author_name;
		}
		
		private function setCategory_Label(){
			$tmpCategory = Category::get(array('id_category' => $this->category));
			$this->category_label = $tmpCategory->getName_cat();
		}
		
		public function getCategory_Label(){
			$this->setCategory_Label();
			return $this->category_label;
		}
	}
	
?>