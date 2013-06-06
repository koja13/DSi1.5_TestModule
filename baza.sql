-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 06, 2013 at 02:24 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `session_id`, `user_name`, `question_number`, `user_answer`) VALUES
(151, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 1, 0),
(152, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 2, 1),
(153, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 3, 0),
(154, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 4, 0),
(155, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 5, 0),
(156, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 6, 0),
(157, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 7, 0),
(158, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 8, 0),
(159, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 9, 0),
(160, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 10, 0),
(161, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 11, 0),
(162, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 12, 0),
(163, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 13, 0),
(164, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 14, 0),
(165, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 15, 0),
(166, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 16, 0),
(167, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 17, 0),
(168, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 18, 0),
(169, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 19, 0),
(170, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 20, 0),
(171, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 21, 0),
(172, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 22, 0),
(173, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 23, 0),
(174, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 24, 0),
(175, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 25, 0),
(176, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 26, 0),
(177, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 27, 0),
(178, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 28, 0),
(179, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 29, 0),
(180, 'cf236b43945d2e5853bf291cce8da5d6', 'kojakoja', 30, 1);

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
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `user_actions`
--

INSERT INTO `user_actions` (`id`, `session_id`, `user_name`, `lession_number`, `subject`, `object`, `time`) VALUES
(1, 'd79c4deca9968583ac60b5ee61e77bc7', 'kojakoja', 1, 'NLP', 'obrazaca', '0000-00-00 00:00:00'),
(2, 'd79c4deca9968583ac60b5ee61e77bc7', 'kojakoja', 3, 'nauka', 'sport', '0000-00-00 00:00:00'),
(3, 'af26b6ab631423717edbf4a7d5dabaeb', 'kojakoja', 1, 'obrazaca', 'obrazaca', '0000-00-00 00:00:00'),
(4, 'af26b6ab631423717edbf4a7d5dabaeb', 'kojakoja', 1, 'NLP', 'modelovanje', '0000-00-00 00:00:00'),
(5, 'a8545e91893e6df518efd5fa46faa1ae', 'kojakoja', 3, 'NLP', 'modelovanje', '0000-00-00 00:00:00'),
(6, 'ac29a63796a4e2777f12cc9cd8d4cbf9', 'kojakoja', 5, 'NLP', 'modelovanje', '0000-00-00 00:00:00'),
(7, '8a73ed4de3cac1b9ee611fd2f4070362', 'kojakoja', 1, 'NLP', 'modelovanje', '0000-00-00 00:00:00'),
(8, 'ac0eab85edfe3faef90fffed3aeb9cff', 'kojakoja', 1, 'NLP', 'metaprogrami', '2013-06-04 12:00:49'),
(9, 'ac0eab85edfe3faef90fffed3aeb9cff', 'kojakoja', 1, 'modelovanje', 'NLP', '2013-06-04 12:00:54'),
(10, 'b1c6450c3d60bd81bf6299e45e81430e', 'kojakoja', 1, 'NLP', '<span class="dragdrop ui-draggable ui-droppable" style="color: rgb(128, 128, 128); position: relative; background-color: yellow; cursor: move;">modelovanje</span>', '2013-06-04 14:31:37'),
(11, '9b25eacc1fd74b6f56ee11c584b395b5', 'kojakoja', 1, 'VAKOG', 'generalizacija', '2013-06-04 14:54:15'),
(12, '9b25eacc1fd74b6f56ee11c584b395b5', 'kojakoja', 1, 'brisanje', 'VAKOG', '2013-06-04 14:54:20'),
(13, '9b25eacc1fd74b6f56ee11c584b395b5', 'kojakoja', 1, 'distorzija', 'VAKOG', '2013-06-04 14:54:25'),
(14, '9b25eacc1fd74b6f56ee11c584b395b5', 'kojakoja', 1, 'VAKOG', 'brisanje', '2013-06-04 14:54:31'),
(15, '9b25eacc1fd74b6f56ee11c584b395b5', 'kojakoja', 1, 'NLP', 'modelovanje', '2013-06-04 14:54:55'),
(16, 'b7fc52186f62885434d028878c054eb9', 'kojakoja', 1, 'NLP', 'obrazaca', '2013-06-04 16:08:50'),
(17, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 1, 'VAKOG', 'generalizacija', '2013-06-06 15:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `user_actions_lessions`
--

CREATE TABLE IF NOT EXISTS `user_actions_lessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `lession_number` int(11) NOT NULL,
  `action` varchar(20) NOT NULL,
  `next_prev_lession_number` int(11) DEFAULT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=794 ;

--
-- Dumping data for table `user_actions_lessions`
--

INSERT INTO `user_actions_lessions` (`id`, `session_id`, `user_name`, `lession_number`, `action`, `next_prev_lession_number`, `time`) VALUES
(752, '3c65e76fd1bcc23a388a4a16d0672961', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 13:31:03'),
(753, '3c65e76fd1bcc23a388a4a16d0672961', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 13:31:04'),
(754, '3c65e76fd1bcc23a388a4a16d0672961', 'kojakoja', 1, 'next', 2, '2013-06-06 13:31:06'),
(755, '3c65e76fd1bcc23a388a4a16d0672961', 'kojakoja', 2, 'next', 3, '2013-06-06 13:31:07'),
(756, '3c65e76fd1bcc23a388a4a16d0672961', 'kojakoja', 3, 'next', 4, '2013-06-06 13:31:07'),
(757, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 15:02:37'),
(758, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:02:38'),
(759, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 1, 'next', 2, '2013-06-06 15:02:40'),
(760, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 2, 'next', 3, '2013-06-06 15:02:41'),
(761, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:02:49'),
(762, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:02:51'),
(763, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:02:54'),
(764, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:02:55'),
(765, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:02:57'),
(766, '3ed9706604428d8d2e11f9a9fbd35dfe', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:02:59'),
(767, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 15:26:14'),
(768, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:26:17'),
(769, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:26:28'),
(770, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:26:31'),
(771, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:26:33'),
(772, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 1, 'end_dsi', 0, '2013-06-06 15:26:36'),
(773, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:26:48'),
(774, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:26:51'),
(775, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'start_quiz', 0, '2013-06-06 15:26:54'),
(776, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 15:29:26'),
(777, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:29:27'),
(778, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:29:39'),
(779, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 15:30:53'),
(780, '3c2b09ca281c5ea273af0fc485ef51d4', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:30:54'),
(781, '595c100b1851e9a0553b917b569c61c8', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:31:05'),
(782, 'f32752489dbdc948fab96d4417632e8a', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 15:31:25'),
(783, 'f32752489dbdc948fab96d4417632e8a', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:31:26'),
(784, 'f32752489dbdc948fab96d4417632e8a', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:31:37'),
(785, 'f32752489dbdc948fab96d4417632e8a', 'kojakoja', 0, 'start_quiz', 0, '2013-06-06 15:31:40'),
(786, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 0, 'logged_in', 0, '2013-06-06 15:32:51'),
(787, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:32:52'),
(788, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:33:03'),
(789, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:33:15'),
(790, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 0, 'start_quiz', 0, '2013-06-06 15:33:18'),
(791, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 1, 'start_dsi', 0, '2013-06-06 15:37:06'),
(792, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 0, 'reading_time_is_up', 0, '2013-06-06 15:37:17'),
(793, '234e20adb37f8e01dd73d133957c459a', 'kojakoja', 0, 'start_quiz', 0, '2013-06-06 15:37:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
