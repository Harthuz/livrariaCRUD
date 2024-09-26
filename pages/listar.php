<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="./assets/listar.css">
</head>
<body>
    <center><h1>Listar</h1></center>
    <div class="form-container">
        <div class="tabs">
            <div class="tab active" data-tab="tab1">Livro</div>
            <div class="tab" data-tab="tab2">Autor</div>
            <div class="tab" data-tab="tab3">Autoria</div>
        </div>
        <div class="tab-content active" id="tab1">
        <?php
            include_once 'Livro.php';
            $l = new Livro();
            $livro_bd=$l->listar();
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
                            foreach($livro_bd as $livro_mostrar){
                            ?>
                                <tr>
                                    <td><?php echo $livro_mostrar[0]; ?></td>
                                    <td><?php echo $livro_mostrar[1]; ?></td>
                                    <td><?php echo $livro_mostrar[2]; ?></td>
                                    <td><?php echo $livro_mostrar[3]; ?></td>
                                    <td><?php echo $livro_mostrar[4]; ?></td>
                                    <td><?php echo $livro_mostrar[5]; ?></td>
                                </tr>
                            <?php
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="button-container">
                <a href="index.html" class="botao-voltar">Voltar</a>
            </div>
        </div>
        <div class="tab-content" id="tab2">
        <?php
            include_once 'Autor.php';
            $a = new Autor();
            $autor_bd=$a->listar();
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
                        foreach($autor_bd as $autor_mostrar){
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
                <a href="index.html" class="botao-voltar">Voltar</a>
            </div>
        </div>
        <div class="tab-content" id="tab3">
        <?php
            include_once 'Autoria.php';
            $a = new Autoria();
            $autoria_bd=$a->listar();
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
                        foreach($autoria_bd as $autoria_mostrar){
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
                <a href="index.html" class="botao-voltar">Voltar</a>
            </div>
        </div>
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST, EXTR_OVERWRITE);
            if(isset($form_type)) {
                switch ($form_type) {
                    case 'livro':
                        if (isset($btenviar_livro)) {
                            include_once 'Livro.php';
                            $livro = new Livro();
                            $livro->setTitulo($titulo);
                            $livro->setCategoria($categoria);
                            $livro->setISBN($isbn);
                            $livro->setIdioma($idioma);
                            $livro->setPaginas($qtd_pag);
                            echo "<h3><br><br>" . $livro->salvar() . "</h3>";
                        }
                        break;

                    case 'autor':
                        if (isset($btenviar_autor)) {
                            include_once 'Autor.php';
                            $autor = new Autor();
                            $autor->setNome($nome);
                            $autor->setSobrenome($sobrenome);
                            $autor->setEmail($email);
                            $autor->setNasc($nasc);
                            echo "<h3><br><br>" . $autor->salvar() . "</h3>";
                        }
                        break;

                    case 'autoria':
                        if (isset($btenviar_autoria)) {
                            include_once 'Autoria.php';
                            $autoria = new Autoria();
                            $autoria->setCodigoAutor($autor);
                            $autoria->setCodigoLivro($livro);
                            $autoria->setDataLancamento($lancamento);
                            $autoria->setEditora($editora);
                            echo "<h3><br><br>" . $autoria->salvar() . "</h3>";
                        }
                        break;
                    
                    default:
                        echo "<h3>Formulário desconhecido.</h3>";
                }
            }
        }
    ?>

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
