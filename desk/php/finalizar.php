<?php 
include_once('config.php');

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM pedidos WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result ->num_rows > 0) {
        
        $sqlUpdate = "UPDATE pedidos SET situacao = 'Finalizado' WHERE id = $id";
        $result = $conexao->query($sqlUpdate);

    }
    header('Location: consultar_chamado.php');
}
?>