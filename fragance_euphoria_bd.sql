-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2023 às 04:17
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fragance_euphoria_bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `celular` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `endereco`, `celular`) VALUES
(1, 'Lucas Guimaraes Campos', 'lucasguimaraes@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Rua do Lucas N° 123 - Bairro Teste - Guarulhos - SP', 11987675477);

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `pais_origem` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`id`, `nome`, `pais_origem`) VALUES
(1, 'La Rive', 'Polônia'),
(2, 'O Boticário', 'Brasil'),
(3, 'Avon', 'Nova York - EUA'),
(4, 'Carolina Herrera', ' New York'),
(5, 'Piment Cosméticos', 'Brasil'),
(6, 'Paco Rabanne', 'Espanha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfumes`
--

CREATE TABLE `perfumes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `marca` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `volume` int(11) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `imagem` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `perfumes`
--

INSERT INTO `perfumes` (`id`, `descricao`, `marca`, `tipo`, `volume`, `preco`, `estoque`, `imagem`) VALUES
(1, 'Good Girl', 4, 'Feminino', 150, 575.00, 10, 0x676f6f645f6769726c2e6a7067),
(2, 'Quasar Graffiti', 2, 'Masculino', 100, 144.90, 5, 0x7175617361725f677261666974692e6a7067),
(3, 'Black Essential Intense', 3, 'Masculino', 150, 150.00, 10, NULL),
(4, '212 VIP', 3, 'Masculino', 100, 300.00, 10, 0x70657266756d655f3231325f7669702e6a7067),
(5, 'Black Essential Intense', 3, 'Masculino', 150, 250.00, 12, 0x70657266756d655f626c61636b5f657373656e7469616c5f696e74656e73652e6a7067),
(6, 'Tetse', 1, 'Unissex', 150, 49.99, 76, 0x70657266756d652d766f646b612d73656d2d66756e646f2e706e67),
(7, 'One Million', 6, 'Masculino', 100, 508.90, 11, 0x70657266756d652d6d6173632d6f6e652d6d696c6c696f6e2e6a7067),
(8, 'Olympea', 6, 'Feminino', 80, 445.00, 20, 0x4f6c796d7065612e6a7067);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `perfumes`
--
ALTER TABLE `perfumes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `perfumes`
--
ALTER TABLE `perfumes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
