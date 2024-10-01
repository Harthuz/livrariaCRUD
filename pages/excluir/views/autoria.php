<div class="tabform">
    <p>Digite o código do autor e o código do livro da autoria a ser excluída:</p>
    <div class="formInputExcluir">
        <form method="POST">
            <input type="hidden" name="activeTab" value="tab3">
            <div class="form-excluir">
                <input type="text" name="txtcodigo" placeholder="Código do livro" required>
                <input type="text" name="txtcodigo2" placeholder="Código do autor" required>
                <button type="submit" name="btnenviarautoria" value="Excluir">Excluir</button>
            </div>
        </form>
    </div>
</div>

<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST, EXTR_OVERWRITE);
    if (isset($btnenviarautoria)) {
        include_once '../../models/Autoria.php';
        $a = new Autoria();
        $a->setCodigoLivro($_POST['txtcodigo']);
        $a->setCodigoAutor($_POST['txtcodigo2']);
        $autoria_mostrar = $a->exclusao1();

        if ($autoria_mostrar) {
            ?>
            <div class="tabelaContainer" style="margin-top: 30px;">
                <table class="tabelaEstilo">
                    <thead>
                        <tr>
                            <th>Código Autor</th>
                            <th>Código Livro</th>
                            <th>Lançamento</th>
                            <th>Editora</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $autoria_mostrar['Cod_autor']; ?></td>
                            <td><?php echo $autoria_mostrar['Cod_livro']; ?></td>
                            <td><?php echo $autoria_mostrar['DataLancamento']; ?></td>
                            <td><?php echo $autoria_mostrar['Editora']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="formConfirmar">
                <form method="POST">
                    <input type="hidden" name="activeTab" value="tab3">
                    <input type="hidden" name="codigo_confirmado" value="<?php echo $autoria_mostrar['Cod_autor']; ?>">
                    <input type="hidden" name="codigo_confirmado2" value="<?php echo $autoria_mostrar['Cod_livro']; ?>">
                    <button type="submit" name="confirmar_exclusao_autoria" id="botaoConfirmar">Confirmar Exclusão</button>
                </form>
            </div>
            <?php
        } else {
            echo "<div class='message'><p>Código da autoria não encontrado.</p></div>";
        }
    }
}
?>

<?php
if (isset($confirmar_exclusao_autoria)) {
    include_once '../../models/Autoria.php';
    $a = new Autoria();
    $a->setCodigoAutor($_POST['codigo_confirmado']);
    $a->setCodigoLivro($_POST['codigo_confirmado2']);
    echo "<div class='message'>" . $a->exclusao() . "</div>";
}
?>