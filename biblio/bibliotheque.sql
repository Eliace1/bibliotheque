-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 01 Février 2025 à 23:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `description` text,
  `lien` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `year`, `description`, `lien`) VALUES
(1, '1984', 'George Orwell', 'Dystopie', 1949, 'Un roman dystopique sur un monde totalitaire.', 'img1.jpeg'),
(2, 'Le Petit Prince', 'Antoine de Saint-Exupéry', 'Conte', 1943, 'Un conte philosophique mondialement connu.', 'img2.jpeg'),
(3, 'L''Étranger', 'Albert Camus', 'Philosophie', 1942, 'Un roman existentialiste et absurde.', 'img3.jpeg'),
(4, 'Dune', 'Frank Herbert', 'Science-fiction', 1965, 'Un classique de la science-fiction.', 'img4.jpeg'),
(5, 'Harry Potter à l''école des sorciers', 'J.K. Rowling', 'Fantasy', 1997, 'Le premier tome des aventures de Harry Potter.', 'img5.jpeg'),
(6, 'Fahrenheit 451', 'Ray Bradbury', 'Dystopie', 1953, 'Un futur où les livres sont interdits.', 'img6.jpeg'),
(7, 'Les Misérables', 'Victor Hugo', 'Classique', 1862, 'Un roman historique et social français.', 'img7.jpeg'),
(8, 'Le Seigneur des Anneaux', 'J.R.R. Tolkien', 'Fantasy', 1954, 'Une saga épique sur la Terre du Milieu.', 'img8.jpeg'),
(9, 'La Peste', 'Albert Camus', 'Philosophie', 1947, 'Une métaphore sur l''humanité face aux crises.', 'img9.jpeg'),
(10, 'Sherlock Holmes: Le Chien des Baskerville', 'Arthur Conan Doyle', 'Policier', 1902, 'Une enquête du célèbre détective.', 'img11.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `id_books` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  PRIMARY KEY (`id_emprunt`),
  UNIQUE KEY `id_books` (`id_books`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_books`, `id_users`) VALUES
(10, 10, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`) VALUES
(1, 'Aslie TACAL', 'tacaladongmoasliedurel@gmail.com', '$2y$10$v5QM1zNDxlkFd0szs/UExurc0kOCFJbVvcH.L8yZYpzqD82amGy2C'),
(2, 'TACALA aslit', 'tacaladongmosliedurel@gmail.com', '$2y$10$gN3DQw49lDdtAy1xGz.S8ObNKnbwsOjMkf.vFlaisJReih0K1myVm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
