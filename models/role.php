<?php
	require_once 'database.php';

	class Role {
		private $id_role;
		private $name;
		
		private $connection;
		
		public function __construct($data=null){
			
		}
		
		
		
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM ROLE');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'Role');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}

		
		public static function get($values) {
			$db = getDB();
			$query = 'SELECT * FROM ROLE WHERE';
			foreach ($values as $name => $value) {
				$query = $query.' '.$name.' = :'.$name.' and';
			}
			$query = substr($query, 0, -4);
			$reponse = $db->prepare($query);
			$reponse->execute($values);
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'Role');
			$donnees = $reponse->fetch();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public function getId_Role(){
			return $this->id_role;
		}
		
		public function getName(){
			return $this->name;
		}
	}
?>