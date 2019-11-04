-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/06/2019 às 13:49
-- Versão do servidor: 10.1.31-MariaDB
-- Versão do PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `quimica`
--

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `idfornecedor` int(11) NOT NULL,
  `nomefornecedor` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numerofornecedor` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `fornecedores`
--

INSERT INTO `fornecedores` (`idfornecedor`, `nomefornecedor`,`numerofornecedor`) VALUES
(1, 'latinaltda', 53980401325),
(2, 'iararj', 53984020202),
(3, 'iarapa', 53991102930);

-- --------------------------------------------------------

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nomecategoria` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nomecategoria`) VALUES
(1, 'inorganico'),
(2, 'organico');

-- --------------------------------------------------------


--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `iduser` int(11) NOT NULL,
  `nomeuser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profissaouser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `enderecouser` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numerouser` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emailuser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senhauser` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`iduser`, `nomeuser`, `profissaouser`, `enderecouser`, `numerouser`, `emailuser`, `senhauser`) VALUES
(1, 'João', 'bombeiro', 'uma casa ai', 53910203010, 'joao@gmail.com', '1234'),
(2, 'Maria', 'pedreiro', 'um ap ai', 53910204020, 'maria@gmail.com', '1234'),
(3, 'Talles', 'pefessor', 'um lugar ai', 539800205030,'talles@gmail.com', '1234');

-- --------------------------------------------------------


--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `admins` (
  `idadmin` int(11) NOT NULL,
  `nomeadmin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profissaoadmin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `enderecoadmin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numeroadmin` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `emailadmin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senhaadmin` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `admins`
--

INSERT INTO `admins` (`idadmin`, `nomeadmin`, `profissaoadmin`, `enderecoadmin`, `numeroadmin`, `emailadmin`, `senhaadmin`) VALUES
(1, 'João', 'bombeiro', 'uma casa ai', 53910203010, 'joao@gmail.com', '12345'),
(2, 'Maria', 'pedreiro', 'um ap ai', 53910204020, 'maria@gmail.com', '12345'),
(3, 'Talles', 'pefessor', 'um lugar ai', 539800205030,'talles@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reagente`
--

CREATE TABLE `reagente` (
  `idreag` int(11) NOT NULL,
  `nomereag` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantreag` int(11) NOT NULL,
  `reagentefornecedor` int(11) NOT NULL,
  `reagentecategoria` int(11) NOT NULL,
  `validadereag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `reagente`
--

INSERT INTO `reagente` (`idreag`, `nomereag`, `quantreag`, `reagentefornecedor`, `reagentecategoria`, `validadereag`) VALUES
(1, 'Reagente1', 1, 1, 1, 1111),
(2, 'Reagente2', 2, 2, 2, 2222),
(3, 'Reagente3', 3, 3, 1, 3333),
(4, 'Reagente4', 4, 1, 2, 4444),
(5, 'Reagente5', 5, 2, 1, 5555),
(6, 'Reagente6', 6, 3, 2, 6666),
(7, 'Reagente7', 7, 1, 1, 7777);


--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`idfornecedor`);


--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);


--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`iduser`);



--
-- Índices de tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`idadmin`);


--
-- Índices de tabela `reagente`
--
ALTER TABLE `reagente`
  ADD PRIMARY KEY (`idreag`),
  ADD KEY `reagfornec` (`reagentefornecedor`),
  ADD KEY `reagcateg` (`reagentecategoria`);
--
-- AUTO_INCREMENT de tabelas apagadas
--


--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `idfornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


--
-- AUTO_INCREMENT de tabela `reagente`
--
ALTER TABLE `reagente`
  MODIFY `idreag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `reagente`
--
ALTER TABLE `reagente`
  ADD CONSTRAINT `reagfornec` FOREIGN KEY (`reagentefornecedor`) REFERENCES `fornecedores` (`idfornecedor`);
COMMIT;

ALTER TABLE `reagente`
  ADD CONSTRAINT `reagcateg` FOREIGN KEY (`reagentecategoria`) REFERENCES `categoria` (`idcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
