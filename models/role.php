<?php
	require_once 'database.php';

	class Role {
		private $id_role;
		private $name;
		private $connection;
		
		public function __construct($data=null){
			
		}
		
		
		
		
		private static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM ROLE');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'Role');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}

		
		
		
	}
?>