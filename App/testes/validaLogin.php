<?php 
	namespace app\models;
	  
	class validaLogin{

		private $conn;
		private $login;

		public function __construct($conexao, $login){
			$this->conn = $conexao->conecta();
			$this->login = $login;
		}
 
		public function read(){

			$sql = "SELECT * FROM login WHERE user =:user and senha = :senha";
			$stmt = $this->conn->prepare($sql); 
			$stmt->bindvalue(':user', $this->login->__get('user'));
			$stmt->bindvalue(':senha',$this->login->__get('senha'));
  			  
		    return $stmt->execute();    
  
		}

	}



 ?>