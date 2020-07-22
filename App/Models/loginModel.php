<?php 
	namespace app\models;

	class loginModel{
		private $id; 
		private $user;
		private $senha;
		private $perfil;

		public function __set($atributo, $valor){
			$this->$atributo = $valor; 
		}

		public function __get($atributo){
			return $this->$atributo;
		} 


	} 

 ?>