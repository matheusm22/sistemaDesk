<?php
include_once('config.php');

if (!isset($_SESSION)) {
  session_start();
}

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo para validar e recuperar dados do token
include_once 'validar_token.php';

if ($_SESSION['nivel'] != 2) {
  header("Location: erro.php");
}

// Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
if (!validarToken()) {
  // Criar a mensagem de erro e atribuir para variável global
  $_SESSION['msg'] = "<p style='color: #fff;'>Erro: Necessário realizar o login para acessar a página!</p>";

  // Redireciona o o usuário para o arquivo index.php
  header("Location: /desk/index.php");

  // Pausar o processamento da página
  exit();
}

if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM tb_pedidos WHERE  id = '$data' or categoria LIKE '%$data%'
     or situacao LIKE '%$data%' ORDER BY id DESC ";
} else {

  $sql = "SELECT * FROM tb_pedidos where situacao = 'Em atendimento' or situacao = 'Novo' ORDER BY id DESC ";
}
$result = $conexao->query($sql);

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
      width: 100px;
      position: relative;
      right: 30px;
      bottom: 80px;
    }

    .card-consultar-chamado {
      position: relative;
      right: 50px;
      bottom: 70px;
      border: 0px;
    }
    
    #titulo {
      position: relative;
      left: 450px;
      font-size: 30px;
      
    }

    #filtro {
      position: relative;
      left: 600px;
      padding: 30px;

    }

    #pesquisar {
      width: 255px;
    }

    #btn {

      position: relative;
      left: 270px;
      bottom: 38px
    }

    #voltar {
      position: relative;
      left: 10px;
      bottom: 120px;
    }

    
    table, tr, td{
               border:none !important;
               
              
        }

    body {
      overflow-x: hidden;
    }

    td>a {
      display: inline;
      width: max-content;
      margin-right: 10px;

    }

    td {
      width: 190px;
    }

    td:nth-child(8) {
      width: 350px;
    }
  
    
    .card-header {
      text-align: center;
      font-size: 24px;
    }
   
  </style>
</head>

<body>

  <?php
  require_once 'header.php';
  ?>

  <div id='filtro'>
    <input type="search" class="form-control" id="pesquisar" placeholder="Número/ Categoria/ Situação" autofocus autocomplete="on">
    <button onclick="searchData()" class="btn btn-lg btn-primary" id="btn">Buscar</button>
  </div>

  <?php

  switch ($_SESSION['nivel']) {

    case '1':
      echo " <a class='btn btn-lg btn-primary' id='voltar' href='home.php' name='voltar' type='button' data-toggle='tooltip' data-placement='right' title='Página inicial'>Voltar</a>";
      break;

    case '2':

      echo " <a class='btn btn-lg btn-primary' id='voltar' href='admin.php' name='voltar' type='button' data-toggle='tooltip' data-placement='right' title='Página inicial'>Voltar</a>";
      break;
  }

  ?>

  <div class="container">
    <div class="row">

      <div class="card-consultar-chamado">
             <p id="titulo"><strong>Consulta de chamado<strong></p>
          </div>

          <table class="table" >
            <thead>
              <tr>
                <th>#</th>
                <th>Solicitante</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Responsável</th>
                <th>Resposta</th>
                <th>Situação</th>
                <th>Atualizado em</th>
                <th>Enviado em</th>
                <th>Ações</th>
              </tr>
            </thead>
            <?php

            $usuario_logado = $_SESSION['usuario'];
            // print_r($usuario);

            if ($result->num_rows == 0) {
              echo '<td colspan="10">';
              echo "Nenhuma solicitação pendente!!!</td>";
            }

            while ($user_data = mysqli_fetch_assoc($result)) {

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
              echo "<td>" . $user_data['id'] . "</td>";
              echo "<td>" . $user_data['usuario'] . "</td>";
              echo "<td>" . $user_data['titulo'] . "</td>";
              echo "<td>" . $user_data['categoria'] . "</td>";
              
              echo "<td>" . $user_data['responsavel'] . "</td>";
              if($user_data['respostas'] == "" && $user_data['responsavel'] == $usuario_logado) {
                  echo "<td><a class='btn btn-primary' href='resposta.php?id=$user_data[id]'>Responder</a></td>";;
              } else {
                  echo "<td><a class='btn btn-primary' href='respondido.php?id=$user_data[id]'>ver resposta</a></td>";
              }
              echo "<td>" . $user_data['situacao'] . "</td>";
              echo "<td>" . $data_atualiza . $space . substr($hora1, 0, 5) . "</td>";
              echo "<td>" . $data_criacao . $space . substr($hora, 0, 5) . "</td>";

              if ($user_data['situacao'] == "Novo" && $user_data['usuario'] != $usuario_logado) {
                echo "<td><a class='btn btn-lg btn-warning'  href='iniciar.php?id=$user_data[id]'>Iniciar</a></td>";
              } 
               if ( $user_data['usuario'] == $usuario_logado && $user_data['situacao'] != "Em Atendimento"
                    && $user_data['situacao'] != "Finalizado"){
                echo "<td><a class='btn btn-lg btn-info' href='edita.php?id=$user_data[id]'>Editar</a></td>";
              }

              if ($usuario_logado == $user_data['responsavel']) {
                if ($user_data['situacao'] == "Em Atendimento") {

                     echo "<td><a  data-toggle='tooltip' data-placement='right' title='Finalizar' class='btn btn-lg btn-success' href='confirm.php?id=$user_data[id]'>Finalizar</a></td>"; 
                }
              } else if($user_data['situacao'] != "Novo"){
                echo "<td><p class='btn  btn-secondary'>". $user_data['responsavel']."</p></td>";
              }

              if ($user_data['situacao'] == "Finalizado") {
                echo "<td><p class='btn btn-lg btn-success'>Concluído</p></td>";
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
  <script>
    var search = document.getElementById('pesquisar');

    function searchData() {
      window.location = 'consultar_chamado.php?search=' + search.value;
    }

    search.addEventListener("keydown", function(event) {
      if (event.key === "Enter") {
        searchData();
      }
    });
  </script>
</body>

</html>