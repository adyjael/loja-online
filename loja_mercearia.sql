-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jan-2023 às 18:46
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja_mercearia`
--
CREATE DATABASE IF NOT EXISTS `loja_mercearia` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `loja_mercearia`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomendas`
--

CREATE TABLE IF NOT EXISTS `encomendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeComprador` varchar(50) NOT NULL,
  `dataNascimanto` date NOT NULL,
  `morada` varchar(255) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quantidadeComprada` int(11) NOT NULL,
  `precoTotal` decimal(5,2) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `encomendas`
--

INSERT INTO `encomendas` (`id`, `nomeComprador`, `dataNascimanto`, `morada`, `id_produto`, `quantidadeComprada`, `precoTotal`, `data`) VALUES
(1, 'Paulo', '1971-03-10', 'Rua Castro Fereira, Lisboa, 2725-552', 13, 5, '19.35', '2023-01-23'),
(2, 'João', '2001-10-16', 'Rua Da Penha, Porto, 6345-253', 15, 2, '41.98', '2023-01-23'),
(3, 'Luiz', '1997-06-10', 'Avenida Das Mares, Faro, 4539-543', 5, 6, '15.00', '2023-01-23'),
(4, 'Adyjael', '1995-02-07', 'Rua Castro Fereira, Lisboa, 2725-552', 13, 10, '38.70', '2023-01-28'),
(5, 'Adyjael', '1995-02-07', 'Rua Castro Fereira, Lisboa, 2725-552', 15, 10, '209.90', '2023-01-28'),
(6, 'Adyjael', '2003-01-28', 'Rua Agostinha Da Silva, Faro, 6532-634', 16, 3, '11.40', '2023-01-28'),
(7, 'Adyjael', '2003-01-28', 'Rua Agostinha Da Silva, Faro, 6532-634', 6, 4, '9.00', '2023-01-28'),
(8, 'Adyjael', '2003-01-28', 'Rua Agostinha Da Silva, Faro, 6532-634', 14, 4, '4.12', '2023-01-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `quantidades` int(11) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `imagem`, `quantidades`, `preco`, `data`) VALUES
(1, 'Recheio de Frutos Silvestre', 'Recheio de Frutos Silvestres', 'assets/imagemProdutos/63c888f8d16dc.png', 0, '6.30', '2023-01-19'),
(2, 'Recheio Maçã e Canela', 'Recheio Maçã e Canela', 'assets/imagemProdutos/63c889484c207.webp', 6, '5.99', '2023-01-19'),
(3, 'Recheio Morango', 'Recheio Morango', 'assets/imagemProdutos/63c88966673d1.webp', 0, '6.99', '2023-01-19'),
(4, 'Doce de Manga', 'Doce de Manga', 'assets/imagemProdutos/63c889cd00697.webp', 0, '1.95', '2023-01-19'),
(5, 'Doce de Frutos Vermelhos', 'Doce de Frutos Vermelhos', 'assets/imagemProdutos/63c889f8b6118.webp', 5, '2.50', '2023-01-19'),
(6, 'Doce de Abóbora', 'Doce de Abóbora', 'assets/imagemProdutos/63c88a2ca9d1f.webp', 5, '2.25', '2023-01-19'),
(13, 'Fios de arroz 500g', 'Fios de arroz 500g', 'assets/imagemProdutos/63cd6641d0a31.jpeg', 50, '3.89', '2023-01-22'),
(14, 'Agua sem gas premium garrafa 0,5l', 'Agua sem gas premium garrafa 0,5l', 'assets/imagemProdutos/63cd66870c8a2.jpeg', 200, '1.03', '2023-01-22'),
(15, 'Queijo Cheddar Vintage Triangle aprox 3,3 kg', 'Queijo Cheddar Vintage Triangle aprox 3,3 kg', 'assets/imagemProdutos/63cd672804e99.jpeg', 193, '20.99', '2023-01-22'),
(16, 'Bolo Café Moka', 'Bolo Café Moka', 'assets/imagemProdutos/63cd677cd668a.webp', 20, '3.80', '2023-01-22');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id`, `nome`, `email`, `senha`, `data`) VALUES
(1, 'adyjael', 'adyjael@gmail.com', 'projetofinal', '2023-01-21');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomendas`
--
ALTER TABLE `encomendas`
  ADD CONSTRAINT `encomendas_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
