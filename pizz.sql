-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 29/05/2015 às 20h06min
-- Versão do Servidor: 5.5.43
-- Versão do PHP: 5.5.24-1+deb.sury.org~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `pizz`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`) VALUES
(47, 'Edson Zeballos', '(67) 6566-4545'),
(51, 'Everton', '(67) 9944-8152'),
(52, 'Teste 1', '(67) 3221-5225'),
(53, 'Teste 3', '(67) 3344-1520'),
(54, 'Avenida Bandeirantes', '(67) 3345-1522'),
(55, 'Edson Zeballos', '(67) 5451-5151'),
(56, 'Edson Zeballos', '(67) 5415-4111'),
(57, 'Teste 6', '(67) 5415-5444'),
(58, 'dadasd', '(67) 45454-5445'),
(59, 'aaaa', '(67) 5454-1515'),
(60, 'Edson Zeballos', '(67) 4545-4554');

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE IF NOT EXISTS `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `numero` int(11) NOT NULL,
  `cidade` varchar(100) NOT NULL COMMENT '		',
  `latitude` varchar(45) NOT NULL,
  `longitude` varchar(45) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enderecos_idx` (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `bairro`, `numero`, `cidade`, `latitude`, `longitude`, `cliente_id`) VALUES
(4, 'Rua das Garças', 'Centro', 854, 'Campo Grande', '-20.4513754', '-54.605688499999985', 47),
(8, 'Rua Riachuelo', 'Centro', 150, 'Ladário', '-19.0026029', '-57.60066370000004', 51),
(9, 'Rua Pernambuco', 'Centro', 420, 'Campo Grande', '-20.4506014', '-54.61405869999999', 52),
(10, 'Rua Brilhante', 'Amambai', 541, 'Campo Grande', '-20.4755628', '-54.62481890000004', 53),
(11, 'Avenida Bandeirantes', 'Amambai', 545, 'Campo Grande', '-20.4696329', '-54.62907280000002', 54),
(12, 'Rua das Garças', 'Centro', 313, 'Campo Grande', '-20.4522202', '-54.6109793', 55),
(13, 'Rua das Garças', 'Centro', 131, 'Campo Grande', '-20.4524846', '-54.612562300000036', 56),
(14, 'Avenida Bandeirantes', 'Amambai', 12, 'Campo Grande', '-20.4658424', '-54.62624440000002', 57),
(15, 'Rua das Garças', 'Centro', 444, 'Campo Grande', '-20.4525056', '-54.6126898', 58),
(16, 'Avenida Bandeirantes', 'Amambai', 123, 'Campo Grande', '-20.4666072', '-54.626722400000006', 59),
(17, 'Rua das Garças', 'Centro', 333, 'Campo Grande', '-20.4521911', '-54.6108059', 60);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `fk_enderecos` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
