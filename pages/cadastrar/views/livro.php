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

<form name="livro" method="POST" action="">
    <input type="hidden" name="activeTab" value="tab1">
    <input type="hidden" name="form_type" value="livro">
    <fieldset id="a">
        <legend><b>Dados do Livro</b></legend>
        <p>Título: <input name="titulo" type="text" size="40" maxlength="100" placeholder="Título do Livro" required></p>
        <p>Categoria: <input name="categoria" type="text" size="40" maxlength="40" placeholder="Categoria" required></p>
        <p>ISBN: <input name="isbn" type="text" size="40" maxlength="20" placeholder="ISBN" required></p>
        <p>Idioma: <input name="idioma" type="text" size="40" maxlength="20" placeholder="Idioma" required></p>
        <p>Quantidade de Páginas: <input name="qtd_pag" type="number" size="40" placeholder="Quantidade de Páginas" required></p>
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções:</b></legend>
        <input class="botao" name="btenviar_livro" type="submit" value="Cadastrar"> &nbsp;&nbsp;
        <input class="botao" name="limpar" type="reset" value="Limpar">
    </fieldset>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btenviar_livro)) {
            include_once '../../models/Livro.php';
            $livro = new Livro();
            $livro->setTitulo($titulo);
            $livro->setCategoria($categoria);
            $livro->setISBN($isbn);
            $livro->setIdioma($idioma);
            $livro->setPaginas($qtd_pag);
            echo "<h3><br><br>" . $livro->salvar() . "</h3>";
        }
    }
?>

<!-- BOTÂO VOLTAR -->
<?php
    include '../layouts/btn-voltar.php'
?>