-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Ago-2021 às 11:35
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `abastecimento_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `abastecimentos_tb`
--

CREATE TABLE IF NOT EXISTS `abastecimentos_tb` (
  `abaID` int NOT NULL AUTO_INCREMENT,
  `abaUsuID` int NOT NULL,
  `abaPlaca` varchar(10) NOT NULL,
  `abaDataHora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `abaCombustivel` int NOT NULL,
  `abaQuantidade` decimal(5,2) NOT NULL,
  `abaValor` decimal(5,2) NOT NULL,
  `abaKm` int NOT NULL,
  `abaPagamento` int NOT NULL,
  `abaObservacao` varchar(200) NOT NULL,
  PRIMARY KEY (`abaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios_tb`
--

CREATE TABLE IF NOT EXISTS `usuarios_tb` (
  `usuID` int NOT NULL AUTO_INCREMENT,
  `usuNome` varchar(50) NOT NULL,
  `usuLogin` varchar(20) NOT NULL,
  `usuSenha` varchar(50) NOT NULL,
  `usuSituacao` int NOT NULL,
  PRIMARY KEY (`usuID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos_tb`
--

CREATE TABLE IF NOT EXISTS `veiculos_tb` (
  `veiID` int NOT NULL AUTO_INCREMENT,
  `veiUsuID` int NOT NULL,
  `veiPlaca` varchar(10) NOT NULL,
  `veiMarca` varchar(20) NOT NULL,
  `veiModelo` varchar(40) NOT NULL,
  `veiDescricao` varchar(100) NOT NULL,
  `veiAno` int NOT NULL,
  `veiSituacao` int NOT NULL,
  PRIMARY KEY (`veiID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
