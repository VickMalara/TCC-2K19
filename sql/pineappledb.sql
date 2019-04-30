-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Abr-2019 às 16:50
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pineappledb`
--
CREATE DATABASE IF NOT EXISTS `pineappledb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pineappledb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ident` int(16) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `apelido` varchar(32) NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL,
  `sexo` varchar(16) NOT NULL,
  `dataNasc` date NOT NULL,
  `validada` int(1) NOT NULL,
  PRIMARY KEY (`ident`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ident`, `nome`, `apelido`, `email`, `senha`, `sexo`, `dataNasc`, `validada`) VALUES
(1, 'Danielli', 'Dan', 'dan@email.com', '9180b4da3f0c7e80975fad685f7f134e', 'feminino', '0000-00-00', 0),
(2, 'Gabriel', 'gabriel', 'gabriel@email.com', '202cb962ac59075b964b07152d234b70', 'masculino', '2001-06-08', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
