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
      background-image: linear-gradient(to right, #D51037 15%, #E34E6C, #F074B6);

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
  session_start(); // Iniciar a sessão

  // Limpara o buffer de redirecionamento
  ob_start();


  include_once('config.php');

  // VERIFICA O SUBMIT  e os inputs de senha
  if (isset($_POST['submit'])) {

    if ($_POST['senha'] != $_POST['confirma']) {

      echo "<label style='color: #fff; font-size:20px;'>Erro: As senhas não coincidem</label>";
      print_r('<br>');
      print_r('<br>');
    } else {

      $matricula = $_POST['matricula'];
      $confirma = $_POST['confirma'];
      $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

      $res_matricula =  mysqli_query($conexao, "SELECT matricula FROM tb_acessos 
        WHERE matricula = '$matricula' ORDER by id_usuario DESC LIMIT 1");


      if ($res_matricula->num_rows == 0) {
        echo "<label style='color: #ff0f; font-size:20px;'> O número de matricula não existe!</label>";
        print_r('<br>');
        print_r('<br>');
      } else {

        if (strlen($_POST['senha']) < 6 || strlen($confirma) < 6) {

          echo "<label style='color: #ff0f;'>Erro: Senha com menos de 6 caracteres!</label>";
          print_r('<br>');
          print_r('<br>');
        } else {

          // Executa a query de mysql 
          $update = mysqli_query($conexao, "UPDATE tb_acessos SET senha = '$senha'
        WHERE matricula = '$matricula' ORDER BY id_usuario ASC");

          //  verifica o número de linhas no mysql 
          $sql = mysqli_query($conexao, "SELECT * FROM tb_acessos WHERE matricula = '$matricula' ORDER BY id_usuario ASC");

          if ($sql->num_rows == 0 || $confirma == '' || $senha == '' || $matricula == '') {

            echo "<label style='color: #fff; font-size:20px;'>Erro: Senha não alterada!</label>";
            print_r('<br>');
            print_r('<br>');
          } else {
            $_SESSION['msg'] = "<p style='color: #fff;'>Sua senha foi alterada!&nbsp</p>";
            header('Location: /desk/index.php');
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
              Nova Senha
            </div>
            <div class="card-body">

              <div class="form-group">
                <input type="text" class="form-control w-50" autofocus name="matricula" id="matricula" placeholder="Matricula">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="senha" placeholder="Senha">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="confirma" placeholder="Confirmar Senha">
              </div>
              <button class="btn btn-lg btn-primary btn-block" id="Alterar" name="submit" type="submit">Alterar</button>
              <br>
  </form>
  </div>
  </div>
  </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

</body>

</html>