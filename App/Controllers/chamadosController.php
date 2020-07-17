<?php 
	session_start();
	require_once('../../vendor/autoload.php');
	use App\Models\conexaoBDO;
	use App\Models\chamadosModel;
	use App\Models\crudChamadosModel;


	//aqui estou verificando se todos os campos estão preenchidos
	//mesmo que no meu form tenha um required, se falhar ele faz essa autenticação
	/*
 	if(isset($_POST['titulo']) && $_POST['titulo'] == '' && $_POST['descricao'] == ''){
 		header('Location:../../abrir_chamado.php?campo=vazio');
 	} 
	*/
 	//Pegando os dados da página abrir chamado
 	$id = $_SESSION['id'];
 	$titulo = $_POST['titulo'];
 	$categoria = $_POST['categoria'];
 	$descricao = $_POST['descricao'];

 	echo $_SESSION['id'];

  

 	if(isset($_POST['titulo']) && $_POST['titulo'] == '' && $_POST['descricao'] == '' ) { 
 		header('Location:../../abrir_chamado.php?campo=vazio');  
 	} 
 
 	//fazer a lógica para enviar os dados recebido para gravar no BD
 
 	//instanciando as classes que vou usar
 	$conn = new conexaoBDO();
 	
 	$chamadosModel = new chamadosModel();
 	//passando os dados para a classe chamadosModel
 	$chamadosModel->__set('id', $id);
 	$chamadosModel->__set('titulo', $titulo);
 	$chamadosModel->__set('categoria', $categoria);
 	$chamadosModel->__set('descricao', $descricao);

 	$insereChamadosModel = new crudChamadosModel($conn, $chamadosModel);
 	$resul = $insereChamadosModel->create();

 	if($resul > 0){
 		header('Location:../../abrir_chamado.php?chamado=ok');
 	}else{
 		header('Location:../../abrir_chamado.php?chamado=erro');
 	}
 

?>