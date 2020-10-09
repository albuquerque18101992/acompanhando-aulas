-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Out-2020 às 17:08
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_system`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_contrato`
--

CREATE TABLE `adms_contrato` (
  `id` int(11) NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_contrato`
--

INSERT INTO `adms_contrato` (`id`, `descricao`, `ordem`, `created`, `modified`) VALUES
(1, 'Alugada', 1, '0000-00-00 00:00:00', NULL),
(2, 'Patrimônio', 2, '0000-00-00 00:00:00', NULL),
(3, 'Serviços Especiais', 3, '0000-00-00 00:00:00', NULL),
(4, 'Outros', 4, '2020-09-28 18:35:52', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_cors`
--

CREATE TABLE `adms_cors` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_cors`
--

INSERT INTO `adms_cors` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Azul', 'primary', '2020-07-24 00:00:00', NULL),
(2, 'Cinza', 'secondary', '2020-07-24 00:00:00', NULL),
(3, 'Verde', 'success', '2020-07-24 00:00:00', NULL),
(4, 'Vermelho', 'danger', '2020-07-24 00:00:00', NULL),
(5, 'Laranjado', 'warning', '2020-07-24 00:00:00', NULL),
(6, 'Azul claro', 'info', '2020-07-24 00:00:00', NULL),
(7, 'Claro', 'light', '2020-07-24 00:00:00', NULL),
(8, 'Cinza escuro', 'dark', '2020-07-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_equipamentos`
--

CREATE TABLE `adms_equipamentos` (
  `id` int(11) NOT NULL,
  `numero_serie_cpu` varchar(70) NOT NULL,
  `numero_serie_monitor` varchar(70) NOT NULL,
  `numero_serie_mouse` int(11) DEFAULT NULL,
  `numero_serie_teclado` int(11) DEFAULT NULL,
  `numero_ti_cpu` varchar(70) NOT NULL,
  `numero_ti_monitor` varchar(70) NOT NULL,
  `adms_setores_id` int(11) NOT NULL,
  `adms_fabricantes_id` int(11) NOT NULL,
  `adms_contratos_id` int(11) NOT NULL,
  `adms_unidade_id` int(11) NOT NULL,
  `inform_computer` text DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_equipamentos`
--

INSERT INTO `adms_equipamentos` (`id`, `numero_serie_cpu`, `numero_serie_monitor`, `numero_serie_mouse`, `numero_serie_teclado`, `numero_ti_cpu`, `numero_ti_monitor`, `adms_setores_id`, `adms_fabricantes_id`, `adms_contratos_id`, `adms_unidade_id`, `inform_computer`, `created`, `modified`) VALUES
(1, '214813', '412443', NULL, NULL, '2294', '2293', 8, 1, 1, 4, 'Descrição TESTEDescrição TESTEDescrição TESTEDescrição TESTEDescrição TESTEDescrição TESTEDescrição TESTEDescrição TESTEDescrição TESTEDescrição TESTE', '2020-09-29 00:00:00', NULL),
(2, '214893', '413432', NULL, NULL, '2311', '2312', 3, 1, 1, 4, NULL, '2020-09-29 00:00:00', NULL),
(3, '214809', '413483', NULL, NULL, '2300', '2299', 3, 1, 1, 4, NULL, '2020-09-29 00:00:00', NULL),
(4, '214882', '411297', NULL, NULL, '2292', '2291', 3, 1, 1, 4, NULL, '2020-09-29 00:00:00', NULL),
(5, '217927', '416594', NULL, NULL, '2820', '2821', 38, 1, 2, 4, NULL, '2020-09-29 00:00:00', NULL),
(6, 'EHQ2AIA000596', 'EHQ2AIA000596', NULL, NULL, 'EHQ2AIA000596', 'EHQ2AIA000596', 38, 1, 2, 4, 'ALL-IN-ONE', '2020-09-29 00:00:00', NULL),
(7, '214803', '413259', NULL, NULL, '2282', '2281', 3, 1, 1, 4, NULL, '2020-09-29 18:00:00', NULL),
(8, '214849', '413024', NULL, NULL, '2288', '2287', 3, 1, 1, 4, NULL, '2020-09-29 18:59:02', NULL),
(9, '214851', '412465', NULL, NULL, '2302', '2301', 13, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(10, '214900', '413418', NULL, NULL, '2296', '2648', 6, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(11, '214828', '410781', NULL, NULL, '2298', '2297', 6, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(12, '214868', '412445', NULL, NULL, '1866', '1860', 16, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(13, '214864', '412433', NULL, NULL, '1868', '1867', 16, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(14, '309085', 'NOTEBOOK', NULL, NULL, '309085', 'NOTEBOOK', 17, 1, 1, 4, 'NOTEBOOK AS LOCADO', '2020-09-29 01:10:12', NULL),
(15, '214867', '410867', NULL, NULL, '1870', '1869', 17, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(16, '214853', '412797', NULL, NULL, '2286', '2285', 3, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(17, '214866', '412885', NULL, NULL, '2053', '1873', 3, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(18, '214847', '413529', NULL, NULL, '1871', '1872', 22, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(19, '213884', '412790', NULL, NULL, '2306', '2305', 7, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(20, '214861', '412650', NULL, NULL, '2303', '2304', 7, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(21, '214054', '413520', NULL, NULL, '1677', '2307', 7, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(22, '4A2111518', '601A77270', NULL, NULL, '2370', '2369', 26, 2, 2, 4, NULL, '2020-09-29 01:10:12', NULL),
(23, '214859', '411305', NULL, NULL, '2276', '2275', 26, 2, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(24, '215101', '413470', NULL, NULL, '2309', '2310', 26, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(25, '207372', '410726', NULL, NULL, '4102', '2273', 26, 2, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(26, '4A211198J', '601A77275', NULL, NULL, '2055', '2054', 26, 2, 2, 4, NULL, '2020-09-29 01:10:12', NULL),
(27, '214035', '413523', NULL, NULL, '1975', '1976', 26, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(28, '214858', '412788', NULL, NULL, '2284', '2283', 3, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL),
(29, '4A1820K4L', '601A71177', NULL, NULL, '594', '593', 10, 2, 2, 4, NULL, '2020-09-29 01:10:12', NULL),
(30, '214873', '413428', NULL, NULL, '2290', '2289', 39, 1, 1, 4, NULL, '2020-09-29 01:10:12', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_fabricante`
--

CREATE TABLE `adms_fabricante` (
  `id` int(11) NOT NULL,
  `marca` varchar(120) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_fabricante`
--

INSERT INTO `adms_fabricante` (`id`, `marca`, `ordem`, `created`, `modified`) VALUES
(1, 'Dell', 1, '2020-09-28 18:35:52', NULL),
(2, 'Positivo', 2, '2020-09-28 18:35:52', NULL),
(3, 'AOC', 3, '2020-09-28 18:35:52', NULL),
(4, 'Samsung', 4, '2020-09-28 18:35:52', NULL),
(5, 'IBM', 5, '2020-09-28 18:35:52', NULL),
(6, 'Lenovo', 6, '2020-09-28 18:35:52', NULL),
(7, 'Fujitsu', 7, '2020-09-28 18:35:52', NULL),
(8, 'Toshiba', 8, '2020-09-28 18:35:52', NULL),
(9, 'Fujitsu', 9, '2020-09-28 18:35:52', NULL),
(10, 'Apple', 10, '2020-09-28 18:35:52', NULL),
(11, 'Fujitsu', 11, '2020-09-28 18:35:52', NULL),
(12, 'Outros', 12, '2020-09-28 18:35:52', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_grps_pgs`
--

CREATE TABLE `adms_grps_pgs` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_grps_pgs`
--

INSERT INTO `adms_grps_pgs` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Listar', 1, '2020-08-10 00:00:00', NULL),
(2, 'Cadastrar', 2, '2020-08-10 00:00:00', NULL),
(3, 'Editar', 3, '2020-08-10 00:00:00', NULL),
(4, 'Apagar', 4, '2020-08-10 00:00:00', NULL),
(5, 'Visualizar', 5, '2020-08-10 00:00:00', NULL),
(6, 'Acesso', 7, '2020-08-10 00:00:00', NULL),
(7, 'Outros', 6, '2020-08-10 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_menus`
--

CREATE TABLE `adms_menus` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `icone` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  `adms_sit_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_menus`
--

INSERT INTO `adms_menus` (`id`, `nome`, `icone`, `ordem`, `adms_sit_id`, `created`, `modified`) VALUES
(1, 'Dashboard', 'fas fa-tachometer-alt', 1, 1, '2020-07-25 00:00:00', NULL),
(2, 'Usuário', 'fas fa-user', 2, 1, '2020-07-25 00:00:00', NULL),
(3, 'Menu', 'fas fa-list-ol', 3, 1, '2020-07-25 00:00:00', NULL),
(4, 'Sair', 'fa fa-power-off', 5, 1, '2020-07-25 00:00:00', NULL),
(5, 'Coordenação', 'fas fa-clinic-medical', 4, 1, '2020-09-11 16:05:29', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_nivacs_pgs`
--

CREATE TABLE `adms_nivacs_pgs` (
  `id` int(11) NOT NULL,
  `permissao` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `dropdown` int(11) NOT NULL,
  `lib_menu` int(11) NOT NULL,
  `adms_menu_id` int(11) NOT NULL,
  `adms_niveis_acesso_id` int(11) NOT NULL,
  `adms_pagina_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_nivacs_pgs`
--

INSERT INTO `adms_nivacs_pgs` (`id`, `permissao`, `ordem`, `dropdown`, `lib_menu`, `adms_menu_id`, `adms_niveis_acesso_id`, `adms_pagina_id`, `created`, `modified`) VALUES
(1, 1, 1, 2, 1, 1, 1, 1, '2020-09-29 00:00:00', '2020-10-09 12:01:30'),
(2, 1, 1, 2, 1, 1, 2, 1, '2020-09-29 00:00:00', '2020-10-09 12:04:53'),
(3, 1, 1, 2, 1, 1, 3, 1, '2020-09-29 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 2, 2, 2, 2, 3, 5, '2020-07-31 14:04:15', '2020-10-04 18:47:07'),
(5, 1, 2, 1, 1, 2, 2, 5, '2020-09-23 00:00:00', '2020-10-04 18:29:16'),
(6, 1, 2, 1, 1, 2, 1, 5, '2020-07-25 00:00:00', '2020-10-04 19:44:21'),
(7, 1, 3, 1, 2, 3, 1, 6, '2020-09-24 14:17:31', '0000-00-00 00:00:00'),
(8, 1, 9, 2, 2, 2, 1, 11, '2020-07-30 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 10, 2, 2, 2, 1, 12, '2020-07-30 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 11, 2, 2, 2, 1, 13, '2020-07-30 21:59:59', '0000-00-00 00:00:00'),
(11, 1, 4, 1, 1, 2, 1, 6, '2020-07-25 00:00:00', '2020-10-04 19:44:22'),
(12, 2, 5, 2, 2, 3, 3, 7, '2020-07-31 14:04:15', '2020-10-04 18:33:42'),
(13, 1, 5, 1, 1, 3, 1, 7, '2020-07-27 00:00:00', '2020-10-04 19:43:57'),
(14, 2, 5, 2, 2, 3, 2, 7, '2020-09-22 00:00:00', '2020-10-04 18:12:04'),
(15, 1, 6, 1, 1, 3, 1, 8, '2020-07-27 00:00:00', '2020-10-04 19:44:02'),
(16, 2, 8, 2, 2, 2, 3, 10, '2020-07-31 14:04:15', '2020-10-04 18:33:44'),
(17, 2, 9, 2, 2, 2, 3, 11, '2020-07-31 14:04:15', '2020-10-04 18:33:45'),
(18, 2, 10, 2, 2, 2, 3, 12, '2020-07-31 14:04:15', '2020-10-04 18:33:45'),
(19, 1, 11, 2, 2, 2, 3, 13, '2020-07-31 14:04:15', '0000-00-00 00:00:00'),
(20, 1, 12, 2, 2, 2, 1, 14, '2020-07-31 00:00:00', '0000-00-00 00:00:00'),
(21, 1, 13, 1, 2, 2, 1, 15, '2020-08-06 00:00:00', '0000-00-00 00:00:00'),
(22, 1, 14, 1, 2, 3, 1, 16, '2020-08-10 00:00:00', '0000-00-00 00:00:00'),
(23, 1, 15, 2, 2, 3, 1, 17, '2020-09-07 00:00:00', '0000-00-00 00:00:00'),
(24, 1, 16, 1, 2, 3, 1, 18, '2020-09-07 10:08:45', '0000-00-00 00:00:00'),
(25, 2, 16, 2, 2, 3, 2, 18, '2020-09-07 10:08:46', '2020-10-04 18:11:51'),
(26, 2, 16, 2, 2, 3, 3, 18, '2020-09-07 10:08:46', '2020-10-04 18:33:31'),
(27, 1, 17, 1, 2, 3, 1, 19, '2020-09-07 10:20:05', '0000-00-00 00:00:00'),
(28, 2, 17, 2, 2, 3, 2, 19, '2020-09-07 10:20:05', '2020-10-04 18:21:50'),
(29, 2, 17, 2, 2, 3, 3, 19, '2020-09-07 10:20:05', '2020-10-04 18:33:31'),
(30, 1, 18, 1, 2, 3, 1, 20, '2020-09-07 14:44:22', '0000-00-00 00:00:00'),
(31, 2, 18, 2, 2, 3, 2, 20, '2020-09-07 14:44:22', '2020-10-04 18:11:52'),
(32, 2, 18, 2, 2, 3, 3, 20, '2020-09-07 14:44:22', '2020-10-04 18:33:32'),
(33, 1, 19, 1, 2, 3, 1, 21, '2020-09-07 15:18:56', '0000-00-00 00:00:00'),
(34, 2, 19, 1, 1, 3, 2, 21, '2020-09-07 15:18:57', '0000-00-00 00:00:00'),
(35, 2, 19, 1, 2, 3, 3, 21, '2020-09-07 15:18:57', '0000-00-00 00:00:00'),
(36, 1, 20, 1, 2, 3, 1, 22, '2020-09-07 20:36:34', '0000-00-00 00:00:00'),
(37, 2, 20, 1, 1, 3, 2, 22, '2020-09-07 20:36:34', '0000-00-00 00:00:00'),
(38, 2, 20, 1, 2, 3, 3, 22, '2020-09-07 20:36:34', '0000-00-00 00:00:00'),
(39, 1, 21, 1, 2, 3, 1, 23, '2020-09-10 21:41:18', '0000-00-00 00:00:00'),
(40, 2, 21, 2, 2, 3, 2, 23, '2020-09-10 21:41:18', '2020-10-04 18:11:58'),
(41, 2, 21, 2, 2, 3, 3, 23, '2020-09-10 21:41:18', '2020-10-04 18:33:46'),
(42, 1, 22, 1, 1, 5, 1, 24, '2020-09-11 15:59:09', '0000-00-00 00:00:00'),
(43, 1, 22, 1, 1, 5, 2, 24, '2020-09-11 15:59:09', '2020-10-04 18:18:25'),
(44, 1, 22, 1, 1, 5, 3, 24, '2020-09-11 15:59:09', '2020-10-04 18:36:02'),
(45, 1, 23, 1, 2, 3, 1, 25, '2020-09-11 18:08:45', '0000-00-00 00:00:00'),
(46, 1, 23, 1, 2, 3, 2, 25, '2020-09-11 18:08:45', '2020-10-04 18:20:04'),
(47, 1, 23, 2, 2, 3, 3, 25, '2020-09-11 18:08:45', '2020-10-04 18:34:57'),
(48, 1, 24, 1, 2, 3, 1, 26, '2020-09-11 20:33:52', '0000-00-00 00:00:00'),
(49, 2, 24, 2, 2, 3, 2, 26, '2020-09-11 20:33:52', '2020-10-04 18:27:10'),
(50, 2, 24, 2, 2, 3, 3, 26, '2020-09-11 20:33:52', '2020-10-04 18:33:39'),
(51, 1, 25, 1, 2, 3, 1, 27, '2020-09-11 20:54:51', '0000-00-00 00:00:00'),
(52, 2, 25, 1, 1, 3, 2, 27, '2020-09-11 20:54:52', '0000-00-00 00:00:00'),
(53, 2, 25, 1, 2, 3, 3, 27, '2020-09-11 20:54:52', '0000-00-00 00:00:00'),
(54, 1, 26, 1, 2, 3, 1, 28, '2020-09-15 11:20:25', '0000-00-00 00:00:00'),
(55, 2, 26, 2, 2, 3, 2, 28, '2020-09-15 11:20:25', '2020-10-04 18:12:00'),
(56, 2, 26, 2, 2, 3, 3, 28, '2020-09-15 11:20:25', '2020-10-04 18:33:48'),
(57, 1, 27, 1, 2, 3, 1, 29, '2020-09-15 22:06:18', '0000-00-00 00:00:00'),
(58, 2, 27, 1, 1, 3, 2, 29, '2020-09-15 22:06:19', '0000-00-00 00:00:00'),
(59, 2, 27, 1, 2, 3, 3, 29, '2020-09-15 22:06:19', '0000-00-00 00:00:00'),
(60, 1, 28, 1, 2, 3, 1, 30, '2020-09-17 18:58:25', '0000-00-00 00:00:00'),
(61, 2, 28, 2, 2, 3, 2, 30, '2020-09-17 18:58:25', '2020-10-04 18:11:40'),
(62, 2, 28, 2, 2, 3, 3, 30, '2020-09-17 18:58:25', '2020-10-04 18:34:08'),
(63, 1, 29, 1, 2, 3, 1, 31, '2020-09-21 19:42:38', '0000-00-00 00:00:00'),
(64, 2, 29, 2, 2, 3, 2, 31, '2020-09-21 19:42:38', '2020-10-04 18:11:36'),
(65, 2, 29, 2, 2, 3, 3, 31, '2020-09-21 19:42:38', '2020-10-04 18:33:54'),
(66, 1, 30, 1, 1, 5, 1, 32, '2020-09-22 14:27:07', '0000-00-00 00:00:00'),
(67, 1, 30, 1, 1, 5, 2, 32, '2020-09-22 14:27:08', '2020-10-04 18:20:47'),
(68, 1, 30, 1, 1, 5, 3, 32, '2020-09-22 14:27:08', '2020-10-04 18:36:05'),
(69, 1, 31, 1, 2, 5, 1, 33, '2020-09-22 14:45:20', '0000-00-00 00:00:00'),
(70, 2, 31, 2, 2, 5, 2, 33, '2020-09-22 14:45:20', '2020-10-04 18:12:02'),
(71, 2, 31, 2, 2, 5, 3, 33, '2020-09-22 14:45:20', '2020-10-04 18:33:57'),
(72, 1, 9, 2, 2, 2, 2, 11, '0000-00-00 00:00:00', '2020-10-04 18:31:31'),
(73, 2, 10, 2, 2, 2, 2, 12, '2020-09-23 00:00:00', '2020-10-04 18:21:30'),
(74, 1, 11, 2, 2, 2, 2, 13, '2020-09-23 00:00:00', '0000-00-00 00:00:00'),
(75, 1, 32, 1, 2, 3, 1, 34, '2020-09-24 13:52:27', '0000-00-00 00:00:00'),
(76, 2, 32, 1, 1, 3, 2, 34, '2020-09-24 13:52:27', '0000-00-00 00:00:00'),
(77, 2, 32, 1, 2, 3, 3, 34, '2020-09-24 13:52:27', '0000-00-00 00:00:00'),
(78, 1, 33, 1, 2, 3, 1, 35, '2020-09-24 18:48:57', '0000-00-00 00:00:00'),
(79, 1, 33, 1, 2, 3, 2, 35, '2020-09-24 18:48:57', '2020-10-04 18:20:15'),
(80, 2, 33, 2, 2, 3, 3, 35, '2020-09-24 18:48:57', '2020-10-04 18:34:21'),
(81, 1, 34, 1, 2, 3, 1, 36, '2020-09-29 11:23:49', '0000-00-00 00:00:00'),
(82, 1, 34, 2, 2, 3, 2, 36, '2020-09-29 11:23:49', '2020-10-04 18:22:52'),
(83, 2, 34, 2, 2, 3, 3, 36, '2020-09-29 11:23:49', '2020-10-04 18:34:18'),
(84, 1, 35, 1, 2, 3, 1, 37, '2020-09-29 11:40:47', '0000-00-00 00:00:00'),
(85, 1, 35, 2, 2, 3, 2, 37, '2020-09-29 11:40:47', '2020-10-04 18:22:58'),
(86, 2, 35, 2, 2, 3, 3, 37, '2020-09-29 11:40:47', '2020-10-04 18:34:01'),
(87, 1, 36, 1, 2, 3, 1, 38, '2020-10-04 17:55:32', '0000-00-00 00:00:00'),
(88, 2, 36, 2, 2, 3, 2, 38, '2020-10-04 17:55:32', '2020-10-04 18:12:21'),
(89, 2, 36, 2, 2, 3, 3, 38, '2020-10-04 17:55:33', '2020-10-04 18:34:03'),
(90, 1, 37, 1, 2, 3, 1, 39, '2020-10-04 18:59:28', '0000-00-00 00:00:00'),
(91, 2, 37, 1, 2, 3, 2, 39, '2020-10-04 18:59:28', '0000-00-00 00:00:00'),
(92, 2, 37, 1, 2, 3, 3, 39, '2020-10-04 18:59:28', '0000-00-00 00:00:00'),
(93, 2, 4, 2, 2, 2, 3, 6, '2020-07-31 14:04:15', '2020-10-04 18:33:41'),
(94, 1, 4, 1, 1, 2, 2, 6, '2020-09-23 00:00:00', '2020-10-04 18:30:00'),
(95, 2, 6, 2, 2, 3, 3, 8, '2020-07-31 14:04:15', '2020-10-04 18:33:30'),
(96, 2, 7, 2, 2, 2, 3, 9, '2020-07-31 14:04:15', '2020-10-04 18:33:44'),
(97, 1, 7, 2, 2, 2, 1, 9, '2020-07-30 00:00:00', '2020-10-04 17:37:28'),
(98, 1, 8, 2, 2, 2, 1, 10, '2020-07-30 00:00:00', '0000-00-00 00:00:00'),
(99, 2, 3, 2, 2, 3, 2, 6, '2020-09-24 14:17:31', '2020-10-04 18:12:27'),
(100, 1, 8, 2, 2, 2, 2, 10, '2020-09-23 00:00:00', '2020-10-04 18:31:55'),
(101, 2, 3, 2, 2, 3, 3, 6, '2020-09-24 14:17:31', '2020-10-04 18:34:19'),
(102, 2, 6, 1, 1, 2, 2, 8, '2020-09-23 00:00:00', '2020-10-04 18:28:20'),
(103, 2, 7, 2, 2, 2, 2, 9, '2020-09-23 00:00:00', '2020-10-04 18:30:42'),
(104, 1, 38, 1, 2, 3, 1, 40, '2020-10-05 22:29:36', '0000-00-00 00:00:00'),
(105, 2, 38, 1, 2, 3, 2, 40, '2020-10-05 22:29:36', '0000-00-00 00:00:00'),
(106, 2, 38, 1, 2, 3, 3, 40, '2020-10-05 22:29:36', '0000-00-00 00:00:00'),
(107, 2, 1, 2, 2, 3, 4, 40, '2020-10-05 22:29:36', '2020-10-07 19:08:53'),
(108, 1, 39, 1, 2, 3, 1, 2, '2020-10-07 22:40:12', '0000-00-00 00:00:00'),
(109, 1, 40, 1, 2, 3, 1, 3, '2020-10-07 22:40:12', '0000-00-00 00:00:00'),
(110, 1, 41, 2, 2, 4, 1, 4, '2020-10-07 22:40:12', '2020-10-08 12:50:05'),
(111, 1, 39, 1, 2, 3, 2, 2, '2020-10-07 22:40:12', '0000-00-00 00:00:00'),
(112, 1, 40, 1, 2, 3, 2, 3, '2020-10-07 22:40:12', '0000-00-00 00:00:00'),
(113, 1, 41, 1, 2, 4, 2, 4, '2020-10-07 22:40:13', '2020-10-07 22:41:33'),
(114, 2, 42, 1, 2, 3, 2, 14, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(115, 2, 43, 1, 2, 3, 2, 15, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(116, 2, 44, 1, 2, 3, 2, 16, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(117, 2, 45, 1, 2, 3, 2, 17, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(118, 1, 39, 1, 2, 3, 3, 2, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(119, 1, 40, 1, 2, 3, 3, 3, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(120, 1, 41, 1, 2, 4, 3, 4, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(121, 2, 42, 1, 2, 3, 3, 14, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(122, 2, 43, 1, 2, 3, 3, 15, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(123, 2, 44, 1, 2, 3, 3, 16, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(124, 2, 45, 1, 2, 3, 3, 17, '2020-10-07 22:40:13', '0000-00-00 00:00:00'),
(125, 1, 2, 2, 1, 3, 4, 1, '2020-10-07 22:40:13', '2020-10-09 11:51:26'),
(126, 1, 3, 2, 2, 3, 4, 2, '2020-10-07 22:40:14', '2020-10-09 11:51:35'),
(127, 1, 4, 1, 2, 3, 4, 3, '2020-10-07 22:40:14', '0000-00-00 00:00:00'),
(128, 1, 5, 2, 2, 4, 4, 4, '2020-10-07 22:40:14', '2020-10-09 11:51:34'),
(129, 2, 6, 2, 2, 3, 4, 5, '2020-10-07 22:40:14', '2020-10-09 11:51:31'),
(130, 2, 7, 2, 2, 3, 4, 6, '2020-10-07 22:40:14', '2020-10-09 11:51:29'),
(131, 2, 8, 2, 2, 3, 4, 7, '2020-10-07 22:40:14', '2020-10-09 11:51:36'),
(132, 2, 9, 2, 2, 3, 4, 8, '2020-10-07 22:40:14', '2020-10-09 11:51:39'),
(133, 2, 10, 2, 2, 3, 4, 9, '2020-10-07 22:40:14', '2020-10-09 11:51:38'),
(134, 2, 11, 2, 2, 3, 4, 10, '2020-10-07 22:40:14', '2020-10-09 11:51:40'),
(135, 2, 12, 2, 2, 3, 4, 11, '2020-10-07 22:40:14', '2020-10-09 11:51:42'),
(136, 2, 13, 2, 2, 3, 4, 12, '2020-10-07 22:40:14', '2020-10-09 11:51:48'),
(137, 2, 14, 1, 2, 3, 4, 13, '2020-10-07 22:40:14', '0000-00-00 00:00:00'),
(138, 2, 15, 1, 2, 3, 4, 14, '2020-10-07 22:40:14', '0000-00-00 00:00:00'),
(139, 2, 16, 2, 2, 3, 4, 15, '2020-10-07 22:40:14', '2020-10-09 11:51:51'),
(140, 2, 17, 2, 2, 3, 4, 16, '2020-10-07 22:40:15', '2020-10-09 11:51:54'),
(141, 2, 18, 1, 2, 3, 4, 17, '2020-10-07 22:40:15', '0000-00-00 00:00:00'),
(142, 2, 19, 2, 2, 3, 4, 18, '2020-10-07 22:40:15', '2020-10-09 11:51:56'),
(143, 2, 20, 2, 2, 3, 4, 19, '2020-10-07 22:40:15', '2020-10-09 11:51:49'),
(144, 2, 21, 2, 2, 3, 4, 20, '2020-10-07 22:40:15', '2020-10-09 11:51:52'),
(145, 2, 22, 1, 2, 3, 4, 22, '2020-10-07 22:40:15', '0000-00-00 00:00:00'),
(146, 2, 23, 2, 2, 3, 4, 23, '2020-10-07 22:40:15', '2020-10-09 11:52:00'),
(147, 2, 24, 2, 2, 3, 4, 24, '2020-10-07 22:40:15', '2020-10-09 11:52:03'),
(148, 2, 25, 2, 2, 3, 4, 25, '2020-10-07 22:40:15', '2020-10-09 11:52:02'),
(149, 2, 26, 2, 2, 3, 4, 26, '2020-10-07 22:40:15', '2020-10-09 11:51:43'),
(150, 2, 27, 1, 2, 3, 4, 27, '2020-10-07 22:40:15', '0000-00-00 00:00:00'),
(151, 2, 28, 2, 2, 3, 4, 28, '2020-10-07 22:40:15', '2020-10-09 11:51:45'),
(152, 2, 29, 1, 2, 3, 4, 29, '2020-10-07 22:40:15', '0000-00-00 00:00:00'),
(153, 2, 30, 2, 2, 3, 4, 30, '2020-10-07 22:40:15', '2020-10-09 11:52:05'),
(154, 2, 31, 2, 2, 3, 4, 31, '2020-10-07 22:40:15', '2020-10-09 11:52:12'),
(155, 2, 32, 2, 2, 3, 4, 32, '2020-10-07 22:40:16', '2020-10-09 11:52:14'),
(156, 2, 33, 2, 2, 3, 4, 33, '2020-10-07 22:40:16', '2020-10-09 11:52:18'),
(157, 2, 34, 1, 2, 3, 4, 34, '2020-10-07 22:40:16', '0000-00-00 00:00:00'),
(158, 2, 35, 2, 2, 3, 4, 35, '2020-10-07 22:40:16', '2020-10-09 11:51:58'),
(159, 2, 36, 2, 2, 3, 4, 36, '2020-10-07 22:40:16', '2020-10-09 11:52:16'),
(160, 2, 37, 2, 2, 3, 4, 37, '2020-10-07 22:40:16', '2020-10-09 11:52:07'),
(161, 2, 38, 2, 2, 3, 4, 38, '2020-10-07 22:40:16', '2020-10-09 11:52:08'),
(162, 2, 39, 2, 2, 3, 4, 39, '2020-10-07 22:40:16', '2020-10-09 11:52:10'),
(163, 1, 42, 1, 2, 3, 1, 41, '2020-10-08 12:54:54', '0000-00-00 00:00:00'),
(164, 2, 46, 1, 2, 3, 2, 41, '2020-10-08 12:54:54', '0000-00-00 00:00:00'),
(165, 2, 46, 1, 2, 3, 3, 41, '2020-10-08 12:54:54', '0000-00-00 00:00:00'),
(166, 2, 40, 2, 2, 3, 4, 41, '2020-10-08 12:54:54', '2020-10-09 11:51:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_niveis_acessos`
--

CREATE TABLE `adms_niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `obs_niv` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_niveis_acessos`
--

INSERT INTO `adms_niveis_acessos` (`id`, `nome`, `obs_niv`, `ordem`, `created`, `modified`) VALUES
(1, 'Super Administrador', 'Com permissão para qualquer alteração.', 1, '2020-08-04 18:55:02', '2020-10-05 19:45:58'),
(2, 'Administrador', 'Com permissão para alterar qualquer equipamento.', 2, '2020-08-05 20:28:34', '2020-09-22 21:41:36'),
(3, 'Colaborador', 'Permissão apenas para visualizações.', 3, '2020-08-04 19:31:54', '2020-10-05 21:13:35'),
(4, 'Parceiros', 'Parceiros de serviços, como por exemplo QualyCopy.', 4, '2020-10-05 20:22:00', '2020-10-05 21:13:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_paginas`
--

CREATE TABLE `adms_paginas` (
  `id` int(11) NOT NULL,
  `nome_pagina` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `obs` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lib_pub` int(11) NOT NULL DEFAULT 2,
  `icone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depend_pg` int(11) NOT NULL DEFAULT 0,
  `adms_grps_pg_id` int(11) NOT NULL,
  `adms_tps_pg_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adms_robot_id` int(11) NOT NULL DEFAULT 4,
  `adms_sits_pg_id` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_paginas`
--

INSERT INTO `adms_paginas` (`id`, `nome_pagina`, `endereco`, `obs`, `keywords`, `description`, `author`, `lib_pub`, `icone`, `depend_pg`, `adms_grps_pg_id`, `adms_tps_pg_id`, `adms_robot_id`, `adms_sits_pg_id`, `created`, `modified`) VALUES
(1, 'Home', 'visualizar/home', 'Home, página de inicio', 'home', 'pagina home', 'Paulo Albuquerque', 2, '', 0, 5, '1', 4, 1, '2020-07-22 00:00:00', '2020-09-22 19:39:01'),
(2, 'login', 'acesso/login', 'pagina de login do adm', 'pagina login', 'pagina login', 'Paulo Albuquerque', 1, '', 0, 7, '1', 1, 1, '2020-07-22 00:00:00', '2020-09-22 19:59:16'),
(3, 'Validar Login', 'acesso/valida', 'Validar login', 'Validar login', 'Validar login', 'Paulo Albuquerque', 1, NULL, 2, 7, '1', 4, 1, '2020-07-23 00:00:00', NULL),
(4, 'Sair', 'acesso/sair', 'botao de sair do administrativo.', 'sair do adm', 'sair do adm', 'Paulo Albuquerque', 1, 'fa fa-power-off', 0, 7, '1', 4, 1, '2020-07-24 00:00:00', '2020-09-22 20:03:29'),
(5, 'Usuários', 'listar/list_usuario', 'Página para listar usuários', 'listar usuários', 'listar usuários', 'Paulo Albuquerque', 2, 'fas fa-users', 0, 1, '1', 4, 1, '2020-07-25 00:00:00', NULL),
(6, 'Niveis de acesso', 'listar/list_niv_aces', 'Página para listar Niveis de acesso', 'Listar Niveis de acesso', 'Listar Niveis de acesso', 'Paulo Albuquerque', 2, 'fas fa-address-card', 0, 1, '1', 4, 1, '2020-07-25 00:00:00', NULL),
(7, 'Paginas', 'listar/list_pagina', 'Pagina para listar as paginas do ADM', 'listar pagina', 'listar pagina', 'Paulo Albuquerque', 2, 'fas fa-file-alt', 0, 1, '1', 4, 1, '2020-07-27 00:00:00', NULL),
(8, 'Menu', 'listar/list_menu', 'Pagina para listar os itens do menu', 'Pagina para listar os itens do menu', 'Pagina para listar os itens do menu', 'Paulo Albuquerque', 2, 'fab fa-elementor', 0, 1, '1', 4, 1, '2020-07-27 00:00:00', '2020-09-22 19:38:13'),
(9, 'Nivel de Acesso', 'cadastrar/cad_niv_aces', 'Nivel de Acesso', 'Nivel de Acesso', 'Nivel de Acesso', 'Paulo Albuquerque', 2, NULL, 0, 2, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(10, 'Visualizar nivel de acesso', 'visualizar/vis_niv_aces', 'Visualizar nivel de acesso', 'Visualizar nivel de acesso', 'Visualizar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 0, 5, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(11, 'Editar nivel de acesso', 'editar/edit_niv_aces', 'Editar nivel de acesso', 'Editar nivel de acesso', 'Editar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 0, 3, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(12, 'Apagar nivel de acesso', 'processa/apagar_niv_aces', 'Apagar nivel de acesso', 'Apagar nivel de acesso', 'Apagar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 0, 4, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(13, 'Processa o formulario nivel de acesso', 'processa/proc_cad_niv_aces', 'Processa o formulario nivel de acesso', 'Processa o formulario nivel de acesso', 'Processa o formulario nivel de acesso', 'Paulo Albuquerque', 2, NULL, 9, 2, '1', 4, 1, '2020-07-30 21:59:18', NULL),
(14, 'processa o formulario editar nivel de acesso', 'processa/proc_edit_niv_aces', NULL, 'processa o formulario editar nivel de acesso', 'processa o formulario editar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 11, 3, '1', 4, 1, '2020-07-31 00:00:00', NULL),
(15, 'Alterar ordem do nível de acesso', 'processa/proc_ordem_niv_aces', 'Alterar ordem do nível de acesso', 'Alterar ordem do nível de acesso', 'Alterar ordem do nível de acesso', 'Paulo Albuquerque', 2, NULL, 0, 6, '1', 4, 1, '2020-08-06 00:00:00', NULL),
(16, 'Cadastrar páginas', 'cadastrar/cad_pagina', 'Cadastrar páginas', 'Cadastrar páginas', 'Cadastrar páginas', 'Paulo Albuquerque', 2, NULL, 0, 2, '1', 4, 1, '2020-08-10 00:00:00', NULL),
(17, 'Processar o formulário cadastrar página', 'processa/proc_cad_pagina', 'Processar o formulário cadastrar página', 'Processar o formulário cadastrar página', 'Processar o formulário cadastrar página', 'Paulo Albuquerque', 2, NULL, 16, 2, '1', 4, 1, '2020-09-07 00:00:00', NULL),
(18, 'Apagar página', 'processa/apagar_pagina', 'Apagar Página', 'Apagar Página', 'Apagar página', 'Paulo ALbuquerque', 2, '', 0, 4, '1', 4, 1, '2020-09-07 10:08:45', '2020-09-22 20:01:19'),
(19, 'Visualizar Página', 'visualizar/vis_pagina', 'Página para visualizar detalhes da página', 'Visualizar Página', 'Visualizar Página', 'Paulo ALbuquerque', 2, '', 0, 5, '1', 4, 1, '2020-09-07 10:20:05', NULL),
(20, 'Editar Página', 'editar/edit_pagina', 'Formulário para editar página', 'Editar Página', 'Editar Página', 'Paulo ALbuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-07 14:44:22', NULL),
(22, 'Processa form editar página', 'processa/proc_edit_pagina', 'Página pra procecessar o formulário edutar a página', 'Processa form editar página', 'Processa form editar página', 'Paulo ALbuquerque', 2, '', 20, 3, '1', 4, 1, '2020-09-07 20:36:34', '2020-09-23 17:59:12'),
(23, 'Permissões', 'listar/list_permissao', 'Página para listar as Permissões .', 'Permissões', 'Permissões', 'Paulo Albuquerque', 2, '', 0, 1, '1', 4, 1, '2020-09-10 21:41:18', NULL),
(24, 'Unidades - INTS', 'listar/list_unidades', 'Unidades - INTS', 'Unidades - INTS', 'Unidades - INTS', 'Paulo Albuquerque', 2, 'fa fa-hospital-o', 0, 1, '1', 4, 1, '2020-09-11 15:59:08', '2020-09-22 20:00:13'),
(25, 'Visualizar Unidades', 'visualizar/vis_unidade', 'Visualizar detalhes das Unidades como endereço telefones emails etc ...', 'Visualizar Unidades', 'Visualizar Unidades', 'Paulo Albuquerque', 2, '', 0, 5, '1', 4, 1, '2020-09-11 18:08:45', NULL),
(26, 'Cadastrar Unidade', 'cadastrar/cad_unidade', 'Cadastrar a undiade', 'Cadastrar Unidade', 'Cadastrar Unidade', 'Paulo Albuquerque', 2, '', 0, 2, '1', 4, 1, '2020-09-11 20:33:52', NULL),
(27, 'Processa cad Unidade', 'processa/proc_cad_unidade', 'Processar o cadastro de unidade', 'processa cad unidade', 'processa cad unidade', 'Paulo Aalbuquerque', 2, '', 26, 2, '1', 4, 1, '2020-09-11 20:54:51', '2020-09-11 22:49:30'),
(28, 'Editar Unidade', 'editar/edit_unidade', 'Editar Unidade', 'Editar Unidade', 'Editar Unidade', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-15 11:20:25', NULL),
(29, 'Apagar Unidade', 'processa/apagar_unidade', 'Página para poder pagar unidade.', 'Apagar Unidade', 'Apagar Unidade', 'Paulo Albuquerque', 2, '', 24, 4, '1', 4, 1, '2020-09-15 22:06:18', NULL),
(30, 'Processar liberar pemissão', 'processa/proc_lib_per', 'Processar liberar pemissão', 'Processar liberar pemissão', 'Processar liberar pemissão', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-17 18:58:25', NULL),
(31, 'Processa editar unidade', 'processa/proc_edit_unidade', 'Processa editar unidade', 'Processa editar unidade', 'Processa editar unidade', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-21 19:42:38', NULL),
(32, 'Listar os Computadores', 'listar/list_computer', 'Listar Computadores ', 'Listar Computadores', 'Listar Computadores', 'Paulo Albuquerque', 2, 'fas fa-laptop-medical', 0, 2, '1', 4, 1, '2020-09-22 14:27:07', '2020-09-22 14:42:09'),
(33, 'Cadastrar Computadores', 'cadastrar/cad_computer', 'Cadastrar Computadores', 'Cadastrar Computadores', 'Cadastrar Computadores', 'Paulo Albuquerque', 2, '', 0, 2, '1', 4, 1, '2020-09-22 14:45:20', NULL),
(34, 'Processa cad Computador', 'processa/proc_cad_computer', 'Processa cadadastrar Computadores', 'Processa cad Computador', 'Processa cad Computador', 'Paulo Albuquerque', 2, '', 33, 2, '1', 4, 1, '2020-09-24 13:52:27', '2020-09-29 10:50:19'),
(35, 'Liberar menu', 'processa/proc_lib_menu', 'Pagina para liberar item de menu ', 'Liberar menu', 'Liberar menu', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-24 18:48:57', '2020-09-24 20:25:58'),
(36, 'Editar equipamentos', 'editar/edit_computer', 'Editar equipamentos já registrados', 'Editar computadores', 'Editar computadores', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-29 11:23:49', NULL),
(37, 'Apagar equipamento', 'processa/apagar_computer', '', 'Apagar equipamento', 'Apagar equipamento', 'Paulo Albuquerque', 2, '', 0, 4, '1', 4, 1, '2020-09-29 11:40:47', NULL),
(38, 'Liberar Dropdown no menu', 'processa/proc_lib_dropdown', 'Liberar Dropdown no menu', 'Liberar Dropdown no menu', 'Liberar Dropdown no menu', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-10-04 17:55:32', NULL),
(39, 'Alterar ordem do menu', 'processa/proc_ordem_menu', 'Alterar ordem do menu', 'Alterar ordem do menu', 'Alterar ordem do menu', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-10-04 18:59:28', NULL),
(40, 'Sincronizar páginas', 'processa/proc_sincro_nivac_pg', 'Sincronizar páginas com o nível de acesso', 'Sincronizar páginas', 'Sincronizar páginas', 'Paulo Albuquerque', 2, '', 0, 3, '1', 2, 1, '2020-10-05 22:29:36', NULL),
(41, 'Visualizar pcs', 'visualizar/vis_computer', 'Página para visualização dos maiores detalhes dos computadores.', 'Visualizar pcs', 'Visualizar pcs', 'Paulo Albuquerque', 2, '', 0, 5, '1', 4, 1, '2020-10-08 12:54:54', '2020-10-09 11:53:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_robots`
--

CREATE TABLE `adms_robots` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_robots`
--

INSERT INTO `adms_robots` (`id`, `nome`, `tipo`, `created`, `modified`) VALUES
(1, 'Indexar a página e seguir os link', 'index,follow', '2020-07-22 00:00:00', NULL),
(2, 'Não indexar a página mas seguir os links', 'noindex,follow', '2020-07-22 00:00:00', NULL),
(3, 'Index a página mas não siga os links', 'index,nofollow', '2020-07-22 00:00:00', NULL),
(4, 'Não indexe a pagina e nem seguir os links', 'noindex, nofollow', '2020-07-22 00:00:00', NULL),
(5, 'Não exibir a versão em cahce da página', 'noarchive', '2020-07-22 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_setor`
--

CREATE TABLE `adms_setor` (
  `id` int(11) NOT NULL,
  `localizacao` varchar(120) NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_setor`
--

INSERT INTO `adms_setor` (`id`, `localizacao`, `ordem`, `created`, `modified`) VALUES
(1, 'Administração', 1, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(2, 'Call Center', 2, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(3, 'Consultório Médico', 3, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(4, 'Consultório Odontologico', 4, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(5, 'Data Center', 5, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(6, 'Farmácia', 6, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(7, 'Recepção', 7, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(8, 'Sala de Acolhimento', 8, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(9, 'Sala de Almoxarifado', 9, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(10, 'Sala de Coleta', 10, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(11, 'Sala de Curativo', 11, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(12, 'Sala de Demanda', 12, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(13, 'Sala de Enfermagem', 13, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(14, 'Sala de Estudos', 14, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(15, 'Sala de Farmácia Satélite', 15, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(16, 'Sala de Faturamento', 16, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(17, 'Sala da Gerência', 17, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(18, 'Sala de Instalação', 18, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(19, 'Sala de Medicação', 19, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(20, 'Sala de Observação Adulto', 20, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(21, 'Sala de Observação Infantil', 21, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(22, 'Sala de Ortopedia', 22, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(23, 'Sala de Papanicolau', 23, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(24, 'Sala de Psiquiatria', 24, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(25, 'Sala de Raio X', 25, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(26, 'Sala de Regulação', 26, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(27, 'Sala Saúde da Mulher', 27, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(28, 'Sala de Triagem', 28, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(29, 'Sala de Vacina', 29, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(30, 'Sala de Vigilância', 30, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(31, 'Sala dos ACSs', 31, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(32, 'Sala Multi Uso', 32, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(33, 'SAME', 33, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(34, 'Serviço Social', 34, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(35, 'Sinais Vitais', 35, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(36, 'SUVIS', 36, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(37, 'Outros', 37, '2020-09-28 18:35:52', '0000-00-00 00:00:00'),
(38, 'Container', 38, '2020-09-29 00:00:00', '0000-00-00 00:00:00'),
(39, 'Ultrassom', 39, '2020-09-29 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits`
--

CREATE TABLE `adms_sits` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_sits`
--

INSERT INTO `adms_sits` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Ativo', '3', '2020-07-25 00:00:00', NULL),
(2, 'Inativo', '4', '2020-07-25 00:00:00', NULL),
(3, 'Analise', '1', '2020-07-25 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits_pgs`
--

CREATE TABLE `adms_sits_pgs` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cor` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_sits_pgs`
--

INSERT INTO `adms_sits_pgs` (`id`, `nome`, `cor`, `created`, `modified`) VALUES
(1, 'Ativo', 'success', '2020-07-22 00:00:00', NULL),
(2, 'Inativo', 'danger', '2020-07-22 00:00:00', NULL),
(3, 'Analise', 'warning', '2020-07-22 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_sits_usuarios`
--

CREATE TABLE `adms_sits_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `adms_cor_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_sits_usuarios`
--

INSERT INTO `adms_sits_usuarios` (`id`, `nome`, `adms_cor_id`, `created`, `modified`) VALUES
(1, 'Ativo', 3, '2020-07-24 00:00:00', NULL),
(2, 'Inativo', 5, '2020-07-24 00:00:00', NULL),
(3, 'Aguardando confirmação', 1, '2020-07-24 00:00:00', NULL),
(4, 'Spam', 4, '2020-07-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_tps_pgs`
--

CREATE TABLE `adms_tps_pgs` (
  `id` int(11) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `obs` text NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_tps_pgs`
--

INSERT INTO `adms_tps_pgs` (`id`, `tipo`, `nome`, `obs`, `ordem`, `created`, `modified`) VALUES
(1, 'adms', 'Administrativo', 'Administrativo', 1, '2020-08-10 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_unidades`
--

CREATE TABLE `adms_unidades` (
  `id` int(11) NOT NULL,
  `nome_da_unidade` varchar(220) NOT NULL,
  `nome_gerente` varchar(220) NOT NULL,
  `cnes` int(120) NOT NULL,
  `endereco` varchar(220) NOT NULL,
  `cnpj` varchar(120) NOT NULL,
  `razao_social` varchar(220) NOT NULL,
  `ramal_voip` int(40) NOT NULL,
  `funcionamento` varchar(120) NOT NULL,
  `telefone` varchar(120) NOT NULL,
  `email` varchar(220) NOT NULL,
  `adms_tps_pg_id` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_unidades`
--

INSERT INTO `adms_unidades` (`id`, `nome_da_unidade`, `nome_gerente`, `cnes`, `endereco`, `cnpj`, `razao_social`, `ramal_voip`, `funcionamento`, `telefone`, `email`, `adms_tps_pg_id`, `created`, `modified`) VALUES
(1, 'COORDENAÇÃO', 'Carlos Uehara', 1, 'Avenida Nossa Senhora do Sabará, 4029 - Cidade Ademar CEP - 04447-021', '60.922.168/0007-71', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-11 00:00:00', '2020-09-22 14:21:05'),
(2, 'APD Santo Amaro', 'Renata Takebayachi', 2, 'Av. Miguel Yunes, 491 - CEP: 04444-000', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '', '2020-09-29 00:00:00', NULL),
(3, 'AD - ASSISTÊNCIA DOMICILIAR', 'Nivio', 6703607, 'Rua Dr. Nestor Sampaio Penteado, 181-189 - Vila Império - CEP:04459-110 ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1034, '08:00 ás 17:00', '5622-1988 / 5612-6901', 'assistenciadomiciliar@ossantacatarina.org.br\r\n\r\nnivio.bertolazzi@ossantacatarina.org.br', '1', '2020-09-11 00:00:00', NULL),
(4, 'AMA ESPECIALIDADE VILA CONSTÂNCIA', 'Zaira', 6415415, 'Rua Hermenegildo Martini Nº 21.500 / 100 S/N - CEP: 04438-280', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1018, '08:00 ás 17:00', '', '', '1', '2020-09-11 20:26:45', '2020-09-21 20:25:25'),
(5, 'AMA/UBS INT. JD. MIRIAM I', 'Dilene', 2787601, 'AV. SANTO AFONSO, 419 – CEP: 04426-000', '60.922.168/0001-86 ', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1022, '08:00 ás 17:00', '', '', '1', NULL, NULL),
(6, 'AMA/UBS INT. PARQUE DOROTEIA', 'Samia', 2788292, 'RUA ANIQUIS, 3 A - CEP: 04474-000', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1030, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(7, 'AMA/UBS INT. VILA IMPERIO', 'Ana Paula', 5731143, 'RUA CATARINA GABRIELE, 150 - CEP: 04408-090', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1014, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(8, 'AMA/UBS INT. VILA JOANIZA', 'Arlete', 2751828, 'RUA LUIS VIVES, 85 - CEP: 04404-150', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1026, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(9, 'AMA/UBS INTEGRADA V. MISSIONARIA', 'Janise', 2789078, 'RUA RAINHA DAS MISSÕES, 515 Cep: 04430-010  ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1021, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(10, 'CAPS ADULTO II CIDADE ADEMAR', 'Edson', 5731194, 'RUA CONCEIÇÃO DA BOA VIAGEM, 216 – CEP: 04463-030', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1023, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(11, 'CAPS INFANTO/JUVENIL CIDADE ADEMAR', 'Andrea', 6646581, 'Rua Joaquim do Lago, 228 - Balneario Mar Paulista - CEP: 04463-080', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1024, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', '2020-09-22 13:17:03'),
(12, 'CEO II / LRPD DR. HUMBERTO NASTARI', 'Maira Caracas', 2786621, 'ESTRADA DA ALVARENGA, 257 CEP: 04462-000 JD . DA PEDREIRA', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1025, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(13, 'CERIII - CENTRO ESP EM REABILITACAO', 'Nakamura', 7706332, 'RUA CORREGO AZUL, 443 / 433 – Cep: 04463-010', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', 'vanessa.nakamura@ossantacatarina.org.br', '1', '2020-09-14 00:00:00', NULL),
(14, 'PAI CIDADE ADEMAR', '', 3, 'R: SEBASTIÃO ANDRADE BONANI, 340 - CEP: 04649-050', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(15, 'REDE HORA CERTA CIDADE ADEMAR', 'Arnold', 2751925, 'RUA CORREGO AZUL, 443 / 433 – Cep: 04463-010', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1019, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(16, 'SRT CIDADE ADEMAR I', 'Juliana Polastrini', 4, 'Rua Tapirapés, nº 96 - CEP: 04463-040', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(17, 'SRT CIDADE ADEMAR II', '', 5, 'Rua Matsuichi Wada, 34', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(18, 'SRT SANTO AMARO', 'Carla Nascimento', 6, 'Rua Abel Seixas, 76 – Cep: 04754-030', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(19, 'SRT SANTO AMARO II', '', 7, 'RUA: VISCONDE DE TAUNAY, 809 SANTO AMARO - São Paulo, SP CEP 04726-010.', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(20, 'SRT SANTO AMARO III', '', 8, '', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(21, 'UBS CAMPO GRANDE', 'Maria de Lourdes', 3452689, ' R. Monlevade, 195 - Vila Romano, São Paulo - SP, 04679-345', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1028, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(22, 'UBS INT. JARDIM MIRIAM II', 'Josiane', 2787911, 'AV. CUPECE, 5185 – CIDADE ADEMAR - CEP:04365-001', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1003, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(23, 'UBS JD. UMUARAMA', 'Miriam', 2787911, 'RUA ANTONIO GIL, 721 - CEP: 04655-000 ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1015, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(24, 'UBS VILA ARRIETE', 'Heloisa Handa', 2788748, 'RUA JULIETA DE ARAUJO ALMEIDA, 44  CEP: 044445-010', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1016, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(25, 'UBS VILA CONSTANCIA', 'Paulo', 2788799, 'Rua Hermenegildo MartiniNº 21.500 / 100 S/N - CEP: 04438-280    ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1027, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(26, 'UBS/ESF CIDADE JULIA', 'Lisia', 2786893, 'RUA PASCOAL GRIECO, 366 – CEP: 04421-150', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1002, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(27, 'UBS/ESF JD. APURÁ', 'Jussara', 2787180, 'RUA DR. DARI BARCELOS, 37 – Cep: 04470-170', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1004, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(28, 'UBS/ESF JD. NITEROI', 'Mirela', 2787652, 'RUA SAMUEL ARNALD, 596 – CEP: 04434-000 ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1005, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(29, 'UBS/ESF JD. NOVO PANTANAL', 'Ivanir', 7357761, 'RUA PROFESSOR CARDOZO DE MELLO, 674, JD. STA TEREZINHA, CEP: 04474-180', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1006, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(30, 'UBS/ESF JD. SAO CARLOS', 'Ana Paula', 3074544, 'RUA CLAUDIA MUZZIO, 163 – CEP: 04429-280', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1007, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(31, 'UBS/ESF JARDIM SELMA - CIDADE ADEMAR', 'Laura', 10, ' R. Pedro Fernandes Aragão - 305, CEP:04431-160', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1013, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(32, 'UBS/ESF LARANJEIRAS', 'Vladimir', 2788039, 'RUA DENIS FURTEL, 108  CEP: 04476-145 ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1001, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(33, 'UBS/ESF MAR PAULISTA', 'Maria Cristina', 2766000, 'RUA MATSUICHI WADA, 393 - CEP: 04463-060', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1009, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(34, 'UBS/ESF MATA VIRGEM', 'Regiana', 2788098, 'RUA/ESTRADA DA SAÚDE, 47 – CEP: 04476-320 ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1010, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(35, 'UBS/ESF SAO JORGE', 'Leandro', 3996115, 'RUA EDUARDO PEREIRA RAMOS, 808/810 – CEP: 04432-000', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1008, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(36, 'UBS/ESF VILA APARECIDA', 'Juliana', 2788705, 'AV. BATISTA MACIEL, 430 - CEP:04459-110', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1011, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', '2020-09-22 20:06:51'),
(37, 'UBS/ESF VILA GUACURI', 'Andrezza Carpentieri', 2788934, 'RUA VALENTINO FIORAVANTE, 416', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1012, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(38, 'UBS/ESF VILA IMPERIO II', 'Marcia', 2788977, 'RUA DR. NESTOR SAMPAIO PENTEADO, 181/189 - CEP: 04409-060', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1000, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(39, 'UPA PEDREIRA', 'Roberval', 6133460, ' Av. Nossa Sra. de Sabará, 4901 CEP:04459-000', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1020, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(40, 'UPA SANTO AMARO', 'Patricia Vieira', 2752107, ' R. Carlos Gomes, 661, CEP:04743-050', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1032, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(41, 'URSI CIDADE ADEMAR', 'Patricia Sirianni', 5599881, 'R: SEBASTIÃO ANDRADE BONANI, 340 - CEP: 04649-050', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1017, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(42, 'UBS SANTO AMARO', 'Jacqueline Yuri Mitsuyuki', 2788640, 'Rua Conde de Itu, 359, CEP 04741-000', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1029, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(43, 'UBS JARDIM AEROPORTO', 'Liz Carvalho', 2787156, 'R. Vieira de Morais, 1752 - CEP:04617-006', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1031, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
(44, 'UBS CHÁCARA SANTO ANTÔNIO', 'Cristina', 2765993, ' Rua Alexandre Dumas, 719, CEP:04717-001', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1033, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_usuarios`
--

CREATE TABLE `adms_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `apelido` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `recuperar_senha` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chave_descadastro` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imagem` varchar(220) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adms_niveis_acesso_id` int(11) NOT NULL,
  `adms_sits_usuario_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_usuarios`
--

INSERT INTO `adms_usuarios` (`id`, `nome`, `apelido`, `email`, `usuario`, `senha`, `recuperar_senha`, `chave_descadastro`, `imagem`, `adms_niveis_acesso_id`, `adms_sits_usuario_id`, `created`, `modified`) VALUES
(1, 'Paulo Albuquerque', 'Paulo', 'albuquerque.18101992@gmail.com', 'paulo', '$2y$10$ykmaQ7RRZEtL0MjnrEaHveNm1A4W9ZaE2Ik6R1YbZEI/5FL34D5Wa', NULL, NULL, 'imagem.jpg', 1, 1, '2020-07-23 00:00:00', NULL),
(2, 'willians', 'will', 'willians@willians.com.br', 'willians', '$2y$10$ykmaQ7RRZEtL0MjnrEaHveNm1A4W9ZaE2Ik6R1YbZEI/5FL34D5Wa', NULL, NULL, NULL, 3, 1, '2020-07-31 13:29:50', NULL),
(3, 'Adriano', 'adriano', 'adriano@adriano.com.br', 'adriano', '$2y$10$ykmaQ7RRZEtL0MjnrEaHveNm1A4W9ZaE2Ik6R1YbZEI/5FL34D5Wa', NULL, NULL, NULL, 2, 1, '2020-09-21 00:00:00', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adms_contrato`
--
ALTER TABLE `adms_contrato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_cors`
--
ALTER TABLE `adms_cors`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_equipamentos`
--
ALTER TABLE `adms_equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_fabricante`
--
ALTER TABLE `adms_fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_grps_pgs`
--
ALTER TABLE `adms_grps_pgs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_menus`
--
ALTER TABLE `adms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_nivacs_pgs`
--
ALTER TABLE `adms_nivacs_pgs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_niveis_acessos`
--
ALTER TABLE `adms_niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_paginas`
--
ALTER TABLE `adms_paginas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_robots`
--
ALTER TABLE `adms_robots`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_setor`
--
ALTER TABLE `adms_setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_sits`
--
ALTER TABLE `adms_sits`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_sits_pgs`
--
ALTER TABLE `adms_sits_pgs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_sits_usuarios`
--
ALTER TABLE `adms_sits_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_tps_pgs`
--
ALTER TABLE `adms_tps_pgs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_unidades`
--
ALTER TABLE `adms_unidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adms_contrato`
--
ALTER TABLE `adms_contrato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `adms_cors`
--
ALTER TABLE `adms_cors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `adms_equipamentos`
--
ALTER TABLE `adms_equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `adms_fabricante`
--
ALTER TABLE `adms_fabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `adms_grps_pgs`
--
ALTER TABLE `adms_grps_pgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT de tabela `adms_menus`
--
ALTER TABLE `adms_menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `adms_nivacs_pgs`
--
ALTER TABLE `adms_nivacs_pgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de tabela `adms_niveis_acessos`
--
ALTER TABLE `adms_niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `adms_paginas`
--
ALTER TABLE `adms_paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `adms_robots`
--
ALTER TABLE `adms_robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `adms_setor`
--
ALTER TABLE `adms_setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `adms_sits`
--
ALTER TABLE `adms_sits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_sits_pgs`
--
ALTER TABLE `adms_sits_pgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `adms_sits_usuarios`
--
ALTER TABLE `adms_sits_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `adms_tps_pgs`
--
ALTER TABLE `adms_tps_pgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `adms_unidades`
--
ALTER TABLE `adms_unidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
