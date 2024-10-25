<?php
session_start(); // Inicia a sessão
$_SESSION['logado'] = false; // Define logado como false
session_destroy(); // Destroi a sessão
header("Location: ../index.php"); // Redireciona para a página inicial
exit(); // Encerra o script
?>
