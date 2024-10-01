<?php
include_once '../../models/Autoria.php';
$a = new Autoria();
$autoria_bd = $a->listar();
?>
<div class="tabelaContainer">
    <table class="tabelaEstilo">
        <thead>
            <tr>
                <th>Código Autor</th>
                <th>Código Livro</th>
                <th>Data Lançamento</th>
                <th>Editora</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($autoria_bd as $autoria_mostrar) {
            ?>
                <tr>
                    <td><?php echo $autoria_mostrar[0]; ?></td>
                    <td><?php echo $autoria_mostrar[1]; ?></td>
                    <td><?php echo $autoria_mostrar[2]; ?></td>
                    <td><?php echo $autoria_mostrar[3]; ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>
<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>