<?php 

session_start();

// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo para validar e recuperar dados do token
include_once 'validar_token.php';

// Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
if(!validarToken()){
    // Criar a mensagem de erro e atribuir para variável global
    $_SESSION['msg'] = "<p style='color: #fff;'>Erro: Necessário realizar o login para acessar a página!</p>";

    // Redireciona o o usuário para o arquivo index.php
    header("Location: /desk/index.php");

    // Pausar o processamento da página
    exit();
 }


 if(isset($_POST['submit'])) 
 {
 include_once('config.php');

 $titulo = $_POST['titulo'];
 $categoria = $_POST['categoria'];
 $descricao = $_POST['descricao'];

$result = mysqli_query($conexao, "INSERT INTO pedidos(titulo, categoria, descricao, situacao)
  VALUES ('$titulo','$categoria','$descricao', 'Novo')");

 echo "<p id='p' style='color: green;'>Solicitação enviada!</p>";

  echo "<script>setTimeout(function() {
    $('#p').fadeOut('fast');
  }, 3000);</script>";

// VERIFICAR SE ESTA ENVIANDO CORRETAMENTE EM CASO DE ERRO!
//  print_r('titulo : ' . $titulo);
//  print_r('<br/>' );
//  print_r('cat : ' . $categoria);
//  print_r('<br/>' );
//  print_r('desc : ' . $descricao);

 }
?>
<html>
  <head>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-abrir-chamado {
        padding: 30px 0 0 0;
        width: 50%;
        margin: 0 auto;
      }

      #voltar {
        border: none;
      }
    </style>
  </head>

  <body>

  <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="home.php">
        <img src="/desk/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
    </nav>

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
                      <input type="text" name="titulo" class="form-control" placeholder="Título" required>
                    </div>
                    
                    <div class="form-group">
                      <label required>Categoria</label>
                        <select name="categoria" class="form-control">
                        <option name="categoria" >Criação Usuário</option>
                        <option name="categoria" >Impressora</option>
                        <option name="categoria" >Hardware</option>
                        <option name="categoria" >Software</option>
                        <option name="categoria" >Rede</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Descrição</label>
                      <textarea class="form-control" name="descricao" rows="3"  required></textarea>
                      </div>

                    <div class="row mt-5">
                      <div class="col-6">
                      <a class="btn btn-lg btn-outline-primary" id="voltar" href="admin.php" name="voltar" type="button">Voltar</a>
                      </div>

                      <div class="col-6">
                        <input class="btn btn-lg btn-success w-75 " name="submit" type="submit">
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