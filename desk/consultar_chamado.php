<?php 
include_once('config.php');

$sqlselect = "SELECT * FROM pedidos where situacao = 'Em atendimento' or situacao = 'Novo' ORDER BY id ASC";

$result = $conexao->query($sqlselect);


?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>

        .table {
            background-color: aliceblue;
            margin: auto;
            text-align: center;
        }

      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
      
      td > a {
        display: inline;
        width:max-content;
        margin-right: 10px;

      }
      td{
        width: 190px;
      }
      td:nth-child(8){
        width: 350px;
      }
      .card-header {
        text-align: center;
        font-size: 24px;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="admin.php">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Descrição</th> 
                    <th>Situação</th> 
                    <th>Atualizado em</th>
                    <th>Enviado em</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <?php
                   if($result->num_rows == 0)
                   {
                       echo '<td colspan="8">';
                       echo "Nenhuma solicitação pendente!!!</td>";
                   }  
                   
                while($user_data = mysqli_fetch_assoc($result)) {

                  $data_atua = explode(' ', $user_data['dta_atualizacao']); 
                          
                  $hora1 = $data_atua[1]; 
                  //Espaço na hora de imprimir
                  $space = ' '; 
                  
                  //'2023-05-26'  Transforma a data em um array também 
                  $data_atualiza = explode('-',  $data_atua[0]);
                  //Inverte o array que está [2023,05,26] para [26,05,2023] 
                  $data_atualiza = array_reverse($data_atualiza); 
                  // Junta o array com o delimitador / para uma string 
                  $data_atualiza = implode('/', $data_atualiza);

                   // Separa as duas partes em um array, explode separada em um array toda vez que encontrar a ocorrencia, no caso ali espaço
                    $data = explode(' ', $user_data['dta_criacao']); 
                    
                    $hora = $data[1]; 
                    //Espaço na hora de imprimir
                    $space = ' '; 
                    
                    //'2023-05-26'  Transforma a data em um array também 
                    $data_criacao = explode('-',  $data[0]);
                    //Inverte o array que está [2023,05,26] para [26,05,2023] 
                    $data_criacao = array_reverse($data_criacao); 
                    // Junta o array com o delimitador / para uma string 
                    $data_criacao = implode('/', $data_criacao); 

                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['titulo']."</td>";
                    echo "<td>".$user_data['categoria']."</td>";
                    echo "<td>".$user_data['descricao']."</td>";
                    echo "<td>".$user_data['situacao']."</td>";
                    echo "<td>". $data_atualiza .$space . substr($hora1, 0, 5) ."</td>";
                    echo "<td>". $data_criacao .$space . substr($hora, 0, 5) ."</td>";

                    if ($user_data['situacao'] == "Novo") {
                    echo "<td><a class='btn btn-warning' href='iniciar.php?id=$user_data[id]'>Iniciar</a></td>";
                    }
                  
                    if ($user_data['situacao'] == "Em atendimento") {
                    echo "<td><a class='btn btn-success' href='finalizar.php?id=$user_data[id]'>Finalizar</a></td>";
                    }
                  }
    
    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>