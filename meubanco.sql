-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/05/2026 às 22:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meubanco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadprod`
--

CREATE TABLE `cadprod` (
  `id` int(4) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `valor` float NOT NULL,
  `tipo` varchar(225) NOT NULL,
  `unidade` varchar(225) NOT NULL,
  `fabricante` varchar(225) NOT NULL,
  `classificacao` varchar(225) NOT NULL,
  `saldo` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cadprod`
--

INSERT INTO `cadprod` (`id`, `nome`, `valor`, `tipo`, `unidade`, `fabricante`, `classificacao`, `saldo`) VALUES
(8, 'Ar Midea 20000btu', 5000, 'Produto', 'UN', 'Midea', 'TESTE', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadusu`
--

CREATE TABLE `cadusu` (
  `id` int(4) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `empresa` varchar(225) NOT NULL,
  `privilegio` int(10) NOT NULL,
  `permissao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `cadusu`
--

INSERT INTO `cadusu` (`id`, `nome`, `usuario`, `senha`, `email`, `empresa`, `privilegio`, `permissao`) VALUES
(6, 'Caroline', 'caroline.queiroz', '$2y$10$q65ZHQtQsb/KAQ2ffadfLOajrmdhQKc8PCfnXS0dVj8135InIjwPS', 'caroline.queiroz@gruposetta.com', 'Grupo Setta', 10, 10),
(7, 'Lucas Ribeiro', 'lucas.ribeiro', '$2y$10$G6/rsGZOGomeeMbZehme3euaO67MlpwGOPXaLK7YsAd0aby81vdZS', 'lucas.ribeiro@gruposetta.com', 'Grupo Setta', 10, 10);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadprod`
--
ALTER TABLE `cadprod`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cadusu`
--
ALTER TABLE `cadusu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadprod`
--
ALTER TABLE `cadprod`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cadusu`
--
ALTER TABLE `cadusu`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
