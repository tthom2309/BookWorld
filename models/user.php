<?php
	require_once 'database.php';
	//require_once 'role.php';
	
	class User {
		public $id_user;
		public $login;
		public $password;
		public $name;
		public $surname;
		public $adress;
		public $mail;
		public $role;
		
		private $connection;
		

		public function __construct($data=null){
        $this->connection = getDB();
        if (is_array($data)) {
            $this->login = $data['login'];
            $this->password = $data['password'];
        }
        //if ($this->role_id) $this->role = Role::get(array('id' => $this->role_id));
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
			}
			return $data;
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
			return $this->Adress;
		}
		
		public function getMail(){
			return $this->mail;
		}
		
		
		public function setLogin($data){
			$this->login = $data;
		}
		
		public function setPassword($data){
			$this->password = $data;
		}
		
		public function setRole($data){
			return $this->role = $data;
		}
		
		public function setId_user($data){
			return $this->id_user = $data;
		}
		
		public function setName($data){
			return $this->name = $data;
		}
		
		public function setSurname($data){
			return $this->surname = $data;
		}
		
		public function setAdress($data){
			return $this->Adress = $data;
		}
		
		public function setMail($data){
			return $this->mail = $data;
		}
	}
?>

