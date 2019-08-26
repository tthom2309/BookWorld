<?php
	require_once 'database.php';
	require_once 'order.php';
	require_once 'book.php';
	
	class bookorder{
		private $id_book_order;
		private $num_order;
		private $book;
		private $price;
		private $quantity;
		
		public function __construct(){
			
		}
		
		public static function getThreebest(){
			$db = getDB();		
			$response = $db->prepare("SELECT DISTINCT book, SUM(quantity) FROM bookorder GROUP BY book ORDER BY SUM(quantity) DESC LIMIT 3;");
			$response->execute();
			// $response->setFetchMode( PDO::FETCH_CLASS, "bookorder");  
			$data = $response->fetchAll(); 
    
			return $data;
		}
		
		public static function addBookOrder($id,$num,$prc,$qty){
			$db = getDB();
			$query = $db->prepare("insert into bookorder (num_order,book,price,quantity) values(:idorderb,:id_book,:price,:quantity)");
			$query->bindvalue(':idorderb', $id);
			$query->bindvalue(':id_book', $num);
			$query->bindvalue(':price', $prc);
			$query->bindvalue(':quantity', $qty);
			$query->execute();
			$query->closeCursor();
		}
		
		public static function getBookOrdersById($idorder){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM bookorder where id_book_order= :idorder');
			$reponse->bindvalue(':idorder', $idorder);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'book');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM bookorder');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'bookorder');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public function getIdBookOrder(){
			return $this->id_book_order;
		}
		
		public function getNumOrder(){
			return $this->num_order;
		}
		
		public function getBook(){
			return $this->book;
		}
		
		public function getPrice(){
			return $this->price;
		}
		
		public function getQuantity(){
			return $this->quantity;
		}
		
		public function getBookName(){
			$bookTMP = book::get($this->getBook());
			return $bookTMP->getLabel();
		}
	}
?>