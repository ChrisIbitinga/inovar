-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06-Set-2020 às 19:59
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `inovar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(60) NOT NULL,
  `slug_categoria` varchar(100) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome_categoria`, `slug_categoria`) VALUES
(1, 'Residencial', 'residencial'),
(3, 'Comercial', 'comercial'),
(4, 'Aluguel para festa', 'aluguel-para-festa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidade`
--

DROP TABLE IF EXISTS `cidade`;
CREATE TABLE IF NOT EXISTS `cidade` (
  `id_cidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(100) DEFAULT NULL,
  `slug_cidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `nome_cidade`, `slug_cidade`) VALUES
(1, 'Botucatu', 'botucatu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalidade`
--

DROP TABLE IF EXISTS `finalidade`;
CREATE TABLE IF NOT EXISTS `finalidade` (
  `id_finalidade` int(11) NOT NULL AUTO_INCREMENT,
  `nome_finalidade` varchar(60) NOT NULL,
  `slug_finalidade` varchar(100) NOT NULL,
  PRIMARY KEY (`id_finalidade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `finalidade`
--

INSERT INTO `finalidade` (`id_finalidade`, `nome_finalidade`, `slug_finalidade`) VALUES
(1, 'Locação', 'locacao'),
(2, 'Venda', 'venda'),
(3, 'Diárias', 'diarias'),
(4, 'Venda e locação', 'venda-e-locacao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

DROP TABLE IF EXISTS `imovel`;
CREATE TABLE IF NOT EXISTS `imovel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `id_destinacao` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_cidade` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `valor` varchar(30) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `sala` int(3) DEFAULT NULL,
  `quarto` int(3) DEFAULT NULL,
  `banheiro` int(3) DEFAULT NULL,
  `garagem` int(3) DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `adicionais` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `thumb` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipo` (`id_tipo`),
  KEY `id_destinacao` (`id_destinacao`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_cidade` (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`id`, `id_tipo`, `id_destinacao`, `id_categoria`, `id_usuario`, `id_cidade`, `data_cadastro`, `endereco`, `numero`, `valor`, `bairro`, `sala`, `quarto`, `banheiro`, `garagem`, `slug`, `adicionais`, `status`, `thumb`) VALUES
(1, 1, 2, 3, 1, 1, '2020-08-30 14:17:07', 'Rua Trêze de maio ', '338', '300.000,00', 'Jardins', 1, 3, 3, 3, 'jardins', '&#60;p&#62;&#38;nbsp; getCurrentDate(),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtEndereco&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtNumero&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtValor&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtBairro&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtSala&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtQuarto&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtBanheiro&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtGaragem&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtSlug&#38;#39;, FILTER_SANITIZE_STRING),&#60;br /&#62;&#13;&#10;&#38;nbsp; &#38;nbsp; &#38;nbsp; &#38;nbsp; post(&#38;#39;txtAdicionais&#38;#39;, FILTER_SANITIZE&#60;/p&#62;&#13;&#10;', 1, '5f4e7fdedf6cecasa3.png'),
(2, 3, 1, 1, 1, 1, '2020-08-30 18:07:58', 'Av. Jorge Saad', '1425 Bloco B', '1200,00', 'Vale das orquideas', 1, 2, 2, 2, 'vale-das-orquideas', '&#60;p&#62;cgywuywchevcue3uy3cg3ubhdncb n mn&#60;/p&#62;&#13;&#10;', 1, '5f4ef14895cd4casa1.png'),
(3, 2, 2, 1, 1, 1, '2020-08-31 23:45:57', 'Rua Armando Freire', '2', '90.000,00', 'Pedro Carvalho', 0, 0, 0, 0, 'pedro-carvalho', '&#60;p&#62;xhxxqxfqtwfygx&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;bwgxyuguywegcuywegcyue&#60;/p&#62;&#13;&#10;&#13;&#10;&#60;p&#62;cwhuiwchuwuiec&#60;/p&#62;&#13;&#10;', 1, '5f4ef600c0defcasa4.png'),
(4, 6, 3, 4, 1, 1, '2020-09-03 22:57:45', 'Av. Jorge Saad', '338', '450,00', 'Jardins', 0, 0, 2, 0, 'jardins', '&#60;p&#62;teetse de imovel, edicula para festas&#60;/p&#62;&#13;&#10;', 1, '5f519f59379d1hero.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `thumb`
--

DROP TABLE IF EXISTS `thumb`;
CREATE TABLE IF NOT EXISTS `thumb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `id_imovel` int(11) DEFAULT NULL,
  `capa` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_imovel` (`id_imovel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nome_tipo` varchar(60) NOT NULL,
  `slug_tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `nome_tipo`, `slug_tipo`) VALUES
(1, 'Casa', 'casa'),
(2, 'Terreno', 'terreno'),
(3, 'Apartamento', 'apartamento'),
(4, 'Área de lazer', 'area-de-lazer'),
(5, 'Barracão', 'barracao'),
(6, 'Edicula', 'edicula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `status` int(1) NOT NULL,
  `token` varchar(150) DEFAULT NULL,
  `nivel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `status`, `token`, `nivel`) VALUES
(1, 'Christian', 'contato.ibwebsites@gmail.com', '$2y$10$fHAlqQyoL7gC6op267cJ/et63VrFNX5vo5dWkAkDM4ZJtmI1fU/NO', 1, NULL, 'admin'),
(2, 'IbWebSites', 'ramos.christian@hotmail.com', '$2y$10$9TdMg6RfRKf4t1YzDsSk.u1nH8/jaYGFWKdWji5v02avGRJXM8eLC', 1, NULL, 'user'),
(3, 'Camilla', 'camilla@gmail.com', '$2y$10$I1xv64lRiltEUNhXzO5tO.PRxHLkyWKi9XKZiA.eLcOhXoHsWz3L6', 1, NULL, 'user'),
(4, 'Camilla Ramos', 'millazanchin@gmail.com', '$2y$10$yGu1i3uP.AWPGGq2Bm0L3uLBmp8BbZGslh2TClcjnWpWkraswMz3e', 1, NULL, 'admin');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `imovel_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id_tipo`),
  ADD CONSTRAINT `imovel_ibfk_2` FOREIGN KEY (`id_destinacao`) REFERENCES `finalidade` (`id_finalidade`),
  ADD CONSTRAINT `imovel_ibfk_3` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `imovel_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `imovel_ibfk_5` FOREIGN KEY (`id_cidade`) REFERENCES `cidade` (`id_cidade`);

--
-- Limitadores para a tabela `thumb`
--
ALTER TABLE `thumb`
  ADD CONSTRAINT `thumb_ibfk_1` FOREIGN KEY (`id_imovel`) REFERENCES `imovel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
