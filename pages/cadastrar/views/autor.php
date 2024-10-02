<form name="autor" method="POST" action="">
    <input type="hidden" name="activeTab" value="tab2">
    <input type="hidden" name="form_type" value="autor">
    <fieldset id="a">
        <legend><b>Dados do Autor</b></legend>
        <p>Nome Autor: <input name="nome" type="text" size="40" maxlength="100" placeholder="Nome do Autor" required></p>
        <p>Sobrenome: <input name="sobrenome" type="text" size="40" maxlength="100" placeholder="Sobrenome" required></p>
        <p>Email: <input name="email" type="text" size="40" maxlength="100" placeholder="Email" required></p>
        <p>Nascimento: <input name="nasc" type="date" size="40" maxlength="20" placeholder="Nascimento" required></p>
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções:</b></legend>
        <input class="botao" name="btenviar_autor" type="submit" value="Cadastrar"> &nbsp;&nbsp;
        <input class="botao" name="limpar" type="reset" value="Limpar">
    </fieldset>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btenviar_autor)) {
            include_once '../../models/Autor.php';
            $autor = new Autor();
            $autor->setNome($nome);
            $autor->setSobrenome($sobrenome);
            $autor->setEmail($email);
            $autor->setNasc($nasc);
            echo "<h3><br><br>" . $autor->salvar() . "</h3>";
        }
    }
?>


<!-- BOTÂO VOLTAR -->
<?php
    include '../layouts/btn-voltar.php'
?>