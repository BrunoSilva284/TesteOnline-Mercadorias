-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 19-Mar-2017 às 19:28
-- Versão do servidor: 5.7.16
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mercadoria`
--

CREATE TABLE `tb_mercadoria` (
  `MerCod` int(11) NOT NULL,
  `MerTip` varchar(20) DEFAULT NULL,
  `MerNom` varchar(30) DEFAULT NULL,
  `MerQtd` int(11) DEFAULT NULL,
  `MerVal` double(9,2) DEFAULT NULL,
  `MerNeg` char(1) DEFAULT NULL,
  `MerVto` double(11,2) DEFAULT NULL,
  `MerDat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mercadoria`
--
ALTER TABLE `tb_mercadoria`
  ADD PRIMARY KEY (`MerCod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mercadoria`
--
ALTER TABLE `tb_mercadoria`
  MODIFY `MerCod` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
