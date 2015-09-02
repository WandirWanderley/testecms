-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Set-2015 às 08:25
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE IF NOT EXISTS `paginas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `conteudo` text NOT NULL,
  `data` date NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `paginas`
--

INSERT INTO `paginas` (`id`, `titulo`, `conteudo`, `data`, `link`) VALUES
(1, 'Intro', '<header>\r\n						<h2>Hey.</h2>\r\n					</header>\r\n					<p>Welcome to <strong>Big Picture</strong> a responsive site template designed\r\n					by <a href="http://html5up.net">HTML5 UP</a>, built on <strong><a href="http://getskel.com">Skel</a></strong>,\r\n					and released for free under the <a href="http://html5up.net/license">Creative Commons Attribution 3.0 license</a>.</p>\r\n					<footer>\r\n						<a href="#one" class="button style2 down">More</a>\r\n					</footer>', '2015-09-02', 'intro'),
(2, 'What I Do', '<header>\r\n						<h2>What I Do</h2>\r\n					</header>\r\n					<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.\r\n					Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,\r\n					id varius justo euismod in. Curabitur egestas consectetur magna.</p>', '2015-09-02', 'what_i_do'),
(3, 'Who I Am', '<header>\r\n						<h2>Who I Am</h2>\r\n					</header>\r\n					<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.\r\n					Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis arcu,\r\n					id varius justo euismod in. Curabitur egestas consectetur magna.</p>', '2015-09-02', 'who_i_am'),
(4, 'My Work', '<header>\r\n						<h2>My Work</h2>\r\n						<p>Lorem ipsum dolor sit amet et sapien sed elementum egestas dolore condimentum.\r\n						Fusce blandit ultrices sapien, in accumsan orci rhoncus eu. Sed sodales venenatis\r\n						arcu, id varius justo euismod in. Curabitur egestas consectetur magna vitae.</p>\r\n					</header>', '2015-09-02', 'my_work');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'wandir', 'ww123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
