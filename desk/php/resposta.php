<html>

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
     body{
      overflow-x: hidden;
     } 

    .card-abrir-chamado {
      padding: 30px 0 0 0;
      width: 70%;
      margin: 0 auto;
    }

    .form-group {
      position: relative;
      left: 120px;
    }

    #categoria {
      position: relative;
      bottom: 40px;
    }


    #enviar {
      position: relative;
      right: 110px;
    }

    .card-header {
      text-align: center;
      font-size: 24px;
    }

    #resposta_titulo{

      font-size: 20px;

    }

    .p {
      padding: 10px;
      text-align: center;
      font-size: 20px;
    }

    .solicitante {
      font-size: 18px;
      position: relative;
      left: 530px;
      bottom: 40px;
    }

    .titulos{
      font-size: 18px;
    }

    .data{
      font-size: 14px;
    }

    .respostas {
      font-size: 20px;
    }

    #categoria {
      position: relative;
      bottom: 50px;
    }
    #descricao {
      position: relative;
      bottom: 50px;
    }

  </style>
</head>

<body>

  <?php
  require_once 'header.php';

  include_once('config.php');

  if (!isset($_SESSION)) {
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


  if (!empty($_GET['id'])) {

    include_once('config.php');

    $id = $_GET['id'];

    $sql = "SELECT * FROM tb_pedidos WHERE id=$id";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {

      while ($user_data = mysqli_fetch_assoc($result)) {

        $titulo = $user_data['titulo'];
        $categoria = $user_data['categoria'];
        $descricao = $user_data['descricao'];
        $responsavel = $user_data['responsavel'];
        $respostas_resp = $user_data['respostas_resp'];
        $respostas_soli = $user_data['respostas_soli'];
        $solicitante = $user_data['usuario'];
        $usuario_logado = $_SESSION['usuario'];
        $data = $user_data['dta_atualizacao'];

      }
    }
  }

  if (isset($_POST['responder'])) {

    $id = $_POST['id'];

    $select = "SELECT * FROM tb_pedidos WHERE id='$id'";
    
    $result1 = $conexao->query($select);

    
    if ($result1->num_rows > 0) {

    while ($user_data = mysqli_fetch_assoc($result1)) {

     $id = $_POST['id'];
     $resposta = $_POST['resposta'];
     $usuario_logado = $_SESSION['usuario'];
     $solicitante = $user_data['usuario'];  
     $responsavel = $user_data['responsavel'];
     $situacao = $user_data['situacao'];   

    
     if($usuario_logado == $solicitante && $resposta != '') {
        
        $sqlResp = "UPDATE tb_pedidos SET respostas_soli = '$resposta' where id = '$id' ";
        $result = $conexao->query($sqlResp);  

         echo  "<p class='p' style='color: green;'>Resposta enviada!</p>";
         echo "<script>setTimeout(function() {
          $('.p').fadeOut('fast');
        }, 3000);</script>";

          header("location:resposta.php?&id={$id}");
    } 

    if($usuario_logado == $responsavel && $resposta != '') {
        
        $sqlResp = "UPDATE tb_pedidos SET respostas_resp = '$resposta' where id = '$id' ";
        $result = $conexao->query($sqlResp);

         echo  "<p class='p' style='color: green;'>Resposta enviada!</p>";
         echo "<script>setTimeout(function() {
          $('.p').fadeOut('fast');
        }, 3000);</script>";

        header("location:resposta.php?&id={$id}");
 
    } 

    if($usuario_logado == $responsavel && $situacao == 'Novo' && $resposta != '') {
    
        $sqlResp = "UPDATE tb_pedidos SET respostas_resp = '$resposta', situacao ='Em Atendimento' where id = '$id' ";
        $result = $conexao->query($sqlResp);

          echo  "<p class='p' style='color: green;'>Resposta enviada!</p>";
          echo "<script> setTimeout(function() {
                      window.location.reload(1);
                    }, 1500); ;</script>";
          
          header("location:resposta.php?&id={$id}");           
            
    } else {
      echo  "<p class='p' style='color: red;'>Por favor envie uma resposta!</p>";
      echo "<script>setTimeout(function() {
       $('.p').fadeOut('fast');
     }, 3000);</script>";
    }
  
    $id = $_POST['id'];
    $resposta = $_POST['resposta'];
    $usuario_logado = $_SESSION['usuario'];
    $solicitante = $user_data['usuario'];
}    
  }
}
 // TESTES
 // print_r($resposta);
