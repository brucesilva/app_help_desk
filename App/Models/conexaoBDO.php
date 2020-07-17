<?php 

	namespace app\models;

	class conexaoBDO{

		private $host = 'localhost';
		private $dbname = 'app_help_desk';
		private $user = 'root';
		private $senha = '';

		public function conecta(){

			try{
				$conn = new \PDO("mysql:host=$this->host;
					dbname=$this->dbname",
					"$this->user" , 
					"$this->senha"
				); 

				return $conn;
				
			}catch(PDOExecption $e){
				echo $e->getMessage();
			}
			

		} 
	}



 ?>