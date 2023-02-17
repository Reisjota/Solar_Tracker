-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 17/06/2020 às 15:18
-- Versão do servidor: 5.6.47-cll-lve
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gb3ta5ob_solar_tracker`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dadospainel`
--

CREATE TABLE `dadospainel` (
  `idDado` int(11) NOT NULL,
  `numeroMovimentosHorizontal` varchar(255) NOT NULL,
  `numeroMovimentosVertical` varchar(255) NOT NULL,
  `voltagemPainel` varchar(255) NOT NULL,
  `dataDados` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `movimentosVerticaisRegisto` varchar(255) NOT NULL,
  `movimentosHorizontaisRegisto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `dadospainel`
--

INSERT INTO `dadospainel` (`idDado`, `numeroMovimentosHorizontal`, `numeroMovimentosVertical`, `voltagemPainel`, `dataDados`, `movimentosVerticaisRegisto`, `movimentosHorizontaisRegisto`) VALUES
(2, '0', '0', '50', '2020-01-01 18:35:43', '', ''),
(3, '0', '0', '50', '2020-01-01 18:35:43', '', ''),
(4, '0', '0', '40', '2020-01-01 18:35:43', '', ''),
(5, '0', '0', '30', '2020-02-01 18:35:43', '', ''),
(6, '0', '0', '50', '2020-06-01 17:35:43', '', ''),
(7, '0', '0', '40', '2020-02-01 18:35:43', '', ''),
(8, '3', '2', '40', '2020-03-01 18:35:43', '', ''),
(9, '4', '2', '30', '2020-03-01 18:35:43', '', ''),
(10, '5', '4', '30', '2020-03-01 18:35:43', '', ''),
(11, '7', '6', '40', '2020-04-01 17:35:43', '', ''),
(12, '7', '6', '50', '2020-04-01 17:35:43', '', ''),
(13, '7', '6', '50', '2020-05-01 17:35:43', '', ''),
(14, '7', '6', '20', '2020-05-01 17:35:43', '', ''),
(15, '7', '6', '30', '2020-05-01 17:35:43', '', ''),
(16, '7', '6', '50', '2020-06-01 17:35:43', '', ''),
(17, '7', '6', '60', '2020-06-07 17:35:43', '', ''),
(18, '7', '6', '50', '2020-06-07 17:35:43', '', ''),
(19, '7', '6', '40', '2020-07-01 17:35:43', '', ''),
(20, '7', '6', '50', '2020-06-30 22:00:00', '', ''),
(21, '7', '6', '50', '2020-08-01 17:35:43', '', ''),
(22, '7', '6', '60', '2020-08-01 17:35:43', '', ''),
(23, '7', '6', '40', '2020-08-01 17:35:43', '', ''),
(24, '7', '6', '40', '2020-09-01 17:35:43', '', ''),
(25, '7', '6', '50', '2020-09-01 17:35:43', '', ''),
(26, '12', '7', '60', '2020-09-01 17:35:43', '', ''),
(27, '19', '8', '70', '2020-10-01 17:35:43', '', ''),
(28, '19', '8', '30', '2020-10-01 17:35:43', '', ''),
(29, '20', '8', '40', '2020-10-01 17:35:43', '', ''),
(30, '23', '10', '50', '2020-11-01 18:35:43', '', ''),
(31, '27', '13', '50', '2020-11-01 18:35:43', '', ''),
(32, '27', '13', '40', '2020-11-01 18:35:43', '', ''),
(33, '27', '13', '30', '2020-12-01 18:35:43', '', ''),
(34, '31', '17', '30', '2020-12-01 18:35:43', '', ''),
(35, '31', '17', '40', '2020-12-01 18:35:43', '', ''),
(36, '31', '17', '0.79', '2020-06-07 17:35:43', '', ''),
(37, '31', '17', '0.80', '2020-06-07 17:35:43', '', ''),
(38, '31', '17', '0.83', '2020-06-07 17:35:43', '', ''),
(39, '31', '17', '0.83', '2020-06-07 17:35:43', '', ''),
(40, '34', '23', '0.90', '2020-06-07 17:35:43', '', ''),
(41, '34', '23', '0.83', '2020-06-07 17:35:43', '', ''),
(42, '34', '23', '0.77', '2020-06-07 17:35:43', '', ''),
(43, '34', '23', '0.90', '2020-06-07 17:35:43', '', ''),
(44, '34', '23', '0.69', '2020-06-07 17:35:43', '', ''),
(45, '35', '24', '2.56', '2020-06-07 17:35:43', '', ''),
(46, '44', '28', '1.45', '2020-06-07 17:35:43', '', ''),
(47, '44', '28', '0.70', '2020-06-07 17:35:43', '', ''),
(48, '45', '36', '2.52', '2020-06-07 17:35:43', '', ''),
(49, '53', '40', '2.61', '2020-06-07 17:35:43', '', ''),
(50, '59', '44', '2.64', '2020-06-07 17:35:43', '', ''),
(51, '61', '46', '2.63', '2020-06-07 17:35:43', '', ''),
(52, '65', '48', '2.59', '2020-06-07 17:35:43', '', ''),
(53, '65', '48', '0.40', '2020-06-07 17:35:43', '', ''),
(54, '65', '48', '0.43', '2020-06-07 17:35:43', '', ''),
(55, '65', '48', '0.32', '2020-06-07 17:35:43', '', ''),
(56, '65', '48', '0.33', '2020-06-07 17:35:43', '', ''),
(57, '65', '48', '0.40', '2020-06-07 17:35:43', '', ''),
(58, '65', '48', '0.34', '2020-06-07 17:35:43', '', ''),
(59, '68', '50', '0.29', '2020-06-07 17:35:43', '', ''),
(60, '68', '50', '0.32', '2020-06-07 17:35:43', '', ''),
(61, '68', '50', '0.38', '2020-06-07 17:35:43', '', ''),
(62, '70', '58', '0.89', '2020-06-07 17:35:43', '', ''),
(63, '75', '68', '2.60', '2020-06-07 17:35:43', '', ''),
(64, '82', '81', '1.33', '2020-06-07 17:35:43', '', ''),
(65, '83', '82', '0.41', '2020-06-07 17:35:43', '', ''),
(66, '83', '82', '0.36', '2020-06-07 17:35:43', '', ''),
(67, '85', '95', '0.51', '2020-06-07 17:35:43', '', ''),
(68, '85', '95', '0.35', '2020-06-07 17:35:43', '', ''),
(69, '85', '95', '0.60', '2020-06-07 17:35:43', '', ''),
(70, '85', '95', '0.31', '2020-06-07 17:35:43', '', ''),
(71, '85', '95', '0.46', '2020-06-07 17:35:43', '', ''),
(72, '85', '95', '0.35', '2020-06-07 17:35:43', '', ''),
(73, '85', '95', '0.44', '2020-06-07 17:35:43', '', ''),
(74, '86', '97', '0.48', '2020-06-07 17:35:43', '', ''),
(75, '89', '113', '0.99', '2020-06-07 17:35:43', '', ''),
(76, '91', '115', '2.57', '2020-06-07 17:35:43', '', ''),
(77, '96', '120', '2.58', '2020-06-07 17:35:43', '', ''),
(78, '101', '127', '2.65', '2020-06-07 17:35:43', '', ''),
(79, '102', '130', '0.40', '2020-06-07 17:35:43', '', ''),
(80, '107', '135', '1.36', '2020-06-07 17:35:43', '', ''),
(81, '21', '21', '2', '2020-06-07 17:35:43', '', ''),
(82, '21', '21', '2', '2020-06-07 17:35:43', '', ''),
(83, '23', '27', '0.19', '2020-06-07 17:41:21', '', ''),
(84, '25', '31', '2.51', '2020-06-07 17:42:21', '', ''),
(85, '26', '36', '0.20', '2020-06-07 17:42:26', '', ''),
(86, '31', '44', '2.54', '2020-06-07 17:42:31', '', ''),
(87, '31', '46', '2.59', '2020-06-07 17:42:36', '', ''),
(88, '31', '46', '0.80', '2020-06-07 17:42:41', '', ''),
(89, '33', '48', '0.14', '2020-06-07 17:42:46', '', ''),
(90, '33', '48', '0.15', '2020-06-07 17:42:51', '', ''),
(91, '33', '48', '0.14', '2020-06-07 17:42:56', '', ''),
(92, '33', '48', '0.13', '2020-06-07 17:43:01', '', ''),
(93, '33', '48', '0.21', '2020-06-07 17:43:06', '', ''),
(94, '33', '48', '0.25', '2020-06-07 17:43:11', '', ''),
(95, '33', '48', '0.27', '2020-06-07 17:43:16', '', ''),
(96, '33', '48', '0.24', '2020-06-07 17:43:21', '', ''),
(97, '33', '48', '0.27', '2020-06-07 17:43:26', '', ''),
(98, '37', '57', '2.57', '2020-06-07 17:43:31', '', ''),
(99, '39', '64', '2.39', '2020-06-07 17:43:36', '', ''),
(100, '41', '68', '2', '2020-06-07 17:43:41', '', ''),
(101, '45', '84', '1.42', '2020-06-06 22:00:00', '', ''),
(102, '45', '84', '1.49', '2020-06-08 14:18:22', '', ''),
(103, '45', '84', '1.49', '2020-06-08 14:18:27', '', ''),
(104, '49', '86', '2.50', '2020-06-08 14:18:32', '', ''),
(105, '53', '94', '2.53', '2020-06-08 14:18:37', '', ''),
(106, '56', '102', '2.32', '2020-06-08 14:18:42', '', ''),
(107, '56', '102', '1.14', '2020-06-09 01:12:36', '', ''),
(108, '56', '102', '1.14', '2020-06-09 01:12:40', '', ''),
(109, '56', '102', '2.85', '2020-06-12 10:53:00', '', ''),
(110, '58', '102', '2.87', '2020-06-12 10:53:05', '', ''),
(111, '58', '102', '2.38', '2020-06-12 16:38:56', '', ''),
(112, '62', '104', '2.61', '2020-06-12 16:39:01', '', ''),
(113, '65', '106', '2.61', '2020-06-12 16:39:06', '', ''),
(114, '68', '108', '2.60', '2020-06-11 22:00:00', '', ''),
(115, '71', '108', '2.21', '2020-06-12 16:39:16', '', ''),
(116, '71', '108', '2.17', '2020-06-12 16:39:21', '', ''),
(117, '73', '110', '2.59', '2020-06-12 16:39:26', '', ''),
(118, '75', '114', '2.45', '2020-06-12 16:39:31', '', ''),
(119, '80', '118', '2.57', '2020-06-12 16:39:36', '', ''),
(120, '80', '118', '1.07', '2020-06-13 00:00:45', '0', '0'),
(121, '80', '118', '1.10', '2020-06-13 00:00:49', '0', '0'),
(122, '80', '118', '1.10', '2020-06-13 00:00:54', '0', '0'),
(123, '81', '120', '2.69', '2020-06-13 00:00:59', '2', '1'),
(124, '81', '120', '1.12', '2020-06-13 00:03:22', '0', '0'),
(125, '81', '120', '1.11', '2020-06-13 00:03:27', '0', '0'),
(126, '81', '120', '1.16', '2020-06-13 00:03:32', '0', '0'),
(127, '81', '120', '1.16', '2020-06-13 00:03:37', '0', '0'),
(128, '81', '120', '1.19', '2020-06-13 00:03:42', '0', '0'),
(129, '85', '123', '2.42', '2020-06-13 00:03:47', '3', '4'),
(130, '90', '126', '2.68', '2020-06-13 00:03:52', '3', '5'),
(131, '94', '128', '1.29', '2020-06-13 00:03:57', '2', '4'),
(132, '97', '131', '2.55', '2020-06-13 18:49:03', '3', '3'),
(133, '97', '131', '20', '2020-06-20 21:04:36', '0', '0'),
(134, '97', '131', '30', '2020-06-19 21:04:40', '0', '0'),
(135, '98', '134', '25.30', '2020-06-18 21:04:45', '3', '1'),
(136, '100', '138', '33.20', '2020-06-17 21:04:50', '4', '2'),
(137, '102', '141', '22', '2020-06-16 21:04:55', '3', '2'),
(138, '104', '145', '25', '2020-06-15 21:05:00', '4', '2'),
(139, '104', '147', '1.57', '2020-06-15 21:05:05', '2', '0'),
(140, '104', '147', '1.09', '2020-06-14 00:50:39', '0', '0'),
(141, '108', '151', '2.62', '2020-06-14 00:50:42', '4', '4'),
(142, '111', '153', '2.46', '2020-06-14 00:50:47', '2', '3'),
(143, '112', '155', '2.62', '2020-06-14 00:50:52', '2', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eliminados`
--

CREATE TABLE `eliminados` (
  `idUser` int(11) NOT NULL,
  `nomeUser` varchar(255) NOT NULL,
  `passwordUser` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `primeironomeUser` varchar(255) NOT NULL,
  `ultimonomeUser` varchar(255) NOT NULL,
  `moradaUser` varchar(255) NOT NULL,
  `cidadeUser` varchar(255) NOT NULL,
  `paisUser` varchar(255) NOT NULL,
  `codigopostalUser` varchar(255) NOT NULL,
  `descricaoUser` varchar(255) NOT NULL,
  `permissaoUser` int(11) NOT NULL,
  `alterarPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `eliminados`
--

INSERT INTO `eliminados` (`idUser`, `nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser`, `alterarPass`) VALUES
(78, 'Usuário123', '$2y$12$gT1RCqLNEcLqGcc7Q8HJmOJjhFtHv4o/FgLrXWhR1Hkt5Rkt71Acq', 'usuario@gmail.com', '', '', '', '', '', '', '', '', 0, ''),
(79, 'User', '$2y$10$GDV2/gKozYfEnbPKRcCd2.A.nEW2JqE2lJyGSMmP6BMa06liDDqdG', 'user@gmail.com', 'http://www.solartracker.pt/Solar_Tracker/Upload/default.jpg', '', '', '', '', '', '', 'Altera aqui a tua descrição pessoal.', 0, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registados`
--

CREATE TABLE `registados` (
  `idUser` int(11) NOT NULL,
  `nomeUser` varchar(255) NOT NULL,
  `passwordUser` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `primeironomeUser` varchar(255) NOT NULL,
  `ultimonomeUser` varchar(255) NOT NULL,
  `moradaUser` varchar(255) NOT NULL,
  `cidadeUser` varchar(255) NOT NULL,
  `paisUser` varchar(255) NOT NULL,
  `codigopostalUser` varchar(255) NOT NULL,
  `descricaoUser` varchar(255) NOT NULL,
  `permissaoUser` int(11) NOT NULL,
  `alterarPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `registados`
--

INSERT INTO `registados` (`idUser`, `nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser`, `alterarPass`) VALUES
(28, 'Henrique', '$2y$10$Xqpu1Bn2KmDlOK8PE7kbR.rV6tTF0KYpg1/8JDVOQV0pgPtmlv9V6', 'hoabelha3@gmail.com', 'http://www.solartracker.pt/Solar_Tracker/Upload/default.jpg', '', '', '', '', '', '', 'Altera aqui a tua descrição pessoal.', 0, '0');

-- --------------------------------------------------------

--
-- Estrutura para tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `idUser` int(11) NOT NULL,
  `nomeUser` varchar(255) NOT NULL,
  `passwordUser` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `primeironomeUser` varchar(255) NOT NULL,
  `ultimonomeUser` varchar(255) NOT NULL,
  `moradaUser` varchar(255) NOT NULL,
  `cidadeUser` varchar(255) NOT NULL,
  `paisUser` varchar(255) NOT NULL,
  `codigopostalUser` varchar(255) NOT NULL,
  `descricaoUser` varchar(255) NOT NULL,
  `permissaoUser` int(11) NOT NULL,
  `alterarPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `utilizadores`
--

INSERT INTO `utilizadores` (`idUser`, `nomeUser`, `passwordUser`, `emailUser`, `fotoUser`, `primeironomeUser`, `ultimonomeUser`, `moradaUser`, `cidadeUser`, `paisUser`, `codigopostalUser`, `descricaoUser`, `permissaoUser`, `alterarPass`) VALUES
(21, 'João Reis', '$2y$12$gT1RCqLNEcLqGcc7Q8HJmOJjhFtHv4o/FgLrXWhR1Hkt5Rkt71Acq', 'jcirnereis@gmail.com', 'https://solartracker.pt/Solar_Tracker/Upload/Utilizadores/João_Reis1.png', 'João', 'Reis', 'Rua Presa Nova Norte', 'Porto/Vila Nova de gaia', 'Portugal', '4415-401', 'MAIA ÉS LINDO', 2, '0'),
(31, 'Pedromaia26', '$2y$12$6WfgbH9QohtOkP2Q5RELvusfVdGOsUyG6ldYW5qR3imfKuF2IW7Ou', 'pedromartinsalves26@gmail.com', 'https://solartracker.pt/Solar_Tracker/Upload/Utilizadores/Pedromaia262.jpg', 'Pedro', 'Alves', '', '', '', '', 'Sdasdsadsa', 2, '0'),
(74, 'Utilizador1', '$2y$10$WTEkix.OEhP3eJf4SOpflOWQTvn.pji0D83z.oI.ESQwNSdk87PT2', 'pedromaiamartinsalves@gmail.com', 'http://www.solartracker.pt/Solar_Tracker/Upload/default.jpg', '', '', '', '', '', '', 'Altera aqui a tua descrição pessoal.', 1, ''),
(80, 'Utilizador2', '$2y$10$YDP3/3lWOpTdkqDsJ9CdQ.eAcaa3GJr9frc9kZyQyA5O4YMiM3XVm', 'jpc2002555@gmail.com', 'http://www.solartracker.pt/Solar_Tracker/Upload/default.jpg', '', '', '', '', '', '', 'Altera aqui a tua descrição pessoal.', 0, '1'),
(81, 'Eduardo', '$2y$10$8jy/e3ajjTuBv2hvkzwwaOEQqA/jsiL/93QZraYAzvq9JdVgmkF9S', 'edusilva82002@gmail.com', 'http://www.solartracker.pt/Solar_Tracker/Upload/default.jpg', '', '', '', '', '', '', 'Altera aqui a tua descrição pessoal.', 0, '');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `dadospainel`
--
ALTER TABLE `dadospainel`
  ADD PRIMARY KEY (`idDado`);

--
-- Índices de tabela `registados`
--
ALTER TABLE `registados`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `dadospainel`
--
ALTER TABLE `dadospainel`
  MODIFY `idDado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de tabela `registados`
--
ALTER TABLE `registados`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
