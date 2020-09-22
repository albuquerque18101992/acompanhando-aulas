-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2020 às 21:07
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
  `lib_menu` int(11) NOT NULL DEFAULT 2,
  `adms_menu_id` int(11) NOT NULL,
  `adms_niveis_acesso_id` int(11) NOT NULL,
  `adms_pagina_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_nivacs_pgs`
--

INSERT INTO `adms_nivacs_pgs` (`id`, `permissao`, `ordem`, `dropdown`, `lib_menu`, `adms_menu_id`, `adms_niveis_acesso_id`, `adms_pagina_id`, `created`, `modified`) VALUES
(1, 1, 1, 2, 1, 1, 1, 1, '2020-07-24 00:00:00', NULL),
(2, 1, 2, 1, 1, 2, 1, 5, '2020-07-25 00:00:00', NULL),
(3, 1, 3, 1, 1, 2, 1, 6, '2020-07-25 00:00:00', NULL),
(4, 1, 4, 1, 1, 3, 1, 7, '2020-07-27 00:00:00', NULL),
(5, 1, 5, 1, 1, 3, 1, 8, '2020-07-27 00:00:00', NULL),
(6, 1, 6, 2, 1, 4, 1, 4, '2020-07-27 00:00:00', NULL),
(7, 1, 7, 2, 2, 2, 1, 9, '2020-07-30 00:00:00', NULL),
(8, 1, 8, 2, 2, 2, 1, 10, '2020-07-30 00:00:00', NULL),
(9, 1, 9, 2, 2, 2, 1, 11, '2020-07-30 00:00:00', NULL),
(10, 1, 10, 2, 2, 2, 1, 12, '2020-07-30 00:00:00', NULL),
(11, 1, 11, 2, 2, 2, 1, 13, '2020-07-30 21:59:59', NULL),
(12, 1, 1, 2, 1, 1, 3, 1, '2020-07-31 14:04:15', NULL),
(13, 2, 2, 2, 2, 2, 3, 5, '2020-07-31 14:04:15', NULL),
(14, 2, 3, 1, 1, 2, 3, 6, '2020-07-31 14:04:15', NULL),
(15, 2, 4, 1, 1, 3, 3, 7, '2020-07-31 14:04:15', NULL),
(16, 2, 5, 1, 1, 3, 3, 8, '2020-07-31 14:04:15', NULL),
(17, 2, 6, 2, 1, 4, 3, 4, '2020-07-31 14:04:15', NULL),
(18, 1, 7, 2, 2, 2, 3, 9, '2020-07-31 14:04:15', NULL),
(19, 1, 8, 2, 2, 2, 3, 10, '2020-07-31 14:04:15', NULL),
(20, 1, 9, 2, 2, 2, 3, 11, '2020-07-31 14:04:15', NULL),
(21, 1, 10, 2, 2, 2, 3, 12, '2020-07-31 14:04:15', NULL),
(22, 1, 11, 2, 2, 2, 3, 13, '2020-07-31 14:04:15', NULL),
(23, 1, 12, 2, 2, 2, 1, 14, '2020-07-31 00:00:00', NULL),
(24, 1, 13, 1, 2, 2, 1, 15, '2020-08-06 00:00:00', NULL),
(25, 1, 14, 1, 2, 3, 1, 16, '2020-08-10 00:00:00', NULL),
(26, 1, 15, 2, 2, 3, 1, 17, '2020-09-07 00:00:00', NULL),
(27, 1, 16, 1, 2, 3, 1, 18, '2020-09-07 10:08:45', NULL),
(28, 2, 1, 1, 2, 3, 2, 18, '2020-09-07 10:08:46', NULL),
(29, 2, 12, 1, 2, 3, 3, 18, '2020-09-07 10:08:46', NULL),
(30, 1, 17, 1, 2, 3, 1, 19, '2020-09-07 10:20:05', NULL),
(31, 2, 2, 1, 2, 3, 2, 19, '2020-09-07 10:20:05', NULL),
(32, 2, 13, 1, 2, 3, 3, 19, '2020-09-07 10:20:05', NULL),
(33, 1, 18, 1, 2, 3, 1, 20, '2020-09-07 14:44:22', NULL),
(34, 2, 3, 1, 2, 3, 2, 20, '2020-09-07 14:44:22', NULL),
(35, 2, 14, 1, 2, 3, 3, 20, '2020-09-07 14:44:22', NULL),
(36, 1, 19, 1, 2, 3, 1, 21, '2020-09-07 15:18:56', NULL),
(37, 2, 4, 1, 2, 3, 2, 21, '2020-09-07 15:18:57', NULL),
(38, 2, 15, 1, 2, 3, 3, 21, '2020-09-07 15:18:57', NULL),
(39, 1, 20, 1, 2, 3, 1, 22, '2020-09-07 20:36:34', NULL),
(40, 2, 5, 1, 2, 3, 2, 22, '2020-09-07 20:36:34', NULL),
(41, 2, 16, 1, 2, 3, 3, 22, '2020-09-07 20:36:34', NULL),
(42, 1, 21, 1, 2, 3, 1, 23, '2020-09-10 21:41:18', NULL),
(43, 2, 6, 1, 2, 3, 2, 23, '2020-09-10 21:41:18', NULL),
(44, 2, 17, 1, 2, 3, 3, 23, '2020-09-10 21:41:18', NULL),
(45, 1, 22, 1, 1, 5, 1, 24, '2020-09-11 15:59:09', NULL),
(46, 1, 7, 1, 1, 5, 2, 24, '2020-09-11 15:59:09', NULL),
(47, 1, 18, 1, 1, 5, 3, 24, '2020-09-11 15:59:09', NULL),
(48, 1, 23, 1, 2, 3, 1, 25, '2020-09-11 18:08:45', NULL),
(49, 1, 8, 1, 2, 3, 2, 25, '2020-09-11 18:08:45', NULL),
(50, 1, 19, 1, 2, 3, 3, 25, '2020-09-11 18:08:45', NULL),
(51, 1, 24, 1, 2, 3, 1, 26, '2020-09-11 20:33:52', NULL),
(52, 2, 9, 1, 2, 3, 2, 26, '2020-09-11 20:33:52', NULL),
(53, 2, 20, 1, 2, 3, 3, 26, '2020-09-11 20:33:52', NULL),
(54, 1, 25, 1, 2, 3, 1, 27, '2020-09-11 20:54:51', NULL),
(55, 2, 10, 1, 2, 3, 2, 27, '2020-09-11 20:54:52', NULL),
(56, 2, 21, 1, 2, 3, 3, 27, '2020-09-11 20:54:52', NULL),
(57, 1, 26, 1, 2, 3, 1, 28, '2020-09-15 11:20:25', NULL),
(58, 2, 11, 1, 2, 3, 2, 28, '2020-09-15 11:20:25', NULL),
(59, 2, 22, 1, 2, 3, 3, 28, '2020-09-15 11:20:25', NULL),
(63, 1, 28, 1, 2, 3, 1, 29, '2020-09-15 22:06:18', NULL),
(64, 2, 13, 1, 2, 3, 2, 29, '2020-09-15 22:06:19', NULL),
(65, 2, 24, 1, 2, 3, 3, 29, '2020-09-15 22:06:19', NULL),
(78, 1, 30, 1, 2, 3, 1, 30, '2020-09-17 18:58:25', NULL),
(79, 2, 15, 1, 2, 3, 2, 30, '2020-09-17 18:58:25', NULL),
(80, 2, 26, 1, 2, 3, 3, 30, '2020-09-17 18:58:25', NULL),
(93, 1, 31, 1, 2, 3, 1, 31, '2020-09-21 19:42:38', NULL),
(94, 2, 16, 1, 2, 3, 2, 31, '2020-09-21 19:42:38', NULL),
(95, 2, 27, 1, 2, 3, 3, 31, '2020-09-21 19:42:38', NULL),
(150, 1, 32, 2, 1, 1, 2, 1, '2020-09-21 00:00:00', NULL),
(169, 1, 32, 1, 1, 5, 1, 32, '2020-09-22 14:27:07', NULL),
(170, 2, 33, 1, 2, 5, 2, 32, '2020-09-22 14:27:08', NULL),
(171, 2, 28, 1, 2, 5, 3, 32, '2020-09-22 14:27:08', NULL),
(172, 1, 33, 1, 2, 3, 1, 33, '2020-09-22 14:45:20', NULL),
(173, 2, 34, 1, 2, 3, 2, 33, '2020-09-22 14:45:20', NULL),
(174, 2, 29, 1, 2, 3, 3, 33, '2020-09-22 14:45:20', NULL),
(175, 1, 34, 1, 2, 3, 1, 34, '2020-09-22 15:56:44', NULL),
(176, 2, 35, 1, 2, 3, 2, 34, '2020-09-22 15:56:44', NULL),
(177, 2, 30, 1, 2, 3, 3, 34, '2020-09-22 15:56:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_niveis_acessos`
--

CREATE TABLE `adms_niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ordem` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `adms_niveis_acessos`
--

INSERT INTO `adms_niveis_acessos` (`id`, `nome`, `ordem`, `created`, `modified`) VALUES
(1, 'Super Administrador', 1, '2020-08-04 18:55:02', '2020-08-10 21:06:50'),
(2, 'Administrador', 2, '2020-08-05 20:28:34', '2020-09-21 22:17:22'),
(3, 'Colaborador', 3, '2020-08-04 19:31:54', '2020-09-21 22:17:22');

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
(1, 'Home', 'visualizar/home', 'Home, página de inicio', 'home', 'pagina home', 'Paulo Albuquerque', 2, '', 0, 5, '1', 4, 1, '2020-07-22 00:00:00', '2020-09-21 20:19:13'),
(2, 'login', 'acesso/login', 'pagina de login do adm', 'pagina login', 'pagina login', 'Paulo Albuquerque', 1, NULL, 0, 7, '1', 1, 1, '2020-07-22 00:00:00', NULL),
(3, 'Validar Login', 'acesso/valida', 'Validar login', 'Validar login', 'Validar login', 'Paulo Albuquerque', 1, NULL, 2, 7, '1', 4, 1, '2020-07-23 00:00:00', NULL),
(4, 'Sair', 'acesso/sair', 'botao de sair do adm', 'sair do adm', 'sair do adm', 'Paulo Albuquerque', 1, 'fa fa-times', 0, 7, '1', 4, 2, '2020-07-24 00:00:00', '2020-09-11 11:50:11'),
(5, 'Usuários', 'listar/list_usuario', 'Página para listar usuários', 'listar usuários', 'listar usuários', 'Paulo Albuquerque', 2, 'fas fa-users', 0, 1, '1', 4, 1, '2020-07-25 00:00:00', NULL),
(6, 'Niveis de acesso', 'listar/list_niv_aces', 'Página para listar Niveis de acesso', 'Listar Niveis de acesso', 'Listar Niveis de acesso', 'Paulo Albuquerque', 2, 'fas fa-address-card', 0, 1, '1', 4, 1, '2020-07-25 00:00:00', NULL),
(7, 'Paginas', 'listar/list_pagina', 'Pagina para listar as paginas do ADM', 'listar pagina', 'listar pagina', 'Paulo Albuquerque', 2, 'fas fa-file-alt', 0, 1, '1', 4, 1, '2020-07-27 00:00:00', NULL),
(8, 'Menu', 'listar/list_menu', 'Pagina para listar os itens do menu', 'Pagina para listar os itens do menu', 'Pagina para listar os itens do menu', 'Paulo Albuquerque', 2, 'fab fa-elementor', 0, 1, '1', 4, 1, '2020-07-27 00:00:00', NULL),
(9, 'Nivel de Acesso', 'cadastrar/cad_niv_aces', 'Nivel de Acesso', 'Nivel de Acesso', 'Nivel de Acesso', 'Paulo Albuquerque', 2, NULL, 0, 2, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(10, 'Visualizar nivel de acesso', 'visualizar/vis_niv_aces', 'Visualizar nivel de acesso', 'Visualizar nivel de acesso', 'Visualizar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 0, 5, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(11, 'Editar nivel de acesso', 'editar/edit_niv_aces', 'Editar nivel de acesso', 'Editar nivel de acesso', 'Editar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 0, 3, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(12, 'Apagar nivel de acesso', 'processa/apagar_niv_aces', 'Apagar nivel de acesso', 'Apagar nivel de acesso', 'Apagar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 0, 4, '1', 4, 1, '2020-07-30 00:00:00', NULL),
(13, 'Processa o formulario nivel de acesso', 'processa/proc_cad_niv_aces', 'Processa o formulario nivel de acesso', 'Processa o formulario nivel de acesso', 'Processa o formulario nivel de acesso', 'Paulo Albuquerque', 2, NULL, 9, 2, '1', 4, 1, '2020-07-30 21:59:18', NULL),
(14, 'processa o formulario editar nivel de acesso', 'processa/proc_edit_niv_aces', NULL, 'processa o formulario editar nivel de acesso', 'processa o formulario editar nivel de acesso', 'Paulo Albuquerque', 2, NULL, 11, 3, '1', 4, 1, '2020-07-31 00:00:00', NULL),
(15, 'Alterar ordem do nível de acesso', 'processa/proc_ordem_niv_aces', 'Alterar ordem do nível de acesso', 'Alterar ordem do nível de acesso', 'Alterar ordem do nível de acesso', 'Paulo Albuquerque', 2, NULL, 0, 6, '1', 4, 1, '2020-08-06 00:00:00', NULL),
(16, 'Cadastrar páginas', 'cadastrar/cad_pagina', 'Cadastrar páginas', 'Cadastrar páginas', 'Cadastrar páginas', 'Paulo Albuquerque', 2, NULL, 0, 2, '1', 4, 1, '2020-08-10 00:00:00', NULL),
(17, 'Processar o formulário cadastrar página', 'processa/proc_cad_pagina', 'Processar o formulário cadastrar página', 'Processar o formulário cadastrar página', 'Processar o formulário cadastrar página', 'Paulo Albuquerque', 2, NULL, 16, 2, '1', 4, 1, '2020-09-07 00:00:00', NULL),
(18, 'Apagar página', 'processa/apagar_pagina', 'Apagar Página', 'Apagar Página', 'Apagar página', 'Paulo ALbuquerque', 2, '', 0, 4, '1', 4, 1, '2020-09-07 10:08:45', '2020-09-10 20:39:53'),
(19, 'Visualizar Página', 'visualizar/vis_pagina', 'Página para visualizar detalhes da página', 'Visualizar Página', 'Visualizar Página', 'Paulo ALbuquerque', 2, '', 0, 5, '1', 4, 1, '2020-09-07 10:20:05', NULL),
(20, 'Editar Página', 'editar/edit_pagina', 'Formulário para editar página', 'Editar Página', 'Editar Página', 'Paulo ALbuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-07 14:44:22', NULL),
(22, 'Processa form editar página', 'processa/proc_edit_pagina', 'Página pra procecessar o formulário edutar a página', 'Processa form editar página', 'Processa form editar página', 'Paulo ALbuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-07 20:36:34', NULL),
(23, 'Permissões', 'listar/list_permissao', 'Página para listar as Permissões .', 'Permissões', 'Permissões', 'Paulo Albuquerque', 2, '', 0, 1, '1', 4, 1, '2020-09-10 21:41:18', NULL),
(24, 'Unidades - INTS', 'listar/list_unidades', 'Unidades - INTS', 'Unidades - INTS', 'Unidades - INTS', 'Paulo Albuquerque', 2, 'fa fa-hospital-o', 0, 1, '1', 4, 1, '2020-09-11 15:59:08', '2020-09-22 14:10:19'),
(25, 'Visualizar Unidades', 'visualizar/vis_unidade', 'Visualizar detalhes das Unidades como endereço telefones emails etc ...', 'Visualizar Unidades', 'Visualizar Unidades', 'Paulo Albuquerque', 2, '', 0, 5, '1', 4, 1, '2020-09-11 18:08:45', NULL),
(26, 'Cadastrar Unidade', 'cadastrar/cad_unidade', 'Cadastrar a undiade', 'Cadastrar Unidade', 'Cadastrar Unidade', 'Paulo Albuquerque', 2, '', 0, 2, '1', 4, 1, '2020-09-11 20:33:52', NULL),
(27, 'Processa cad Unidade', 'processa/proc_cad_unidade', 'Processar o cadastro de unidade', 'processa cad unidade', 'processa cad unidade', 'Paulo Aalbuquerque', 2, '', 26, 2, '1', 4, 1, '2020-09-11 20:54:51', '2020-09-11 22:49:30'),
(28, 'Editar Unidade', 'editar/edit_unidade', 'Editar Unidade', 'Editar Unidade', 'Editar Unidade', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-15 11:20:25', NULL),
(29, 'Apagar Unidade', 'processa/apagar_unidade', 'Página para poder pagar unidade.', 'Apagar Unidade', 'Apagar Unidade', 'Paulo Albuquerque', 2, '', 24, 4, '1', 4, 1, '2020-09-15 22:06:18', NULL),
(30, 'Processar liberar pemissão', 'processa/proc_lib_per', 'Processar liberar pemissão', 'Processar liberar pemissão', 'Processar liberar pemissão', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-17 18:58:25', NULL),
(31, 'Processa editar unidade', 'processa/proc_edit_unidade', 'Processa editar unidade', 'Processa editar unidade', 'Processa editar unidade', 'Paulo Albuquerque', 2, '', 0, 3, '1', 4, 1, '2020-09-21 19:42:38', NULL),
(32, 'Listar os Computadores', 'listar/list_computer', 'Listar Computadores ', 'Listar Computadores', 'Listar Computadores', 'Paulo Albuquerque', 2, 'fas fa-laptop-medical', 0, 2, '1', 4, 1, '2020-09-22 14:27:07', '2020-09-22 14:42:09'),
(33, 'Cadastrar Computadores', 'cadastrar/cad_computer', 'Cadastrar Computadores', 'Cadastrar Computadores', 'Cadastrar Computadores', 'Paulo Albuquerque', 2, '', 0, 2, '1', 4, 1, '2020-09-22 14:45:20', NULL),
(34, 'processar cadastrar computadores', 'processa/proc_cad_computer', 'processar cadastrar computadores', 'processar cadastrar computadores', 'processar cadastrar computadores', 'Paulo Albuquerque', 2, '', 0, 2, '1', 4, 1, '2020-09-22 15:56:44', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms_pc_cad`
--

CREATE TABLE `adms_pc_cad` (
  `id` int(11) NOT NULL,
  `localizacao` varchar(220) NOT NULL,
  `fabricante` varchar(220) NOT NULL,
  `contrato` varchar(220) NOT NULL,
  `numero_serie_cpu` int(11) NOT NULL,
  `numero_serie_monitor` int(11) NOT NULL,
  `numero_serie_mouse` int(11) DEFAULT NULL,
  `numero_serie_teclado` int(11) DEFAULT NULL,
  `numero_ti_cpu` int(11) DEFAULT NULL,
  `numero_ti_monitor` int(11) DEFAULT NULL,
  `descricoes` text DEFAULT NULL,
  `adms_unidade_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_pc_cad`
--

INSERT INTO `adms_pc_cad` (`id`, `localizacao`, `fabricante`, `contrato`, `numero_serie_cpu`, `numero_serie_monitor`, `numero_serie_mouse`, `numero_serie_teclado`, `numero_ti_cpu`, `numero_ti_monitor`, `descricoes`, `adms_unidade_id`, `created`, `modified`) VALUES
(1, 'Call Center', 'Dell', 'Alugada', 534545, 585896, 545558888, 545558888, 545558888, 545558888, NULL, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
(2, 'APD Santo Amaro', 'Renata Takebayachi', 2, 'Av. Miguel Yunes, 491 - CEP: 04444-000', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 0, '08:00 ás 17:00', '', '', '1', '2020-09-11 00:00:00', '2020-09-22 13:16:59'),
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
(36, 'UBS/ESF VILA APARECIDA', 'Juliane', 2788705, 'AV. BATISTA MACIEL, 430 - CEP:04459-110 ', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 1011, '08:00 ás 17:00', '', '', '1', '2020-09-14 00:00:00', NULL),
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
-- Índices para tabela `adms_cors`
--
ALTER TABLE `adms_cors`
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
-- Índices para tabela `adms_pc_cad`
--
ALTER TABLE `adms_pc_cad`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `adms_robots`
--
ALTER TABLE `adms_robots`
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
-- AUTO_INCREMENT de tabela `adms_cors`
--
ALTER TABLE `adms_cors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de tabela `adms_niveis_acessos`
--
ALTER TABLE `adms_niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_paginas`
--
ALTER TABLE `adms_paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `adms_pc_cad`
--
ALTER TABLE `adms_pc_cad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `adms_robots`
--
ALTER TABLE `adms_robots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
