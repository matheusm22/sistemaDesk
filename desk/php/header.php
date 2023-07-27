<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    .navbar navbar-dark bg-dark {
      position: relative;
      

    }
    .navbar-brand {
      position: relative;

    }
     h2{
      color: aliceblue;
      font-size: 22px;
      position: relative;
      left: 440px;
      top: 5px;
      
    } 
  </style>
  <title>App Help Desk</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-dark bg-dark">

      <?php

      if (!isset($_SESSION)) {
        session_start();
      }
      switch ($_SESSION['nivel']) {

        case '1':
          echo " <a class='navbar-brand' href='home.php' data-toggle='tooltip' data-placement='right' title='Início'>
        <img src='/desk/img/logo.png' width='30' height='30' class='d-inline-block align-top'>
        App Help Desk
      </a>";
          break;

        case '2':

          echo " <a class='navbar-brand' href='admin.php' data-toggle='tooltip' data-placement='right' title='Início'>
        <img src='/desk/img/logo.png' width='30' height='30' class='d-inline-block align-top'>
        App Help Desk
      </a>";
          break;
      }
       $usuario = $_SESSION['usuario'];

       echo "<h2 color: white;>Usuário: $usuario</h2>"

      ?>
      <a href="sair.php" class="btn  btn-lg btn-danger  me-2" data-toggle="tooltip" data-placement="right" title="Deslogar?" onclick="return confirm('Tem certeza que deseja sair?')">Sair</a>
    </nav>
  </header>
</body>

</html>