<style>
        .botao {
            background-color: #3C3D41;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .botao:hover {
            background-color: #2c2c2c;
        }
</style>

<div class="consultar">
    <form method="POST" action="">
        <input type="hidden" name="activeTab" value="tab1">
        <input type="hidden" name="form_name" value="alterar1">
        <fieldset>
            <legend>Alterando</legend>
            <p>Digite o código do livro que deseja alterar:</p>
            <input type="text" placeholder="Código do livro" name="txtcod">
            <br>
            <input class="botao" type="submit" value="Consultar" name="btnconsultarlivro">
        </fieldset>
    </form>
</div>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar1') {
        extract($_POST, EXTR_OVERWRITE);
        if(isset($btnconsultarlivro)) {
            $txtcodigo = $_POST['txtcod'];
            include_once '../../models/Livro.php';
            $a = new Livro();
            $a->setCodigo($txtcodigo);
            $livro = $a->alterar();

            if ($livro) {

                foreach($livro as $autoria_mostrar){
    
                ?>
    
                <div class="alterar">
    
                <form method="POST" action="">
                    <input type="hidden" name="activeTab" value="tab1">
                    <input type="hidden" name="form_name" value="alterar2">
                    <fieldset id="a">
                        <legend><b>Dados do Livro</b></legend>
                        <p>Código Livro: <input hidden name="codigo" type="text" size="40" maxlength="100" value="<?php echo $autoria_mostrar[0] ?>" required></p>
                        <p>Título: <input name="titulo" type="text" size="40" maxlength="100" placeholder="Título do Livro" value="<?php echo $autoria_mostrar[1] ?>" required></p>
                        <p>Categoria: <input name="categoria" type="text" size="40" maxlength="40" placeholder="Categoria" value="<?php echo $autoria_mostrar[2] ?>" required></p>
                        <p>ISBN: <input name="isbn" type="text" size="40" maxlength="20" placeholder="ISBN" value="<?php echo $autoria_mostrar[3] ?>" required></p>
                        <p>Idioma: <input name="idioma" type="text" size="40" maxlength="20" placeholder="Idioma" value="<?php echo $autoria_mostrar[4] ?>" required></p>
                        <p>Quantidade de Páginas: <input name="qtd_pag" type="number" size="40" placeholder="Quantidade de Páginas" value="<?php echo $autoria_mostrar[5] ?>" required></p>
                    </fieldset>
                    <fieldset id="b">
                        <legend><b>Opções:</b></legend>
                        <input class="botao" name="btnalterarlivro" type="submit" value="Alterar"> &nbsp;&nbsp;
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
    }
?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['form_name'] === 'alterar2') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnalterarlivro)) {
            include_once '../../models/Livro.php';
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

<!-- BOTÂO VOLTAR -->
<?php
    include '../layouts/btn-voltar.php'
?>