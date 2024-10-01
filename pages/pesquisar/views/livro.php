<form method="POST">
    <input type="hidden" name="activeTab" value="tab1">
    <div class="formPesquisar">
        <input type="text" name="txtpesquisar" placeholder="Digite o titulo do livro">
        <input type="submit" value="Pesquisar" name="btnpesquisarlivro">
    </div>
</form>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        extract($_POST, EXTR_OVERWRITE);
        if (isset($btnpesquisarlivro)) {
            include_once '../../models/Livro.php';
            $a = new Livro();
            $a->setTitulo($_POST['txtpesquisar']);
            $livros = $a->consultar();
    
            if ($livros) {
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
                            <?php
                            foreach($livros as $livro) {
                                ?>
                                <tr>
                                    <td><?php echo $livro['Cod_livro']; ?></td>
                                    <td><?php echo $livro['Titulo']; ?></td>
                                    <td><?php echo $livro['Categoria']; ?></td>
                                    <td><?php echo $livro['ISBN']; ?></td>
                                    <td><?php echo $livro['Idioma']; ?></td>
                                    <td><?php echo $livro['QtdPag']; ?></td>
                                </tr>
                                <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } else {
                echo "<div class='message'><p>Nome do livro não encontrado.</p></div>";
            }
        }
    }            
    ?>
<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>