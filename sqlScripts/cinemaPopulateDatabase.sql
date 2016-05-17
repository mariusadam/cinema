-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 10:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19
    
use cinemadatabase;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinemadatabase`
--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`title`, `year`, `cast`, `duration`, `poster`, `link_imdb`, `search_title`) VALUES
    ('Me Before you', 2016, 'Jojo Moyes, Scott Neustadter, Michael H. Weber', 2, '/img/movie/poster/Me-Before-You_poster.jpg', 'http://www.imdb.com/title/tt0117509/', ''),
    ('Warcraft', 2016, 'Travis Fimmel, Ben Foster', 2, '/img/movie/poster/Warcraft_poster.jpg', 'http://www.imdb.com/title/tt0803096/', ''),
    ('Django Unchained', 2012, 'Jamie Foxx, Christoph Waltz', 2, '/img/movie/poster/Django-Unchained_poster.jpg', 'http://www.imdb.com/title/tt1853728/', ''),
    ('28 Days Later', 2002, 'Cillian Murphy, Naomie Harris, Christopher Eccleston ', 2, '/img/movie/poster/28-Days-Later_poster.jpg', 'http://www.imdb.com/title/tt0289043/', ''),
    ('Black Swan', 2010, 'Natalie Portman, Mila Kunis, Vincent Cassel ', 2, '/img/movie/poster/Black-Swan_poster.png', 'http://www.imdb.com/title/tt0947798/', ''),
    ('The Prestige', 2006, 'Christian Bale, Hugh Jackman, Scarlett Johansson ', 2, '/img/movie/poster/The-Prestige_poster.jpg', 'http://www.imdb.com/title/tt0482571', ''),
    ('Captain America: Civil War', 2016, 'Chris Evans, Robert Downey Jr., Scarlett Johansson ', 2, '/img/movie/poster/Civil-War_poster.jpg', 'http://www.imdb.com/title/tt3498820/', ''),
    ('Guardians of the Galaxy', 2014, 'Chris Pratt, Vin Diesel, Bradley Cooper, Zoe Saldana', 2, '/img/movie/poster/Guardians_poster.jpg', 'http://www.imdb.com/title/tt2015381/', ''),
    ('Ex Machina', 2015, 'Alicia Vikander, Domhnall Gleeson, Oscar Isaac ', 2, '/img/movie/poster/Ex-Machina_poster.jpg', 'http://www.imdb.com/title/tt0470752/', ''),
    ('Interstellar', 2014, 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 2, '/img/movie/poster/Interstellar_poster.jpg', 'http://www.imdb.com/title/tt0816692/', '');

-- --------------------------------------------------------

--
-- Dumping data for table `movie_to_genres`
--

INSERT INTO `movie_to_genres` (`movie_id`, `genre_id`) VALUES
    (1, 3),
    (2, 2),
    (2, 7),
    (2, 8),
    (3, 3),
    (4, 6),
    (4, 5),
    (5, 3),
    (5, 5),
    (9, 3),
    (9, 4),
    (6, 3),
    (7, 2),
    (7, 4),
    (8, 2),
    (8, 4),
    (10, 3),
    (10, 4);

-- --------------------------------------------------------

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` ( `name`, `capacity`) VALUES
    ('S01', 100),
    ('S02', 123),
    ('S03', 45),
    ('A01', 421),
    ('A02', 15);

-- --------------------------------------------------------


INSERT INTO `genres` ( `name`) VALUES
    ('Comedy'),
    ('Action'),
    ('Drama'),
    ('SF'),
    ('Thriler'),
    ('Horror'),
    ('Adventure'),
    ('Fantasy');


--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`date`, `time`, `remaining_seats`, `ticket_price`, `room_id`, `movie_id`) VALUES
    ('2016-05-28', '11:00:00', 100, 1, 1, 1),
    ('2016-06-08', '18:00:00', 123, 1, 2, 2),
    ('2016-05-24', '12:00:00', 45, 1, 3, 3),
    ('2016-05-25', '17:00:00', 421, 1, 4, 3),
    ('2016-05-23', '15:00:00', 421, 1, 4, 4),
    ('2016-05-31', '09:00:00', 15, 1, 5, 5),
    ('2016-05-18', '18:00:00', 15, 1, 5, 6),
    ('2016-05-22', '12:00:00', 100, 1, 1, 7),
    ('2016-05-16', '18:00:00', 100, 1, 1, 8),
    ('2016-05-17', '18:00:00', 123, 1, 2, 9),
    ('2016-05-30', '15:00:00', 15, 1, 5, 10);

-- --------------------------------------------------------

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active`, `role`) VALUES
    (1, 'WSfrshzy6IKS6cPU96WfEjrow3FWCoxgqt8N6yGMxxa8gGW99/T5knbZHz4e/AxrQi5H4BWNEZlK9x1/d35oRg==', 'root@root.com', 1, 1);
