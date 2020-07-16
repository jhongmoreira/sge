-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Jul-2020 às 15:57
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sge`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(10) NOT NULL,
  `matricula` int(8) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `whatsapp` varchar(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `obs` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(10) NOT NULL,
  `cpf` int(12) DEFAULT NULL,
  `nome` varchar(120) NOT NULL,
  `curso` varchar(100) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `whatsapp` varchar(11) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `grau` varchar(3) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `cpf`, `nome`, `curso`, `email`, `telefone`, `celular`, `whatsapp`, `ativo`, `obs`, `grau`, `cidade`, `uf`) VALUES
(3, 2147483647, 'Candidato Teste', 'Teste', 'teste@gmai.com', '3436711500', '34988446331', '34988446331', 1, 'Teste', 'BOM', 'São Gotardo', 'MG');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mv_aluno`
--

CREATE TABLE `mv_aluno` (
  `id` int(10) NOT NULL,
  `matricula` int(8) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `movimento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mv_estoque`
--

CREATE TABLE `mv_estoque` (
  `id` int(10) NOT NULL,
  `candidato` int(10) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `movimento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mv_estoque`
--

INSERT INTO `mv_estoque` (`id`, `candidato`, `data`, `hora`, `movimento`) VALUES
(2, 3, '2020-07-16', '10:50:00', 'Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mv_aluno`
--
ALTER TABLE `mv_aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `mv_estoque`
--
ALTER TABLE `mv_estoque`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EstoqueCandidato` (`candidato`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `mv_aluno`
--
ALTER TABLE `mv_aluno`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `mv_estoque`
--
ALTER TABLE `mv_estoque`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mv_estoque`
--
ALTER TABLE `mv_estoque`
  ADD CONSTRAINT `FK_EstoqueCandidato` FOREIGN KEY (`candidato`) REFERENCES `candidatos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
