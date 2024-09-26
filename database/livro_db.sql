-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2024 às 19:31
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_autor` int(11) NOT NULL,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Gabriel', 'Garcia Marquez', 'gabriel.gm@example.com', '1927-03-06'),
(2, 'Jane', 'Austen', 'jane.austen@example.com', '1775-12-16'),
(3, 'Miguel', 'de Cervantes', 'miguel.cervantes@example.com', '1547-09-29'),
(4, 'George', 'Orwell', 'george.orwell@example.com', '1903-06-25'),
(5, 'Paulo', 'Coelho', 'paulo.coelho@example.com', '1947-08-24'),
(6, 'Antoine', 'Saint', 'antoine.sain@example.com', '1900-06-29'),
(7, 'Stephen', 'King', 'stephen@example.com', '1947-09-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_autor` int(11) NOT NULL,
  `Cod_livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `DataLancamento`, `Editora`) VALUES
(1, 1, '1967-06-05', 'Harper & Row'),
(2, 2, '1813-01-28', 'T. Egerton'),
(3, 3, '1605-01-16', 'Francisco de Robles'),
(4, 4, '1949-06-08', 'Secker & Warburg'),
(5, 5, '1988-05-01', 'HarperTorch'),
(5, 1, '1988-05-01', 'dark matter'),
(4, 3, '1605-01-16', 'Intrínseca'),
(7, 4, '1949-06-08', 'Intrínseca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_livro` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Idioma` varchar(30) NOT NULL,
  `QtdPag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdPag`) VALUES
(1, 'Cem Anos de Solidão', 'Ficção', '2147483647', 'Português', 417),
(2, 'Orgulho e Preconceito', 'Romance', '2147483647', 'Inglês', 279),
(3, 'Dom Quixote', 'Clássico', '2147483647', 'Espanhol', 1023),
(4, '1984', 'Distopia', '2147483647', 'Inglês', 328),
(5, 'O Alquimista', 'Ficção', '2147483647', 'Português', 208),
(6, 'O Pequeno Príncipe', 'Infantil', '2147483648', 'Francês', 96),
(7, 'A Revolução dos Bichos', 'Ficção', '2147483649', 'Inglês', 112),
(8, 'A Caverna', 'Ficção', '2147483650', 'Português', 211),
(9, 'O Senhor dos Anéis', 'Fantasia', '2147483651', 'Inglês', 1178),
(10, 'O Hobbit', 'Fantasia', '2147483652', 'Inglês', 310),
(11, 'Os Miseráveis', 'Drama', '2147483653', 'Francês', 1463),
(12, 'A Morte de Ivan Ilitch', 'Drama', '2147483654', 'Russo', 96),
(13, 'O Guia do Mochileiro das Galáxias', 'Sci-Fi', '2147483655', 'Inglês', 215),
(14, 'O Código Da Vinci', 'Mistério', '2147483656', 'Inglês', 689),
(15, 'A Menina que Roubava Livros', 'Drama', '2147483657', 'Alemão', 552),
(16, 'O Sol é para Todos', 'Drama', '2147483658', 'Inglês', 281),
(17, 'A Arte da Guerra', 'Estratégia', '2147483659', 'Chinês', 115),
(18, 'A Dança dos Dragões', 'Fantasia', '2147483660', 'Inglês', 1040),
(19, 'O Lobo da Estepe', 'Ficção', '2147483661', 'Alemão', 238),
(20, 'O Retrato de Dorian Gray', 'Drama', '2147483662', 'Inglês', 254),
(21, 'Coração das Trevas', 'Drama', '2147483663', 'Inglês', 96),
(22, 'Brave New World', 'Distopia', '2147483664', 'Inglês', 311),
(23, 'O Silmarillion', 'Fantasia', '2147483665', 'Inglês', 365),
(24, 'O Apanhador no Campo de Centeio', 'Ficção', '2147483666', 'Inglês', 277),
(25, 'O Caçador de Pipas', 'Drama', '2147483667', 'Persa', 371),
(26, 'O Último Olimpiano', 'Fantasia', '2147483668', 'Inglês', 376),
(27, 'Eu, Robô', 'Sci-Fi', '2147483669', 'Inglês', 224),
(28, 'Drácula', 'Terror', '2147483670', 'Inglês', 416),
(29, 'Frankenstein', 'Terror', '2147483671', 'Inglês', 280),
(30, 'A Insustentável Leveza do Ser', 'Drama', '2147483672', 'Checo', 320);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
