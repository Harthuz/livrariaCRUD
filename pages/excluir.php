<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../assets/css/excluir.css">
</head>
<body>
    <?php
        $activeTab = isset($_POST['activeTab']) ? $_POST['activeTab'] : 'tab1';
    ?>
    <center><h1>Excluir</h1></center>
    <div class="form-container">
        <div class="tabs">
            <div class="tab <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>" data-tab="tab1">Livro</div>
            <div class="tab <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" data-tab="tab2">Autor</div>
            <div class="tab <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" data-tab="tab3">Autoria</div>
        </div>
        <div class="tab-content <?php echo ($activeTab === 'tab1') ? 'active' : ''; ?>" id="tab1">
            <div class="tabform">
                <p>Digite o código do livro a ser excluído:</p>
                <div class="formInputExcluir">
                    <form method="POST">
                        <input type="hidden" name="activeTab" value="tab1">
                        <div class="form-excluir">
                            <input type="text" name="txtcodigo" placeholder="Código do livro" required>
                            <button type="submit" name="btnenviar" value="Excluir">Excluir</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="button-container">
                <a href="../index.html" class="botao-voltar">Voltar</a>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['txtcodigo'])) {
                    include_once '../models/Livro.php';
                    $l = new Livro();
                    $l->setCodigo($_POST['txtcodigo']);
                    $livro = $l->exclusao1();

                    if ($livro) {
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
                                    <tr>
                                        <td><?php echo $livro['Cod_livro']; ?></td>
                                        <td><?php echo $livro['Titulo']; ?></td>
                                        <td><?php echo $livro['Categoria']; ?></td>
                                        <td><?php echo $livro['ISBN']; ?></td>
                                        <td><?php echo $livro['Idioma']; ?></td>
                                        <td><?php echo $livro['QtdPag']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="formConfirmar">
                            <form method="POST">
                                <input type="hidden" name="activeTab" value="tab1">
                                <input type="hidden" name="codigo_confirmado" value="<?php echo $livro['Cod_livro']; ?>">
                                <button type="submit" name="confirmar_exclusao" id="botaoConfirmar">Confirmar Exclusão</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        echo "<div class='message'><p>Código do livro não encontrado.</p></div>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['confirmar_exclusao']) && isset($_POST['codigo_confirmado'])) {
                include_once '../models/Livro.php';
                $l = new Livro();
                $l->setCodigo($_POST['codigo_confirmado']);
                echo "<div class='message'>" . $l->exclusao() . "</div>";
            }
            ?>
        </div>
        <div class="tab-content <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" id="tab2">
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
                <a href="../index.html" class="botao-voltar">Voltar</a>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['txtcodigo'])) {
                    include_once '../models/Autor.php';
                    $a = new Autor();
                    $a->setCodigo($_POST['txtcodigo']);
                    $autor_mostrar = $a->exclusao1();

                    if ($autor_mostrar) {
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
                                        <td><?php echo $autor_mostrar['Cod_autor']; ?></td>
                                        <td><?php echo $autor_mostrar['NomeAutor']; ?></td>
                                        <td><?php echo $autor_mostrar['Sobrenome']; ?></td>
                                        <td><?php echo $autor_mostrar['Email']; ?></td>
                                        <td><?php echo $autor_mostrar['Nasc']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="formConfirmar">
                            <form method="POST">
                                <input type="hidden" name="activeTab" value="tab2">
                                <input type="hidden" name="codigo_confirmado" value="<?php echo $autor_mostrar['Cod_autor']; ?>">
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
                include_once '../models/Autor.php';
                $a = new Autor();
                $a->setCodigo($_POST['codigo_confirmado']);
                echo "<div class='message'>" . $a->exclusao() . "</div>";
            }
            ?>
        </div>
        <div class="tab-content <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" id="tab3">
            <div class="tabform">
                <p>Digite o código do autor e o código do livro da autoria a ser excluída:</p>
                <div class="formInputExcluir">
                    <form method="POST">
                        <input type="hidden" name="activeTab" value="tab3">
                        <div class="form-excluir">
                            <input type="text" name="txtcodigo" placeholder="Código do livro" required>
                            <input type="text" name="txtcodigo2" placeholder="Código do autor" required>
                            <button type="submit" name="btnenviar" value="Excluir">Excluir</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="button-container">
                <a href="../index.html" class="botao-voltar">Voltar</a>
            </div>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['txtcodigo']) && isset($_POST['txtcodigo2'])) {
                    include_once '../models/Autoria.php';
                    $a = new Autoria();
                    $a->setCodigoLivro($_POST['txtcodigo']);
                    $a->setCodigoAutor($_POST['txtcodigo2']);
                    $autoria_mostrar = $a->exclusao1();

                    if ($autoria_mostrar) {
                        ?>
                        <div class="tabelaContainer" style="margin-top: 30px;">
                            <table class="tabelaEstilo">
                                <thead>
                                    <tr>
                                        <th>Código Autor</th>
                                        <th>Código Livro</th>
                                        <th>Lançamento</th>
                                        <th>Editora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $autoria_mostrar['Cod_autor']; ?></td>
                                        <td><?php echo $autoria_mostrar['Cod_livro']; ?></td>
                                        <td><?php echo $autoria_mostrar['DataLancamento']; ?></td>
                                        <td><?php echo $autoria_mostrar['Editora']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="formConfirmar">
                            <form method="POST">
                                <input type="hidden" name="activeTab" value="tab3">
                                <input type="hidden" name="codigo_confirmado" value="<?php echo $autoria_mostrar['Cod_autor']; ?>">
                                <input type="hidden" name="codigo_confirmado2" value="<?php echo $autoria_mostrar['Cod_livro']; ?>">
                                <button type="submit" name="confirmar_exclusao" id="botaoConfirmar">Confirmar Exclusão</button>
                            </form>
                        </div>
                        <?php
                    } else {
                        echo "<div class='message'><p>Código da autoria não encontrado.</p></div>";
                    }
                }
            }
            ?>

            <?php
            if (isset($_POST['confirmar_exclusao']) && isset($_POST['codigo_confirmado']) && isset($_POST['codigo_confirmado2'])) {
                include_once '../models/Autoria.php';
                $a = new Autoria();
                $a->setCodigoAutor($_POST['codigo_confirmado']);
                $a->setCodigoLivro($_POST['codigo_confirmado2']);
                echo "<div class='message'>" . $a->exclusao() . "</div>";
            }
            ?>
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
