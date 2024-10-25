<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }

    .login-container {}

    .logar-button {
        background-color: #3C3D41;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        transition: 0.3s;
    }

    .input-campo input {
        border-radius: 5px;
        margin-right: 10px;
        width: 190px;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .login-container {
        width: 300px;
        background-color: white;
        border: 2px solid #ccc;
        display: grid;
        justify-content: center;
        align-items: center;
        border-radius: 10px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
    }

    form {
        text-align: center;
    }

    .login-container h1 {
        text-align: center;
    }

    .logar-button {
        margin-bottom: 20px;
    }

    .frame{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5); /* Fundo escuro com transparência */
        z-index: 5; /* Certifique-se de que a sobreposição fique atrás do formulário */
    }

    .msgerrologin {
        color: red;
        margin-bottom: 20px;
    }
</style>

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<html>
    <div class="login-container">
        <h1 class="titulo-login">Login</h1>
        <form method="POST">
            <div class="inputs-container">
                <div class="input-campo">
                    <input type="text" id="usuario" name="usuario" placeholder="Usuário" required onkeydown="permitirApenasLetras(event)"><br>
                </div>
                <div class="input-campo">
                    <input type="password" id="senha" name="senha" placeholder="Senha" required onkeydown="permitirApenasNumeros(event)"><br>
                </div>
            </div>
            <button type="submit" name="logar" value="Logar" class="logar-button" onclick="return validarFormulario()">Logar</button>
            <?php

                if (isset($_POST['logar'])) { // Verifica se o botão de login foi pressionado
                    include_once './models/Usuario.php';
                    $user = new Usuario();
                    $user->setUsuario($_POST['usuario']);
                    $user->setSenha($_POST['senha']);
                    $status = $user->logar();

                    // Verifica se há resultados
                    if (!empty($status)) {
                        foreach ($status as $status_user) {
                            // Definindo a variável de sessão para indicar que o usuário está logado
                            $_SESSION['logado'] = true;
                            echo "<script>
                                document.getElementById('login-container').style.display = 'none';
                                document.getElementById('frame').style.display = 'none';
                            </script>";
                            header("location:./index.php");
                        }
                    } else {
                        echo "<div class=\"msgerrologin\">Usuário ou senha inválidos</div>";
                    }
                }
            ?>

        </form>
    </div>

</html>

<script>
function validarFormulario() {
    const usuarioInput = document.querySelector('#usuario').value;
    const senhaInput = document.querySelector('#senha').value;

    // Verificar se os campos estão vazios
    if (usuarioInput.trim() === "" || senhaInput.trim() === "") {
        alert("Os campos não podem estar vazios.");
        return false;
    }

    // Bloquear se não forem apenas letras no campo de usuário
    if (!/^[a-zA-Z]+$/.test(usuarioInput)) {
        alert("Digite apenas letras no usuário.");
        return false;
    }

    // Bloquear se não forem apenas números no campo de senha
    if (!/^\d+$/.test(senhaInput)) {
        alert("Digite apenas números na senha.");
        return false;
    }

    return true; // Permite o envio do formulário
}


    function permitirApenasNumeros(event) {
        const tecla = event.key;

        if (["Backspace", "Delete", "ArrowLeft", "ArrowRight", "Tab"].includes(tecla)) {
            return;
        }

        if (!/^[0-9]$/.test(tecla)) {
            event.preventDefault();
        }
    }

    function permitirApenasLetras(event) {
        const tecla = event.key;

        if (["Backspace", "Delete", "ArrowLeft", "ArrowRight", "Tab"].includes(tecla)) {
            return;
        }

        if (!/^[a-zA-Z]$/.test(tecla)) {
            event.preventDefault();
        }
    }
</script>
