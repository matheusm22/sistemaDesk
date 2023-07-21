<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" +058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-login {
      padding: 170px 0 0 0;
      width: 360px;
      margin: 0 auto;
    }

    .card-header {
      text-align: center;
      font-size: 24px;
    }

    body {
      background-image: linear-gradient(to right, #E70808 30%, #E78608, #E1D209);


    }

    label {
      font-size: 20px;

    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="/desk/index.php" data-toggle="tooltip" data-placement="right" title="Inicio">
      <img src="/desk/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>
  <?php

  if (isset($_POST['usuario']) || isset($_POST['senha']) || isset($_POST['matricula'])) {
    include_once('config.php');
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $matricula = $_POST['matricula'];

    if (strlen($_POST['senha']) < 6 or strlen($usuario) < 6) {
      echo "<label class='label' style='color: #fff;'>Erro: Senha ou usuário com menos de 6 caracteres!</label>";
      echo "<script>setTimeout(function() {
        $('.label').fadeOut('fast');
      }, 3000);</script>";
    } else {

      if (strlen($matricula) != 4) {

        echo "<label class='label' style='color: #fff;'>Número de matricula inválido!, EX:0000</label>";
        echo "<script>setTimeout(function() {
          $('.label').fadeOut('fast');
        }, 3000);</script>";
      } else {

        $verifica_matricula = mysqli_query($conexao, "SELECT matricula FROM tb_acessos
         WHERE matricula = '$matricula' ORDER BY id_usuario ASC");

        if ($verifica_matricula->num_rows > 0) {

          echo "<label class='label' style='color: #fff;'>Erro: Número de matricula em uso, Tente outro!</label>";
          echo "<script>setTimeout(function() {
            $('.label').fadeOut('fast');
          }, 3000);</script>";
        } else {

          $verifica_usuario = mysqli_query($conexao, "SELECT usuario FROM tb_acessos
         WHERE usuario = '$usuario' ORDER BY id_usuario ASC");

          if ($verifica_usuario->num_rows > 0) {

            echo "<label class='label' style='color: #fff;'>Erro: Nome de usuário em uso, Tente outro!</label>";
          } else {

            // INSERINDO NO BANCO DE DADOS:

            $usuario = $_POST['usuario'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            $matricula = $_POST['matricula'];

            $insert = mysqli_query($conexao, "INSERT INTO tb_acessos(usuario,senha,matricula, ativo, nivel) 
              VALUES ('$usuario', '$senha','$matricula', 'Sim', 2)");


            $sql = mysqli_query($conexao, "SELECT * FROM tb_acessos WHERE usuario = '$usuario' ORDER BY id_usuario ASC");

            if ($sql->num_rows == 0 || $usuario == '' || $senha == '' || $matricula == '') {
              echo "<label class='p' style='color: #ffff;'>Erro: Usuário não cadastrado, tente novamente!</label>";
              echo "<script>setTimeout(function() {
                $('.label').fadeOut('fast');
              }, 3000);</script>";
            } else {
              $_SESSION['msg'] = "<p style='color: green;'>Usuário cadastrado, Bem-vindo" . $usuario . "!</p>";
              echo "<script>setTimeout(function() {
                window.location.href = '/desk/index.php';
            }, 1200); </script>";
            }
          }
        }
      }
    }
  }
  ?>

  <form action="" method="POST">
    <div class="container">
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Cadastrar Usuário
            </div>
            <div class="card-body">

              <div class="form-group">
                <input type="text" class="form-control" autofocus name="usuario" placeholder="Usuário">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="senha" placeholder="Senha">
              </div>
              <div class="form-group">
                <input type="text" class="form-control w-50" name="matricula" id="matricula" placeholder="Matricula">
              </div>
              <button class="btn btn-lg btn-danger btn-block" id="adicionar" name="submit" type="submit">Adicionar</button>
              <br>
  </form>
  </div>
  </div>
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</body>

</html>