<div class="tabform">
    <p>Digite o código do livro a ser excluído:</p>
    <div class="formInputExcluir">
        <form method="POST">
            <input type="hidden" name="activeTab" value="tab1">
            <div class="form-excluir">
                <input type="text" name="txtcodigo" placeholder="Código do livro" required>
                <button type="submit" name="btnenviar" value="Excluir">Excluir</button>
            </div>
        </form>
    </div>
</div>

<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['txtcodigo'])) {
        include_once '../../models/Livro.php';
        $a = new Livro();
        $a->setCodigo($_POST['txtcodigo']);
        $livro = $a->exclusao1();

        if ($livro) {
            ?>
            <div class="tabelaContainer" style="margin-top: 30px;">
                <table class="tabelaEstilo">
                    <thead>
                        <tr>
                            <th>Código Livro</th>
                            <th>Título</th>
                            <th>Categoria</th>
                            <th>ISBN</th>
                            <th>Idioma</th>
                            <th>Qtd Páginas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $livro['Cod_livro']; ?></td>
                            <td><?php echo $livro['Titulo']; ?></td>
                            <td><?php echo $livro['Categoria']; ?></td>
                            <td><?php echo $livro['ISBN']; ?></td>
                            <td><?php echo $livro['Idioma']; ?></td>
                            <td><?php echo $livro['QtdPag']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="formConfirmar">
                <form method="POST">
                    <input type="hidden" name="activeTab" value="tab1">
                    <input type="hidden" name="codigo_confirmado" value="<?php echo $livro['Cod_livro']; ?>">
                    <button type="submit" name="confirmar_exclusao" id="botaoConfirmar">Confirmar Exclusão</button>
                </form>
            </div>
            <?php
        } else {
            echo "<div class='message'><p>Código do livro não encontrado.</p></div>";
        }
    }
}
?>

<?php
if (isset($_POST['confirmar_exclusao']) && isset($_POST['codigo_confirmado'])) {
    include_once '../../models/Livro.php';
    $a = new Livro();
    $a->setCodigo($_POST['codigo_confirmado']);
    echo "<div class='message'>" . $a->exclusao() . "</div>";
}
?>
