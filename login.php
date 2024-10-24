<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .title{
            text-align: center;
        }

        .login-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background: #3C3D41;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background: #666666;
        }

        form{
        width: 90%;
    }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="title">Login</h2>
        <form onsubmit="return validateForm()">
            <input type="text" id="username" placeholder="Usuário" required class="input-campo">
            <input type="password" id="password" placeholder="Senha (numérica)" required>
            <input type="submit" value="Entrar">
        </form>
        <p id="error-message" style="color: red;"></p>
    </div>

    <?php
        
    ?>

    <script>
        function validateForm() {
            const password = document.getElementById('password').value;
            const errorMessage = document.getElementById('error-message');

            // Verifica se a senha é numérica
            if (!/^\d+$/.test(password)) {
                errorMessage.textContent = 'A senha só deve conter números.';
                return false;
            }

            errorMessage.textContent = '';
            return true; // Permite o envio do formulário se a senha for válida
        }
    </script>
</body>
</html>
