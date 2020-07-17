<?php 
	namespace App\Controllers;	 
	  
	use App\Models\conexaoBDO;
	use App\Models\chamadosModel;
	use App\Models\crudChamadosModel;

	 $user ='Bruce Barros Silva asdf';


	//header('Location:../../consultar_chamado.php'); */
 	/* Aqui vou fazer a lógica que traz todos os chamados 
 	if(isset($_GET['consultar']) && $_GET['consultar'] == 'chamados'){
 		 
 		$conn = new conexaoBDO();
 		$chamadosModel = new chamadosModel();

 		$consultar = new crudChamadosModel($conn, $chamadosModel);

 		//aqui estou pegando tudo que tem no bdo
 		$result = $consultar->read();

 		//header('Location:../../consultar_chamado.php');

 		//falta eu pegar esse valor e passar para a tela de consulta chamado
 		 foreach ($result as  $value) {
		   echo $value->titulo. "<br>";
		 }

 	}
 	*/
		

 ?>