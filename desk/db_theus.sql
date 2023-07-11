-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 11/07/2023 às 17:16
-- Versão do servidor: 8.0.31-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_theus`
--
CREATE DATABASE IF NOT EXISTS `db_theus` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_theus`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `situacao` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dta_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dta_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `titulo`, `categoria`, `descricao`, `situacao`, `dta_criacao`) VALUES
(3, 'teste', 'Hardware', 'OK, qualquer dúvida ou problema seguimos à sua disposição.', 'Pendente', '2023-07-10 19:33:54'),
(4, 'teste', 'Criação Usuário', 'criar um novo usuario', 'Finalizado', '2023-07-11 14:36:09'),
(5, 'teste', 'Criação Usuário', 'full', 'Finalizado', '2023-07-11 17:18:01'),
(6, 'teste', 'Impressora', 'nouut', 'Finalizado', '2023-07-11 17:40:32'),
(7, 'Titulo grande deamissssss', 'Software', 'Me instala aquele softiuare graaaande de amisssssssss', 'Finalizado', '2023-07-11 17:41:21'),
(8, 'teste', 'Hardware', 'kojnnuiniomkio', 'Finalizado', '2023-07-11 18:12:26'),
(9, 'teste', 'Software', 'testeee', 'Finalizado', '2023-07-11 18:41:43'),
(10, 'teste', 'Rede', 'yetetggege', 'Finalizado', '2023-07-11 18:45:08'),
(11, 'Titulo grande deamissssss', 'Hardware', 'nuiniuji', 'Finalizado', '2023-07-11 19:00:44'),
(12, 'Titulo grande deamissssss', 'Impressora', 'yfxdf', 'Em atendimento', '2023-07-11 19:17:17'),
(13, 'ffdfd', 'Hardware', 'fdfdfdsdfzs', 'Em atendimento', '2023-07-11 19:17:21'),
(14, 'fd', 'Software', 'fddfsdfs', 'Em atendimento', '2023-07-11 19:17:26'),
(15, 'fdfddfs', 'Software', 'fdfddf', 'Em atendimento', '2023-07-11 19:17:32'),
(16, 'fdfddfs', 'Software', 'fdsdffd', 'Em atendimento', '2023-07-11 19:17:42'),
(17, 'fdfddfs', 'Software', 'fdsdffd', 'Em atendimento', '2023-07-11 19:17:50'),
(18, 'teste', 'Rede', 'dfsdfdsdf', 'Novo', '2023-07-11 20:10:31'),
(19, 'teste', 'Software', 'sssd', 'Novo', '2023-07-11 20:10:53'),
(20, 'd', 'Rede', 'ddd', 'Em atendimento', '2023-07-11 20:10:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_acessos`
--

DROP TABLE IF EXISTS `tb_acessos`;
CREATE TABLE IF NOT EXISTS `tb_acessos` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `matricula` int NOT NULL,
  `ativo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nivel` int DEFAULT NULL,
  `dta_criacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dt_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_acessos`
--

INSERT INTO `tb_acessos` (`id_usuario`, `usuario`, `senha`, `matricula`, `ativo`, `nivel`, `dta_criacao`) VALUES
(2, 'admin1', '$2y$10$A5N8WE/P17dvb7aoQNCZiOOkOCFJF8zacR9u5QhbrJmk/tEHTGJs2', 1000, 'Sim', 2, '2023-07-10 14:19:18'),
(3, 'teste2', '$2y$10$c1/F4EExlOjlGkkqKc81kOxCFGzCU6LVeIGeCtUm3B2cgBSP.Fwa.', 1919, 'Sim', 2, '2023-07-10 14:22:55'),
(4, 'admin2', '$2y$10$h8GKXftL/GpIYawZN0gnL.M5Xsrj5YXVZGTrLWvWQY.iGAS5O.IhO', 2525, 'Sim', 2, '2023-07-10 14:26:03'),
(5, 'caio_silva', '$2y$10$wgOkrvaOMwUPFtAWxxpfg.10dDy3Qy3oqXmMve97JELUpEI4dGcs.', 8822, 'Sim', 1, '2023-07-10 14:26:48'),
(6, 'jaqueline_motta', '$2y$10$BfJTykA3UsPv3Y/vzsTtiO3CCdfD2g759cghcudq.Zr2yIEFwhyuy', 3555, 'Sim', 1, '2023-07-10 14:27:31'),
(7, 'wesley_borges', '$2y$10$of5xPPwbBEGKAU5zHbNXqOTkcyG2KqeKfj5k2uCMhTaUZREzVzX4K', 5555, 'Sim', 1, '2023-07-10 14:29:03'),
(9, 'teste12', '$2y$10$BHRuzVImGc7Oz.pqP0.d0OFEYC0bopgXn.QVx9Nr0X/Olgt8zS.W6', 3939, 'Sim', 1, '2023-07-10 14:44:15'),
(10, 'teste13', '$2y$10$sjvFoHq6dohMSbKOrjxCwOLyXZYFfpFd6m20PQO5zwiTp2bkH.t9m', 2626, 'Sim', 1, '2023-07-11 10:22:17'),
(11, 'jeferson', '$2y$10$IqcbDK5p75dBxTZSY2ceReSQUo.Q4sCkKs4B3UCi3ABmxq.jdnZHm', 2528, 'Sim', 1, '2023-07-11 10:54:21'),
(12, 'matheus', '$2y$10$y9IEM9PK10Z9cibUbZB07.LuEfpYiFaYFM7LV.e1oJ/gB4QKgmOYy', 3226, 'Sim', 2, '2023-07-11 11:25:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
