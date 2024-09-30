<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="stylesheet" href="../assets/css/pesquisar.css">
</head>
<body>
    <?php
        $activeTab = isset($_POST['activeTab']) ? $_POST['activeTab'] : 'tab1';
    ?>
    <center><h1>Pesquisar</h1></center>
    <div class="form-container">
        <div class="tabs">
        <div class="tab <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>" data-tab="tab1">Livro</div>
        <div class="tab <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" data-tab="tab2">Autor</div>
        <div class="tab <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" data-tab="tab3">Autoria</div>
        </div>


        
        <div class="tab-content <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>" id="tab1">
            <form method="POST">
                <input type="hidden" name="activeTab" value="tab1">
                <div class="formPesquisar">
                    <input type="text" name="txtpesquisar" placeholder="Digite o titulo do livro">
                    <input type="submit" value="Pesquisar">
                </div>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['txtpesquisar'])) {
                        include_once '../models/Livro.php';
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
                <a href="../index.html" class="botao-voltar">Voltar</a>
            </div>
        </div>



        <div class="tab-content <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" id="tab2">
            <form method="POST">
                <input type="hidden" name="activeTab" value="tab2">
                <div class="formPesquisar">
                    <input type="text" name="txtpesquisar" placeholder="Digite o nome do autor">
                    <input type="submit" value="Pesquisar">
                </div>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['txtpesquisar'])) {
                        include_once '../models/Autor.php';
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
            <div class="button-container">
                <a href="../index.html" class="botao-voltar">Voltar</a>
            </div>
        </div>
        <div class="tab-content <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" id="tab3">
        <form method="POST">
                <input type="hidden" name="activeTab" value="tab3">
                <div class="formPesquisar">
                    <input type="text" name="txtpesquisar" placeholder="Digite o nome da editora">
                    <input type="submit" value="Pesquisar">
                </div>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['txtpesquisar'])) {
                        include_once '../models/Autoria.php';
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
                <a href="../index.html" class="botao-voltar">Voltar</a>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelectorAll('.tab, .tab-content').forEach(el => {
                    el.classList.remove('active');
                });
                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active');
            });
        });
    </script>
</body>
</html>
