<form method="POST">
    <input type="hidden" name="activeTab" value="tab3">
    <div class="formPesquisar">
        <input type="text" name="txtpesquisar" placeholder="Digite o nome da editora">
        <input type="submit" value="Pesquisar" name="btnpesquisarautoria">
    </div>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($btnpesquisarautoria)) {
            include_once '../../models/Autoria.php';
            $a = new Autoria();
            $a->setEditora($_POST['txtpesquisar']);
            $editoras = $a->consultar();
    
            if ($editoras) {
                ?>
                <div class="tabelaContainer" style="margin-top: 30px;">
                    <table class="tabelaEstilo">
                        <thead>
                            <tr>
                                <th>Editora</th>
                                <th>Código Autor</th>
                                <th>Código Livro</th>
                                <th>Data Lançamento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($editoras as $editora) {
                                ?>
                                <tr>
                                    <td><?php echo $editora['Editora']; ?></td>
                                    <td><?php echo $editora['Cod_autor']; ?></td>
                                    <td><?php echo $editora['Cod_livro']; ?></td>
                                    <td><?php echo $editora['DataLancamento']; ?></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                echo "<div class='message'><p>Nome da editora não encontrado.</p></div>";
            }
        }
    }            
    ?>
<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>