<div class="consultar">
    <form method="POST" action="">
        <input type="hidden" name="activeTab" value="tab3">
        <input type="hidden" name="form_name" value="alterar1">
        <fieldset>
            <legend>Alterando</legend>
            <p>Digite os dados da autoria que deseja alterar:</p>
            <input type="text" placeholder="Código autor" name="txtcodautor">
            <input type="text" placeholder="Código livro" name="txtcodlivro">
            <br>
            <input class="botao" type="submit" value="Consultar" name="btnconsultarautoria">
        </fieldset>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar1') {
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnconsultarautoria)) {
            $txtautor = $_POST['txtcodautor'];
            $txtlivro = $_POST['txtcodlivro'];
            include_once '../../models/Autoria.php';
            $a = new Autoria();
            $a->setCodigoAutor($txtautor);
            $a->setCodigoLivro($txtlivro);
            $autoria = $a->alterar();

            if ($autoria) {

                foreach($autoria as $autoria_mostrar){
    
                ?>
    
                <div class="alterar">
    
                <form method="POST" action="">
                    <input type="hidden" name="activeTab" value="tab3">
                    <input type="hidden" name="form_name" value="alterar2">
                    <fieldset id="a">
                        <legend><b>Dados Autoria</b></legend>
                        <p>Código Autor: <input name="cod_autor" type="text" size="40" maxlength="100" value="<?php echo $autoria_mostrar[0] ?>" required></p>
                        <p>Código Livro: <input name="cod_livro" type="text" size="40" maxlength="100" placeholder="Título do Livro" value="<?php echo $autoria_mostrar[1] ?>" required></p>
                        <p>Data DataLancamento: <input name="data_lancamento" type="date" size="40" maxlength="40" placeholder="Categoria" value="<?php echo $autoria_mostrar[2] ?>" required></p>
                        <p>Editora: <input name="editora" type="text" size="100" maxlength="100" placeholder="ISBN" value="<?php echo $autoria_mostrar[3] ?>" required></p>
                    </fieldset>
                    <fieldset id="b">
                        <legend><b>Opções:</b></legend>
                        <input class="botao" name="btnalterarautoria" type="submit" value="Alterar"> &nbsp;&nbsp;
                    </fieldset>
                </form>
    
                </div>
    
                <?php
                    }
                ?>
    
                <?php
            } else {
                echo "<div class='message'><b><p>Autoria não encontrada.</p></b></div>";
            }
        }
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar2') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnalterarautoria)) {
            include_once '../../models/Autoria.php';
            $a = new Autoria();

            $cod_autor = $_POST['cod_autor'];
            $cod_livro = $_POST['cod_livro'];
            $data_lancamento = $_POST['data_lancamento'];
            $editora = $_POST['editora'];
            
            $a->setCodigoAutor($cod_autor);
            $a->setCodigoLivro($cod_livro);
            $a->setDataLancamento($data_lancamento);
            $a->setEditora($editora);
            
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