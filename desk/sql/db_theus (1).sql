-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 12/07/2023 às 16:16
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
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `titulo`, `categoria`, `descricao`, `situacao`, `dta_criacao`) VALUES
(3, 'teste', 'Hardware', 'OK, qualquer dúvida ou problema seguimos à sua disposição.', 'Finalizado', '2023-07-10 19:33:54'),
(4, 'teste', 'Criação Usuário', 'criar um novo usuario', 'Finalizado', '2023-07-11 14:36:09'),
(5, 'teste', 'Criação Usuário', 'full', 'Finalizado', '2023-07-11 17:18:01'),
(6, 'teste', 'Impressora', 'nouut', 'Finalizado', '2023-07-11 17:40:32'),
(7, 'Titulo grande deamissssss', 'Software', 'Me instala aquele softiuare graaaande de amisssssssss', 'Finalizado', '2023-07-11 17:41:21'),
(8, 'teste', 'Hardware', 'kojnnuiniomkio', 'Finalizado', '2023-07-11 18:12:26'),
(9, 'teste', 'Software', 'testeee', 'Finalizado', '2023-07-11 18:41:43'),
(10, 'teste', 'Rede', 'yetetggege', 'Finalizado', '2023-07-11 18:45:08'),
(11, 'Titulo grande deamissssss', 'Hardware', 'nuiniuji', 'Finalizado', '2023-07-11 19:00:44'),
(12, 'Titulo grande deamissssss', 'Impressora', 'yfxdf', 'Finalizado', '2023-07-11 19:17:17'),
(13, 'ffdfd', 'Hardware', 'fdfdfdsdfzs', 'Finalizado', '2023-07-11 19:17:21'),
(14, 'fd', 'Software', 'fddfsdfs', 'Finalizado', '2023-07-11 19:17:26'),
(15, 'fdfddfs', 'Software', 'fdfddf', 'Finalizado', '2023-07-11 19:17:32'),
(16, 'fdfddfs', 'Software', 'fdsdffd', 'Finalizado', '2023-07-11 19:17:42'),
(17, 'fdfddfs', 'Software', 'fdsdffd', 'Finalizado', '2023-07-11 19:17:50'),
(18, 'teste', 'Rede', 'dfsdfdsdf', 'Finalizado', '2023-07-11 20:10:31'),
(19, 'teste', 'Software', 'sssd', 'Finalizado', '2023-07-11 20:10:53'),
(20, 'd', 'Rede', 'ddd', 'Finalizado', '2023-07-11 20:10:57'),
(21, 'Titulo grande deamissssss', 'Software', 'GHHUHD', 'Finalizado', '2023-07-11 20:19:23'),
(22, 'Titulo grande deamissssss', 'Hardware', '1818', 'Finalizado', '2023-07-12 11:45:50'),
(23, 'teste', 'Criação Usuário', '15551518', 'Finalizado', '2023-07-12 13:15:41'),
(24, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:15'),
(25, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:16'),
(26, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:18'),
(27, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:20'),
(28, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:21'),
(29, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:23'),
(30, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:24'),
(31, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:26'),
(32, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:27'),
(33, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:29'),
(34, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:31'),
(35, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:32'),
(36, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:34'),
(37, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:35'),
(38, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:37'),
(39, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:39'),
(40, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:40'),
(41, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:42'),
(42, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:43'),
(43, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:45'),
(44, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:46'),
(45, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:48'),
(46, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:50'),
(47, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:51'),
(48, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:53'),
(49, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:54'),
(50, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:21:56'),
(51, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:22:03'),
(52, 'TESTE', 'Hardware', '1819191', 'Finalizado', '2023-07-12 13:22:05'),
(53, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:21'),
(54, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:23'),
(55, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:26'),
(56, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:29'),
(57, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:31'),
(58, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:34'),
(59, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:36'),
(60, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:39'),
(61, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:41'),
(62, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:44'),
(63, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:46'),
(64, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:49'),
(65, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:52'),
(66, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:54'),
(67, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:57'),
(68, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:23:59'),
(69, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:02'),
(70, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:04'),
(71, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:07'),
(72, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:10'),
(73, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:12'),
(74, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:15'),
(75, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:17'),
(76, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:20'),
(77, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:22'),
(78, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:25'),
(79, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:27'),
(80, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:30'),
(81, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:33'),
(82, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:36'),
(83, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:39'),
(84, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:42'),
(85, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:45'),
(86, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:48'),
(87, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:51'),
(88, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:54'),
(89, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:24:57'),
(90, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:00'),
(91, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:03'),
(92, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:06'),
(93, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:09'),
(94, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:12'),
(95, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:15'),
(96, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:18'),
(97, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:21'),
(98, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:24'),
(99, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:27'),
(100, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:30'),
(101, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:33'),
(102, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:36'),
(103, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:39'),
(104, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:42'),
(105, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:45'),
(106, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:48'),
(107, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:51'),
(108, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:54'),
(109, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:25:57'),
(110, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:00'),
(111, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:03'),
(112, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:06'),
(113, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:10'),
(114, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:13'),
(115, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:16'),
(116, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:19'),
(117, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:26:22'),
(118, 'teste', 'Impressora', 'DFFDFDSDFS', 'Finalizado', '2023-07-12 13:27:20'),
(119, 'teste', 'Criação Usuário', 'endiid', 'Finalizado', '2023-07-12 13:28:12'),
(120, 'teste', 'Criação Usuário', 'endiid', 'Finalizado', '2023-07-12 13:28:37'),
(121, 'teste', 'Criação Usuário', 'endiid', 'Finalizado', '2023-07-12 13:28:44'),
(122, 'teste', 'Criação Usuário', 'yuiui', 'Em atendimento', '2023-07-12 13:29:23'),
(123, 'teste', 'Criação Usuário', 'yuiui', 'Finalizado', '2023-07-12 13:29:34'),
(124, 'teste', 'Criação Usuário', 'teste1', 'Em atendimento', '2023-07-12 13:40:13'),
(125, 'teste', 'Hardware', 'teste', 'Novo', '2023-07-12 17:13:26'),
(126, 'teste', 'Software', 'OK, qualquer dúvida ou problema seguimos à sua disposição.', 'Finalizado', '2023-07-12 17:34:09'),
(127, 'Titulo grande deamissssss', 'Criação Usuário', 'teste', 'Novo', '2023-07-12 18:09:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(12, 'matheus', '$2y$10$y9IEM9PK10Z9cibUbZB07.LuEfpYiFaYFM7LV.e1oJ/gB4QKgmOYy', 3226, 'Sim', 2, '2023-07-11 11:25:26'),
(13, 'tobias', '$2y$10$KSAYeShdhZKDgnB.vcx18Oti9H9KRRz3E1Eo7Vqxg0oxlbVGA5vva', 1414, 'Sim', 2, '2023-07-12 11:18:06'),
(14, 'tobias2', '$2y$10$udUJxv67rR4uDlCWQEevwunlpJaHvbBW2332Il3i.QTHVJm3p7pjW', 1234, 'Sim', 1, '2023-07-12 11:19:00'),
(15, 'teste3', '$2y$10$93n8XfpFBK7MrEU58SjuyelY5JICsD64ZERjD4sxdMxegZmzi5qcO', 8989, 'Sim', 1, '2023-07-12 11:22:55'),
(16, 'tetete', '$2y$10$7GkH1lWrzeouEeufp0M9geao6Rivs6dVotQOOnd60A60ad69S94SG', 4645, 'Sim', 1, '2023-07-12 11:25:45');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
