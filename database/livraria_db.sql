-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30/09/2024 às 11:28
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `livraria_db`
--
CREATE DATABASE `livraria_db`;
USE `livraria_db`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

DROP TABLE IF EXISTS `autor`;
CREATE TABLE IF NOT EXISTS `autor` (
  `Cod_autor` int NOT NULL AUTO_INCREMENT,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL,
  PRIMARY KEY (`Cod_autor`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `autor`
--

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `autoria`
--

DROP TABLE IF EXISTS `autoria`;
CREATE TABLE IF NOT EXISTS `autoria` (
  `Cod_autor` int NOT NULL,
  `Cod_livro` int NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `autoria`
--

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE IF NOT EXISTS `livro` (
  `Cod_livro` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Idioma` varchar(30) NOT NULL,
  `QtdPag` int NOT NULL,
  PRIMARY KEY (`Cod_livro`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `livro`
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