// print_r($id);

  // // VERIFICAR SE ESTA ENVIANDO CORRETAMENTE EM CASO DE ERRO!
  //  print_r('titulo : ' . $titulo);
  //  print_r('<br/>' );
  //  print_r('cat : ' . $categoria);
  //  print_r('<br/>' );
  //  print_r('desc : ' . $descricao);

  ?>

  <div class="container">
    <div class="row">

      <div class="card-abrir-chamado">
        <div class="card">
          <?php 
          if($solicitante == $usuario_logado || $responsavel == $usuario_logado){
          echo "
          <div class='card-header'>
            Responder chamado
          </div>";
          } else {
            echo "
            <div class='card-header'>
              Respostas
            </div>";
          }
          ?>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Título:</label>
                    <?php echo"<strong>$titulo</strong>";?>
                  </div>
                  <div class="solicitante">
                  <?php 
                   echo "<span>Solicitante: <strong>$solicitante</strong></span>";
                   echo "<br>";
                   echo "<span>Número da solicitação: <strong>$id</strong></span>";
                  ?>
                  </div>
                  <div class="form-group w-50" id="categoria">
                    <label>Categoria:</label>
                    <?php echo "<strong>$categoria</strong>"?>
                     
                  </div>

                  <div class="form-group" id="descricao">
                    <label>Descrição atual:</label>
                    <?php echo "<strong>$descricao</strong>";
                          echo "<br>";
                       
                      $data = explode(' ', $data);

                      $hora = $data[1];

                      $space = '  ';

                      $datas = explode('-',  $data[0]);

                      $datas = array_reverse($datas);

                      $datas = implode('/', $datas);

                    if ($respostas_resp != null) {
                          echo "<br>";
                          echo "<span id='resposta_titulo'><strong>Respostas</strong></span>";
                          echo "<br>";
                          echo "<span class='titulos'>Responsável $responsavel</label>";
                          echo "<br>";
                          echo "<span class='data'>$space $datas $space " . substr($hora, 0, 5)."</span>";
                          echo "<br>";
                          echo "<span class='respostas'><strong>$respostas_resp</strong></span>";
                          echo "<br>";
                          echo "<br>";
                    }
                    
                    if ($respostas_soli != null) {
                      echo "<span class='titulos'>Solicitante $solicitante</span>";
                      echo "<br>";
                      echo "<span class='data'>$space $datas $space " . substr($hora, 0, 5)."</span>";
                      echo "<br>";
                      echo "<span class='respostas'><strong>$respostas_soli</strong></span>";
                      echo "<br>";
                      echo "<br>";
                    }

                    if($usuario_logado == $solicitante || $usuario_logado == $responsavel) {
                      echo " <span>Enviar Resposta:</span>
                             <textarea class='form-control w-50' name='resposta' rows='3' required></textarea>
                             </div>";
                    }

                    
                    ?>

                    <div class="row mt-5">
                      <div class="col-6">
                        <?php
                           $nivel = $_SESSION['nivel'];
              
                        if ($nivel == 2) {

                          echo "<a class='btn btn-lg btn-primary' id='voltar' href='consultar_chamado.php' name='voltar' type='button' data-toggle='tooltip' data-placement='right' title='Consultar Chamado'>Voltar</a>";
                        } else {

                          echo "<a class='btn btn-lg btn-primary' id='voltar' href='meus_chamados.php' name='voltar' type='button' data-toggle='tooltip' data-placement='right' title='Meus Chamados'>Voltar</a>";
                        }
                        ?>

                      </div>

                      <div class="col-6">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="submit" class="btn btn-lg btn-info w-75 " id="enviar"  name="responder">
                      </div>
                    </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</body>

</html>