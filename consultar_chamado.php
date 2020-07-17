<?php 
 
 require 'vendor/autoload.php';
 session_start(); 
 
 //echo $value->titulo;
    
  use App\Models\conexaoBDO;
  use App\Models\chamadosModel;
  use App\Models\crudChamadosModel;
  use App\Models\loginModel;
   

     
   if(!isset($_SESSION['user'])){ 
    header('Location:index.php?campo=vazio');
  } 
  
    echo "O usuário logado é o ".$_SESSION['userLogado']. " e o ID é ".$_SESSION['id'];
 
    $conn = new conexaoBDO();
    $chamadosModel = new loginModel();
    $chamadosModel->__set('id', $_SESSION['id']);

    $consultar = new crudChamadosModel($conn, $chamadosModel);

    //aqui estou pegando tudo que tem no bdo
    $result = $consultar->read();

    //falta eu pegar esse valor e passar para a tela de consulta chamado
     foreach ($result as  $value) {
       //echo $value->titulo. "<br>";
        //if($value == 'bruce'){
          //echo $value->id. "<br>";
        //}
     } 
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>

       <nav class="navbar navbar-dark bg-dark">
          <a class="navbar-brand" href="index.php">Sair</a>  
        </nav> 
        
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>  

            <!--parte do card do chamado -->
          

            <div class="card-body"> 
              <?php foreach ($result as  $value) { ?> 
                <div class="card mb-3 bg-light">
                  <div class="card-body"> 
                    <h5 class="card-title">   <br> <?=$value->titulo ?> </h5>  
                    <h6 class="card-subtitle mb-2 text-muted">  <br> <?=$value->categoria ?></h6>
                    <p class="card-text">   <br> <?=$value->descricao ?></p> 
                  </div>
                </div>  
              <!--Fim da parte do card do chamado --> 
               <?php }?>

              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" type="submit" href="home.php"> Voltar </a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>