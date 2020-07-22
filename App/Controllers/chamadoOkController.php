<?php 
	
	require_once('C:/xampp/htdocs/app_help_desk/vendor/autoload.php');
	 

	use App\Models\conexaoBDO;
	use App\Models\chamadosModel;
	use App\Models\crudChamadosModel;


 	
 	//pegado o id_titulo 
 	$id_titulo = $_GET['id_titulo'];

	//enviar o id_titulo para fazer o update para status finalizado
 	$conn = new conexaoBDO();

 	$chamados = new chamadosModel();
 	$chamados->__set('id', $id_titulo);

 	//echo "O id do titulo é ".$chamados->__get('id');
  
 	$crud = new crudChamadosModel($conn, $chamados); 
 	$resul = $crud->update();
	 
	//if($resul > 0){
		//header('Location:consultar_chamados.php');
		//header('Location:C:/xampp/htdocs/app_help_desk/consultar_chamado.php');
	//} 

 ?>