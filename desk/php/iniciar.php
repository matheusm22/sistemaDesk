<?php 
session_start();
include_once('config.php');

if(!empty($_GET['id']))
{
    $usuario = $_SESSION['usuario'];
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM tb_pedidos WHERE id=$id";
    $result = $conexao->query($sqlSelect);

    if ($result ->num_rows > 0) {
        
        $sqlUpdate = "UPDATE tb_pedidos SET situacao = 'Em Atendimento', responsavel='$usuario' WHERE id = $id";

        $result = $conexao->query($sqlUpdate);

    }
    header('Location: consultar_chamado.php');
}
?>