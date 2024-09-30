<div class="consultar">
    <form method="POST" action="">
        <input type="hidden" name="activeTab" value="tab2">
        <input type="hidden" name="form_name" value="alterar1">
        <fieldset>
            <legend>Alterando</legend>
            <p>Digite o nome do autor que deseja alterar:</p>
            <input type="text" placeholder="Nome do autor" name="txtnome">
            <br>
            <input class="botao" type="submit" value="Consultar" name="btnconsultarautor">
        </fieldset>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar1') {
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnconsultarautor)) {
            $txtnome = $_POST['txtnome'];
            include_once '../../models/Autor.php';
            $a = new Autor();
            $a->setNome($txtnome);
            $autor = $a->alterar();

            if ($autor) {

                foreach($autor as $autoria_mostrar){
    
                ?>
    
                <div class="alterar">
    
                <form method="POST" action="">
                    <input type="hidden" name="activeTab" value="tab2">
                    <input type="hidden" name="form_name" value="alterar2">
                    <fieldset id="a">
                        <legend><b>Dados do Autor</b></legend>
                        <p>Código Autor: <input hidden name="codigo" type="text" size="40" maxlength="100" value="<?php echo $autoria_mostrar[0] ?>" required></p>
                        <p>Nome: <input name="nome" type="text" size="40" maxlength="100" placeholder="Título do Livro" value="<?php echo $autoria_mostrar[1] ?>" required></p>
                        <p>Sobrenome: <input name="sobrenome" type="text" size="40" maxlength="100" placeholder="Categoria" value="<?php echo $autoria_mostrar[2] ?>" required></p>
                        <p>Email: <input name="email" type="text" size="40" maxlength="20" placeholder="ISBN" value="<?php echo $autoria_mostrar[3] ?>" required></p>
                        <p>Nascimento: <input name="nasc" type="text" size="40" maxlength="20" placeholder="Idioma" value="<?php echo $autoria_mostrar[4] ?>" required></p>
                    </fieldset>
                    <fieldset id="b">
                        <legend><b>Opções:</b></legend>
                        <input class="botao" name="btnalterarautor" type="submit" value="Alterar"> &nbsp;&nbsp;
                    </fieldset>
                </form>
    
                </div>
    
                <?php
                    }
                ?>
    
                <?php
            } else {
                echo "<div class='message'><b><p>Nome do autor não encontrado.</p></b></div>";
            }
        }
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar2') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnalterarautor)) {
            include_once '../../models/Autor.php';
            $a = new Autor();

            $codigo = $_POST['codigo'];
            $nome = $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $nasc = $_POST['nasc'];
            
            $a->setCodigo($codigo);
            $a->setNome($nome);
            $a->setSobrenome($sobrenome);
            $a->setEmail($email);
            $a->setNasc($nasc);
            
            $resultado = $a->alterar2();
            
            
            if ($resultado) {
                echo $resultado;
            } else {
                echo $resultado;
            }
        }
    }

?>

<div class="button-container">
    <a href="../../index.html" class="botao">Voltar</a>
</div>