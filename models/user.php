<?php
	require_once 'database.php';
	require_once 'role.php';
	
	class User {
		private $id_user;
		private $login;
		private $password;
		private $name;
		private $surname;
		private $adress;
		private $mail;
		private $role;
		
		private $role_name;
		
		private $connection;
		

		public function __construct(){
			
		}
	
	
		public static function getUser($loginParam){
			$connection = getDB();
			$response = $connection->prepare("SELECT * FROM user WHERE login = :login");
			$response->execute(array(':login' => $loginParam));
			$data = new User();
			while ($result= $response->fetch()){
				$data->setId_user($result['id_user']);
				$data->setLogin($result['login']);
				$data->setPassword($result['password']);
				$data->setName($result['name']);
				$data->setSurname($result['surname']);
				$data->setAdress($result['adress']);
				$data->setMail($result['mail']);
				$data->setRole($result['role']);
				$data->setRole_Name();
			}
			return $data;
		}
		
		public static function getUserById($id){
			$connection = getDB();
			$response = $connection->prepare("SELECT * FROM user WHERE id_user = :id");
			$response->execute(array(':id' => $id));
			$data = new User();
			while ($result= $response->fetch()){
				$data->setId_user($result['id_user']);
				$data->setLogin($result['login']);
				$data->setPassword($result['password']);
				$data->setName($result['name']);
				$data->setSurname($result['surname']);
				$data->setAdress($result['adress']);
				$data->setMail($result['mail']);
				$data->setRole($result['role']);
				$data->setRole_Name();
			}
			return $data;
		}
		
		public static function updateUser($id,$newname,$newfirstname,$newadress,$newmail){
			$db = getDB();
			
			$data = [
				'id' => $id,
				'newname' => $newname,
				'newfirstname' => $newfirstname,
				'newadress' => $newadress,
				'newmail' => $newmail
			];
			
			$query ="update `user` set name= :newname, surname= :newfirstname, adress= :newadress, mail= :newmail
			where id_user= :id";
			$response = $db->prepare($query);
			$response->execute($data);
		}
		
		public static function getAll(){
			$db = getDB();
			$reponse = $db->query('SELECT * FROM USER');
			$reponse->setFetchMode(PDO::FETCH_CLASS, 'User');
			$donnees = $reponse->fetchAll();
			$reponse->closeCursor(); 
			return $donnees;
		}
		
		
		public static function addUser($login,$password,$name,$surname,$adress,$mail,$role){
			$db = getDB();
			
			$data = [
				'login' => $login,
				'password' => $password,
				'name' => $name,
				'surname' => $surname,
				'adress' => $adress,
				'mail' => $mail,
				'role' => $role
			];
			
			$query = "insert into `user`(login,password,name,surname,adress,mail,role) values
			(:login, :password, :name, :surname, :adress, :mail, :role)";
			
			$response = $db->prepare($query);
			$response->execute($data);
		}
		
		
		public function isPassword($password){
			return password_verify($password,$this->password);      
		}
		
		public function getLogin(){
			return $this->login;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function getRole(){
			return $this->role;
		}
		
		public function getId_user(){
			return $this->id_user;
		}
		
		public function getName(){
			return $this->name;
		}
		
		public function getSurname(){
			return $this->surname;
		}
		
		public function getAdress(){
			return $this->adress;
		}
		
		public function getMail(){
			return $this->mail;
		}
		
		public function setRole_Name(){
			$tmpRole = Role::get(array('id_role' => $this->role));
			$this->role_name = $tmpRole->getName();
		}
		
		public function getRole_Name(){
			$this->setRole_Name();
			return $this->role_name;
		}
		
		public function setLogin($data){
			$this->login = $data;
		}
		
		public function setPassword($data){
			$this->password = $data;
		}
		
		public function setRole($data){
			$this->role = $data;
		}
		
		public function setId_user($data){
			$this->id_user = $data;
		}
		
		public function setName($data){
			$this->name = $data;
		}
		
		public function setSurname($data){
			$this->surname = $data;
		}
		
		public function setAdress($data){
			$this->adress = $data;
		}
		
		public function setMail($data){
			$this->mail = $data;
		}
		
		
	}
?>

