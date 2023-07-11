<?php
session_start(); // Iniciar a sessão

// Limpara o buffer de redirecionamento
ob_start();

// Acessa o IF quando o usuário clicou no botão "Acessar" do formulário
if (!empty($_POST['submit'])) {
  include_once 'config.php';
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  // QUERY para recuperar o usuário do banco de dados
  $sql = mysqli_query($conexao, "SELECT * FROM tb_acessos
   WHERE usuario ='$usuario' and ativo ='Sim' LIMIT 1");

  // Acessa o IF quando encontrou usuário no banco de dados
  if ($sql->num_rows > 0) {
    // Ler o resultado retornado do banco de dados
    $user_data = mysqli_fetch_assoc($sql);
    //var_dump($row_usuario);

    $_SESSION['id_usuario'] = $user_data['id_usuario'];
    $_SESSION['usuario'] = $user_data['usuario'];
    $_SESSION['nivel'] = $user_data['nivel'];
    // Verificar se a senha digitada pelo usuário no formulário é igual a senha salva no banco de dados
    if (password_verify($senha, $user_data['senha'])) {

      // Header indica o tipo do token "JWT", e o algoritmo utilizado "HS256"
      $header = [
        'alg' => 'HS256',
        'typ' => 'JWT'
      ];

      // Converter o array em objeto
      $header = json_encode($header);

      // Codificar dados em base64
      $header = base64_encode($header);

      // 7 days; 24 hours; 60 mins; 60secs
      // $duracao = time() + (7 * 24 * 60 * 60);
      $duracao = time() + (30 * 60);

      $payload = [

        'exp' => $duracao,
      ];

      // Converter o array em objeto
      $payload = json_encode($payload);
      //var_dump($payload);

      // Codificar dados em base64
      $payload = base64_encode($payload);

      // Chave secreta e única
      $chave = "DGBU85S46H9M5W4X6OD7";

      // Gera um valor de hash com chave usando o método HMAC
      $signature = hash_hmac('sha256', "$header.$payload", $chave, true);

      // Codificar dados em base64
      $signature = base64_encode($signature);

      // Cria o cookie com duração 7 dias
      setcookie('token', "$header.$payload.$signature", (time() + (7 * 24 * 60 * 60))); //para aqui

      // Permissão de usuários  e redirecionamentos

      switch ($_SESSION['nivel']) {
        case '1':
          header('Location: home.php');
          break;

        case '2':
          header('Location: admin.php');
          break;

        // default:
        //   header('Location: home.php');
      }
    } else {
      // Criar a mensagem de erro e atribuir para variável global "msg"  -- ERRO INPUT EM BRANCO
      $_SESSION['msg'] = "<p style='color: #fff;'>Erro: Usuário ou senha inválida!</p>";
      //     echo "<script>setTimeout(function() {
      //     window.location.href = '/emails/index.php';
      // }, 1200); </script>";
    }
  } else {
    // Criar a mensagem de erro e atribuir para variável global "msg" -- ERRO USUARIO INVÁLIDO
    $_SESSION['msg'] = "<p style='color: #fff;'>Erro: Usuário ou senha inválida!</p>";
    //   echo "<script>setTimeout(function() {
    //     window.location.href = '/emails/index.php';
    // }, 1200); </script>";
  }
}


// Verificar se existe a variável global "msg" e acessa o IF
if (isset($_SESSION['msg'])) {
  // Imprimir o valor da variável global "msg"
  echo $_SESSION['msg'];

  // Destruir a variável globar "msg"
  unset($_SESSION['msg']);
}

?>
<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" +058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .card-login {
      padding: 170px 0 0 0;
      width: 350px;
      margin: 0 auto;
    }

    body {
      background-image: linear-gradient(to left, #008e9d 20%, #4bbc42 80%);

    }

    #esq_senha {
      border: none;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
      <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      App Help Desk
    </a>
  </nav>
  <form action="" method="POST">
    <div class="container">
      <div class="row">

        <div class="card-login">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">

              <div class="form-group">
                <?php
                $user = "";
                if (isset($usuario)) {
                  $user = $usuario;
                }
                ?>
                <input type="text" class="form-control" name="usuario" placeholder="login" value="<?php echo $user; ?>">
              </div>
              <div class="form-group">
                <?php
                $password = "";
                if (isset($senha)) {
                  $password = $senha;
                }
                ?>
                <input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $password;?>">
              </div>
              <input class="btn btn-lg btn-info btn-block" name="submit" type="submit" value="Acessar">
              <br>
              <a href="cadastrar.php" class="btn  btn-outline-primary" id='esq_senha'>Esqueceu a senha?</a>
  </form>
  </div>
  </div>
  </div>
  </div>
</body>

</html>