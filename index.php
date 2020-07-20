<?php 
  
  require_once("vendor/autoload.php");
  use App\Models\conexaoBDO;
  use App\Models\loginModel;

  session_start();

  //sempre que voltar no index vou destruir as sessões
  session_destroy();
 
 ?>

<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-login {
        padding: 120px 0 0 0;
        width: 350px;
        margin: 0 auto; /*aqui deixa centralizado */
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"> 
        App Help Desk
      </a>
    </nav> 

    <div class="container" >    
      <div class="row">

        <div class="card-login" >
          
          <div class="card">
            <div class="card-header">
              Login
            </div> 
             
            <div class="card-body">
              <form action="App\Controllers\loginController.php" method="post"> 

                <div class="form-group">
                  <input name="user" type="input" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                </div>
                <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button> 
               
               <?php if(isset($_GET['campo']) && $_GET['campo'] == 'vazio'){?> 
                 <div class="text-danger">
                    @Campos precisam ser preenchidos
                 </div>
              <?php }?>
              
              <?php if(isset($_GET['login']) && $_GET['login'] == 'false'){?> 
                 <div class="text-danger">
                    @Login ou senha errada
                 </div>
              <?php }?>

              </form>
            </div>
            
          </div>
        </div>
    </div>
  </body>
</html>