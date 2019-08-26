<?php
	require_once 'database.php';
	
	class Category {
		private $id_category;
		private $name_cat;
		
		public function __construct(){
			
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM category');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'category');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}

		public static function add($name){
			$db = getDB();
			$query = $db->prepare("insert into category(name_cat) values (:name)");
			$query->bindvalue(':name', $name);
			$query->execute();
			$query->closeCursor();
		}
		
		public static function get($values) {
			$db = getDB();
			$query = 'SELECT * FROM category WHERE';
			foreach ($values as $name => $value) {
				$query = $query.' '.$name.' = :'.$name.' and';
			}
			$query = substr($query, 0, -4);
			$reponse = $db->prepare($query);
			$reponse->execute($values);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'category');
			$donnees = $reponse->fetch();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public function getId_Category(){
			return $this->id_category;
		}
		
		public function getName_cat(){
			return $this->name_cat;
		}
	}
?>