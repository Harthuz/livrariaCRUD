<div class="tabform">
    <p>Digite o código do autor a ser excluído:</p>
    <form method="POST">
        <input type="hidden" name="activeTab" value="tab2">
        <div class="formInputExcluir">
            <div class="form-excluir">
                <input type="text" name="txtcodigo" placeholder="Código do autor" required>
                <button type="submit" name="btnenviar" value="Excluir">Excluir</button>
            </div>
        </div>
    </form>
</div>

<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['txtcodigo'])) {
        include_once '../../models/Autor.php';
        $a = new Autor();
        $a->setCodigo($_POST['txtcodigo']);
        $autoria_mostrar = $a->exclusao1();

        if ($autoria_mostrar) {
            ?>
            <div class="tabelaContainer" style="margin-top: 30px;">
                <table class="tabelaEstilo">
                    <thead>
                        <tr>
                            <th>Código Autor</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Email</th>
                            <th>Nascimento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $autoria_mostrar['Cod_autor']; ?></td>
                            <td><?php echo $autoria_mostrar['NomeAutor']; ?></td>
                            <td><?php echo $autoria_mostrar['Sobrenome']; ?></td>
                            <td><?php echo $autoria_mostrar['Email']; ?></td>
                            <td><?php echo $autoria_mostrar['Nasc']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="formConfirmar">
                <form method="POST">
                    <input type="hidden" name="activeTab" value="tab2">
                    <input type="hidden" name="codigo_confirmado" value="<?php echo $autoria_mostrar['Cod_autor']; ?>">
                    <button type="submit" name="confirmar_exclusao" id="botaoConfirmar">Confirmar Exclusão</button>
                </form>
            </div>
            <?php
        } else {
            echo "<div class='message'><p>Código do autor não encontrado.</p></div>";
        }
    }
}
?>

<?php
if (isset($_POST['confirmar_exclusao']) && isset($_POST['codigo_confirmado'])) {
    include_once '../../models/Autor.php';
    $a = new Autor();
    $a->setCodigo($_POST['codigo_confirmado']);
    echo "<div class='message'>" . $a->exclusao() . "</div>";
}
?>