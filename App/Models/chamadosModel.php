<?php 
	namespace app\models;

	class chamadosModel{
		private $id;
		private $titulo;
		private $categoria;
		private $descricao;
		private $dataChamado;
		private $id_status;

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		public function __get($atributo){
			return $this->$atributo;
		}
	}



 ?>