-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 14-Maio-2019 às 16:37
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

GRANT USAGE ON *.* TO 'pineappleadm'@'localhost' IDENTIFIED BY PASSWORD '*9600C29B7618B3CA795057466BB6CF31D5ECB6EF';

GRANT ALL PRIVILEGES ON `pineappledb`.* TO 'pineappleadm'@'localhost' WITH GRANT OPTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pineappledb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `ident` int(64) NOT NULL,
  `descricao` text NOT NULL,
  `arquivo_resp` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE `projeto` (
  `ident` int(64) NOT NULL,
  `usuario` int(64) NOT NULL,
  `data_criacao` date NOT NULL,
  `arquivo` varchar(256) NOT NULL,
  `exercicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recsenha`
--

CREATE TABLE `recsenha` (
  `chave` varchar(500) NOT NULL,
  `usuario` int(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ident` int(16) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `apelido` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` text NOT NULL,
  `sexo` varchar(16) NOT NULL,
  `dataNasc` date NOT NULL,
  `validada` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`ident`);

--
-- Indexes for table `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`ident`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `exercicio` (`exercicio`);

--
-- Indexes for table `recsenha`
--
ALTER TABLE `recsenha`
  ADD PRIMARY KEY (`chave`,`usuario`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ident`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `ident` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projeto`
--
ALTER TABLE `projeto`
  MODIFY `ident` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ident` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`ident`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`exercicio`) REFERENCES `exercicio` (`ident`);

--
-- Limitadores para a tabela `recsenha`
--
ALTER TABLE `recsenha`
  ADD CONSTRAINT `recsenha_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`ident`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
