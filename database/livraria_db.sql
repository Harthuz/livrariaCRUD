CREATE DATABASE `livraria_db`;
USE `livraria_db`;

-- Estrutura para tabela `autor`
CREATE TABLE `autor` (
  `Cod_autor` int NOT NULL AUTO_INCREMENT,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL,
  PRIMARY KEY (`Cod_autor`)
) ENGINE=MyISAM;

-- Despejando dados para a tabela `autor`
INSERT INTO `autor` (`Cod_autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Gabriel', 'Garcia Marquez', 'gabriel.gm@example.com', '1927-03-06'),
(2, 'Jane', 'Austen', 'jane.austen@example.com', '1775-12-16'),
(3, 'Miguel', 'de Cervantes', 'miguel.cervantes@example.com', '1547-09-29'),
(4, 'George', 'Orwell', 'george.orwell@example.com', '1903-06-25'),
(5, 'Paulo', 'Coelho', 'paulo.coelho@example.com', '1947-08-24'),
(6, 'Antoine', 'Saint-Exupéry', 'antoine.saint@example.com', '1900-06-29'),
(7, 'Stephen', 'King', 'stephen.king@example.com', '1947-09-21'),
(8, 'Agatha', 'Christie', 'agatha.christie@example.com', '1890-09-15'),
(9, 'J.K.', 'Rowling', 'jk.rowling@example.com', '1965-07-31'),
(10, 'Haruki', 'Murakami', 'haruki.murakami@example.com', '1949-01-12');

-- Estrutura para tabela `autoria`
CREATE TABLE `autoria` (
  `Cod_autor` int NOT NULL,
  `Cod_livro` int NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM;

-- Despejando dados para a tabela `autoria`
INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `DataLancamento`, `Editora`) VALUES
(1, 1, '1967-06-05', 'Harper & Row'),
(2, 2, '1813-01-28', 'T. Egerton'),
(3, 3, '1605-01-16', 'Francisco de Robles'),
(4, 4, '1949-06-08', 'Secker & Warburg'),
(5, 5, '1988-05-01', 'HarperTorch'),
(6, 6, '1943-04-06', 'Reynal & Hitchcock'),
(7, 7, '1945-08-17', 'Secker & Warburg'),
(8, 8, '1897-05-26', 'Archibald Constable & Co.'),
(9, 9, '1997-06-26', 'Bloomsbury'),
(10, 10, '1984-04-01', 'Companhia das Letras');

-- Estrutura para tabela `livro`
CREATE TABLE `livro` (
  `Cod_livro` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Idioma` varchar(30) NOT NULL,
  `QtdPag` int NOT NULL,
  PRIMARY KEY (`Cod_livro`)
) ENGINE=MyISAM;

-- Despejando dados para a tabela `livro`
INSERT INTO `livro` (`Cod_livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdPag`) VALUES
(1, 'Cem Anos de Solidão', 'Ficção', '978-85-01-10000-0', 'Português', 417),
(2, 'Orgulho e Preconceito', 'Romance', '978-85-01-10001-7', 'Inglês', 279),
(3, 'Dom Quixote', 'Clássico', '978-85-01-10002-4', 'Espanhol', 1023),
(4, '1984', 'Distopiaa', '978-85-01-10003-1', 'Inglês', 328),
(5, 'O Alquimista', 'Ficção', '978-85-01-10004-8', 'Português', 208),
(6, 'O Pequeno Príncipe', 'Infantil', '978-85-01-10005-5', 'Francês', 96),
(7, 'A Revolução dos Bichos', 'Ficção', '978-85-01-10006-2', 'Inglês', 112),
(8, 'Drácula', 'Terror', '978-85-01-10007-9', 'Inglês', 416),
(9, 'Frankenstein', 'Terror', '978-85-01-10008-6', 'Inglês', 280),
(10, 'A Insustentável Leveza do Ser', 'Drama', '978-85-01-10009-3', 'Checo', 320);

-- Estrutura para tabela `usuario`
CREATE TABLE `usuario` (
  `usuario` varchar(255) NOT NULL,
  `senha` int NOT NULL
) ENGINE=MyISAM;

-- Despejando dados para a tabela `usuario`
INSERT INTO `usuario` (`usuario`, `senha`) VALUES
('Hernandes', 123456);
