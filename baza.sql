-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2013 at 02:02 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dsi_user`
--
CREATE DATABASE `dsi_user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dsi_user`;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_number` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `correct_answer_number` int(11) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `question_number`, `question`, `correct_answer_number`, `answer1`, `answer2`, `answer3`) VALUES
(1, 1, 'Pitanje broj 1?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(2, 2, 'Pitanje broj 2?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(3, 3, 'Pitanje broj 3?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(4, 4, 'Pitanje broj 4?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(5, 5, 'Pitanje broj 5?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(6, 6, 'Pitanje broj 6?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(7, 7, 'Pitanje broj 7?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(8, 8, 'Pitanje broj 8?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(9, 9, 'Pitanje broj 9?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(10, 10, 'Pitanje broj 10?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(11, 11, 'Pitanje broj 11?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(12, 12, 'Pitanje broj 12?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(13, 13, 'Pitanje broj 13?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(14, 14, 'Pitanje broj 14?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(15, 15, 'Pitanje broj 15?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(16, 16, 'Pitanje broj 16?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(17, 17, 'Pitanje broj 17?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(18, 18, 'Pitanje broj 18?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(19, 19, 'Pitanje broj 19?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(20, 20, 'Pitanje broj 20?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(21, 21, 'Pitanje broj 21?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(22, 22, 'Pitanje broj 22?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(23, 23, 'Pitanje broj 23?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(24, 24, 'Pitanje broj 24?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(25, 25, 'Pitanje broj 25?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(26, 26, 'Pitanje broj 26?', 3, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(27, 27, 'Pitanje broj 27?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(28, 28, 'Pitanje broj 28?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(29, 29, 'Pitanje broj 29?', 1, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3'),
(30, 30, 'Pitanje broj 30?', 2, 'Odgovor broj 1', 'Odgovor broj 2', 'Odgovor broj 3');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE IF NOT EXISTS `quiz_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `question_number` int(11) NOT NULL,
  `user_answer` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `session_id`, `user_name`, `question_number`, `user_answer`) VALUES
(1, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 1, 2),
(2, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 2, 3),
(3, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 3, 1),
(4, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 4, 2),
(5, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 5, 3),
(6, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 6, 1),
(7, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 7, 2),
(8, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 8, 1),
(9, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 9, 2),
(10, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 10, 2),
(11, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 11, 2),
(12, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 12, 1),
(13, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 13, 1),
(14, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 14, 1),
(15, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 15, 2),
(16, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 16, 1),
(17, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 17, 2),
(18, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 18, 1),
(19, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 19, 1),
(20, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 20, 2),
(21, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 21, 1),
(22, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 22, 2),
(23, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 23, 1),
(24, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 24, 2),
(25, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 25, 1),
(26, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 26, 2),
(27, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 27, 2),
(28, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 28, 1),
(29, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 29, 2),
(30, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 30, 2),
(31, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 1, 0),
(32, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 2, 0),
(33, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 3, 0),
(34, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 4, 0),
(35, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 5, 0),
(36, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 6, 0),
(37, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 7, 2),
(38, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 8, 3),
(39, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 9, 1),
(40, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 10, 0),
(41, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 11, 0),
(42, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 12, 0),
(43, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 13, 0),
(44, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 14, 0),
(45, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 15, 0),
(46, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 16, 0),
(47, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 17, 0),
(48, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 18, 0),
(49, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 19, 0),
(50, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 20, 0),
(51, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 21, 0),
(52, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 22, 0),
(53, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 23, 0),
(54, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 24, 0),
(55, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 25, 0),
(56, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 26, 0),
(57, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 27, 0),
(58, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 28, 0),
(59, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 29, 0),
(60, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 30, 0),
(61, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 1, 2),
(62, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 2, 1),
(63, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 3, 3),
(64, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 4, 0),
(65, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 5, 0),
(66, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 6, 0),
(67, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 7, 0),
(68, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 8, 0),
(69, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 9, 0),
(70, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 10, 0),
(71, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 11, 0),
(72, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 12, 0),
(73, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 13, 0),
(74, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 14, 0),
(75, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 15, 0),
(76, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 16, 0),
(77, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 17, 0),
(78, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 18, 0),
(79, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 19, 0),
(80, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 20, 0),
(81, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 21, 0),
(82, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 22, 0),
(83, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 23, 0),
(84, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 24, 0),
(85, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 25, 0),
(86, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 26, 0),
(87, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 27, 0),
(88, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 28, 0),
(89, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 29, 0),
(90, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 30, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `use_dsi` varchar(255) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `use_dsi`, `account_type`) VALUES
(2, 'koja13', 'koja13@koja13.com', '4297f44b13955235245b2497399d7a93', 'yes', 'd'),
(3, 'martin', 'martin@martin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'no', 'd'),
(4, 'kojakoja', 'kojakoja@koja.com', '827ccb0eea8a706c4c34a16891f84e7b', 'yes', 'd'),
(5, 'blabla', 'blabla@bla.com', '827ccb0eea8a706c4c34a16891f84e7b', 'no', 'd'),
(8, 'blatruc', 'bla@bla', NULL, '', 'f'),
(10, 'trucbla', 'blatruc@bla', NULL, '', 'f'),
(11, 'haha', 'bdnas@nosvnf.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `user_actions`
--

CREATE TABLE IF NOT EXISTS `user_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `lession_number` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `object` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `session_id`, `user_name`, `lession_number`, `subject`, `object`, `time`) VALUES
(1, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 4, 'NLP', 'NLP', '2013-06-13 13:15:53'),
(2, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 4, 'modelovanje', 'NLP', '2013-06-13 13:16:00'),
(3, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 4, 'distorzija', 'generalizacija', '2013-06-13 13:16:06'),
(4, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 4, 'generalizacija', 'VAKOG', '2013-06-13 13:16:08'),
(5, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 4, 'NLP', 'VAKOG', '2013-06-13 13:16:15'),
(6, '1f41bfddc6fd8e80204d33b98dc2c919', 'kojakoja', 1, 'NLP', 'VAKOG', '2013-06-13 13:17:14'),
(7, '1f41bfddc6fd8e80204d33b98dc2c919', 'kojakoja', 1, 'NLP', 'obrazaca', '2013-06-13 13:18:36'),
(8, '1f41bfddc6fd8e80204d33b98dc2c919', 'kojakoja', 1, 'generalizacija', 'sport', '2013-06-13 13:21:15'),
(9, 'cd1bbadec8f68e75ea1096b0c25722aa', 'kojakoja', 1, 'NLP', 'NLP', '2013-06-13 13:27:13'),
(10, 'cd1bbadec8f68e75ea1096b0c25722aa', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-06-13 13:28:55'),
(11, '224adc02d625be0cf945d76265f062a3', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-06-13 13:31:05'),
(12, '319046453438fdba74b70142d899df36', 'kojakoja', 1, 'NLP', 'nauka', '2013-06-13 13:32:43'),
(13, '1d784d8b9955bc522eee93d24dedb714', 'kojakoja', 1, 'NLP', 'obrazaca', '2013-06-13 13:42:26'),
(14, '1d784d8b9955bc522eee93d24dedb714', 'kojakoja', 1, 'vakog', 'obrazovanje', '2013-06-13 13:42:34'),
(15, '1d784d8b9955bc522eee93d24dedb714', 'kojakoja', 1, 'distorzija', 'VAKOG', '2013-06-13 13:42:40'),
(16, 'dc730a7ed59b84c42b68719ada1b0ee6', 'kojakoja', 1, 'NLP', 'sport', '2013-06-13 13:53:09'),
(17, 'dc730a7ed59b84c42b68719ada1b0ee6', 'kojakoja', 1, 'teritorija', 'mapa', '2013-06-13 13:53:52'),
(18, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-06-17 15:23:33'),
(19, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 4, 'VAKOG', 'distorzija', '2013-06-17 15:23:47'),
(20, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 7, 'NLP', 'obrazaca', '2013-06-17 15:24:00'),
(21, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 4, 'NLP', 'nauka', '2013-06-20 11:56:14'),
(22, '38bd964c82a905671cec90013155b9f1', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-06-24 11:26:07'),
(23, '38bd964c82a905671cec90013155b9f1', 'kojakoja', 1, 'NLP', 'obrazaca', '2013-06-24 11:26:43'),
(24, 'd37fdc547fdf803d8107c6f9a0393130', 'kojakoja', 3, 'distorzija', 'VAKOG', '2013-06-24 11:33:38'),
(25, 'd37fdc547fdf803d8107c6f9a0393130', 'kojakoja', 3, 'NLP', 'obrazaca', '2013-06-24 11:33:45'),
(26, 'd37fdc547fdf803d8107c6f9a0393130', 'kojakoja', 3, 'generalizacija', 'VAKOG', '2013-06-24 11:34:20'),
(27, 'd37fdc547fdf803d8107c6f9a0393130', 'kojakoja', 3, 'VAKOG', 'generalizacija', '2013-06-24 11:34:24'),
(28, '6c853f060f8356e6cf319b5a8ac8ee25', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-06-24 12:48:26'),
(29, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-07-01 12:49:10'),
(30, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 1, 'VAKOG', 'generalizacija', '2013-07-01 12:49:24'),
(31, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 1, 'brisanje', 'VAKOG', '2013-07-01 12:49:29'),
(32, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 6, 'modelovanje', 'NLP', '2013-07-01 12:50:12'),
(33, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 6, 'NLP', 'modelovanje', '2013-07-01 12:50:23'),
(34, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 6, 'generalizacija', 'VAKOG', '2013-07-01 12:50:39'),
(35, '115ad1488e4f38866a687e380a45dfc9', 'kojakoja', 1, 'NLP', 'obrazaca', '2013-07-02 15:50:31'),
(36, '115ad1488e4f38866a687e380a45dfc9', 'kojakoja', 1, 'generalizacija', 'VAKOG', '2013-07-02 15:50:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_actions_lessions`
--

CREATE TABLE IF NOT EXISTS `user_actions_lessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `lession_number` int(11) DEFAULT NULL,
  `action` varchar(20) NOT NULL,
  `next_prev_lession_number` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `user_actions_lessions`
--

INSERT INTO `user_actions_lessions` (`id`, `session_id`, `user_name`, `lession_number`, `action`, `next_prev_lession_number`, `time`) VALUES
(1, '7a73a1dfb4c4335eee2565b31f944e7a', 'kkkkk', 0, 'logged_in', 0, '2013-06-13 11:44:45'),
(2, '7a73a1dfb4c4335eee2565b31f944e7a', 'kkkkk', 0, 'logged_in', 0, '2013-06-13 11:45:36'),
(3, '7a73a1dfb4c4335eee2565b31f944e7a', 'kkkkk', NULL, 'logged_out', NULL, '2013-06-13 09:45:38'),
(4, '7afd28014bec2654da33f189e7c2fe3b', 'kkkkk', 0, 'logged_in', 0, '2013-06-13 11:48:39'),
(5, '7afd28014bec2654da33f189e7c2fe3b', 'kkkkk', NULL, 'logged_out', NULL, '2013-06-13 09:50:25'),
(6, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 0, 'logged_in', 0, '2013-06-13 13:15:29'),
(7, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:15:34'),
(8, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 1, 'next', 2, '2013-06-13 13:15:40'),
(9, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 2, 'next', 3, '2013-06-13 13:15:48'),
(10, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 3, 'next', 4, '2013-06-13 13:15:49'),
(11, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 4, 'next', 5, '2013-06-13 13:16:18'),
(12, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 5, 'next', 6, '2013-06-13 13:16:26'),
(13, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 6, 'next', 7, '2013-06-13 13:16:27'),
(14, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', 7, 'next', 8, '2013-06-13 13:16:28'),
(15, '3efdaf8bc97df109f7e2b0b7053e640f', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-13 11:16:56'),
(16, '1f41bfddc6fd8e80204d33b98dc2c919', 'kojakoja', 0, 'logged_in', 0, '2013-06-13 13:17:08'),
(17, '1f41bfddc6fd8e80204d33b98dc2c919', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:17:09'),
(18, '2c6b8d6590d2cfe663263dbefba3ed4d', 'kojakoja', 0, 'logged_in', 0, '2013-06-13 13:21:53'),
(19, '2c6b8d6590d2cfe663263dbefba3ed4d', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:21:55'),
(20, 'cd1bbadec8f68e75ea1096b0c25722aa', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:26:46'),
(21, 'cd1bbadec8f68e75ea1096b0c25722aa', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:27:04'),
(22, 'cd1bbadec8f68e75ea1096b0c25722aa', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:27:38'),
(23, 'cd1bbadec8f68e75ea1096b0c25722aa', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:28:51'),
(24, '224adc02d625be0cf945d76265f062a3', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:30:57'),
(25, 'a233092f0248f3968309520f8bcb6387', '0', 1, 'start_dsi', 0, '2013-06-13 13:31:23'),
(26, '8e2234b4c1a3b53a528b2aac1d17f3c0', '0', NULL, 'logged_out', NULL, '2013-06-13 11:31:51'),
(27, '79467fe07a7c2c40453ebd866a6fcbda', '0', 1, 'start_dsi', 0, '2013-06-13 13:32:19'),
(28, '79467fe07a7c2c40453ebd866a6fcbda', '0', 1, 'start_dsi', 0, '2013-06-13 13:32:28'),
(29, '79467fe07a7c2c40453ebd866a6fcbda', '0', NULL, 'logged_out', NULL, '2013-06-13 11:32:32'),
(30, '319046453438fdba74b70142d899df36', 'kojakoja', 0, 'logged_in', 0, '2013-06-13 13:32:38'),
(31, '319046453438fdba74b70142d899df36', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:32:39'),
(32, 'dc730a7ed59b84c42b68719ada1b0ee6', 'kojakoja', 1, 'start_dsi', 0, '2013-06-13 13:53:05'),
(33, 'dc730a7ed59b84c42b68719ada1b0ee6', 'kojakoja', 1, 'next', 2, '2013-06-13 13:54:33'),
(34, '893c80a1ed5e684ec07072e3190bc68e', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-13 14:02:40'),
(35, 'dcbdbce14ff1a1653ab049dcd2c26be5', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-13 14:02:41'),
(36, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 0, 'logged_in', 0, '2013-06-17 15:23:28'),
(37, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 1, 'start_dsi', 0, '2013-06-17 15:23:29'),
(38, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 1, 'next', 2, '2013-06-17 15:23:40'),
(39, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 2, 'next', 3, '2013-06-17 15:23:41'),
(40, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 3, 'next', 4, '2013-06-17 15:23:43'),
(41, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 4, 'next', 5, '2013-06-17 15:23:51'),
(42, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 5, 'next', 6, '2013-06-17 15:23:55'),
(43, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 6, 'next', 7, '2013-06-17 15:23:56'),
(44, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 7, 'end_dsi', 0, '2013-06-17 15:24:03'),
(45, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 0, 'start_quiz', 0, '2013-06-17 15:24:05'),
(46, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', 0, 'end_quiz', 0, '2013-06-17 15:25:09'),
(47, '69c0bccb63ae07aaf6a2d779a867c275', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-17 13:26:03'),
(48, 'e6c3a3e294b19a6c9b7007d2eb9e57c1', 'kojakoja', 0, 'logged_in', 0, '2013-06-18 12:03:28'),
(49, 'e6c3a3e294b19a6c9b7007d2eb9e57c1', 'kojakoja', 1, 'start_dsi', 0, '2013-06-18 12:03:29'),
(50, '8dbcbbba94d3ca526e5c76a54dc92595', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-18 10:29:44'),
(51, '7421c9b4e06e5a1f231bc72d18f818eb', 'kojakoja', 0, 'logged_in', 0, '2013-06-18 14:43:51'),
(52, '7421c9b4e06e5a1f231bc72d18f818eb', 'kojakoja', 1, 'start_dsi', 0, '2013-06-18 14:43:57'),
(53, '7421c9b4e06e5a1f231bc72d18f818eb', 'kojakoja', 1, 'end_dsi', 0, '2013-06-18 14:44:02'),
(54, '7421c9b4e06e5a1f231bc72d18f818eb', 'kojakoja', 0, 'start_quiz', 0, '2013-06-18 14:44:04'),
(55, '7421c9b4e06e5a1f231bc72d18f818eb', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-18 12:44:24'),
(56, '59cc1edb7c17ae8e4124ea1df03281b8', '0', NULL, 'logged_out', NULL, '2013-06-18 12:49:22'),
(57, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 0, 'logged_in', 0, '2013-06-20 11:55:14'),
(58, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 1, 'start_dsi', 0, '2013-06-20 11:55:21'),
(59, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 1, 'next', 2, '2013-06-20 11:55:54'),
(60, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 2, 'next', 3, '2013-06-20 11:55:55'),
(61, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 3, 'prev', 2, '2013-06-20 11:55:57'),
(62, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 2, 'next', 3, '2013-06-20 11:56:01'),
(63, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 3, 'next', 4, '2013-06-20 11:56:03'),
(64, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 4, 'next', 5, '2013-06-20 11:56:20'),
(65, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 5, 'next', 6, '2013-06-20 11:56:21'),
(66, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 0, 'start_quiz', 0, '2013-06-20 11:56:52'),
(67, 'aa6f354cad140de77845e8b7a215fbf4', 'kojakoja', 0, 'end_quiz', 0, '2013-06-20 11:57:38'),
(68, 'f2321d1b27e42d511093762c4d47b0aa', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-20 10:00:09'),
(69, '38bd964c82a905671cec90013155b9f1', 'kojakoja', 0, 'logged_in', 0, '2013-06-24 11:25:57'),
(70, '38bd964c82a905671cec90013155b9f1', 'kojakoja', 1, 'start_dsi', 0, '2013-06-24 11:25:58'),
(71, '38bd964c82a905671cec90013155b9f1', 'kojakoja', 1, 'next', 2, '2013-06-24 11:28:28'),
(72, '38bd964c82a905671cec90013155b9f1', 'kojakoja', 2, 'next', 3, '2013-06-24 11:28:30'),
(73, 'b9ffff2817fce58133031ff2b75c40a3', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-24 11:56:00'),
(74, 'e6441b50446dcaee44e97f2efbc8f7af', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-24 09:59:26'),
(75, '6052f1bcff1e8548a88ab5c51e8df55b', '0', NULL, 'logged_out', NULL, '2013-06-24 10:18:48'),
(76, '6c853f060f8356e6cf319b5a8ac8ee25', 'kojakoja', 0, 'logged_in', 0, '2013-06-24 12:48:15'),
(77, '6c853f060f8356e6cf319b5a8ac8ee25', 'kojakoja', 1, 'start_dsi', 0, '2013-06-24 12:48:16'),
(78, '93260dcc04f75e9249e0856de756123f', 'kojakoja', NULL, 'logged_out', NULL, '2013-06-24 10:55:27'),
(79, '3e0e13a7dc31ea0e53387d3ede8602e1', '0', NULL, 'logged_out', NULL, '2013-06-24 10:55:31'),
(80, '99dd0be45759e79681e4be6dc82c9ea7', '0', NULL, 'logged_out', NULL, '2013-06-24 10:55:50'),
(81, '47192e08a4b1e98d17f31b4408882537', '0', NULL, 'logged_out', NULL, '2013-06-24 10:55:56'),
(82, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 0, 'logged_in', 0, '2013-07-01 12:48:55'),
(83, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 1, 'start_dsi', 0, '2013-07-01 12:48:57'),
(84, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 1, 'next', 2, '2013-07-01 12:49:57'),
(85, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 2, 'next', 3, '2013-07-01 12:49:58'),
(86, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 3, 'next', 4, '2013-07-01 12:49:59'),
(87, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 4, 'next', 5, '2013-07-01 12:50:01'),
(88, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 5, 'next', 6, '2013-07-01 12:50:03'),
(89, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 0, 'start_quiz', 0, '2013-07-01 12:51:20'),
(90, 'df8f8b62fbf74fe9152cd3d32f8ce6a7', 'kojakoja', 0, 'end_quiz', 0, '2013-07-01 12:51:34'),
(91, '27e9ea6c05f8a55ee644b658511614ae', 'kojakoja', NULL, 'logged_out', NULL, '2013-07-01 11:18:23'),
(92, 'f6d897d2c5423244b6ba34011b811f78', '0', NULL, 'logged_out', NULL, '2013-07-01 11:42:01'),
(93, '7192facb46d395da1f006bf9c5eb19d8', '0', NULL, 'logged_out', NULL, '2013-07-01 12:01:01'),
(94, '92eec8aa5b2a94abe6ee301e7b12a275', '0', NULL, 'logged_out', NULL, '2013-07-01 13:12:41'),
(95, 'c0b8cbf0be902c81103bcfbf6677fd3f', '0', NULL, 'logged_out', NULL, '2013-07-01 13:12:49'),
(96, 'deb818f88afac2024fd1d5ad6bb9bcd3', '0', NULL, 'logged_out', NULL, '2013-07-01 13:12:51'),
(97, 'abf4070e2ae551712daede0365083105', '0', NULL, 'logged_out', NULL, '2013-07-01 13:13:28'),
(98, 'a63a8e6863c3aacd06ac1fd80f276bd3', '0', NULL, 'logged_out', NULL, '2013-07-01 13:25:45'),
(99, 'bd26921772625dc4af72b53b7b7dccd7', '0', NULL, 'logged_out', NULL, '2013-07-01 13:27:55'),
(100, '5e6067b8529ddea433361d28203f13fe', 'trucbla', 0, 'logged_in', 0, '2013-07-02 15:49:11'),
(101, '5e6067b8529ddea433361d28203f13fe', 'trucbla', 1, 'start_dsi', 0, '2013-07-02 15:50:00'),
(102, '5e6067b8529ddea433361d28203f13fe', 'trucbla', 1, 'start_dsi', 0, '2013-07-02 15:50:06'),
(103, '115ad1488e4f38866a687e380a45dfc9', 'kojakoja', 0, 'logged_in', 0, '2013-07-02 15:50:22'),
(104, '115ad1488e4f38866a687e380a45dfc9', 'kojakoja', 1, 'start_dsi', 0, '2013-07-02 15:50:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
