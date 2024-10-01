# Livraria - Sistema CRUD

Este projeto é um sistema simples de gerenciamento de livraria, onde é possível realizar as operações básicas de CRUD (Create, Read, Update, Delete). O sistema foi desenvolvido utilizando **HTML**, **CSS** para a interface e **PHP** com **MySQL** para a manipulação de dados no backend.

## Funcionalidades

O sistema permite as seguintes operações:

- **Pesquisar**: Consultar livros cadastrados no banco de dados.
- **Cadastrar**: Adicionar novos livros.
- **Testar**: Realizar testes sobre o funcionamento das operações CRUD.
- **Alterar**: Modificar dados de livros existentes.
- **Excluir**: Remover livros do banco de dados.

## Tecnologias Utilizadas

- **HTML**: Para a estrutura da página.
- **CSS**: Para o estilo e design da interface.
- **PHP**: Para a lógica de backend e manipulação do banco de dados.
- **MySQL**: Banco de dados relacional utilizado para armazenar os dados dos livros. Gerenciado via **phpMyAdmin**.

## Como Executar o Projeto

### Pré-requisitos

- Um servidor local como o **XAMPP** ou **WAMP** que suporte PHP.
- **phpMyAdmin** para gerenciar o banco de dados MySQL.

### Passo a Passo

1. **Clone o repositório**:
   ```bash
   git clone https://github.com/Harthuz/livrariaCRUD.git
   ```

2. **Configure o banco de dados**:
   - Abra o **phpMyAdmin**.
   - Importe o arquivo `livraria_db.sql` localizado na pasta do projeto `livrariaCRUD\database\livraria_db.sql`.

3. **Inicie o servidor local**:
   - Coloque os arquivos do projeto na pasta `htdocs` (se estiver usando o XAMPP).
   - Acesse `http://localhost/livrariaCRUD` no navegador.
