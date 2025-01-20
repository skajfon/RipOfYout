-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2024 at 05:11 PM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poject`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idvideo` int NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idV` (`idvideo`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idvideo`, `comment`, `rating`) VALUES
(6, 21, 'asd', 4),
(7, 21, 'dfds', 3),
(8, 21, 'dfds', 3),
(9, 21, 'dfds', 3),
(10, 21, 'dfds', 3),
(11, 21, 'dfds', 3),
(12, 21, 'dfds', 3),
(13, 21, 'dfds', 3),
(14, 21, 'dfds', 3),
(15, 21, 'dfds', 3),
(16, 21, 'dfds', 3),
(17, 21, 'dfds', 3),
(18, 21, 'dfds', 3),
(19, 21, 'dfds', 3),
(20, 21, 'dfds', 3),
(21, 21, 'dfds', 3),
(22, 21, 'dfds', 3),
(23, 21, 'dfds', 3),
(24, 21, 'super', 5),
(25, 21, 'super al je.', 5),
(26, 21, 'sup novi', 5);

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

DROP TABLE IF EXISTS `slika`;
CREATE TABLE IF NOT EXISTS `slika` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lokacija` varchar(100) NOT NULL,
  `likes` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lokacija` (`lokacija`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id`, `name`, `lokacija`, `likes`) VALUES
(5, 'srce', 'images.png', 6),
(6, 'luka', 'jpeg-home.jpg', 3),
(7, 'sand', '22772.jpg', 2),
(8, 'snow', '45825.png', 1),
(9, 'sun set', '6792.png', 2),
(10, 'lake mounain', '1337829.png', 1),
(11, 'ice', 'D5tosH7UgKFysS7j9kSV_1082124129.jpg', 1),
(12, 'plains', 'blog-3-5-768x513.jpg', 2),
(13, 'lake2', 'W4A2827-1-3000x2000.jpg', 1),
(14, 'ice lake', 'acj-2003-beautiful-landscapes-around-the-world-3.png', 1),
(15, 'lake3', 'istockphoto-485371557-612x612.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `id` int NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `rating` double NOT NULL,
  `vievs` int NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `link`, `rating`, `vievs`, `name`) VALUES
(21, 'https://www.youtube.com/embed/oan0peklK6c?si=6T_T7C3e-RCNFoVY', 3.3333333333333, 17, 'NIKOLA RADOJLOVIĆ | Specijal'),
(22, 'https://www.youtube.com/embed/JApBR3AJq_s?si=USjWB0mKHFcn62GE', 1, 1, 'Alligator Boys. Shayne Smith - Full Special'),
(24, 'https://www.youtube.com/embed/7tWavWJ8NBQ?si=h0GWxXHmuL-a7Anp', 1, 1, 'Dry Bar Double Feature - Shayne Smith'),
(25, 'https://www.youtube.com/embed/Fvf2vnplTtI?si=Qve_w8OXw8dtaWeo', 1, 1, 'Dwayne Perkins - Dry Bar Double Feature'),
(26, 'https://www.youtube.com/embed/EEkgTv3LEAc?si=nF-twg-8CvB_NVYY', 1, 1, 'Dry Bar Double Feature - Jeff Allen'),
(27, 'https://www.youtube.com/embed/WQlf_CcVQ38?si=Lye_fW1ueXrTXjO8', 1, 1, 'NIKOLA RADOJLOVIĆ | “Komirač”'),
(28, 'https://www.youtube.com/embed/BDRodS43jVc?si=DST6_6hC4S6jPiRD', 1, 1, 'Pedja Bajović Stand-Up: S NOGU*'),
(29, 'https://www.youtube.com/embed/xBf21ZR0BzI?si=Cq-WnoRGtSR0yyf1', 1, 0, 'SplickaScena - Stand-up po splicki'),
(30, 'https://www.youtube.com/embed/tcqiJAqjoxE?si=vCA1HYBilQKTcYJs', 1, 0, 'TREVOR NOAH - Most Viewed Videos of 2020'),
(31, 'https://www.youtube.com/embed/Zhz0_ZgSws8?si=MTztNHDgcd0ftny5', 1, 0, 'Jimmy Carr: Making People Laugh'),
(32, 'https://www.youtube.com/embed/SQl8T86y-jE?si=XnPPASpp96O5GntJ', 1, 0, 'Best Comedy of 2023');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idvideo`) REFERENCES `video` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
