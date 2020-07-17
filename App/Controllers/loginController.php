<?php 
	
	session_start();

	require_once("../../vendor/autoload.php");
	use App\Models\loginModel;
	use App\Models\conexaoBDO;
	use App\Models\validaLogin;


	echo '<pre>';
	print_r($_POST);
	echo '</pre>';

	
	//Aqui estou verificando se tem algo no POST, se não tiver eu redireciono o mesmo
	if(isset($_POST['user']) && $_POST['user'] == '' && $_POST['senha'] == ''){
		header('Location:../../index.php?campo=vazio');
	}else{

		//Pegar os campos de usuário e senha e enviar para a classe validaLogin verificar no banco se existe
		$user = $_POST['user'];
		$senha = $_POST['senha'];

		//echo "usuario " . $user. "e senha " .$senha;

		$login = new loginModel();
		$login->__set('user', $user);
		$login->__set('senha', $senha);

		//echo "usuario " . $login->__get('user'). "e senhaa " .$login->__get('senha');

		$conn = new conexaoBDO(); 
		$validaLogin = new validaLogin($conn, $login);
		$stmt = $validaLogin->read();

		$resul = $stmt;
	     
		if($resul >0){
			$_SESSION['user'] = 'true';
			$_SESSION['userLogado'] = $user;
			header('Location:../../home.php');
		}else{
			header('Location:../../index.php?login=false');
		}
		 
	}

 ?>