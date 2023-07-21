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

if(!empty($_GET['id'])) {
 
  include_once('config.php');

  $id = $_GET['id'];

  $sql = "SELECT * FROM tb_pedidos WHERE id=$id";

  $result = $conexao->query($sql);

  if($result->num_rows > 0) {

   while ($user_data = mysqli_fetch_assoc($result)) {


    
    $titulo = $user_data['titulo'];
    $categoria = $user_data['categoria'];
    $descricao = $user_data['descricao'];
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
 
    <div class="container">
      <div class="row">

        <div class="card-abrir-chamado">
          <div class="card">
            <div class="card-header">
              Editar chamado
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col">
                <form action="saveEdit.php" method="POST">
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" value="<?php echo $titulo?>" autofocus class="form-control w-50" placeholder="Título">
                  </div>

                  <div class="form-group w-50">
                    <label>Categoria</label>
                    <select name="categoria" value="<?php echo $categoria?>" class="form-control">
                      <option name="categoria">Criação Usuário</option>
                      <option name="categoria">Impressora</option>
                      <option name="categoria">Hardware</option>
                      <option name="categoria">Software</option>
                      <option name="categoria">Rede</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label>Descrição atual:</label>
                    <?php echo '<strong>' . $descricao .'</strong>'?> <br> 
                    <label> Nova descrição:</label>
                    <textarea class="form-control w-50" name="descricao" rows="3"></textarea>
                  </div>

                  <div class="row mt-5">
                    <div class="col-6">
                     <a class='btn btn-lg btn-primary' id='voltar' href='meus_chamados.php' name='voltar' type='button' data-toggle='tooltip' data-placement='right' title='Página inicial'>Voltar</a>
                      
                    </div>

                    <div class="col-6">
                      <input type="hidden" name="id"  value="<?php echo $id ?>"> 
                      <input type="submit" class="btn btn-lg btn-info w-75 " id="enviar" name="submit">
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