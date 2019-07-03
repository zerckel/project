-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 03 juil. 2019 à 05:07
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `endyear`
--

-- --------------------------------------------------------

--
-- Structure de la table `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `title` text NOT NULL,
  `Id_bill` int(11) NOT NULL,
  `files` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bill`
--

INSERT INTO `bill` (`id`, `amount`, `date`, `title`, `Id_bill`, `files`) VALUES
(33, '400', '2019-07-01', 'impot', 27, 'files\\ 1415097244.pdf'),
(34, '86', '2005-06-14', 'Internet', 26, 'files\\ 1021406597.pdf'),
(35, '15', '2019-07-02', 'Tel', 29, 'files\\ 905977882.pdf'),
(36, '47', '2019-05-06', 'EDF', 29, 'files\\ 747939140.pdf'),
(37, '47', '2019-05-06', 'EDF', 29, 'files\\ 1657009394.pdf'),
(29, '89', '2019-06-10', 'GAZ', 28, 'files\\ 1050681464.pdf'),
(30, '45', '2019-07-01', 'EDF', 3, 'files\\ 1257701389.pdf'),
(31, '74', '2019-04-08', 'Taxe d\'habitation', 27, 'files\\ 2043388922.pdf'),
(32, '102', '2019-07-08', 'URSSAF', 25, 'files\\ 2033106871.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `published_at` date NOT NULL,
  `date` date NOT NULL,
  `place` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `summary` longtext NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `pics` varchar(255) NOT NULL,
  `ytb` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `title`, `published_at`, `date`, `place`, `content`, `summary`, `is_published`, `pics`, `ytb`) VALUES
(2, 'piscine', '2019-06-01', '2019-02-04', 'piscine', 'ekfejkfljefkejzlfkjezlfkjezlkfjzkfezf', 'zejvndjkvnzeove', 1, 'piscine.jpg', ''),
(10, 'Canicule : les services de la Ville se mobilisent', '2019-04-10', '2019-05-25', 'Paris', 'Le Plan canicule comporte quatre niveaux qui correspondent aux quatre couleurs de vigilance m&eacute;t&eacute;orologique : verte, jaune, orange et rouge. Le niveau alerte canicule - orange est d&eacute;clench&eacute; jusqu\'au dimanche 30 juin. Aussi, il conduit la municipalit&eacute; &agrave; activer des mesures de pr&eacute;vention et d&rsquo;information. Ces mesures concernent en particulier les seniors, plus vuln&eacute;rables et souvent plus isol&eacute;s, ainsi que les enfants et les personnes sans domicile fixe', 'Avec la forte chaleur actuelle, dans un souci de pr&eacute;vention et d&rsquo;information, la Ville de Paris a  mis en place des mesures d&rsquo;accompagnement pour les personnes vuln&eacute;rables comme pr&eacute;vues au niveau orange du Plan canicule.', 1, '155108695.jpg', ''),
(11, 'Rallye de Saint Gratien', '2019-06-05', '2019-07-03', 'mairie', 'Une course d\'orientation exceptionnelle est proposé à tous les Gratiennois par le Service des sports de la ville. Au programme, des épreuves sportives, une course d\'orientation et un quizz sur l\'histoire de la ville', 'Une manière ludique et sportive pour les familles gratiennoises de (re)découvrir la ville, de mieux s’orienter tout en réalisant des défis sur les différents sites culturels, sportifs et historiques.', 1, '205697957', '');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `category`) VALUES
(1, 'Mais qui donc a fait ce site pas très beau ?', 'el famoso carbonnel', '1'),
(2, 'Quand ce site a-t-il etait fait ?', 'En 2019', '2'),
(4, 'Avez vous une question ?', 'non', '1');

-- --------------------------------------------------------

--
-- Structure de la table `g_faq`
--

DROP TABLE IF EXISTS `g_faq`;
CREATE TABLE IF NOT EXISTS `g_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `faq_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `g_faq`
--

INSERT INTO `g_faq` (`id`, `Name`, `faq_id`) VALUES
(1, 'Questions générales', 1),
(2, 'Questions sur la Mairie', 2);

-- --------------------------------------------------------

--
-- Structure de la table `g_service`
--

DROP TABLE IF EXISTS `g_service`;
CREATE TABLE IF NOT EXISTS `g_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `g_service`
--

INSERT INTO `g_service` (`id`, `name`) VALUES
(1, 'Commissariat'),
(2, 'Ecoles');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pics` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id`, `name`, `address`, `email`, `phone`, `category`, `pics`) VALUES
(1, 'Commissariat', ' Allée Maurice Ravel, 95210 Saint-Gratien', '', '+33139346410', 'Commissariat', 'comm.jpg'),
(2, 'Primaire Jean Zay', ' 4 Rue Pierre Curie, 95210 Saint-Gratien', 'example@yahoo.fr', '+33139897924', 'Ecoles', 'ecole.jpg'),
(3, 'Primaire langevin wallon', '19 Rue Parmentier, 95210 Saint-Gratien', '', '+33139346868', 'Ecoles', 'ecole.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `is_admin` tinyint(2) NOT NULL DEFAULT '0',
  `confirm` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `lastname`, `firstname`, `email`, `password`, `birthday`, `address`, `phone`, `is_admin`, `confirm`) VALUES
(28, 'antonio', 'el roumanio', 'antoinecarbonnel@yahoo.fr', '202cb962ac59075b964b07152d234b70', '1998-08-10', '45 rue de paris', '0123456789', 1, '0'),
(3, 'john', 'smith', 'Trump@hotmail.fr', '7d6c3c74e7acaf7bcff63f69d5ece7d3', '2001-09-11', 'new york', '0123456789', 0, '0'),
(27, 'Killmister', 'Lemmy', 'cybermen95@yahoo.fr', '0e5091a25295e44fea9957638527301f', '1945-12-24', 'Heaven', '0623456789', 1, '0'),
(25, 'carbonnel', 'antoine', 'antoinecarbonnel@mail.fr', 'e5291b6a946fbc981d7f817b81f342a8', '1999-08-10', '46 rue d \'argenteuil, Terre au clerc', '661868886', 0, '0'),
(26, 'troy', 'baker', 'mail@mail.fr', '5fc9373234a1c9a640be17de56214ed5', '1992-04-10', 'greendale', '', 0, '0'),
(30, 'smith', 'john', 'antoinecarbonnel@gmail.com', '8d5e957f297893487bd98fa830fa6413', '2000-04-07', 'paris', '0123456789', 0, '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
