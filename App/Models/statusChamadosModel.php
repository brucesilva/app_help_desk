<?php 

	namespace App\Models;

	class statusChamadosModel{

		private $id_status;
		private $status;


		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function __get($atributo){
			return $this->$atributo;
		}
 

	}



 ?>