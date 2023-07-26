<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        p {
            text-align: center;
            padding: 30px;
            font-size: 25px;
        }
    </style>
    <title>App Help Desk</title>
</head>
<body>
<?php 
require_once 'header.php';
include_once('config.php');

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM tb_pedidos WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result ->num_rows > 0) {
        
        $sqlUpdate = "UPDATE tb_pedidos SET situacao = 'Finalizado' WHERE id = $id";
        $result = $conexao->query($sqlUpdate);

        echo "<p id='p' style='color: green;'>Ótimo trabalho! 😍 <br> Você Concluiu essa Solicitação!</p>";

            echo "<script>setTimeout(function() {
                
                    window.location.href = 'consultar_chamado.php';
                  }, 2000)</script>";

    }
 
}
?>
</body>
</html>