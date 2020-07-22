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
			 
			//se o perfil for administrador vai poder olhar todos os chamados
			$perfil = $this->chamados->__get('perfil');

			if($perfil == 'admin'){

			$sql = "SELECT  c.id_user, l.user, c.id_titulo, c.titulo, c.categoria, c.descricao, c.dataChamado,  st.status
					FROM chamados c
					INNER JOIN login l ON c.id_user = l.id
					INNER JOIN statuschamados as st 
					ON c.id_status = st.id_status
					ORDER BY c.id_titulo DESC"; 
			 
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $this->chamados->__get('id'));
			//$stmt->bindValue(':id', 1);
			$stmt->execute();

			$result = $stmt->fetchAll(\PDO::FETCH_OBJ);


			} else { //se o perfil não for administrador só pode olhar o seu
 	 
			$sql = "SELECT  c.id_user, l.user, c.id_titulo, c.titulo, c.categoria, c.descricao, c.dataChamado,  st.status
					FROM login l
						INNER JOIN chamados c 
							ON l.id = c.id_user
								
						INNER JOIN statuschamados as st 
							ON c.id_status = st.id_status

							WHERE l.id = :id

					ORDER BY c.id_titulo DESC"; 

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id', $this->chamados->__get('id'));
			//$stmt->bindValue(':id', 1);
			$stmt->execute();

			$result = $stmt->fetchAll(\PDO::FETCH_OBJ);
			


			}

		 		return $result; 	
				  
		}

		public function create(){
			//aqui estou fazendo um select para pegar os dados da tabela chamados e depois
			//pegar o resultado do id_titulo para incrementar
			$sql = "SELECT * FROM chamados";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$resul = $stmt->FetchAll(\PDO::FETCH_OBJ); 

			foreach ($resul as $chamados) {
				# code...
			}

			$soma = $chamados->id_titulo +1;
			
			//$sql = "INSERT INTO chamados (id_user,titulo,categoria,descricao) values (?,?, ?,?)";
			$sql = "INSERT INTO chamados (id_user,id_titulo,titulo,categoria,descricao, id_status) values (?,?,?, ?,?,?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(1, $this->chamados->__get('id'));
			$stmt->bindValue(2, $soma);
			$stmt->bindValue(3, $this->chamados->__get('titulo'));
			$stmt->bindValue(4, $this->chamados->__get('categoria'));
			$stmt->bindValue(5, $this->chamados->__get('descricao'));
			$stmt->bindValue(6, 1);

            //ate aqui está funcionando normal
            return $stmt->execute();  

		} 

		public function update(){

			$sql = "UPDATE chamados SET id_status = :id_status WHERE id_titulo = :id_titulo";

			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id_status' , 3);
			$stmt->bindValue(':id_titulo' , $this->chamados->__get('id'));
			
			return $stmt->execute(); 
			
		}

		public function delete(){

			$sql = "DELETE FROM chamados WHERE id_titulo = :id_titulo";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindValue(':id_titulo', $this->chamados->__get('id_titulo'));
			$stmt->execute();

			return $stmt->rowCount();

		}


	}

?>