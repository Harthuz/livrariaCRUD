<div class="consultar">
    <form method="POST" action="">
        <input type="hidden" name="activeTab" value="tab1">
        <input type="hidden" name="form_name" value="alterar1">
        <fieldset>
            <legend>Alterando</legend>
            <p>Digite o nome do livro que deseja alterar:</p>
            <input type="text" placeholder="Nome do livro" name="txtnome">
            <br>
            <input class="botao" type="submit" value="Consultar" name="btnconsultar">
        </fieldset>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar1') {
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnconsultar)) {
            $txtnome = $_POST['txtnome'];
            include_once '../../models/Livro.php';
            $a = new Livro();
            $a->setTitulo($txtnome);
            $livro = $a->alterar();
        }

        if ($livro) {

            foreach($livro as $autor_mostrar){

            ?>

            <div class="alterar">

            <form method="POST" action="">
                <input type="hidden" name="activeTab" value="tab1">
                <input type="hidden" name="form_name" value="alterar2">
                <fieldset id="a">
                    <legend><b>Dados do Livro</b></legend>
                    <p>Código Livro: <input hidden name="codigo" type="text" size="40" maxlength="100" value="<?php echo $autor_mostrar[0] ?>" required></p>
                    <p>Título: <input name="titulo" type="text" size="40" maxlength="100" placeholder="Título do Livro" value="<?php echo $autor_mostrar[1] ?>" required></p>
                    <p>Categoria: <input name="categoria" type="text" size="40" maxlength="40" placeholder="Categoria" value="<?php echo $autor_mostrar[2] ?>" required></p>
                    <p>ISBN: <input name="isbn" type="text" size="40" maxlength="20" placeholder="ISBN" value="<?php echo $autor_mostrar[3] ?>" required></p>
                    <p>Idioma: <input name="idioma" type="text" size="40" maxlength="20" placeholder="Idioma" value="<?php echo $autor_mostrar[4] ?>" required></p>
                    <p>Quantidade de Páginas: <input name="qtd_pag" type="number" size="40" placeholder="Quantidade de Páginas" value="<?php echo $autor_mostrar[5] ?>" required></p>
                </fieldset>
                <fieldset id="b">
                    <legend><b>Opções:</b></legend>
                    <input class="botao" name="btnalterar" type="submit" value="Alterar"> &nbsp;&nbsp;
                </fieldset>
            </form>

            </div>

            <?php
                }
            ?>

            <?php
        } else {
            echo "<div class='message'><b><p>Nome do livro não encontrado.</p></b></div>";
        }
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar2') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnalterar)) {
            include_once '../models/Livro.php';
            $a = new Livro();

            $codigo = $_POST['codigo'];
            $titulo = $_POST['titulo'];
            $categoria = $_POST['categoria'];
            $isbn = $_POST['isbn'];
            $idioma = $_POST['idioma'];
            $paginas = $_POST['qtd_pag'];
            
            $a->setCodigo($codigo);
            $a->setTitulo($titulo);
            $a->setCategoria($categoria);
            $a->setISBN($isbn);
            $a->setIdioma($idioma);
            $a->setPaginas($paginas);
            
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