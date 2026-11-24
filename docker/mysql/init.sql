-- Database initialization for Fragance Euphoria
SET NAMES utf8mb4;
CREATE DATABASE IF NOT EXISTS `fragance_euphoria_bd` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `fragance_euphoria_bd`;

-- --------------------------------------------------------
-- Tabela de usuarios do sistema (Admin, Gerente, Atendente)
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(120) NOT NULL UNIQUE,
  `senha` VARCHAR(255) NOT NULL,
  `perfil` ENUM('admin', 'gerente', 'atendente') NOT NULL DEFAULT 'atendente',
  `ativo` TINYINT(1) NOT NULL DEFAULT 1,
  `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de clientes da loja
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `senha` VARCHAR(200) NOT NULL,
  `endereco` VARCHAR(150) NOT NULL,
  `celular` BIGINT(14) NOT NULL,
  `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de marcas
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(60) NOT NULL,
  `pais_origem` VARCHAR(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de perfumes
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `perfumes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nome` VARCHAR(100) NOT NULL,
  `descricao_info` TEXT NOT NULL,
  `marca` INT NOT NULL,
  `tipo` VARCHAR(20) DEFAULT 'Unissex',
  `volume` INT NOT NULL,
  `preco` DECIMAL(10,2) NOT NULL,
  `estoque` INT NOT NULL DEFAULT 0,
  `imagem` VARCHAR(255) DEFAULT NULL,
  `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX (`marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de pedidos
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `cliente_nome` VARCHAR(150) NOT NULL,
  `cliente_email` VARCHAR(120) NOT NULL,
  `cliente_celular` VARCHAR(30) NOT NULL,
  `endereco_entrega` VARCHAR(255) NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
  `forma_pagamento` VARCHAR(50) NOT NULL DEFAULT 'PIX',
  `status` ENUM('Pendente', 'Pago', 'Enviado', 'Entregue', 'Cancelado') NOT NULL DEFAULT 'Pendente',
  `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------
-- Tabela de itens do pedido
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `itens_pedido` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `pedido_id` INT NOT NULL,
  `perfume_id` INT NOT NULL,
  `nome_produto` VARCHAR(120) NOT NULL,
  `quantidade` INT NOT NULL,
  `preco_unitario` DECIMAL(10,2) NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (`pedido_id`) REFERENCES `pedidos`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Limpar dados pre-existentes para garantir idempotencia
DELETE FROM `itens_pedido`;
DELETE FROM `pedidos`;
DELETE FROM `perfumes`;
DELETE FROM `marcas`;
DELETE FROM `clientes`;
DELETE FROM `usuarios`;

-- --------------------------------------------------------
-- Seed de usuarios (Admin, Gerente, Atendente)
-- Senha padrao: Password@123
-- --------------------------------------------------------
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `perfil`, `ativo`) VALUES
(1, 'Administrador Fragance', 'admin@fragance.com', '$2y$10$QCqRjJRhF886QyuEebfNW.0dEYkTZ3SYwYp/7mmn3HtvwWuvukWtq', 'admin', 1),
(2, 'Gerente de Vendas', 'gerente@fragance.com', '$2y$10$QCqRjJRhF886QyuEebfNW.0dEYkTZ3SYwYp/7mmn3HtvwWuvukWtq', 'gerente', 1),
(3, 'Atendente de Loja', 'atendente@fragance.com', '$2y$10$QCqRjJRhF886QyuEebfNW.0dEYkTZ3SYwYp/7mmn3HtvwWuvukWtq', 'atendente', 1);

-- --------------------------------------------------------
-- Seed de clientes
-- --------------------------------------------------------
INSERT INTO `clientes` (`id`, `nome`, `email`, `senha`, `endereco`, `celular`) VALUES
(1, 'Lucas Guimarães Campos', 'lucasguimaraes@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Rua das Flores, 123 - Centro - São Paulo/SP', 11987675477),
(2, 'Mariana Silva Santos', 'mariana.silva@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Av. Paulista, 1000 - Bela Vista - São Paulo/SP', 11991234567);

-- --------------------------------------------------------
-- Seed de marcas
-- --------------------------------------------------------
INSERT INTO `marcas` (`id`, `nome`, `pais_origem`) VALUES
(1, 'La Rive', 'Polônia'),
(2, 'O Boticário', 'Brasil'),
(3, 'Avon', 'Estados Unidos'),
(4, 'Carolina Herrera', 'Estados Unidos'),
(5, 'Piment Cosméticos', 'Brasil'),
(6, 'Paco Rabanne', 'Espanha'),
(7, 'Dior', 'França'),
(8, 'Chanel', 'França'),
(9, 'Calvin Klein', 'Estados Unidos'),
(10, 'Le Labo', 'Estados Unidos');

-- --------------------------------------------------------
-- Seed de perfumes
-- --------------------------------------------------------
INSERT INTO `perfumes` (`id`, `nome`, `descricao_info`, `marca`, `tipo`, `volume`, `preco`, `estoque`, `imagem`) VALUES
(1, 'Good Girl', 'Fragrância feminina icônica com notas de tuberosa, jasmim sambac e fava tonka torrada.', 4, 'Feminino', 80, 575.00, 15, 'good_girl.jpg'),
(2, 'Quasar Graffiti', 'Uma fragrância masculina jovem e moderna com explosão de frescor de menta e notas amadeiradas.', 2, 'Masculino', 100, 144.90, 8, 'quasar_grafiti.jpg'),
(3, 'Black Essential Intense', 'Fragrância amadeirada marcante com notas de pimenta preta e couro.', 3, 'Masculino', 100, 150.00, 12, 'perfume_black_essential_intense.jpg'),
(4, '212 VIP Men', 'Inspirado na vida noturna nova-iorquina com notas de lima caviar, vodka e madeira real.', 4, 'Masculino', 100, 480.00, 10, 'perfume_212_vip.jpg'),
(5, 'One Million', 'Aromático amadeirado potente com notas de toranja, hortelã-pimenta, rosa e couro.', 6, 'Masculino', 100, 508.90, 14, 'perfume-masc-one-million.jpg'),
(6, 'Olympéa', 'Fragrância celestial feminina que mistura baunilha salgada, jasmim hidropônico e mandarina verde.', 6, 'Feminino', 80, 445.00, 20, 'Olympea.jpg'),
(7, 'Sauvage Eau de Parfum', 'Fragrância masculina nobre e selvagem com bergamota da Calábria e absoluto de baunilha da Papua Nova Guiné.', 7, 'Masculino', 100, 689.00, 6, 'perfume-masc-ferrari.jpg'),
(8, 'Vodka Man', 'Fragrância aromática elegante com excelente projeção e fixação para o dia a dia.', 1, 'Masculino', 100, 89.90, 25, 'perfume-vodka-sem-fundo.png'),
(9, 'CK One', 'Fragrância cítrica e aromática feita para ser compartilhada, com bergamota, chá verde e almíscar.', 9, 'Unissex', 200, 329.90, 18, 'unissex-ck-one.svg'),
(10, 'Gris Dior', 'Chypre floral elegante com rosa de Damasco, patchouli e musgo de carvalho.', 7, 'Unissex', 125, 1450.00, 6, 'unissex-gris-dior.svg'),
(11, 'Sycomore', 'Amadeirado esfumaçado com vetiver, sândalo e cipreste, da coleção Les Exclusifs.', 8, 'Unissex', 75, 1390.00, 4, 'unissex-sycomore.svg'),
(12, 'Santal 33', 'Sândalo australiano, cardamomo, íris e couro em uma assinatura amadeirada icônica.', 10, 'Unissex', 100, 2190.00, 3, 'unissex-santal-33.svg');

-- --------------------------------------------------------
-- Seed de pedidos de demonstracao
-- --------------------------------------------------------
INSERT INTO `pedidos` (`id`, `cliente_nome`, `cliente_email`, `cliente_celular`, `endereco_entrega`, `total`, `forma_pagamento`, `status`, `criado_em`) VALUES
(1, 'Lucas Guimarães Campos', 'lucasguimaraes@email.com', '11987675477', 'Rua das Flores, 123 - Centro - São Paulo/SP', 719.90, 'PIX', 'Pago', NOW() - INTERVAL 2 DAY),
(2, 'Mariana Silva Santos', 'mariana.silva@email.com', '11991234567', 'Av. Paulista, 1000 - Bela Vista - São Paulo/SP', 445.00, 'Cartão de Crédito', 'Enviado', NOW() - INTERVAL 1 DAY);

INSERT INTO `itens_pedido` (`id`, `pedido_id`, `perfume_id`, `nome_produto`, `quantidade`, `preco_unitario`, `subtotal`) VALUES
(1, 1, 1, 'Good Girl', 1, 575.00, 575.00),
(2, 1, 2, 'Quasar Graffiti', 1, 144.90, 144.90),
(3, 2, 6, 'Olympéa', 1, 445.00, 445.00);

-- --------------------------------------------------------
-- Estrutura da tabela `cartoes_cliente`
-- --------------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartoes_cliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int NOT NULL,
  `nome_titular` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ultimos_digitos` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bandeira` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Mastercard',
  `validade` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criado_em` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `fk_cartoes_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `cartoes_cliente` (`id`, `cliente_id`, `nome_titular`, `ultimos_digitos`, `bandeira`, `validade`) VALUES
(1, 1, 'LUCAS G CAMPOS', '4242', 'Mastercard', '08/29');


