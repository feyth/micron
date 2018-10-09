-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2018 às 00:25
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `micron`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `nome`, `valor`) VALUES
(1, 'sitename', 'Your Sitename'),
(2, 'description', '<p>Your description</p>\r\n'),
(3, 'author', 'Your Name'),
(5, 'disqus_site', 'https://create_your_site_on_disqus.disqus.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `uri` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `published` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `uri`, `date`, `published`, `trash`, `views`) VALUES
(18, 'Your first post', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id magna vitae lorem dictum tristique. Nulla ac ipsum massa. Cras sed maximus tellus. Nam eleifend vestibulum varius. Morbi laoreet viverra est, ac cursus purus maximus in. Nunc massa quam, bibendum at maximus fermentum, imperdiet non nibh. Nunc suscipit urna sit amet finibus dapibus. Maecenas quis risus non erat condimentum finibus quis id neque. Nulla facilisi. Quisque sit amet sapien a lorem convallis tincidunt porttitor non magna. Vivamus fermentum sit amet ipsum vitae faucibus. Sed viverra nec mauris ac molestie. Suspendisse iaculis tempor euismod. Praesent placerat rutrum consectetur. Aliquam porta risus nec vehicula placerat. Etiam enim mi, tincidunt ullamcorper pharetra ac, pharetra in enim.</p>\r\n\r\n<p>Fusce euismod nibh eget mi scelerisque dictum. Nullam in nibh non arcu condimentum venenatis iaculis at ligula. Pellentesque sagittis diam orci, nec convallis diam malesuada vitae. Nam molestie sit amet nunc sit amet condimentum. Nam maximus vitae lectus in dictum. Maecenas placerat cursus dignissim. Nam accumsan, ante ut convallis malesuada, massa mi feugiat magna, nec suscipit ligula justo sed urna. Suspendisse porta ante nisi, sed vestibulum metus accumsan in. Nunc lobortis quis erat non dignissim. Integer vitae nisi tempus lorem tristique sollicitudin. Sed sit amet pharetra odio, eget porttitor nibh. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>\r\n\r\n<p>Nunc et commodo lacus. Vivamus at dapibus eros, et dictum est. Nullam sagittis turpis nec odio volutpat aliquet. Vestibulum hendrerit leo dolor, id dictum mi convallis in. Aliquam est arcu, interdum malesuada leo ac, volutpat faucibus nulla. In arcu ante, fermentum eget iaculis ac, vehicula et velit. Nullam tempus sagittis est quis pulvinar. Pellentesque vulputate mi in lacus luctus vulputate.</p>\r\n\r\n<p>Suspendisse consequat enim in orci molestie, et vehicula eros feugiat. Sed aliquet, tellus a porta sodales, ligula augue rutrum eros, vitae tincidunt lacus massa vitae sapien. Nam eu elementum diam, ut commodo lacus. Etiam dignissim aliquet orci, id tincidunt orci rutrum vel. Ut blandit vehicula ante, et laoreet ante efficitur id. Donec gravida augue viverra enim porta placerat. Vivamus vulputate ex leo, at tincidunt dolor maximus nec. In at massa et urna eleifend suscipit in ac dui. Suspendisse imperdiet dolor nec leo vehicula vestibulum.</p>\r\n\r\n<p>Morbi in tempus massa, eget suscipit justo. Mauris in scelerisque libero, eget cursus lorem. Aenean bibendum vestibulum mi, vel rhoncus nibh finibus a. Nunc consequat magna sed dignissim ornare. Nulla at mauris non risus consectetur fermentum. Maecenas pellentesque, felis sed finibus pharetra, erat velit lacinia ipsum, id convallis enim lorem sit amet risus. Proin eget nisl eget lectus tristique molestie venenatis ut orci.</p>\r\n', 'your-first-post', '2018-03-15', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(2, 'micron@micron', '4e8192d5c24a51e5fda5e9e010296aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
