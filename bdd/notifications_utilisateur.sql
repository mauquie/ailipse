-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 23 Mai 2017 à 16:05
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ailipset921`
--

-- --------------------------------------------------------

--
-- Structure de la table `notifications_utilisateur`
--

CREATE TABLE IF NOT EXISTS `notifications_utilisateur` (
`id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `notifications_utilisateur`
--

INSERT INTO `notifications_utilisateur` (`id`, `email`, `message`, `active`) VALUES
(1, 'mathieu@test.fr', 'Votre annonce créée le 23/05/2017, portant le nom adza a été validée par un administrateur.', 0),
(2, 'mathieu@test.fr', 'Votre annonce crÃ©Ã©e le 23/05/2017, portant le nom dazda a Ã©tÃ© validÃ©e par un administrateur.', 0),
(3, 'mathieu@test.fr', 'Votre annonce crÃ©Ã©e le 23/05/2017, portant le nom ''fazef'' a Ã©tÃ© validÃ©e par un administrateur.', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `notifications_utilisateur`
--
ALTER TABLE `notifications_utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `notifications_utilisateur`
--
ALTER TABLE `notifications_utilisateur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
