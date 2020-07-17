<?php 

	namespace app\models;

	class crudChamadosModel{

		private $conn;
		private $chamados;

		public function __construct($conexao, $chamados){
			$this->conn = $conexao->conecta();
			$this->chamados = $chamados;
		}

		public function read(){

		 $sql = "SELECT * FROM chamados WHERE titulo = :titulo";
		 $stmt = $this->conn->prepare($sql);
		 $stmt->bindValue(':titulo', $this->chamados->__get('titulo'));
		 $stmt->execute();

		 $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
 	
 		return $result; 
		   foreach ($result as  $value) {
		  	 echo $value->titulo. "<br>";
		  }

		}

		public function create(){
			
			$sql = "INSERT INTO chamados (titulo,categoria,descricao) values (?, ?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(1, $this->chamados->__get('titulo'));
			$stmt->bindValue(2, $this->chamados->__get('categoria'));
			$stmt->bindValue(3, $this->chamados->__get('descricao'));

			return $stmt->execute();

			//echo "O TITULO  É --> " .$this->chamados->__get('titulo'). '<br>';
			//echo "A CATEGORIA É --> " .$this->chamados->__get('categoria'). '<br>';
			//echo "A DESCRICAÇÃO É --> " .$this->chamados->__get('descricao'). '<br>';


		}

		public function update(){

		}

		public function delete(){

		}


	}

?>