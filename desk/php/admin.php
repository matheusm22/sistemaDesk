<?php 
 
// SESSÃO RESPONSÁVEL PELO LOGIN
if(!isset($_SESSION)) 
  { 
      session_start(); 
  } 
// Limpara o buffer de redirecionamento
ob_start();

// Incluir o arquivo para validar e recuperar dados do token
include_once 'validar_token.php';

if ($_SESSION['nivel'] != 2) {

    // Redireciona o o usuário para o arquivo index.php
    header("Location: erro.php");

}
// Chamar a função validar o token, se a função retornar FALSE significa que o token é inválido e acessa o IF
if(!validarToken()){
    // Criar a mensagem de erro e atribuir para variável global
    $_SESSION['msg'] = "<p style='color: #fff;'>Erro: Necessário realizar o login para acessar a página!</p>";

    // Redireciona o o usuário para o arquivo index.php
    header("Location: /desk/index.php");

    // Pausar o processamento da página
    exit();
 }

 


?>


<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>
    <link rel="icon" href="/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-home {
        padding: 30px 0 0 0;
        width: 50%;
        margin: 0 auto;
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
    <div class="container">    
      <div class="row">

        <div class="card-home">
          <div class="card">
            <div class="card-header">
              Menu
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-6 d-flex justify-content-center">
                  <a href='../../desk/php/abrir_chamado.php' class='btn btn-info'>Abrir chamado</a>
                </div>
                <div class="col-6 d-flex justify-content-center">
                 <a href="../../desk/php/consultar_chamado.php" class="btn btn-primary">Meus Atendimentos</a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
   
  </body>
</html>