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

			$sql = "SELECT l.id, l.user,c.id_titulo, c.titulo, c.descricao, c.categoria
					FROM login as l
					INNER JOIN chamados as c
					ON l.id = c.id_user WHERE l.id = :id;
					";	
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $this->chamados->__get('id'));
			//$stmt->bindValue(':id', 1);
		 	$stmt->execute();

		 	$result = $stmt->fetchAll(\PDO::FETCH_OBJ);
 	
 			return $result; 
				  
		}

		public function create(){
			
			$sql = "INSERT INTO chamados (id_user,titulo,categoria,descricao) values (?,?, ?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(1, $this->chamados->__get('id'));
			$stmt->bindValue(2, $this->chamados->__get('titulo'));
			$stmt->bindValue(3, $this->chamados->__get('categoria'));
			$stmt->bindValue(4, $this->chamados->__get('descricao'));

            //ate aqui está funcionando normal
            return $stmt->execute();
     		//use App\Models\chamadosModel;

			//$conn = new conexaoBDO();

			//$teste = read();

			echo '<pre>';
			//echo print_r($teste);
			echo '</pre>';

			//vou tentar fazer a lógica para incrementar o id_titulo pegando o último valor
 

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