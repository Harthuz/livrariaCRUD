<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Livraria | Menu de Ações</title>
</head>
<body>
    <?php
    session_start(); // Inicia a sessão

    // HEADER
    include_once './pages/layouts/header.php';
    ?>

    <div class="btn_container" id="btn_container">
        <!--script.js -->
    </div>

    <?php
    // Verifica se o usuário está logado
    if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
        include_once './pages/login.php'; // Inclui o formulário de login apenas se não estiver logado
        echo '<div class="frame"></div>
        '; // Exibe a camada escura apenas se não estiver logado
    }
    else{
    ?>
        <div class="sair-container" onclick="logout()">
            <div class="sair-botao">
                Sair
            </div>
        </div>
    <?php
    }
    ?>
    
    <script src="./assets/js/script.js"></script>
</body>
</html>
