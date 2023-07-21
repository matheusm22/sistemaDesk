<html>

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>

    .card-abrir-chamado {
      padding: 50px 0 0 0;
      width: 50%;
      margin: 0 auto;
    }

    .form-group {
      position: relative;
      left: 120px;

    }

    p {
      position: relative;
      left: 550px;
      padding: 30px;
    }

    #enviar {
      position: relative;
      right: 110px;

    }
  </style>
</head>

<body>

  <?php
  require_once 'header.php';

  include_once('config.php');
  
  if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
  // Limpara o buffer de redirecionamento
  ob_start();

  // Incluir o arquivo para validar e recuperar dados do token
  include_once 'validar_token.php';

  // Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
  if (!validarToken()) {
    // Criar a mensagem de erro e atribuir para variável global
    $_SESSION['msg'] = "<p style='color: #fff;'>Erro: Necessário realizar o login para acessar a página!</p>";

    // Redireciona o o usuário para o arquivo index.php
    header("Location: /desk/index.php");

    // Pausar o processamento da página
    exit();
  }

  if (isset($_POST['submit'])) {
    
    $usuario =  $_SESSION['usuario'];
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    

    if (empty($titulo) || empty($descricao)) {
        
      echo "<p id='p' style='color: red; font-size: 22px'>Ops! houve algum erro sua solicitação não foi enviada! 😫</p>";

          echo "<script>setTimeout(function() {
          $('#p').fadeOut('fast');
        }, 2000);</script>";

    } else {
      
      $usuario_logado =  $_SESSION['usuario'];
      $nomes = array('matheus', 'gustavo', 'matheus_cichon', 'kaio_costa');
      $rand_keys = array_rand($nomes, 4);
      $responsavel = $nomes[$rand_keys[rand(0, 3)]];

      if($responsavel != $usuario) { 

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql = mysqli_query($conexao, "INSERT INTO tb_pedidos(usuario, titulo, categoria, descricao, responsavel, situacao)
     VALUES ('$usuario_logado','$titulo','$categoria','$descricao','$responsavel', 'Novo')");

     $sqlSelect = "SELECT * FROM tb_pedidos where titulo = '$titulo' and categoria = '$categoria' 
     and descricao = '$descricao' order by id limit 1";

     $result = $conexao->query($sqlSelect);
      
        if ($result-> num_rows > 0) {
            echo "<p id='p' style='color: green; font-size: 22px'>Uhul! Você acabou de enviar uma solicitação! 😍</p>";

            echo "<script>setTimeout(function() {
            $('#p').fadeOut('fast');
          }, 2000);</script>";
        
        } 
      }
      }
  }


    // VERIFICAR SE ESTA ENVIANDO CORRETAMENTE EM CASO DE ERRO!
    //  print_r('titulo : ' . $titulo);
    //  print_r('<br/>' );
    //  print_r('cat : ' . $categoria);
    //  print_r('<br/>' );
    //  print_r('desc : ' . $descricao);

   
  ?>
  <form action="abrir_chamado.php" method="POST">
    <div class="container">
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Abertura de chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">

                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" autofocus class="form-control w-50" placeholder="Título">
                  </div>

                  <div class="form-group w-50">
                    <label>Categoria</label>
                    <select name="categoria" class="form-control">
                      <option name="categoria">Criação Usuário</option>
                      <option name="categoria">Impressora</option>
                      <option name="categoria">Hardware</option>
                      <option name="categoria">Software</option>
                      <option name="categoria">Rede</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Descrição</label>
                    <textarea class="form-control w-50" name="descricao" rows="3"></textarea>
                  </div>

                  <div class="row mt-5">
                    <div class="col-6">
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
                    </div>

                    <div class="col-6">
                      <input class="btn btn-lg btn-success w-75 " id="enviar" name="submit" type="submit">
                    </div>
                  </div>
  </form>

  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>