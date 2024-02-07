-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 07-Fev-2024 às 17:10
-- Versão do servidor: 8.0.36-0ubuntu0.22.04.1
-- versão do PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ajax`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `falha`
--

CREATE TABLE `falha` (
  `id_falha` bigint NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensagem` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_falha`
--

CREATE TABLE `login_falha` (
  `id_login` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `login_falha`
--

INSERT INTO `login_falha` (`id_login`, `email`, `senha`) VALUES
(1, 'marcos@gmail.com', '122122'),
(2, 'marcos@gmail.com', '0101');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_protegido`
--

CREATE TABLE `login_protegido` (
  `id_login_protegido` bigint NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `login_protegido`
--

INSERT INTO `login_protegido` (`id_login_protegido`, `email`, `senha`) VALUES
(1, 'marcos@gmail.com', '0202');

-- --------------------------------------------------------

--
-- Estrutura da tabela `protecao`
--

CREATE TABLE `protecao` (
  `id_protecao` bigint NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensagem` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `falha`
--
ALTER TABLE `falha`
  ADD PRIMARY KEY (`id_falha`);

--
-- Índices para tabela `login_falha`
--
ALTER TABLE `login_falha`
  ADD PRIMARY KEY (`id_login`);

--
-- Índices para tabela `login_protegido`
--
ALTER TABLE `login_protegido`
  ADD PRIMARY KEY (`id_login_protegido`);

--
-- Índices para tabela `protecao`
--
ALTER TABLE `protecao`
  ADD PRIMARY KEY (`id_protecao`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `falha`
--
ALTER TABLE `falha`
  MODIFY `id_falha` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `login_falha`
--
ALTER TABLE `login_falha`
  MODIFY `id_login` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_protegido`
--
ALTER TABLE `login_protegido`
  MODIFY `id_login_protegido` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `protecao`
--
ALTER TABLE `protecao`
  MODIFY `id_protecao` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
