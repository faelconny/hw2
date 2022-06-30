-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 17, 2022 alle 23:40
-- Versione del server: 10.4.24-MariaDB
-- Versione PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw2_db`
--
CREATE DATABASE IF NOT EXISTS `hw2_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hw2_db`;

-- --------------------------------------------------------

--
-- Struttura della tabella `favourites`
--

CREATE TABLE `favourites` (
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `favourites`
--

INSERT INTO `favourites` (`user_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2022-06-17 21:30:30', '2022-06-17 21:30:30'),
(1, 3, '2022-06-17 21:30:44', '2022-06-17 21:30:44'),
(1, 4, '2022-06-17 21:31:05', '2022-06-17 21:31:05'),
(1, 5, '2022-06-17 21:31:24', '2022-06-17 21:31:24'),
(1, 6, '2022-06-17 21:31:37', '2022-06-17 21:31:37'),
(2, 1, '2022-06-17 21:29:50', '2022-06-17 21:29:50');

--
-- Trigger `favourites`
--
DELIMITER $$
CREATE TRIGGER `favourites_trigger` AFTER INSERT ON `favourites` FOR EACH ROW BEGIN
        UPDATE movies 
        SET num_favourites = num_favourites + 1
        WHERE id = new.movie_id;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_favourites_trigger` AFTER DELETE ON `favourites` FOR EACH ROW BEGIN
        UPDATE movies
        SET num_favourites = num_favourites - 1
        WHERE id = old.movie_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_movie` AFTER DELETE ON `favourites` FOR EACH ROW BEGIN
        DELETE FROM movies
        WHERE id = old.movie_id AND num_favourites = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `likes`
--

INSERT INTO `likes` (`user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-17 21:23:23', '2022-06-17 21:23:23'),
(2, 1, '2022-06-17 21:27:49', '2022-06-17 21:27:49'),
(2, 2, '2022-06-17 21:27:41', '2022-06-17 21:27:41');

--
-- Trigger `likes`
--
DELIMITER $$
CREATE TRIGGER `like_trigger` AFTER INSERT ON `likes` FOR EACH ROW BEGIN
        UPDATE posts
        SET num_likes = num_likes + 1
        WHERE id = new.post_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `remove_like_trigger` AFTER DELETE ON `likes` FOR EACH ROW BEGIN
        UPDATE posts
        SET num_likes = num_likes - 1
        WHERE id = old.post_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura della tabella `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(127) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `num_favourites` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `poster`, `num_favourites`, `created_at`, `updated_at`) VALUES
(1, 'Pulp Fiction', '(1994)', 'https://imdb-api.com/images/original/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_Ratio0.7273_AL_.jpg', 1, '2022-06-17 21:29:50', '2022-06-17 21:29:50'),
(2, 'A Clockwork Orange', '(1971)', 'https://imdb-api.com/images/original/MV5BMTY3MjM1Mzc4N15BMl5BanBnXkFtZTgwODM0NzAxMDE@._V1_Ratio0.7273_AL_.jpg', 1, '2022-06-17 21:30:30', '2022-06-17 21:30:30'),
(3, '2001: A Space Odyssey', '(1968)', 'https://imdb-api.com/images/original/MV5BMmNlYzRiNDctZWNhMi00MzI4LThkZTctMTUzMmZkMmFmNThmXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_Ratio0.7273_AL_.jpg', 1, '2022-06-17 21:30:44', '2022-06-17 21:30:44'),
(4, 'Forrest Gump', '(1994)', 'https://imdb-api.com/images/original/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_Ratio0.7273_AL_.jpg', 1, '2022-06-17 21:31:05', '2022-06-17 21:31:05'),
(5, 'Back to the Future', '(1985)', 'https://imdb-api.com/images/original/MV5BZmU0M2Y1OGUtZjIxNi00ZjBkLTg1MjgtOWIyNThiZWIwYjRiXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_Ratio0.7273_AL_.jpg', 1, '2022-06-17 21:31:24', '2022-06-17 21:31:24'),
(6, 'Solaris', '(1972)', 'https://imdb-api.com/images/original/MV5BZmY4Yjc0OWQtZDRhMy00ODc2LWI2NGYtMWFlODYyN2VlNDQyXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_Ratio0.7273_AL_.jpg', 1, '2022-06-17 21:31:37', '2022-06-17 21:31:37');

-- --------------------------------------------------------

--
-- Struttura della tabella `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num_likes` int(11) DEFAULT 0,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`content`)),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `num_likes`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '{\"text\":\"Post senza immagine\",\"picture\":null}', '2022-06-17 21:23:16', '2022-06-17 21:23:16'),
(2, 2, 1, '{\"text\":\"Post con immagine. Forrest Gump\",\"picture\":\"posts\\/pictures\\/forrest-gump-feature-image-1.jpg\"}', '2022-06-17 21:27:36', '2022-06-17 21:27:36');

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(16) NOT NULL,
  `surname` varchar(16) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`, `surname`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'faelconny', 'felice.coniglio@studium.unict.it', '$2y$10$y.wAUOpMXyEBYD0eXxGuJuQdF37Eo5zWMJN0aXqPFKwnHBsk6OZhm', 'Felice Simone', 'Coniglio', 'https://apod.nasa.gov/apod/image/1806/M24Colombari1024.jpg', '2022-06-06 19:55:18', '2022-06-17 21:07:36'),
(2, 'mariorossi', 'mario.rossi@mail.it', '$2y$10$ykClO1q4ZHdiVSQkvOcE/u9uD/Kqw/jZHF391rpjb0FNkc2E6bjYi', 'Mario', 'Rossi', 'https://apod.nasa.gov/apod/image/1308/IC5067_HaSHOgonzalez_950.jpg', '2022-06-17 21:24:09', '2022-06-17 21:24:23');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`user_id`,`movie_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_movie` (`movie_id`);

--
-- Indici per le tabelle `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`user_id`,`post_id`),
  ADD KEY `idx_user` (`user_id`),
  ADD KEY `idx_post` (`post_id`);

--
-- Indici per le tabelle `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indici per le tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user` (`user_id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
