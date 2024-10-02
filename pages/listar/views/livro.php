
<?php
include_once '../../models/Livro.php';
$a = new Livro();
$livro_bd = $a->listar();
?>
<div class="tabelaContainer">
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
            foreach ($livro_bd as $livro) {
            ?>
                <tr>
                    <td><?php echo $livro[0]; ?></td>
                    <td><?php echo $livro[1]; ?></td>
                    <td><?php echo $livro[2]; ?></td>
                    <td><?php echo $livro[3]; ?></td>
                    <td><?php echo $livro[4]; ?></td>
                    <td><?php echo $livro[5]; ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>

<!-- BOTÂO VOLTAR -->
<?php
    include '../layouts/btn-voltar.php'
?>