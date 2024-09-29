<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../assets/css/listar.css">
</head>
<body>
    <?php
        $activeTab = isset($_POST['activeTab']) ? $_POST['activeTab'] : 'tab1';
    ?>
    <center><h1>Listar</h1></center>
    <div class="form-container">
        <form method="POST" id="tabForm">
            <input type="hidden" name="activeTab" id="activeTab" value="<?php echo $activeTab; ?>">
            <div class="tabs">
                <div class="tab <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>" data-tab="tab1" onclick="changeTab('tab1')">Livro</div>
                <div class="tab <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" data-tab="tab2" onclick="changeTab('tab2')">Autor</div>
                <div class="tab <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" data-tab="tab3" onclick="changeTab('tab3')">Autoria</div>
            </div>

            <div class="tab-content <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>" id="tab1">
                <?php
                include_once '../models/Livro.php';
                $l = new Livro();
                $livro_bd = $l->listar();
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
                <div class="button-container">
                    <a href="../index.html" class="botao-voltar">Voltar</a>
                </div>
            </div>

            <div class="tab-content <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" id="tab2">
                <?php
                include_once '../models/Autor.php';
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
                            foreach ($autor_bd as $autor_mostrar) {
                            ?>
                                <tr>
                                    <td><?php echo $autor_mostrar[0]; ?></td>
                                    <td><?php echo $autor_mostrar[1]; ?></td>
                                    <td><?php echo $autor_mostrar[2]; ?></td>
                                    <td><?php echo $autor_mostrar[3]; ?></td>
                                    <td><?php echo $autor_mostrar[4]; ?></td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="button-container">
                    <a href="../index.html" class="botao-voltar">Voltar</a>
                </div>
            </div>

            <div class="tab-content <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" id="tab3">
                <?php
                include_once '../models/Autoria.php';
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
                    <a href="../index.html" class="botao-voltar">Voltar</a>
                </div>
            </div>
        </form>
    </div>

    <script>
        function changeTab(tabId) {
            document.getElementById('activeTab').value = tabId; 
            document.getElementById('tabForm').submit();
        }
    </script>
</body>
</html>
