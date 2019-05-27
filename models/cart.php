<?php
	require_once 'database.php';
	require_once 'book.php';
	require_once 'user.php';
	

	class Cart{
		
		private $id_cart;
        private $user;
        private $book;
		
		private $bookLabel;
		private $bookPrice;
		
		public static function add($user, $book){
            $db = getDB();
            $query = $db->prepare("INSERT INTO cart (user, book) VALUES (?,?)");
            $query->execute(array($user, $book));
            $query->closeCursor();
        }
		
		public static function getFromUserId($idUser){
			$db = getDB();
			$query = $db->prepare("SELECT * FROM book AS b
								INNER JOIN cart AS c ON b.isbn = c.book
								WHERE c.user = :id");
			$query->bindValue(':id', $idUser);
			$query->execute();
			$cart = $query->fetchAll();
            $query->closeCursor();
            return $cart;
        }
		
		public static function getTotalPrice($idUser){
            $db = getDB();
            $query = $db->prepare("SELECT SUM(price) AS total FROM book AS b
                                INNER JOIN cart AS c ON b.isbn = c.book
                                WHERE c.user = :id");
            $query->bindValue(':id', $idUser);
            $query->execute();
            $cart = $query->fetch();
            $query->closeCursor();
            return $cart;
        }
		
		public function getUser(){
			return $this->user;
		}
		public function getBook(){
			return $this->book;
		}
		
		private function setBookLabel(){
			$tmpBook = Book::get(array('isbn' => $this->book));
			$this->bookLabel = $tmpBook->getLabel();
		}
		
		public function getBookLabel(){
			$this->setBookLabel();
			return $this->bookLabel;
		}
		
		private function setBookPrice(){
			$tmpBook = Book::get(array('isbn' => $this->book));
			$this->bookPrice = $tmpBook->getPrice();
		}
		
		public function getBookPrice(){
			$this->setBookPrice();
			return $this->bookPrice;
		}
	}	
?>