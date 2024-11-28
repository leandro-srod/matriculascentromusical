-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2024 às 11:51
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `centromusical`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `dt_nasc` varchar(10) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `genero` varchar(50) NOT NULL,
  `origem` varchar(50) NOT NULL,
  `turma` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `dt_nasc`, `cpf`, `telefone`, `email`, `genero`, `origem`, `turma`) VALUES
(78, 'Érico Rosa Rodrigues', '30/07/2011', '00390373044', '51999588741', 'erico@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(79, 'Leandro da Silva Rodrigues', '29/07/1984', '00390373044', '51999588741', 'leandrorodrigues@gmail.com', 'Homem cisgenero', 'Rede Municipal', ''),
(80, 'Érico Rosa Rodrigues', '30/07/2011', '00400473012', '51999588765', 'ericolino@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(81, 'Érico Rosa Rodrigues', '30/07/2011', '00400473012', '51999588765', 'ericolino@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(82, 'Tania Maria da Silva Rodrigues', '12/06/1964', '0090909090909', '51999557676', 'gnomo_gaia@yahoo.com.br', 'Mulher cisgenero', 'Comunidade em geral', ''),
(83, 'Andrea Martins Correa', '11/01/1995', '1010118765', '51999559191', 'andrea_martins@gmail.com', 'Mulher cisgenero', 'Comunidade em geral', ''),
(84, 'Renato Albani', '30/12/1985', '908765436', '51999765483', 'renato_albani@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(85, 'Eduardo Guimarães', '25/07/1976', '1112131415', '51999787654', 'eduardo_guimaraes@gmail.com', 'Homem cisgenero', '', ''),
(86, 'Tânia Maria da Silva Rodrigues', '12/06/1956', '1213141516', '511999787665', 'gnomo_gaia@yahoo.com.br', 'Mulher cisgenero', 'Comunidade em geral', ''),
(87, 'Zacarias dos Santos', '31/10/2002', '1112131415', '519998778', 'zacarias@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(88, 'José Ataulfo Alves', '12/12/2012', '00390876544', '51999878988', 'jose_ataulfo@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(89, 'José Ataulfo Alves', '12/12/2012', '00390876544', '51999878988', 'jose_ataulfo@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(90, 'Oscar Niemeyer', '12/01/1957', '00390376544', '51999876543', 'oscar@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(91, 'Oscar Niemeyer', '12/01/1957', '00390376544', '51999876543', 'oscar@gmail.com', 'Homem cisgenero', 'Comunidade em geral', ''),
(92, 'Maria das Neves', '12/01/1957', '00390376544', '51999876543', 'oscar@gmail.com', 'Mulher cisgenero', 'Rede Municipal', ''),
(93, 'Abdias do Nascimento', '30/12/1942', '1082475309', '51999878998', 'Não possui', 'Homem cisgenero', 'Comunidade em geral', ''),
(94, 'Ezequiel Pereira Neto', '30/12/1999', '01011121314', '51999877665', 'ezequielneto@gmail.com', 'Homem cisgenero', 'Comunidade em geral', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(50) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `horario` varchar(50) NOT NULL,
  `prof_resp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `nome_curso`, `dia`, `horario`, `prof_resp`) VALUES
(1, 'Grupo Freirencanto', 'Terças e Quintas', 'Das 16:30 às 18:45 e 16:00 às 18:45', 'Leandro Rodrigues'),
(2, 'Técnica Vocal Terça', 'Terça-feira', 'Das 15:00 às 16:30', 'Leandro Rodrigues'),
(3, 'Cantar_o_lar', 'Segunda-feira', 'Das 14:30 às 18:30', 'Leandro Rodrigues'),
(5, 'Canto Espontâneo e Percussão Terça', 'Terça-feira', 'Das 13:00 às 15:00', 'Nilson Araújo'),
(6, 'INST - Violão Intermediário', 'Terça-feira', 'Das 16:00 às17:30', 'Cacildo Bavaresco'),
(8, 'Teoria e Percepção Quarta', 'Quarta-feira', 'Das 15:00 às 16:30', 'Renato Pedro'),
(9, 'INST - Violão Intermediário B', 'Quarta-feira', 'Das 16:30 às 17:30', 'Cacildo Bavaresco'),
(12, 'INST - Flauta Iniciante A', 'Quarta-feira', 'Das 9:30 às 10:30', 'Renato Pedro'),
(13, 'INST - Viola Brasileira (caipira)', 'Quarta-feira', 'Das 10:30 às 11:30', 'Renato Pedro'),
(14, 'INST - Flauta Iniciante B', 'Quarta-feira', 'Das 13:30 às 15h', 'Renato Pedro'),
(16, 'INST - Guitarra', 'Quarta-feira', 'Das 14:30 às 15:30', 'Cacildo Bavaresco'),
(17, 'Técnica Vocal Quinta', 'Quinta-feira', 'Das 15:00 às 16:30', 'Cacildo Bavaresco'),
(18, 'Canto Espontâneo e Percussão Sexta', 'Sexta-feira', 'Das 15:00 às 16:30', 'Nilson Araújo'),
(19, 'Teoria e Percepção Quinta', 'Quinta-feira', 'Das 10:00 às 11:30', 'Renato Pedro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula`
--

CREATE TABLE `matricula` (
  `id_matricula` int(11) NOT NULL,
  `data_horario` datetime NOT NULL,
  `curso01_id` int(11) DEFAULT NULL,
  `curso02_id` int(11) DEFAULT NULL,
  `curso03_id` int(11) DEFAULT NULL,
  `curso04_id` int(11) DEFAULT NULL,
  `curso05_id` int(11) DEFAULT NULL,
  `curso06_id` int(11) DEFAULT NULL,
  `nome_aluno` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `matricula`
--

INSERT INTO `matricula` (`id_matricula`, `data_horario`, `curso01_id`, `curso02_id`, `curso03_id`, `curso04_id`, `curso05_id`, `curso06_id`, `nome_aluno`) VALUES
(21, '2024-11-05 10:45:00', 1, 3, 2, 0, 0, 0, 'Leandro da Silva Rodrigues'),
(22, '2024-11-08 08:29:05', 1, 0, 2, 0, 6, 0, 'Érico Rosa Rodrigues'),
(23, '2024-11-08 08:29:05', 1, 0, 2, 0, 6, 0, 'Érico Rosa Rodrigues'),
(32, '2024-11-20 11:49:08', 1, 3, 2, 18, 16, 19, 'Oscar Niemeyer'),
(33, '2024-11-20 11:49:08', 1, 3, 2, 18, 16, 19, 'Oscar Niemeyer'),
(35, '2024-11-20 20:23:43', 0, 0, 0, 0, 6, 0, 'Abdias do Nascimento'),
(36, '2024-11-27 17:28:09', 0, 0, 0, 0, 13, 8, 'Ezequiel Pereira Neto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `senha_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `senha_usuario`) VALUES
(1, 'secretaria', '5f0741e9b10725dade3d6fc875826220'),
(2, 'leandro', '0a92655e31b73e20da5f0d5db3c8d655'),
(3, 'leandro', 'leandrost572');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`);

--
-- Índices de tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id_matricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
