// Função para criar o botão
function createButton(text, imgPath, link) {
    const btn = document.createElement('a');  // Usando uma tag <a> para que seja clicável
    btn.href = link;  // Define o link de destino
    btn.classList.add('btn');  // Adiciona a classe de estilo ao botão

    // Estrutura do botão
    btn.innerHTML = `
        <div class="img_btn">
            <img src="${imgPath}" alt="${text}">
        </div>
        <div class="txt_btn">
            ${text}
        </div>
    `;

    // Retorna o botão criado
    return btn;
}

// Adicionando botões dinamicamente ao contêiner
const btnContainer = document.getElementById('btn_container');

// Exemplo de uso, passando texto, imagem e link
btnContainer.appendChild(createButton('PESQUISAR', './assets/images/icon_pesquisar.png', './pages/pesquisar/pesquisar.php'));
btnContainer.appendChild(createButton('CADASTRAR', './assets/images/icon_cadastrar.png', './pages/cadastrar/cadastrar.php'));
btnContainer.appendChild(createButton('LISTAR', './assets/images/icon_listar.png', './pages/listar.php'));
btnContainer.appendChild(createButton('ALTERAR', './assets/images/icon_alterar.png', './pages/alterar/alterar.php'));
btnContainer.appendChild(createButton('EXCLUIR', './assets/images/icon_excluir.png', './pages/excluir.php'));