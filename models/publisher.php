<?php
	require_once 'database.php';
	
	class Publisher {
		private $id_publisher;
		private $name;
		
		public function __construct(){
			
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM publisher');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'publisher');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}

		public static function add($name){
			$db = getDB();
			$query = $db->prepare("insert into publisher(name) values (:name)");
			$query->bindvalue(':name', $name);
			$query->execute();
			$query->closeCursor();
		}
		
		public static function get($values) {
			$db = getDB();
			$query = 'SELECT * FROM publisher WHERE';
			foreach ($values as $name => $value) {
				$query = $query.' '.$name.' = :'.$name.' and';
			}
			$query = substr($query, 0, -4);
			$reponse = $db->prepare($query);
			$reponse->execute($values);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'publisher');
			$donnees = $reponse->fetch();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public function getId_Publisher(){
			return $this->id_publisher;
		}
		
		public function getName(){
			return $this->name;
		}
	}
?>