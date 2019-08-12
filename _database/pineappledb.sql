-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 18-Jun-2019 às 16:25
-- Versão do servidor: 5.6.34
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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
  `nome` text NOT NULL,
  `data_criacao` date NOT NULL,
  `arquivo` varchar(256) DEFAULT NULL,
  `exercicio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`ident`, `usuario`, `nome`, `data_criacao`, `arquivo`, `exercicio`) VALUES
(31, 10, 'Teste 1', '2019-06-11', 'projetos/10-Usuario-31.html', NULL),
(32, 10, 'Teste 2', '2019-06-11', 'projetos/10-Usuario-32.html', NULL),
(33, 10, 'Teste 3', '2019-06-11', 'projetos/10-Usuario-33.html', NULL),
(36, 10, 'Teste 4', '2019-06-16', NULL, NULL),
(37, 10, 'Teste 5', '2019-06-16', 'projetos/10-Usuario-37.html', NULL),
(38, 10, 'Teste 6', '2019-06-16', 'projetos/10-Usuario-38.html', NULL);

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
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ident`, `nome`, `apelido`, `email`, `senha`, `sexo`, `dataNasc`, `validada`) VALUES
(9, 'Gabriel Sotto Rodrigues', 'admin', 'sotto.gabriel@aluno.ifsp.edu.br', '202cb962ac59075b964b07152d234b70', 'masculino', '2001-06-08', 1),
(10, 'Gabriel Sotto Rodrigues', 'Usuario', 'deh.pbrasil@gmail.com', '202cb962ac59075b964b07152d234b70', 'masculino', '2000-06-08', 0),
(11, 'Vitor Sotto Rodigues', 'Vih', 'vitor.sotto.rodrigues@gmail.com', 'a777b9801c94cb42f8c439d8e1ae8c55', 'masculino', '2004-07-04', 0),
(12, 'Gabriel Sotto Rodrigues', 'usuario', 'email@email.com', '202cb962ac59075b964b07152d234b70', 'masculino', '2001-05-08', 0),
(13, 'Gabriel Sotto Rodrigues', 'usuario2', '123@email.com', '202cb962ac59075b964b07152d234b70', 'masculino', '2001-06-08', 0);

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
  MODIFY `ident` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ident` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
