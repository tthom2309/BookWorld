<?php
	require_once 'database.php';
	
	class order{
		private $id_order;
		private $user;
		private $status;
		
		public function __construct(){
			
		}
		
		public static function addOrder($userAdd,$statusAdd){
			$db = getDB();
			$query = $db->prepare("insert into `order` (`user`,`status`) values(:user,:status)");
			$query->bindvalue(':user', $userAdd);
			$query->bindvalue(':status', $statusAdd);
			$query->execute();
			$query->closeCursor();
			return $db->lastInsertId();
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM `order`');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'order');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		public static function getStatusObject($idStatus){
			$db = getDB();
			$query = $db->prepare('SELECT name FROM status WHERE id_status = :id');
            $query->bindvalue(':id', $idStatus);
            $query->execute();
            $result = $query->fetch();
            $query->closeCursor();
            return $result;
		}
		
		public function getIdOrder(){
			return $this->id_order;
		}
		
		public function getUser(){
			return $this->user;
		}
		
		public function getStatus(){
			return $this->status;
		}
		
		
	}
?>