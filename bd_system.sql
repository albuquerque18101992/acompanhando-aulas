-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Set-2020 às 03:31
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

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
(5, 'Unidades', 'fas fa-clinic-medical', 4, 1, '2020-09-11 16:05:29', NULL);

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
(13, 1, 2, 1, 1, 2, 3, 5, '2020-07-31 14:04:15', NULL),
(14, 2, 3, 1, 1, 2, 3, 6, '2020-07-31 14:04:15', NULL),
(15, 2, 4, 1, 1, 3, 3, 7, '2020-07-31 14:04:15', NULL),
(16, 2, 5, 1, 1, 3, 3, 8, '2020-07-31 14:04:15', NULL),
(17, 1, 6, 2, 1, 4, 3, 4, '2020-07-31 14:04:15', NULL),
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
(45, 1, 22, 2, 1, 5, 1, 24, '2020-09-11 15:59:09', NULL),
(46, 1, 7, 1, 2, 3, 2, 24, '2020-09-11 15:59:09', NULL),
(47, 1, 18, 1, 2, 3, 3, 24, '2020-09-11 15:59:09', NULL),
(48, 1, 23, 1, 2, 3, 1, 25, '2020-09-11 18:08:45', NULL),
(49, 2, 8, 1, 2, 3, 2, 25, '2020-09-11 18:08:45', NULL),
(50, 2, 19, 1, 2, 3, 3, 25, '2020-09-11 18:08:45', NULL),
(51, 1, 24, 1, 2, 3, 1, 26, '2020-09-11 20:33:52', NULL),
(52, 2, 9, 1, 2, 3, 2, 26, '2020-09-11 20:33:52', NULL),
(53, 2, 20, 1, 2, 3, 3, 26, '2020-09-11 20:33:52', NULL),
(54, 1, 25, 1, 2, 3, 1, 27, '2020-09-11 20:54:51', NULL),
(55, 2, 10, 1, 2, 3, 2, 27, '2020-09-11 20:54:52', NULL),
(56, 2, 21, 1, 2, 3, 3, 27, '2020-09-11 20:54:52', NULL);

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
(2, 'Administrador', 3, '2020-08-05 20:28:34', '2020-09-11 11:08:34'),
(3, 'Colaborador', 2, '2020-08-04 19:31:54', '2020-09-11 11:08:34');

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
(1, 'Home', 'visualizar/home', 'Pagina home', 'home', 'pagina home', 'Paulo Albuquerque', 2, 'fas fa-tachometer-alt', 0, 5, '1', 4, 1, '2020-07-22 00:00:00', NULL),
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
(24, 'Unidades', 'listar/list_unidades', '', 'Unidades', 'Unidades', 'Paulo Albuquerque', 2, '', 0, 1, '1', 4, 1, '2020-09-11 15:59:08', '2020-09-11 16:01:06'),
(25, 'Visualizar Unidades', 'visualizar/vis_unidade', 'Visualizar detalhes das Unidades como endereço telefones emails etc ...', 'Visualizar Unidades', 'Visualizar Unidades', 'Paulo Albuquerque', 2, '', 0, 5, '1', 4, 1, '2020-09-11 18:08:45', NULL),
(26, 'Cadastrar Unidade', 'cadastrar/cad_unidade', 'Cadastrar a undiade', 'Cadastrar Unidade', 'Cadastrar Unidade', 'Paulo Albuquerque', 2, '', 0, 2, '1', 4, 1, '2020-09-11 20:33:52', NULL),
(27, 'Processa cad Unidade', 'processa/proc_cad_unidade', 'Processar o cadastro de unidade', 'processa cad unidade', 'processa cad unidade', 'Paulo Aalbuquerque', 2, '', 26, 2, '1', 4, 1, '2020-09-11 20:54:51', '2020-09-11 22:49:30');

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
  `telefone` varchar(120) NOT NULL,
  `cnpj` varchar(120) NOT NULL,
  `razao_social` varchar(220) NOT NULL,
  `email` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adms_unidades`
--

INSERT INTO `adms_unidades` (`id`, `nome_da_unidade`, `nome_gerente`, `cnes`, `endereco`, `telefone`, `cnpj`, `razao_social`, `email`, `created`, `modified`) VALUES
(1, 'COORDENAÇÃO', 'Carlos Uehara', 1, 'Avenida Nossa Senhora do Sabará, 4029 - Cidade Ademar CEP - 04447-021', '(11) 5613-4444', '60.922.168/0007-71', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 'www.ossantacatarina.org.br', '2020-09-11 00:00:00', NULL),
(2, 'APD Santo Amaro', 'Renata Takebayachi', 2, 'Av. Miguel Yunes, 491 - CEP: 04444-000', '5041-7582', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 'apd.santoamaro@ossantacatarina.org.br ', '2020-09-11 00:00:00', NULL),
(3, 'AD - ASSISTÊNCIA DOMICILIAR', 'Nivio', 6703607, 'Rua Dr. Nestor Sampaio Penteado, 181-189 - Vila Império - CEP:04459-110 ', '5622-1988 / 5612-6901', '60.922.168/0026-34', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 'assistenciadomiciliar@ossantacatarina.org.br\r\n\r\nnivio.bertolazzi@ossantacatarina.org.br', '2020-09-11 00:00:00', NULL),
(4, 'AMA ESPECIALIDADE VILA CONSTÂNCIA', 'Zaira', 6415415, 'Rua Hermenegildo MartiniNº 21.500 / 100 S/N - CEP: 04438-280', '5565-1069 / 5562-6957  / 5562-6944 / 5562-7034 / 5565-7061', '60.922.168/0026-34 ', 'ASSOCIAÇÃO  CONGREGAÇÃO DE SANTA CATARINA', 'vilaconstancia.amaespecialidades@ossantacatarina.org.br\r\n\r\nzaira.goncalves@ossantacatarina.org.br \r\n\r\nerineide.campos@ossantacatarina.org.br', '2020-09-11 20:26:45', NULL),
(5, 'AMA/UBS INT. JD. MIRIAM I', 'Dilene', 2787601, '', '', '', '', '', NULL, NULL),
(6, 'AMA/UBS INT. PARQUE DOROTEIA', 'Samia', 2788292, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(7, 'AMA/UBS INT. VILA IMPERIO', 'Ana Paula', 5731143, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(8, 'AMA/UBS INT. VILA JOANIZA', 'Arlete', 2751828, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(9, 'AMA/UBS INTEGRADA V. MISSIONARIA', 'Janise', 2789078, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(10, 'CAPS ADULTO II CIDADE ADEMAR', 'Edson', 5731194, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(11, 'CAPS INFANTO/JUVENIL CIDADE ADEMAR', 'Andrea', 6646581, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(12, 'CEO II / LRPD DR. HUMBERTO NASTARI', 'Maira Caracas', 2786621, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(13, 'CERIII - CENTRO ESP EM REABILITACAO', 'Nakamura', 7706332, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(14, 'PAI CIDADE ADEMAR', '', 3, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(15, 'REDE HORA CERTA CIDADE ADEMAR', 'Arnold', 2751925, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(16, 'SRT CIDADE ADEMAR I', 'Juliana Polastrini', 4, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(17, 'SRT CIDADE ADEMAR II', '', 5, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(18, 'SRT SANTO AMARO', 'Carla Nascimento', 6, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(19, 'SRT SANTO AMARO II', '', 7, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(20, 'SRT SANTO AMARO III', '', 8, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(21, 'UBS CAMPO GRANDE', 'Maria de Lourdes', 3452689, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(22, 'UBS INT. JARDIM MIRIAM II', 'Josiane', 2787911, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(23, 'UBS JD. UMUARAMA', 'Miriam', 2787911, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(24, 'UBS VILA ARRIETE', 'Heloisa Handa', 2788748, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(25, 'UBS VILA CONSTANCIA', 'Paulo', 2788799, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(26, 'UBS/ESF CIDADE JULIA', '', 2786893, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(27, 'UBS/ESF JD. APURA', 'Jussara', 2787180, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(28, 'UBS/ESF JD. NITEROI', 'Mirela', 2787652, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(29, 'UBS/ESF JD. NOVO PANTANAL', 'Ivanir', 7357761, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(30, 'UBS/ESF JD. SAO CARLOS', 'Ana Paula', 3074544, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(31, 'UBS/ESF JARDIM SELMA - CIDADE ADEMAR', 'Laura', 10, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(32, 'UBS/ESF LARANJEIRAS', 'Vladimir', 2788039, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(33, 'UBS/ESF MAR PAULISTA', 'Maria Cristina', 2766000, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(34, 'UBS/ESF MATA VIRGEM', 'Regiana', 2788098, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(35, 'UBS/ESF SAO JORGE', 'Leandro', 3996115, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(36, 'UBS/ESF VILA APARECIDA', 'Juliane', 2788705, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(37, 'UBS/ESF VILA GUACURI', 'Andrezza Carpentieri', 2788934, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(38, 'UBS/ESF VILA IMPERIO II', 'Marcia', 2788977, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(39, 'UPA PEDREIRA', 'Roberval', 6133460, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(40, 'UPA SANTO AMARO', 'Patricia Vieira', 2752107, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(41, 'URSI CIDADE ADEMAR', 'Patricia Sirianni', 5599881, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(42, 'UBS SANTO AMARO', 'Jacqueline Yuri Mitsuyuki', 2788640, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(43, 'UBS JARDIM AEROPORTO', 'Liz Carvalho', 2787156, '', '', '', '', '', '2020-09-14 00:00:00', NULL),
(44, 'UBS CHÁCARA SANTO ANTÔNIO', 'Cristina', 2765993, '', '', '', '', '', '2020-09-14 00:00:00', NULL);

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
(2, 'willians', 'will', 'willians@willians.com.br', 'willians', '$2y$10$ykmaQ7RRZEtL0MjnrEaHveNm1A4W9ZaE2Ik6R1YbZEI/5FL34D5Wa', NULL, NULL, NULL, 3, 1, '2020-07-31 13:29:50', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `adms_niveis_acessos`
--
ALTER TABLE `adms_niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `adms_paginas`
--
ALTER TABLE `adms_paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de tabela `adms_usuarios`
--
ALTER TABLE `adms_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
