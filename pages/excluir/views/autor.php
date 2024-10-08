<div class="tabform">
    <p>Digite o código do autor a ser excluído:</p>
    <form method="POST">
        <input type="hidden" name="activeTab" value="tab2">
        <div class="formInputExcluir">
            <div class="form-excluir">
                <input type="text" name="txtcodigo" placeholder="Código do autor" required>
                <button type="submit" name="btnenviarautor" value="Excluir">Excluir</button>
            </div>
        </div>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    extract($_POST, EXTR_OVERWRITE);
    if (isset($btnenviarautor)) {
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
                    <button type="submit" name="confirmar_exclusao_autor" id="botaoConfirmar">Confirmar Exclusão</button>
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
if (isset($confirmar_exclusao_autor)) {
    include_once '../../models/Autor.php';
    $a = new Autor();
    $a->setCodigo($_POST['codigo_confirmado']);
    echo "<div class='message'>" . $a->exclusao() . "</div>";
}
?>

<!-- BOTÂO VOLTAR -->
<?php
    include '../layouts/btn-voltar.php'
?>