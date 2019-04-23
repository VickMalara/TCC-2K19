-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 23-Abr-2019 às 17:35
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
GRANT USAGE ON *.* TO 'pineappleadm'@'localhost' IDENTIFIED BY PASSWORD '*9600C29B7618B3CA795057466BB6CF31D5ECB6EF';

GRANT ALL PRIVILEGES ON `pineappledb`.* TO 'pineappleadm'@'localhost' WITH GRANT OPTION;
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
  PRIMARY KEY (`ident`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
