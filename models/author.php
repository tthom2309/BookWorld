<?php
	require_once 'database.php';
	
	class Author {
		private $id_author;
		private $name;
		
		public function __construct(){
			
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM author');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'author');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}

		
		public static function get($values) {
			$db = getDB();
			$query = 'SELECT * FROM author WHERE';
			foreach ($values as $name => $value) {
				$query = $query.' '.$name.' = :'.$name.' and';
			}
			$query = substr($query, 0, -4);
			$reponse = $db->prepare($query);
			$reponse->execute($values);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'author');
			$donnees = $reponse->fetch();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public function getId_Author(){
			return $this->id_author;
		}
		
		public function getName(){
			return $this->name;
		}
	}
?>