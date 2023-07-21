<?php 
 // Iniciar a sessão

 if (!isset($_SESSION)) {
        session_start();
 }
// Deletar o cookie
setcookie('token');

// Redireciona o o usuário para o arquivo index.php
header("Location: /desk/index.php");

session_destroy();
?>