<form method="POST">
    <input type="hidden" name="activeTab" value="tab2">
    <div class="formPesquisar">
        <input type="text" name="txtpesquisar" placeholder="Digite o nome do autor">
        <input type="submit" value="Pesquisar" name="btnpesquisarautor">
    </div>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($btnpesquisarautor)) {
            include_once '../../models/Autor.php';
            $a = new Autor();
            $a->setNome($_POST['txtpesquisar']);
            $autores = $a->consultar();
    
            if ($autores) {
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
                            <?php
                            foreach($autores as $autor) {
                                ?>
                                <tr>
                                    <td><?php echo $autor['Cod_autor']; ?></td>
                                    <td><?php echo $autor['NomeAutor']; ?></td>
                                    <td><?php echo $autor['Sobrenome']; ?></td>
                                    <td><?php echo $autor['Email']; ?></td>
                                    <td><?php echo $autor['Nasc']; ?></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                echo "<div class='message'><p>Nome do autor não encontrado.</p></div>";
            }
        }
    }            
    ?>

<!-- BOTÂO VOLTAR -->
<?php
    include '../layouts/btn-voltar.php'
?>