-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Abr-2021 às 21:32
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola_ead`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(256) NOT NULL,
  `datacadastro` datetime NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `admin`) VALUES
(2, 'Jose da Silva', '56f017c2f9@firemailbox.club', '$2y$10$benV9ue4CO2OFmAdgIKpQevy8yKPGJ5dfsUkVW7iFeh69Otc.T7Ym', '2021-02-21 15:01:26', 0),
(3, 'ADMIN', 'admin@gmail.com', '$2y$10$75bPq8RHzJU4NTFY4LRWy.B.AtOOOx3QV7UbyvAQf/9tj.4H8W9.q', '2021-02-21 15:01:26', 1);
COMMIT;

admin
INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `datacadastro`, `admin`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'senha', '2024-03-17 02:06:00', 1);
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------

--
-- Estrutura da tabela `voluntario`
--

DROP TABLE IF EXISTS `voluntario`;
CREATE TABLE IF NOT EXISTS `voluntario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `beneficiario` varchar(100) NOT NULL,
  `imagem` varchar(140) NULL,
  `datacadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `voluntario`
--

INSERT INTO `voluntario` (`id`, `nome`, `email`, `telefone`, `profissao`, `beneficiario`, `imagem`, `datacadastro`) VALUES
(4, 'Nome José Voluntario', 'nomejv@ig.com.br', '11950214567', 'Analista de TI', 'José almeida','upload/6032a8149ce06.jpg', '2024-03-10 13:30:04'),
(5, 'Nome José Voluntario', 'nomejv@ig.com.br', '11950214567', 'Analista de TI', 'José almeida','upload/6032a8149ce06.jpg', '2024-03-10 13:30:04'),
(4, 'Nome José Voluntario', 'nomejv@ig.com.br', '11950214567', 'Analista de TI', 'José almeida','upload/6032a8149ce06.jpg', '2024-03-10 13:30:04');

INSERT INTO `voluntario` (`id`, `nome`, `email`, `telefone`, `profissao`, `beneficiario`, `imagem`, `datacadastro`) VALUES
(4, 'Nome José Voluntario 1', 'nomejv1@ig.com.br', '11950214567', 'Analista de TI', 'José almeida 1','upload/6032a8149ce06.jpg', '2024-03-10 13:30:04'),
(5, 'Nome José Voluntario 2', 'nomejv2@ig.com.br', '11950214568', 'Desenvolvedor Web', 'José almeida 2','upload/6032a8149ce07.jpg', '2024-03-10 13:31:04'),
(6, 'Nome José Voluntario 3', 'nomejv3@ig.com.br', '11950214569', 'Designer Gráfico', 'José almeida 3','upload/6032a8149ce08.jpg', '2024-03-10 13:32:04'),
(7, 'Nome José Voluntario 4', 'nomejv4@ig.com.br', '11950214570', 'Engenheiro Civil', 'José almeida 4','upload/6032a8149ce09.jpg', '2024-03-10 13:33:04'),
(8, 'Nome José Voluntario 5', 'nomejv5@ig.com.br', '11950214571', 'Enfermeiro', 'José almeida 5','upload/6032a8149ce10.jpg', '2024-03-10 13:34:04');

INSERT INTO `voluntario` (`id`, `nome`, `email`, `telefone`, `profissao`, `beneficiario`, `imagem`, `datacadastro`)
VALUES (1, 'nome', 'email', 'telefone', 'profissao', 'beneficiário', 'upload/4.jpeg', '2024-03-10 13:34:04');
-- --------------------------------------------------------


--
-- Estrutura da tabela `parceiro`
--

DROP TABLE IF EXISTS `parceiro`;
CREATE TABLE IF NOT EXISTS `parceiro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL,
  `tipoajuda` varchar(100) NOT NULL,
  `datacadastro` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `parceiro`
--

INSERT INTO `parceiro` (`id`, `nome`, `email`, `telefone`, `profissao`, `tipoajuda`,`datacadastro`) VALUES
(1, 'Nome Maria Parceiro', 'mariapar@outlook.com', '1330406055', 'cabeleleira', 'Corte de cabelo','2024-03-10 13:30:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acaofeita`
--

DROP TABLE IF EXISTS `acaofeita`;
CREATE TABLE IF NOT EXISTS `acaofeita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `idparceiro` int(11) NOT NULL,
  `nomeacaofeita` varchar(100) NOT NULL,
  `dataacaoescolha` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acaofeita`
--

INSERT INTO `acaofeita` (`id`, `idusuario`, `idparceiro`, `nomeacaofeita`, `dataacaoescolha`) VALUES
(1, 2, 1, 'Corte de cabelo', '2024-03-03 14:02:41');

-- --------------------------------------------------------

--
--QUERYS
--

SELECT * from 'voluntario' 
JOIN 'acaofeita' ON 'voluntario.id' = 'acaofeita.idvoluntario'
JOIN 'parceiro' ON 'acaofeita.idparceiro' = 'parceiro.id' 
WHERE 'voluntario.id = 1';


