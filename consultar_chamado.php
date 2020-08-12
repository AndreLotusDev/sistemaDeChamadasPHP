<?php require_once "validate.php" ; ?>

<?php 
  //Abertura de arquivos 
  $archive = fopen("archive.hd", "r");

  // Criação do array para as chamadasas
  $all_calls = array();

  // Leitura do arquivo
  while(!feof($archive))
  {
    // Pega cada linha do arquivo de texto
    $temp_register = fgets($archive);
    $all_calls[] = $temp_register;
  }

  // echo "<pre>";
  // print_r($all_calls);
  // echo "</pre>";
  // Fecha o arquivo
  fclose($archive)
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
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="logoff.php">Sair</a> 
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <!-- Card de chamada -->
            <?php foreach($all_calls as $call) { ?>
              <!-- Garante que cada parte do texto seja dividida e colocada no seu devido lugar -->
              <?php 
                $value_call = explode('#', $call) ;

                if($_SESSION['admin_or_user'] == 2)
                {
                  if($_SESSION['id'] != $value_call[0])
                  {
                    continue;
                  }
                }

                if(count($value_call) < 3)
                {
                  continue;
                }
              ?>
              <div class="card-body">
              
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $value_call[1];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $value_call[2];?></h6>
                    <p class="card-text"><?php echo $value_call[3];?></p>

                  </div>
                </div>
              </div>
            <?php }; ?>

              <div class="row mt-5 mb-3 ml-3">
                <div class="col-6">
                  <a href="home.php"><button class="btn btn-lg btn-warning btn-block" type="submit">Voltar</button></a>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>