-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2019 às 20:34
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.1.32

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID_ADMIN` int(11) NOT NULL,
  `LOGIN_ADMIN` varchar(10) NOT NULL,
  `SENHA_ADMIN` varchar(10) NOT NULL,
  `NOME_ADMIN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `ID_FORNECEDOR` int(11) NOT NULL,
  `NOME_FORNECEDOR` varchar(50) NOT NULL,
  `CIDADE_FORNECEDOR` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci SET utf8 COLLATE utf8_general_ci;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`ID_FORNECEDOR`, `NOME_FORNECEDOR`, `CIDADE_FORNECEDOR`) VALUES
(1, 'ALPHATEC', 'Porto Alegre'),
(2, 'MERCK', 'Rio Grande'),
(3, 'CINÉTICA QUÍMICA', 'Porto Alegre'),
(4, 'VETEC', 'Rio Grande'),
(5, 'RIEDEL', 'Pelotas'),
(6, 'SYNTH', 'São Paulo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor_reagente`
--

CREATE TABLE `fornecedor_reagente` (
  `ID_REAGENTE` int(11) NOT NULL,
  `ID_FORNECEDOR` int(11) NOT NULL,
  `VALIDADE` date NOT NULL,
  `DATA_ENTRADA` date NOT NULL,
  `QNTD_ESTOQUE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci SET utf8 COLLATE utf8_general_ci;

--
-- Extraindo dados da tabela `fornecedor_reagente`
--

INSERT INTO `fornecedor_reagente` (`ID_REAGENTE`, `ID_FORNECEDOR`, `VALIDADE`, `DATA_ENTRADA`, `QNTD_ESTOQUE`) VALUES
(1, 1, '2020-01-30', '2019-10-24', 200),
(1, 2, '2020-08-12', '2019-10-24', 10),
(2, 3, '2019-07-16', '2019-03-10', 20),
(2, 6, '2019-10-31', '2019-10-24', 90),
(3, 3, '2019-10-01', '2018-10-07', 120),
(3, 6, '2021-07-14', '2019-10-24', 1200),
(4, 3, '2019-10-31', '2019-10-24', 90),
(5, 4, '2019-10-30', '2019-10-24', 548),
(6, 2, '2019-05-12', '2017-10-03', 0),
(7, 2, '2020-02-13', '2019-07-15', 46);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reagentes`
--

CREATE TABLE `reagentes` (
  `ID_REAGENTE` int(11) NOT NULL,
  `NOME_USUAL` varchar(50) DEFAULT NULL,
  `NOME_IUPAC` varchar(100) NOT NULL,
  `FORMULA` varchar(50) DEFAULT NULL,
  `CLASSIFICACAO` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci SET utf8 COLLATE utf8_general_ci;
--
-- Extraindo dados da tabela `reagentes`
--

INSERT INTO `reagentes` (`ID_REAGENTE`, `NOME_USUAL`, `NOME_IUPAC`, `FORMULA`, `CLASSIFICACAO`) VALUES
(1, 'Dicloreto de Etileno', '1,2-Dicloroetano', 'C2H4Cl2 ou CH2ClCH2Cl', 'Orgânico'),
(2, 'Etanal', 'Acetaldeído', 'C2H4O', 'Orgânico'),
(3, 'Etanamida', 'Acetamida', 'C2H5NO', 'Orgânico'),
(4, 'Sal de Amônio', 'Acetato de Amônio P.A', 'CH3COONH4', 'Inorgânico'),
(5, 'Acetato de Cobre (ICO)', 'Acetato Cúprico', 'Cu(C2H3O2)2.2H2O ', 'Inorgânico'),
(6, 'Acetato de Etila', 'Etanoato de Etila', 'CH3COOCH2CH3', 'Orgânico'),
(7, 'Acetato de Potássio P.A', 'Etanoato de Potássio', 'KC2H3O4', 'Orgânico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `LOGIN_USUARIO` varchar(10) NOT NULL,
  `SENHA_USUARIO` varchar(10) NOT NULL,
  `NOME_USUARIO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`ID_FORNECEDOR`);

--
-- Índices para tabela `fornecedor_reagente`
--
ALTER TABLE `fornecedor_reagente`
  ADD PRIMARY KEY (`ID_REAGENTE`,`ID_FORNECEDOR`),
  ADD KEY `ID_FORNECEDOR` (`ID_FORNECEDOR`);

--
-- Índices para tabela `reagentes`
--
ALTER TABLE `reagentes`
  ADD PRIMARY KEY (`ID_REAGENTE`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_ADMIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `ID_FORNECEDOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `reagentes`
--
ALTER TABLE `reagentes`
  MODIFY `ID_REAGENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fornecedor_reagente`
--
ALTER TABLE `fornecedor_reagente`
  ADD CONSTRAINT `fornecedor_reagente_ibfk_1` FOREIGN KEY (`ID_REAGENTE`) REFERENCES `reagentes` (`ID_REAGENTE`),
  ADD CONSTRAINT `fornecedor_reagente_ibfk_2` FOREIGN KEY (`ID_FORNECEDOR`) REFERENCES `fornecedor` (`ID_FORNECEDOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
