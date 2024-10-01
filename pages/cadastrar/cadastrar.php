<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../../assets/css/cadastrar.css">
</head>
<body>
    <center><h1>Cadastrar</h1></center>
    <div class="form-container">
        <div class="tabs">
            <div class="tab active" data-tab="tab1">Livro</div>
            <div class="tab" data-tab="tab2">Autor</div>
            <div class="tab" data-tab="tab3">Autoria</div>
        </div>

        <div class="tab-content active" id="tab1">

            <?php
                include_once './views/livro.php'
            ?>

        </div>

        <div class="tab-content" id="tab2">
            
            <?php
                include_once './views/autor.php'
            ?>

        </div>

        <div class="tab-content" id="tab3">

            <?php
                include_once './views/autoria.php'
            ?>

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
