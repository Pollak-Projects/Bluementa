-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 19, 2023 at 01:10 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluementa`
--

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int NOT NULL,
  `club_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `club_description` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `club_description`) VALUES
(2, 'Valakiék', 'hoppá'),
(3, 'dvsvdsv', ''),
(6, 'Egy új Club', 'leírással');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int NOT NULL,
  `registration_id` int NOT NULL,
  `quiz_id` int NOT NULL,
  `question_question` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_answers` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_markable_answers` int NOT NULL,
  `question_correct_answers` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `registration_id`, `quiz_id`, `question_question`, `question_answers`, `question_markable_answers`, `question_correct_answers`, `question_description`, `question_type`) VALUES
(1, 1, 1, 'Mennyi 2+2?', '4;7;11;19', 1, '4', 'Valami mas', 1),
(2, 2, 1, 'Mennyi 5+5?', '12;21;10;2', 1, '1', 'Valami meg egy', 1),
(3, 3, 2, 'Melyikek magyar szavak?', 'tapasz;ice;irodalom;ablak;picture', 3, 'tapasz;irodalom;ablak', 'Melyik magyar szo', 2),
(4, 3, 3, 'Melyikek angol szavak?', 'tea;towel;charger;kuplung;chair', 4, 'chair;tea;towel;charger', 'Melyikek angol szavak?', 2),
(5, 2, 2, 'Mi a parja?', 'piros;auto;sarga;busz', 0, 'piros:sarga;auto:busz', 'Melyik szavak jelentese hasonlo', 3),
(6, 1, 2, 'Melyek tartoznak ossze?', 'tusolo;furdo szoba;tv;nappali;takaro;halo szoba', 0, 'tv:nappali;tusolo:furdo szoba;takaro:halo szoba', 'Melyik tagy melyk helyiseghez tartozik?', 3),
(7, 4, 2, 'Rakd sorrendbe az esemenyeket!', 'Honfoglalas;Masodik VH;Ipari forradalom;Elso VH', 0, 'Honfoglalas;Ipari forradalom;Elso VH;Masodik VH', 'Milyen sorrendben voltak az esemenyek?', 4),
(8, 4, 2, 'Milyen sorrendben eszel?', 'Ebed;Vacsora;Tiz orai;Reggeli;Uzsonna', 0, 'Reggeli;Tiz orai;Ebed:Uzsonna;Vacsora', 'Milyen sorrendben jonnek az etkezesek egymas utan?', 4);

-- --------------------------------------------------------

--
-- Table structure for table `questions_quizzes_switch`
--

CREATE TABLE `questions_quizzes_switch` (
  `questions_question_id` int NOT NULL,
  `quizzes_quiz_id` int NOT NULL,
  `questions_quizzes_switch_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `questions_quizzes_switch`
--

INSERT INTO `questions_quizzes_switch` (`questions_question_id`, `quizzes_quiz_id`, `questions_quizzes_switch_id`) VALUES
(3, 4, 1),
(2, 4, 2),
(2, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int NOT NULL,
  `registration_id` int NOT NULL,
  `group_id` int NOT NULL,
  `quiz_name` varchar(125) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `quiz_description` varchar(350) CHARACTER SET utf8mb3 COLLATE utf8mb3_hungarian_ci NOT NULL,
  `number_of_questions` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_hungarian_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `registration_id`, `group_id`, `quiz_name`, `quiz_description`, `number_of_questions`) VALUES
(1, 43, 34, '23123muk4fg', 'as', 312),
(2, 3, 3, 'ysdf', 'sdfa', 3),
(3, 12345, 1233, 'sdfasdfsd', 'fasdhgt', 54),
(4, 3, 1234, 'fsdaf', '4sdf', 3123),
(5, 1231231, 23123, 'sdadfasdf', 'asdfasdf', 123),
(6, 234, 1223, 'fssfdafdsdaf', 'sadf', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `group_id` int NOT NULL,
  `user_registration_id` int NOT NULL,
  `user_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_pass` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_first_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_last_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_permission_level` text CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `questions_quizzes_switch`
--
ALTER TABLE `questions_quizzes_switch`
  ADD PRIMARY KEY (`questions_quizzes_switch_id`),
  ADD KEY `questions_quiz_id` (`questions_question_id`),
  ADD KEY `quizzes_quiz_id` (`quizzes_quiz_id`) USING BTREE;

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions_quizzes_switch`
--
ALTER TABLE `questions_quizzes_switch`
  MODIFY `questions_quizzes_switch_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123235;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions_quizzes_switch`
--
ALTER TABLE `questions_quizzes_switch`
  ADD CONSTRAINT `questions_quizzes_switch_ibfk_1` FOREIGN KEY (`quizzes_quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `questions_quizzes_switch_ibfk_2` FOREIGN KEY (`questions_question_id`) REFERENCES `questions` (`question_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
