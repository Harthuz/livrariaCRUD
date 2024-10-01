<form name="autoria" method="POST" action="">
    <input type="hidden" name="activeTab" value="tab3">    
    <input type="hidden" name="form_type" value="autoria">
    <fieldset id="a">
        <legend><b>Dados da Autoria</b></legend>
        <p>Código do Autor: <input name="autor" type="number" size="40" maxlength="100" placeholder="Código do Autor" required></p>
        <p>Código do Livro: <input name="livro" type="number" size="40" maxlength="40" placeholder="Código do Livro" required></p>
        <p>Data de Lançamento: <input name="lancamento" type="date" size="40" maxlength="20" placeholder="Data de Lançamento" required></p>
        <p>Editora: <input name="editora" type="text" size="40" maxlength="30" placeholder="Editora" required></p>
    </fieldset>
    <fieldset id="b">
        <legend><b>Opções:</b></legend>
        <input class="botao" name="btenviar_autoria" type="submit" value="Cadastrar"> &nbsp;&nbsp;
        <input class="botao" name="limpar" type="reset" value="Limpar">
    </fieldset>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btenviar_autoria)) {
            include_once '../../models/Autoria.php';
            $autoria = new Autoria();
            $autoria->setCodigoAutor($autor);
            $autoria->setCodigoLivro($livro);
            $autoria->setDataLancamento($lancamento);
            $autoria->setEditora($editora);
            echo "<h3><br><br>" . $autoria->salvar() . "</h3>";
        }
    }
?>

<div class="button-container">
    <a href="../../index.html" class="botao">Voltar</a>
</div>