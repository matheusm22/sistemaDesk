<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        div {
            text-align: center;
            padding: 30px;
        }
        h1 {
            font-size: 20px;
            color: black;
        }
        
    </style>
    <title>App Help Desk</title>
</head>
<body>

<?php 

require_once 'header.php';
echo "<div>";  
include_once 'config.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

echo '<h1>Deseja realmente finalizar esta solicitação?</h1>';
echo "<br>";
echo "<br>";

echo "<a class='btn btn-lg btn-success' href='finalizar.php?id=$id'>Sim</a>";
echo "&nbsp;";
echo "&nbsp;";
echo "&nbsp;";

echo "<button class='btn btn-lg btn-danger' id='btn_nao' onclick='Nao()'>Não</button>"
?>
</body>

<script>
   function Nao(){
        alert('OPS, Solicitação não finalizada! ' + '😒')
            setTimeout(function() {
                window.location.href = 'consultar_chamado.php';
              }, 1500)
    }
</script>
</html>




