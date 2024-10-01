<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="../../assets/css/listar.css">
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
                    include_once './views/livro.php'
                ?>

            </div>

            <div class="tab-content <?php echo ($activeTab === 'tab2') ? 'active' : ''; ?>" id="tab2">
               
                <?php
                    include_once './views/autor.php'
                ?>

            </div>

            <div class="tab-content <?php echo ($activeTab === 'tab3') ? 'active' : ''; ?>" id="tab3">
                
                <?php
                    include_once './views/autoria.php'
                ?>

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
