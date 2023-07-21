-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 21/07/2023 às 17:05
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(12, 'matheus', '$2y$10$LRPAwjhGZGddUA.YOOmpOeq2eX1L3JQcKGdGJB.3broL0CGHMoInS', 3226, 'Sim', 2, '2023-07-11 11:25:26'),
(13, 'tobias', '$2y$10$KSAYeShdhZKDgnB.vcx18Oti9H9KRRz3E1Eo7Vqxg0oxlbVGA5vva', 1414, 'Sim', 2, '2023-07-12 11:18:06'),
(14, 'tobias2', '$2y$10$dHcHUyr1IXgjCJ2mzTInzuWxDbbjKt13Y/3crJe7BAX0U3DLtxrWq', 1234, 'Sim', 1, '2023-07-12 11:19:00'),
(15, 'teste3', '$2y$10$93n8XfpFBK7MrEU58SjuyelY5JICsD64ZERjD4sxdMxegZmzi5qcO', 8989, 'Sim', 1, '2023-07-12 11:22:55'),
(16, 'tetete', '$2y$10$7GkH1lWrzeouEeufp0M9geao6Rivs6dVotQOOnd60A60ad69S94SG', 4645, 'Sim', 1, '2023-07-12 11:25:45'),
(17, 'matheus_cichon', '$2y$10$3h9XqK6bIR/OS43H10jUiuzkNO85vowWogZ3egIzUTc1KYNjb2qnW', 4174, 'Sim', 2, '2023-07-18 14:11:43'),
(18, 'kaio_costa', '$2y$10$Zug8QFjUwuF0F0PJEw618ulfqcTsKKqCx/BfpY/NdlQFEzZfxmb4i', 3931, 'Sim', 2, '2023-07-18 14:12:53'),
(19, 'lucas_dias', '$2y$10$3KPHU9Osj/5giMXALmPTcuhfPH94h5wUQkkyYM5YDXt14Prw9bIl2', 4052, 'Sim', 1, '2023-07-18 14:46:07'),
(20, 'gustavo', '$2y$10$VvwNmoQ.PLgHdtbYUb.tKeH/7cLpL0CE27jLxYa0YWZGeb2oTZkPO', 6969, 'Sim', 2, '2023-07-18 14:52:50'),
(21, 'Lucas', '$2y$10$vMsrj7UEuOR5Hbt5/JrQGukmNJUJfPwdd18gieBllu1hCLGp7I6VO', 5654, 'Sim', 1, '2023-07-18 14:57:55'),
(22, 'gustavo lindo', '$2y$10$sg1U1DBSOEdj2hbtSr4TOOHo3D/UwgBOeJbkC.k/ZZsXOIlOjyS/K', 2234, 'Sim', 1, '2023-07-20 16:19:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pedidos`
--

DROP TABLE IF EXISTS `tb_pedidos`;
CREATE TABLE IF NOT EXISTS `tb_pedidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `responsavel` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `respostas` varchar(255) DEFAULT NULL,
  `situacao` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dta_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dta_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `usuario`, `titulo`, `categoria`, `descricao`, `responsavel`, `respostas`, `situacao`, `dta_criacao`) VALUES
(1, 'matheus', 'teste', 'Criação Usuário', 'teste', 'matheus', NULL, 'Finalizado', '2023-07-19 18:42:41'),
(2, 'matheus', 'teste', 'Rede', 'teste', 'matheus', NULL, 'Finalizado', '2023-07-19 18:50:19'),
(3, 'matheus', 'teste', 'Criação Usuário', 'novo teste', 'matheus', NULL, 'Finalizado', '2023-07-19 19:16:23'),
(4, 'jaqueline_motta', 'mouse com Problema!!!', 'Hardware', 'Clique Duplo!', 'matheus', NULL, 'Finalizado', '2023-07-19 19:31:12'),
(5, 'jaqueline_motta', 'nova', 'Criação Usuário', 'oii', 'matheus', NULL, 'Finalizado', '2023-07-19 19:58:17'),
(6, 'matheus', 'teste responsavel', 'Criação Usuário', 'testeee', 'matheus', NULL, 'Finalizado', '2023-07-20 14:27:18'),
(7, 'matheus', 'teste responsavel', 'Criação Usuário', 'testeee', 'gustavo lindo', NULL, 'Finalizado', '2023-07-20 14:27:43'),
(8, 'matheus', 'Titulo grande deamissssss', 'Hardware', 'teste', 'matheus', NULL, 'Finalizado', '2023-07-20 14:29:34'),
(9, 'matheus', 'teste', 'Software', 'tessxertt', 'matheus', NULL, 'Finalizado', '2023-07-20 14:34:00'),
(10, 'matheus', 'teste', 'Criação Usuário', 'teetst', 'matheus', NULL, 'Finalizado', '2023-07-20 14:34:11'),
(11, 'matheus', 'teste', 'Rede', 'teste', 'matheus_cichon', NULL, 'Finalizado', '2023-07-20 14:41:55'),
(12, 'kaio_costa', 'teste de qualidade maxima', 'Criação Usuário', 'teste de T>I', 'matheus', NULL, 'Finalizado', '2023-07-20 17:00:57'),
(13, 'matheus', 'teste', 'Hardware', 'teste', 'matheus', NULL, 'Finalizado', '2023-07-20 17:25:54'),
(14, 'matheus', 'chamado é o krl', 'Criação Usuário', 'chamado é o krl', 'gustavo', NULL, 'Em Atendimento', '2023-07-20 17:39:54'),
(15, 'matheus', 'chamado é o krl', 'Criação Usuário', 'chamado é o krl', 'matheus', NULL, 'Finalizado', '2023-07-20 19:19:17'),
(16, 'matheus', 'faz teste', 'Criação Usuário', 'faz teste', 'matheus', NULL, 'Finalizado', '2023-07-20 19:19:53'),
(17, 'lucas_dias', 'Chama o bombeiro', 'Rede', 'Bruninho me helpa, meu switch ta pegando fogooooo', 'matheus', NULL, 'Finalizado', '2023-07-20 19:52:07'),
(18, 'gustavo', 'teste', 'Impressora', 'teste', 'gustavo', NULL, 'Em Atendimento', '2023-07-21 12:51:13'),
(19, 'gustavo', 'the new teste', 'Rede', 'ytes', 'matheus', NULL, 'Novo', '2023-07-21 13:04:59'),
(20, 'gustavo', 'teste', 'Software', 'testeee', 'matheus', 'teste', 'Em Atendimento', '2023-07-21 13:10:26'),
(21, 'gustavo', 'teste gustavo', 'Criação Usuário', 'teste de responsavel', 'matheus', NULL, 'Finalizado', '2023-07-21 13:11:05'),
(22, 'matheus', 'sem novidade', 'Criação Usuário', 'teste', 'gustavo', NULL, 'Em Atendimento', '2023-07-21 13:13:57'),
(23, 'matheus', 'teste', 'Hardware', 'teste', 'matheus_cichon', NULL, 'Novo', '2023-07-21 13:24:34'),
(27, 'matheus', 'teste', 'Rede', 'testeee', 'gustavo', NULL, 'Novo', '2023-07-21 14:05:52'),
(28, 'jaqueline_motta', 'mais um teste', 'Impressora', 'preciso de teclado!', 'kaio_costa', NULL, 'Em Atendimento', '2023-07-21 14:25:10'),
(29, 'kaio_costa', 'teste de qualidade maxima', 'Criação Usuário', 'Finalizando essa solicitação e, formalizando que \r\nQualquer dúvida ou problema, sigo à disposição.', 'matheus_cichon', NULL, 'Novo', '2023-07-21 14:41:04'),
(30, 'kaio_costa', 'teste de qualidade maxima', 'Criação Usuário', 'Finalizando essa solicitação e, formalizando que \r\nQualquer dúvida ou problema, sigo à disposição.', 'matheus', NULL, 'Finalizado', '2023-07-21 14:41:07'),
(31, 'kaio_costa', 'teste de qualidade maxima', 'Criação Usuário', 'Finalizando essa solicitação e, formalizando que \r\nQualquer dúvida ou problema, sigo à disposição.', 'matheus', NULL, 'Finalizado', '2023-07-21 14:41:30'),
(32, 'jaqueline_motta', 'teste', 'Criação Usuário', 'criar varios usuarios para area comercial', 'matheus', 'OK, qualquer dúvida ou problema seguimos à sua disposição.', 'Em Atendimento', '2023-07-21 19:53:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
