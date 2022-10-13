-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 17-Nov-2020 às 03:28
-- Versão do servidor: 8.0.18
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
-- Banco de dados: `bdecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `ID_CARRINHO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUTO` int(11) NOT NULL,
  `NOME_PRODUTO` varchar(30) NOT NULL,
  `VALOR_PRODUTO` decimal(10,2) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL,
  `SUBTOTAL` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID_CARRINHO`),
  KEY `FK_ID_USUARIO` (`ID_USUARIO`),
  KEY `FK_ID_PRODUTO` (`ID_PRODUTO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`ID_CARRINHO`, `ID_USUARIO`, `ID_PRODUTO`, `NOME_PRODUTO`, `VALOR_PRODUTO`, `QUANTIDADE`, `SUBTOTAL`) VALUES
(1, 1, 1, 'teste', '10.00', 5, '50.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CATEGORIA` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ID`, `NOME_CATEGORIA`) VALUES
(1, 'SmartPhones'),
(2, 'Tablets'),
(97, 'Notebooks');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `ID_PEDIDO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PRODUTO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `DATA_HORA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FORMA_PAGAMENTO` varchar(30) NOT NULL,
  `STATUS_PEDIDO` int(11) NOT NULL,
  PRIMARY KEY (`ID_PEDIDO`),
  KEY `FK_ID_PRODUTO` (`ID_PRODUTO`),
  KEY `FK_ID_USUARIO` (`ID_USUARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_PRODUTO` varchar(30) NOT NULL,
  `IMAGEM` varchar(200) NOT NULL,
  `ID_CATEGORIA` int(11) NOT NULL,
  `ESTOQUE` int(11) NOT NULL,
  `VALOR_UNITARIO` double NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_ID_CATEGORIA` (`ID_CATEGORIA`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`ID`, `NOME_PRODUTO`, `IMAGEM`, `ID_CATEGORIA`, `ESTOQUE`, `VALOR_UNITARIO`) VALUES
(5, 'Samsung Galaxy', '../BD_ImgProdutos/noite.png', 1, 110, 1000),
(4, 'Sansung Galaxy', '../BD_ImgProdutos/s20.png', 1, 100, 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOME` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SOBRENOME` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CPF` char(14) NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `SENHA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TIPO_USUARIO` int(11) DEFAULT '2',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID`, `NOME`, `SOBRENOME`, `CPF`, `EMAIL`, `SENHA`, `TIPO_USUARIO`) VALUES
(55, 'Nathan', 'Cerqueira', '542.030.003-07', 'nathan01@gmail.com', '$2y$10$QL62PjqKZP9fjMzTp5gDNuyX45.G.IP2vYw2ExJW4jVKXmN2SdYGG', 1),
(57, 'Nathan', 'Gonçalves', '111.111.111-11', 'nathan25.cerqueira@gmail.com', '$2y$10$20zNaQ5VIITOdOkDCIAMGOtAP430GBhkLFgnbfjJp5fEWOZv5vPtq', 1),
(58, 'Nathan C', 'G', '111.111.111-11', 'n@gmail.com', '$2y$10$n8AhnvUaqQ4FkCK0XT5jUu/SYm5n7pOJpAnflrhSctXhBnkRG9gLa', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
