-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 04/08/2023 às 13:48
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
-- Banco de dados: `db_desk`
--
CREATE DATABASE IF NOT EXISTS `db_desk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_desk`;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_acessos`
--

INSERT INTO `tb_acessos` (`id_usuario`, `usuario`, `senha`, `matricula`, `ativo`, `nivel`, `dta_criacao`) VALUES
(2, 'admin1', '$2y$10$A5N8WE/P17dvb7aoQNCZiOOkOCFJF8zacR9u5QhbrJmk/tEHTGJs2', 1000, 'Sim', 2, '2023-07-10 14:19:18'),
(5, 'caio_silva', '$2y$10$wgOkrvaOMwUPFtAWxxpfg.10dDy3Qy3oqXmMve97JELUpEI4dGcs.', 8822, 'Sim', 1, '2023-07-10 14:26:48'),
(6, 'jaqueline_motta', '$2y$10$oCKImMuj7huZScTQCFo.vOpPVMzGvz.TgrVnr53c5FvMV3OXkwRDm', 3555, 'Sim', 1, '2023-07-10 14:27:31'),
(7, 'wesley_borges', '$2y$10$of5xPPwbBEGKAU5zHbNXqOTkcyG2KqeKfj5k2uCMhTaUZREzVzX4K', 5555, 'Sim', 1, '2023-07-10 14:29:03'),
(12, 'matheus', '$2y$10$EwoOrzY3ASU/lGxjBHmAhuxpI.V0kpUdJ3DGPpPopqb.QJsqdHQpq', 3226, 'Sim', 2, '2023-07-11 11:25:26'),
(17, 'matheus_cichon', '$2y$10$3h9XqK6bIR/OS43H10jUiuzkNO85vowWogZ3egIzUTc1KYNjb2qnW', 4174, 'Sim', 2, '2023-07-18 14:11:43'),
(18, 'kaio_costa', '$2y$10$WSStzSz.KF1qMchL7WsrVOcrCPVYBXB9emqRN35zcvu.s.DV2oY4u', 3931, 'Sim', 2, '2023-07-18 14:12:53'),
(19, 'lucas_dias', '$2y$10$3KPHU9Osj/5giMXALmPTcuhfPH94h5wUQkkyYM5YDXt14Prw9bIl2', 4052, 'Sim', 2, '2023-07-18 14:46:07'),
(20, 'gustavo', '$2y$10$VvwNmoQ.PLgHdtbYUb.tKeH/7cLpL0CE27jLxYa0YWZGeb2oTZkPO', 6969, 'Sim', 2, '2023-07-18 14:52:50'),
(21, 'Lucas', '$2y$10$vMsrj7UEuOR5Hbt5/JrQGukmNJUJfPwdd18gieBllu1hCLGp7I6VO', 5654, 'Sim', 1, '2023-07-18 14:57:55');

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
  `respostas_resp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `respostas_soli` varchar(255) DEFAULT NULL,
  `situacao` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dta_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `dta_atualizacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `usuario`, `titulo`, `categoria`, `descricao`, `responsavel`, `respostas_resp`, `respostas_soli`, `situacao`, `dta_criacao`) VALUES
(1, 'kaio_costa', 'fone quebrado', 'Hardware', 'Fone Quebrado', 'gustavo', 'oppa\r\n', NULL, 'Finalizado', '2023-07-25 18:26:15'),
(2, 'jaqueline_motta', 'computador sem rede', 'Rede', 'sem rede', 'matheus', 'OK, qualquer dúvida ou problema seguimos à sua disposição.', NULL, 'Finalizado', '2023-07-25 18:49:22'),
(3, 'gustavo', 'teste', 'Criação Usuário', 'teste', 'matheus', 'teste', ',lkk\r\n', 'Finalizado', '2023-07-25 18:50:50'),
(4, 'matheus', 'teste', 'Criação Usuário', 'mouse com defeito!!', 'gustavo', NULL, 'okok!', 'Em Atendimento', '2023-07-26 13:59:05'),
(5, 'jaqueline_motta', 'teste', 'Hardware', 'reso', 'matheus', 'teste.', NULL, 'Finalizado', '2023-07-27 11:23:04'),
(6, 'jaqueline_motta', 'teste', 'Hardware', 'teste', 'matheus', 'ok', NULL, 'Finalizado', '2023-07-27 11:29:42'),
(7, 'gustavo', 'teste', 'Hardware', 'teste', 'matheus', 'ok', NULL, 'Finalizado', '2023-07-31 15:35:33'),
(8, 'jaqueline_motta', 'teste', 'Impressora', 'teste', 'matheus', NULL, NULL, 'Em Atendimento', '2023-07-31 15:37:47'),
(9, 'jaqueline_motta', 'teste', 'Software', 'testes', 'gustavo', 'ok', NULL, 'Finalizado', '2023-07-31 15:39:48'),
(10, 'jaqueline_motta', 'teste', 'Hardware', 'teste', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-07-31 15:49:14'),
(11, 'gustavo', 'the new teste', 'Rede', 'the new\r\n', 'matheus', 'OK, qualquer dúvida ou problema seguimos à sua disposição.', NULL, 'Finalizado', '2023-07-31 15:54:25'),
(12, 'matheus', 'teste', 'Software', 'teste', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-07-31 15:55:43'),
(13, 'matheus', 'teste', 'Rede', 'teste', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-07-31 15:56:24'),
(14, 'matheus', 'teste', 'Software', 'teste', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-07-31 15:57:36'),
(15, 'matheus', 'teste', 'Software', 'teste', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-07-31 15:57:39'),
(16, 'matheus', 'Titulo grande deamissssss', 'Hardware', 'ggggg', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-07-31 15:59:47'),
(17, 'matheus', 'teste', 'Hardware', 'teste', 'gustavo', 'verificando\r\n', NULL, 'Em Atendimento', '2023-07-31 16:00:23'),
(18, 'matheus', 'teste', 'Hardware', 'teste', 'gustavo', 'teste', NULL, 'Finalizado', '2023-07-31 16:00:59'),
(19, 'matheus', 'Titulo grande deamissssss', 'Software', 'teste', 'gustavo', 'ok', 'pode finalizar', 'Em Atendimento', '2023-07-31 16:35:56'),
(20, 'matheus', 'teste', 'Software', 'teste', 'gustavo', NULL, NULL, 'Em Atendimento', '2023-08-03 18:35:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
