-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 15. 11:59
-- Kiszolgáló verziója: 10.1.31-MariaDB
-- PHP verzió: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `bluementa`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int(11) NOT NULL,
  `club_name` varchar(50) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `club_description` varchar(400) COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `clubs`
--

INSERT INTO `clubs` (`club_id`, `club_name`, `club_description`) VALUES
(2, 'Valakiék', 'hoppá'),
(3, 'dvsvdsv', ''),
(6, 'Egy új Club', 'leírással');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_question` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_answers` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_markable_answers` int(11) NOT NULL,
  `question_correct_answers` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_description` varchar(500) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `question_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `questions`
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
-- Tábla szerkezet ehhez a táblához `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `quiz_name` varchar(125) COLLATE utf8_hungarian_ci NOT NULL,
  `quiz_description` varchar(350) COLLATE utf8_hungarian_ci NOT NULL,
  `number_of_questions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `quizzes`
--

INSERT INTO `quizzes` (`quiz_id`, `registration_id`, `group_id`, `quiz_name`, `quiz_description`, `number_of_questions`) VALUES
(3, 3, 3, 'ysdf', 'sdfa', 3),
(121, 43, 34, '23123muk4fg', 'as', 312),
(122, 12345, 1233, 'sdfasdfsd', 'fasdhgt', 54),
(123, 3, 1234, 'fsdaf', '4sdf', 3123),
(123123, 1231231, 23123, 'sdadfasdf', 'asdfasdf', 123),
(123234, 234, 1223, 'fssfdafdsdaf', 'sadf', 23);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `solved_quiz`
--

CREATE TABLE `solved_quiz` (
  `solved_id` int(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  `quiz_id` int(250) NOT NULL,
  `quiz_max_point` int(250) NOT NULL,
  `quiz_obtained_point` int(250) NOT NULL,
  `quiz_percentage` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_registration_id` int(11) NOT NULL,
  `user_name` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_pass` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_email` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_first_name` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_last_name` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `user_permission_level` text COLLATE utf8mb4_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- A tábla indexei `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- A tábla indexei `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- A tábla indexei `solved_quiz`
--
ALTER TABLE `solved_quiz`
  ADD PRIMARY KEY (`solved_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123235;

--
-- AUTO_INCREMENT a táblához `solved_quiz`
--
ALTER TABLE `solved_quiz`
  MODIFY `solved_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `solved_quiz`
--
ALTER TABLE `solved_quiz`
  ADD CONSTRAINT `solved_quiz_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solved_quiz_ibfk_2` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
