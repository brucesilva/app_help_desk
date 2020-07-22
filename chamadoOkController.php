<?php 
	
	require_once 'App\Controllers\chamadoOkController.php';

	//aqui estou pegando o valor do retorno do UPDATE no BDO

	if($resul > 0 ){
		header('Location:consultar_chamado.php');
	}
 

?>