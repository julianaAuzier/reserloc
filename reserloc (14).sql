-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 08-Set-2020 às 12:04
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserloc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `campus`
--

DROP TABLE IF EXISTS `campus`;
CREATE TABLE IF NOT EXISTS `campus` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nomeC` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campus`
--

INSERT INTO `campus` (`id`, `nomeC`) VALUES
(1, 'Tapajos'),
(2, 'Amazonia'),
(3, 'Rondon');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidado`
--

DROP TABLE IF EXISTS `convidado`;
CREATE TABLE IF NOT EXISTS `convidado` (
  `idConv` int(10) NOT NULL AUTO_INCREMENT,
  `curso` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idConv`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `convidado`
--

INSERT INTO `convidado` (`idConv`, `curso`, `nome`, `email`, `senha`) VALUES
(56, 13, 'Usuario Teste', 'usuarioteste@email.com', NULL),
(57, 15, 'Usuario Teste 2', 'usuarioteste2@email.com', NULL),
(58, 16, 'Usuario Teste 3', 'usuarioteste3@email.com', NULL),
(59, 12, 'Usuario Teste 4', 'usuarioteste4@email.com', NULL),
(60, 15, 'Usuario Teste 5', 'usuarioteste5@email.com', NULL),
(61, 13, 'eliana seixas', 'eliauzierseixas13@gmail.com', NULL),
(62, 12, 'elaine vasconcelos', 'elainecristinavasconcelos@hotmail.com', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id`, `nomeCurso`) VALUES
(12, 'Instituto de Engenharia e Geociências'),
(13, 'Instituto de Ciência e Tecnologia das Águas'),
(14, 'Instituto de Ciências Sociais'),
(15, 'Instituto de Ciências da Educação'),
(16, 'Instituto de Biodiversidade e Florestas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

DROP TABLE IF EXISTS `historico`;
CREATE TABLE IF NOT EXISTS `historico` (
  `idReserva` int(15) NOT NULL AUTO_INCREMENT,
  `idLocal` int(15) NOT NULL,
  `nomeUser` varchar(50) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `entrada` time NOT NULL,
  `saida` time NOT NULL,
  `data` date NOT NULL,
  `senhaUser` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`idReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`idReserva`, `idLocal`, `nomeUser`, `descricao`, `entrada`, `saida`, `data`, `senhaUser`, `status`) VALUES
(11, 41, ' Usuario teste', 'Reuniao', '14:00:00', '15:00:00', '2020-09-25', 'senha2', 'Cancelada'),
(12, 35, ' Usuario teste', 'TESTE', '16:00:00', '17:00:00', '2020-11-21', 'senha2', 'Cancelada'),
(13, 52, ' Usuario teste', 'Aula de Metodologia Cientifica', '14:00:00', '16:00:00', '2020-09-06', 'senha2', 'Utilizada'),
(14, 52, ' Usuario teste', 'Teste de valor limite', '14:00:00', '16:00:00', '2020-11-10', 'senha2', 'Reservado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

DROP TABLE IF EXISTS `local`;
CREATE TABLE IF NOT EXISTS `local` (
  `idL` int(10) NOT NULL AUTO_INCREMENT,
  `nomeL` varchar(50) NOT NULL,
  `predio` int(8) NOT NULL,
  `numPorta` varchar(15) DEFAULT NULL,
  `campus` varchar(20) NOT NULL,
  PRIMARY KEY (`idL`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`idL`, `nomeL`, `predio`, `numPorta`, `campus`) VALUES
(30, 'Sala de aula', 2, '107', 'Tapajós'),
(32, 'Sala de aula', 2, '109', 'Tapajós'),
(33, 'Sala de aula', 2, '201', 'Tapajós'),
(34, 'Sala de aula', 2, '202', 'Tapajós'),
(35, 'Sala de aula', 2, '203', 'Tapajós'),
(37, 'Sala de aula', 2, '205', 'Tapajós'),
(38, 'Sala de aula', 2, '206', 'Tapajós'),
(39, 'Sala de aula', 2, '207', 'Tapajós'),
(41, 'Sala de aula', 2, '209', 'Tapajós'),
(42, 'Sala de aula', 2, '210', 'Tapajós'),
(43, 'Sala de aula', 2, '110', 'Tapajós'),
(45, 'Laboratório de Informática', 1, '221', 'Tapajós'),
(52, 'Sala de aula', 6, '310', 'Amazônia'),
(58, 'Sala de aula', 4, '111', 'Amazonia'),
(62, 'Sala de aula', 6, '308', 'Amazonia'),
(63, 'Sala de aula', 1, '401', 'Tapajos'),
(64, 'Sala de aula', 1, '202', 'Tapajos'),
(85, 'Laboratorio de Microscopia', 7, '100', 'Tapajos'),
(86, 'Sala de aula', 5, '208', 'Amazonia'),
(88, 'Sala de aula', 3, '201', 'Rondon'),
(89, 'biblioteca', 2, '107', 'Tapajos'),
(90, 'sala lelit', 3, 'lelit', 'Rondon');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `mensagem` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`id`, `usuario`, `mensagem`) VALUES
(2, 'eliauzierseixas13@gmail.com', 'apenas teste\r\n'),
(8, 'juliana.auzier.s@gmail.com', '!Por favor, preciso de uma nova senha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `predio`
--

DROP TABLE IF EXISTS `predio`;
CREATE TABLE IF NOT EXISTS `predio` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idCampus` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `predio`
--

INSERT INTO `predio` (`id`, `idCampus`, `nome`) VALUES
(1, 1, 'BMT'),
(2, 1, 'Laranjão'),
(3, 3, 'Bloco de salas'),
(4, 2, 'Primeiro piso'),
(5, 2, 'Segundo piso'),
(6, 2, 'Terceiro piso'),
(7, 1, 'Bloco de Laboratórios - IBEF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(15) NOT NULL AUTO_INCREMENT,
  `idLocal` int(15) NOT NULL,
  `nomeUser` varchar(50) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `entrada` time NOT NULL,
  `saida` time NOT NULL,
  `data` date NOT NULL,
  `senhaUser` varchar(25) NOT NULL,
  PRIMARY KEY (`idReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`idReserva`, `idLocal`, `nomeUser`, `descricao`, `entrada`, `saida`, `data`, `senhaUser`) VALUES
(14, 52, ' Usuario teste', 'Teste de valor limite', '14:00:00', '16:00:00', '2020-11-10', 'senha2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `curso` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `senha` (`senha`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `curso`, `nome`, `email`, `senha`) VALUES
(5, 12, 'Administrador', 'juliana.auzier.s@gmail.com', 'senha1'),
(49, 14, 'Edson Silvio de Souza', 'edson.silvio@gmail.com', 'F1C7DED'),
(56, 14, 'Usuario teste', 'usuario.teste@mail.com', 'senha2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
