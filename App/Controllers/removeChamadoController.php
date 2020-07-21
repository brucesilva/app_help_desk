<?php 
	 
	require_once('C:/xampp/htdocs/app_help_desk/vendor/autoload.php');
	

	use App\Models\conexaoBDO;
	use App\Models\chamadosModel;
	use App\Models\crudChamadosModel;

	//lógica para pegar o id_titulo e excluir dos chamados visualizados
	$id_titulo = $_GET['id_titulo']; //pegando o id do chamado

	$conn = new conexaoBDO();

	$chamadosModel = new chamadosModel(); 
	$chamadosModel->__set('id_titulo',$id_titulo);

	$crud = new crudChamadosModel($conn, $chamadosModel);
	$resul = $crud->delete();

	 

 	 if($resul > 0 ){
 		 //header('Location:C:/xampp/htdocs/app_help_desk/consultar_chamado.php');
 	 	header('Location:consultar_chamado.php');
 	 }else{
 		 echo "Não foi encontrado nenhum registro para exclusão";
 	  }



	 
 ?>