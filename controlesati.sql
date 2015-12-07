-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2015 às 01:58
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `controlesati`
--
CREATE DATABASE IF NOT EXISTS `controlesati` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `controlesati`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `boleto`
--

CREATE TABLE IF NOT EXISTS `boleto` (
  `bol_idboleto` int(11) NOT NULL AUTO_INCREMENT,
  `bol_codigobarra` varchar(45) DEFAULT NULL,
  `fk_usu_id` int(11) NOT NULL,
  `bol_datavencimento` date NOT NULL,
  `bol_valor` float NOT NULL,
  `bol_status` int(11) NOT NULL COMMENT '0 - Pendente\n1 - Pago\n3 - Estornado',
  `fk_event_ideventos` int(11) NOT NULL,
  PRIMARY KEY (`bol_idboleto`),
  UNIQUE KEY `bol_codigobarra_UNIQUE` (`bol_codigobarra`),
  KEY `fk_usu_id_idx` (`fk_usu_id`),
  KEY `evento_idx` (`fk_event_ideventos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `caixa`
--

CREATE TABLE IF NOT EXISTS `caixa` (
  `id_caixa` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_movimentacao` int(11) NOT NULL COMMENT '0-entrada\n1-saida',
  `status_moventacao` int(11) NOT NULL COMMENT '0-a pgar/receber\n1- pago/recebido\n2-estornado',
  `data` date NOT NULL,
  `origem` varchar(45) NOT NULL,
  PRIMARY KEY (`id_caixa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='				' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `event_ideventos` int(11) NOT NULL AUTO_INCREMENT,
  `nome_evento` varchar(255) NOT NULL,
  `fk_pal_id` int(11) DEFAULT NULL,
  `data_hora` varchar(45) DEFAULT NULL,
  `tipo_evento` int(11) DEFAULT NULL COMMENT '0-sati\n1-palestra\n2-minicurso',
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`event_ideventos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `create_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` int(11) NOT NULL COMMENT '0-admin\n1-voluntario\n2-aluno',
  PRIMARY KEY (`usu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`username`, `email`, `password`, `create_time`, `usu_id`, `admin`) VALUES
('teste', 'euquesei@gmail.com', '1234', '2015-11-30 14:18:26', 1, 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `evento` FOREIGN KEY (`fk_event_ideventos`) REFERENCES `eventos` (`event_ideventos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
