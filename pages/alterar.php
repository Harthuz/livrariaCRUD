        <!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Cadastro</title>
            <link rel="stylesheet" href="../assets/css/cadastrar.css">
        </head>
        <body>
            <center><h1>Alterar</h1></center>
            <div class="form-container">
                <div class="tabs">
                    <div class="tab active" data-tab="tab1">Livro</div>
                    <div class="tab" data-tab="tab2">Autor</div>
                    <div class="tab" data-tab="tab3">Autoria</div>
                </div>
                <div class="tab-content active" id="tab1">

                    <div class="consultar">
                        
                        <form name="livro" method="POST" action="">
                            <input type="hidden" name="form_type" value="livro">
                            <fieldset>
                                <legend>Alterando</legend>
                                <p>Digite o nome do livro que deseja alterar:</p>
                                <input type="text" placeholder="Nome do livro">
                                <br>
                                <input type="submit" value="Consultar" name="btnconsultar">
                            </fieldset>
                        </form>

                    </div>

                    <div class="alterar" hidden>

                    <form name="livro" method="POST" action="">
                        <input type="hidden" name="form_type" value="livro">
                        <fieldset id="a">
                            <legend><b>Dados do Livro</b></legend>
                            <p>Título: <input name="titulo" type="text" size="40" maxlength="100" placeholder="Título do Livro" required></p>
                            <p>Categoria: <input name="categoria" type="text" size="40" maxlength="40" placeholder="Categoria" required></p>
                            <p>ISBN: <input name="isbn" type="text" size="40" maxlength="20" placeholder="ISBN" required></p>
                            <p>Idioma: <input name="idioma" type="text" size="40" maxlength="20" placeholder="Idioma" required></p>
                            <p>Quantidade de Páginas: <input name="qtd_pag" type="number" size="40" placeholder="Quantidade de Páginas" required></p>
                        </fieldset>
                        <fieldset id="b">
                            <legend><b>Opções:</b></legend>
                            <input name="btenviar_livro" type="submit" value="Alterar"> &nbsp;&nbsp;
                            <input name="limpar" type="reset" value="Limpar">
                        </fieldset>
                    </form>

                    </div>
                    
                    <div class="button-container">
                        <a href="../index.html" class="botao-voltar">Voltar</a>
                    </div>

                </div>
                <div class="tab-content" id="tab2">
                    <form name="autor" method="POST" action="">
                        <input type="hidden" name="form_type" value="autor">
                        <fieldset id="a">
                            <legend><b>Dados do Autor</b></legend>
                            <p>Nome Autor: <input name="nome" type="text" size="40" maxlength="100" placeholder="Nome do Autor" required></p>
                            <p>Sobrenome: <input name="sobrenome" type="text" size="40" maxlength="100" placeholder="Sobrenome" required></p>
                            <p>Email: <input name="email" type="text" size="40" maxlength="100" placeholder="Email" required></p>
                            <p>Nascimento: <input name="nasc" type="date" size="40" maxlength="20" placeholder="Nascimento" required></p>
                        </fieldset>
                        <fieldset id="b">
                            <legend><b>Opções:</b></legend>
                            <input name="btenviar_autor" type="submit" value="Cadastrar"> &nbsp;&nbsp;
                            <input name="limpar" type="reset" value="Limpar">
                        </fieldset>
                    </form>
                    <div class="button-container">
                        <a href="../index.html" class="botao-voltar">Voltar</a>
                    </div>
                </div>
                <div class="tab-content" id="tab3">
                    <form name="autoria" method="POST" action="">
                        <input type="hidden" name="form_type" value="autoria">
                        <fieldset id="a">
                            <legend><b>Dados da Autoria</b></legend>
                            <p>Código do Autor: <input name="autor" type="number" size="40" maxlength="100" placeholder="Código do Autor" required></p>
                            <p>Código do Livro: <input name="livro" type="number" size="40" maxlength="40" placeholder="Código do Livro" required></p>
                            <p>Data de Lançamento: <input name="lancamento" type="date" size="40" maxlength="20" placeholder="Data de Lançamento" required></p>
                            <p>Editora: <input name="editora" type="text" size="40" maxlength="30" placeholder="Editora" required></p>
                        </fieldset>
                        <fieldset id="b">
                            <legend><b>Opções:</b></legend>
                            <input name="btenviar_autoria" type="submit" value="Cadastrar"> &nbsp;&nbsp;
                            <input name="limpar" type="reset" value="Limpar">
                        </fieldset>
                    </form>
                    <div class="button-container">
                        <a href="../index.html" class="botao-voltar">Voltar</a>
                    </div>
                </div>
            </div>

            <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    extract($_POST, EXTR_OVERWRITE);
                    if(isset($btnconsultar)) {
                        
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
