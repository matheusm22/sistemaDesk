<?php 
if(!isset($_SESSION)){
    session_start();
}
include_once('config.php');

if(isset($_POST['submit'])) {

    $nivel = $_SESSION['nivel'];

    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    if(empty($descricao)) {

        $sql = "UPDATE tb_pedidos SET titulo ='$titulo', 
        categoria = '$categoria' WHERE id = '$id' ";

          $result = $conexao->query($sql);

    } else {

    $sql = "UPDATE tb_pedidos SET titulo ='$titulo', 
    categoria = '$categoria', descricao = '$descricao' WHERE id = '$id' ";
  
    $result = $conexao->query($sql);
    }
    if ($nivel == 2) {
        header('location: consultar_chamado.php');
    }else {
        header('location: meus_chamados.php');
}
}
if (isset($_POST['responder'])) {

     $id = $_POST['id'];
     $resposta = $_POST['resposta'];
    
     $sql = "UPDATE tb_pedidos SET respostas = '$resposta' where id = '$id' ";

     $result = $conexao->query($sql);
     header('location: consultar_chamado.php');
}





