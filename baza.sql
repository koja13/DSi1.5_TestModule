-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 03, 2013 at 02:04 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `use_dsi` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `use_dsi`) VALUES
(2, 'koja13', 'koja13@koja13.com', '4297f44b13955235245b2497399d7a93', 'yes'),
(3, 'martin', 'martin@martin.com', '827ccb0eea8a706c4c34a16891f84e7b', 'no'),
(4, 'kojakoja', 'kojakoja@koja.com', '827ccb0eea8a706c4c34a16891f84e7b', 'yes'),
(5, 'blabla', 'blabla@bla.com', '827ccb0eea8a706c4c34a16891f84e7b', 'no');

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
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `session_id`, `user_name`, `lession_number`, `subject`, `object`, `time`) VALUES
(1, 'd79c4deca9968583ac60b5ee61e77bc7', 'kojakoja', 1, 'NLP', 'obrazaca', '0000-00-00'),
(2, 'd79c4deca9968583ac60b5ee61e77bc7', 'kojakoja', 3, 'nauka', 'sport', '0000-00-00'),
(3, 'af26b6ab631423717edbf4a7d5dabaeb', 'kojakoja', 1, 'obrazaca', 'obrazaca', '0000-00-00'),
(4, 'af26b6ab631423717edbf4a7d5dabaeb', 'kojakoja', 1, 'NLP', 'modelovanje', '0000-00-00'),
(5, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 3, 'NLP', 'modelovanje', '0000-00-00'),
(6, 'ac29a63796a4e2777f12cc9cd8d4cbf9', 'kojakoja', 5, 'NLP', 'modelovanje', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user_actions_lessions`
--

CREATE TABLE IF NOT EXISTS `user_actions_lessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `lession_number` int(11) NOT NULL,
  `next_prev` varchar(10) NOT NULL,
  `next_prev_lession_number` int(11) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_actions_lessions`
--

INSERT INTO `user_actions_lessions` (`id`, `session_id`, `user_name`, `lession_number`, `next_prev`, `next_prev_lession_number`, `time`) VALUES
(9, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 1, 'next', 2, '0000-00-00'),
(10, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 2, 'next', 3, '0000-00-00'),
(11, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 3, 'next', 4, '0000-00-00'),
(12, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 4, 'prev', 3, '0000-00-00'),
(13, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 3, 'prev', 2, '0000-00-00'),
(14, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 2, 'next', 3, '0000-00-00'),
(15, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 3, 'next', 4, '0000-00-00'),
(16, '6ad1f7a0ed8fc56c8c4732ad7557db97', 'kojakoja', 4, 'next', 5, '0000-00-00'),
(17, 'af26b6ab631423717edbf4a7d5dabaeb', 'kojakoja', 1, 'next', 2, '0000-00-00'),
(18, 'af26b6ab631423717edbf4a7d5dabaeb', 'kojakoja', 2, 'next', 3, '0000-00-00'),
(19, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 1, 'next', 2, '0000-00-00'),
(20, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 2, 'prev', 1, '0000-00-00'),
(21, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 1, 'next', 2, '0000-00-00'),
(22, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 2, 'next', 3, '0000-00-00'),
(23, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 3, 'next', 4, '0000-00-00'),
(24, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 4, 'next', 5, '0000-00-00'),
(25, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 1, 'next', 2, '0000-00-00'),
(26, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 2, 'next', 3, '0000-00-00'),
(27, 'ac29a63796a4e2777f12cc9cd8d4cbf9', 'kojakoja', 1, 'next', 2, '0000-00-00'),
(28, 'ac29a63796a4e2777f12cc9cd8d4cbf9', 'kojakoja', 2, 'next', 3, '0000-00-00'),
(29, 'ac29a63796a4e2777f12cc9cd8d4cbf9', 'kojakoja', 3, 'next', 4, '0000-00-00'),
(30, 'ac29a63796a4e2777f12cc9cd8d4cbf9', 'kojakoja', 4, 'next', 5, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;