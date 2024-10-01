<?php
include_once '../../models/Autor.php';
$a = new Autor();
$autor_bd = $a->listar();
?>
<div class="tabelaContainer">
    <table class="tabelaEstilo">
        <thead>
            <tr>
                <th>Código Autor</th>
                <th>Nome Autor</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Nascimento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($autor_bd as $autoria_mostrar) {
            ?>
                <tr>
                    <td><?php echo $autoria_mostrar[0]; ?></td>
                    <td><?php echo $autoria_mostrar[1]; ?></td>
                    <td><?php echo $autoria_mostrar[2]; ?></td>
                    <td><?php echo $autoria_mostrar[3]; ?></td>
                    <td><?php echo $autoria_mostrar[4]; ?></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>
<div class="button-container">
    <a href="../../index.html" class="botao-voltar">Voltar</a>
</div>