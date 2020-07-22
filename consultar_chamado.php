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
  
    //echo "O usuário logado é o ".$_SESSION['userLogado']. " e o ID é ".$_SESSION['id'];
 
    $conn = new conexaoBDO();
    $chamadosModel = new loginModel();
    $chamadosModel->__set('id', $_SESSION['id']);
    $chamadosModel->__set('perfil', $_SESSION['perfil']);

    //echo "O perfil do usuário logado é ".$_SESSION['perfil'];

    $consultar = new crudChamadosModel($conn, $chamadosModel);

    //aqui estou pegando tudo que tem no bdo
    $result = $consultar->read();

    //falta eu pegar esse valor e passar para a tela de consulta chamado
     foreach ($result as  $value) {
       //echo $value->titulo. "<br>";
        //if($value == 'bruce'){
          //echo $value->id. "<br>";
        //}

       // echo '<pre>';
       // print_r($value);
       // echo '</pre>';


       // echo $value->status;
     } 
  
?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
      <a class="navbar-brand" href="home.php">
       <!-- <img src="ancora 2.jpg" width="50" height="50" class="d-inline-block align-top" alt=""> -->
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
              Consulta de chamado -  <?= $_SESSION['userLogado']; ?> 
              <!--aqui estou formatando a data para o nosso padrão -->
             
            </div>  

            <!--parte do card do chamado --> 

            <div class="card-body" > 
              <?php foreach ($result as  $value) { ?> 
                <div class="card mb-3 bg-light" >

                  <div class="card-body" >  
                   
                    <div class="row" >

                      <div class="col-md-7" style="display: flex;" > 
                        <h5 class="card-title">    
                        <br> <?=$value->titulo ?>  
                      </h5> 
                      </div><!-- col-md-11--> 
 
                      <div class="col-md-2 justify-content" style=" text-align: right;  margin: auto; ">

                         <i class="fa fa-check-square-o fa-lg" aria-hidden="true" style="color:#00cc6a" onclick="chamadoOK(<?=$value->id_titulo ?>);"></i>

                         <i class="fa fa-pencil fa-lg" aria-hidden="true" onclick="editarChamado(<?=$value->id_titulo ?>);"></i>

                         <i class="fa fa-trash fa-lg" style="color:red" onclick="removeChamado(<?=$value->id_titulo?>);"></i> 
                      </div><!-- col-md-1--> 

                      <div class="col-md-3" style=" margin: auto; "> 
                          <strong > Data de Abertura - </strong> <?=date('d/m/Y', strtotime($value->dataChamado)) ?>
                          <strong> Horário - </strong> <?=date('H:i:s', strtotime($value->dataChamado)) ?> 
                          <br>
                          <strong> Status </strong> - <?=$value->status?> 
                       </div> <!-- col-md-3--> 

                    </div><!-- fecha row -->

                    
                      <h6 class="card-subtitle mb-2 text-muted">  <br> <?=$value->categoria ?></h6>
                      <p class="card-text">   <br> <?=$value->descricao ?></p>  
                    </div> 

                    <div class="row">
                      <div class="col-md-6" style="margin-left: 10px; margin-bottom: 5px;" >
                        <button class="btn btn-primary"> Responder chamado</button>
                      </div><!-- col-md-6--> 
                    </div><!-- fecha row -->

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


    <script type="text/javascript">
      
      //aqui pego id_titulo para ser apagado
      function removeChamado(id){
         location.href = 'removeChamadoController.php?id_titulo='+id;
       // alert("O id passado é "+id);
      }

      function editarChamado(id){
        alert("O id da tarefa é o " +id);
      }

       function chamadoOK(id){
        location.href = 'chamadoOkController.php?id_titulo='+id;
        //alert("O id da tarefa é o " +id);
      }

    </script>


  </body>
</html>