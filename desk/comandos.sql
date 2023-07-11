CREATE TABLE `pedidos` (
   `id` int auto_increment primary key,
  `titulo` varchar(45) NOT NULL,
  `categoria` varchar(45),
  `descricao` varchar(100),
  `dta_criacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
