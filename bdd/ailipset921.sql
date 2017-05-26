-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 26 Mai 2017 à 13:01
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ailipset921`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

CREATE TABLE `annonces` (
  `id` int(10) NOT NULL,
  `titre` varchar(30) CHARACTER SET utf8 NOT NULL,
  `contenu` text CHARACTER SET utf8 NOT NULL,
  `prix` int(5) NOT NULL,
  `type_annonce` int(1) NOT NULL,
  `photo` varchar(500) CHARACTER SET utf8 NOT NULL,
  `marque` varchar(30) CHARACTER SET utf8 NOT NULL,
  `modele` varchar(30) CHARACTER SET utf8 NOT NULL,
  `taille` varchar(30) CHARACTER SET utf8 NOT NULL,
  `annee` varchar(30) CHARACTER SET utf8 NOT NULL,
  `surface` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ptv` varchar(30) CHARACTER SET utf8 NOT NULL,
  `localisation` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` int(1) NOT NULL DEFAULT '1',
  `online` int(1) NOT NULL DEFAULT '1',
  `auteur` varchar(30) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `date_publication` varchar(10) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces`
--

INSERT INTO `annonces` (`id`, `titre`, `contenu`, `prix`, `type_annonce`, `photo`, `marque`, `modele`, `taille`, `annee`, `surface`, `ptv`, `localisation`, `email`, `telephone`, `online`, `auteur`, `ville`, `date_publication`, `active`) VALUES
(86, 'dfzdaz', 'dazda', 20, 1, 'slide13.jpg,', 'ijino_technique', 'moi', 'XS', '2005', 'Non renseignée', 'Non renseigné', 'Limousin', 'admin@test.fr', 610203040, 1, 'Test A.', 'test', '24/05/2017', 1),
(85, 'dazda', 'daz', 20, 1, 'slide1.jpg,slide2.jpg,', 'ijino_technique', 'moi', 'XS', '2003', 'Non renseignée', 'Non renseigné', 'Lorraine', 'admin@test.fr', 610203040, 1, 'Test A.', 'test', '24/05/2017', 1);

-- --------------------------------------------------------

--
-- Structure de la table `annonces_annee`
--

CREATE TABLE `annonces_annee` (
  `id` int(4) NOT NULL,
  `annee` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces_annee`
--

INSERT INTO `annonces_annee` (`id`, `annee`) VALUES
(1, 2000),
(2, 2001),
(3, 2002),
(4, 2003),
(5, 2004),
(6, 2005),
(7, 2006),
(8, 2007),
(9, 2008),
(10, 2009),
(11, 2010),
(12, 2011),
(13, 2012),
(14, 2013),
(15, 2014),
(16, 2015),
(17, 2016),
(18, 2017);

-- --------------------------------------------------------

--
-- Structure de la table `annonces_localisation`
--

CREATE TABLE `annonces_localisation` (
  `id` int(2) NOT NULL,
  `region` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `annonces_localisation`
--

INSERT INTO `annonces_localisation` (`id`, `region`) VALUES
(18, 'Provence Alpes Côte d\'Azur'),
(17, 'Nord Pas de Calais'),
(16, 'Midi-Pyrénées'),
(15, 'Lorraine'),
(14, 'Limousin'),
(13, 'Languedoc Roussillon'),
(12, 'Ile de France'),
(11, 'Haute Normandie'),
(10, 'Franche Comte'),
(9, 'Corse'),
(8, 'Champagne Ardenne'),
(7, 'Centre'),
(6, 'Bretagne'),
(5, 'Bourgogne'),
(4, 'Basse Normandie'),
(3, 'Auvergne'),
(2, 'Aquitaine'),
(1, 'Alsace'),
(19, 'Pays de la Loire'),
(20, 'Picardie'),
(21, 'Poitou Charente'),
(22, 'Rhone Alpes');

-- --------------------------------------------------------

--
-- Structure de la table `annonces_marque`
--

CREATE TABLE `annonces_marque` (
  `id` int(4) NOT NULL,
  `marque` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces_marque`
--

INSERT INTO `annonces_marque` (`id`, `marque`) VALUES
(2, 'peugeot');

-- --------------------------------------------------------

--
-- Structure de la table `annonces_modele`
--

CREATE TABLE `annonces_modele` (
  `id` int(4) NOT NULL,
  `modele` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `annonces_ptv`
--

CREATE TABLE `annonces_ptv` (
  `id` int(4) NOT NULL,
  `ptv` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces_ptv`
--

INSERT INTO `annonces_ptv` (`id`, `ptv`) VALUES
(1, '60-65 kg'),
(2, '65-70 kg'),
(3, '70-75 kg'),
(4, '75-80 kg'),
(5, '80-85 kg'),
(6, '85-90 kg'),
(7, '90-95 kg'),
(8, '95-100 kg'),
(9, '100-105 kg'),
(10, '105-110 kg'),
(11, '110-115 kg'),
(12, '115-120 kg'),
(13, '+ 120 kg');

-- --------------------------------------------------------

--
-- Structure de la table `annonces_surface`
--

CREATE TABLE `annonces_surface` (
  `id` int(4) NOT NULL,
  `surface` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonces_surface`
--

INSERT INTO `annonces_surface` (`id`, `surface`) VALUES
(1, '15 m²'),
(2, '16 m²'),
(3, '17 m²'),
(4, '18 m²'),
(5, '19 m²'),
(6, '20 m²'),
(7, '21 m²'),
(8, '22 m²'),
(9, '23 m²'),
(10, '24 m²'),
(11, '25 m²'),
(12, '26 m²'),
(13, '27 m²'),
(14, '28 m²'),
(15, '29 m²'),
(16, '30 m²'),
(17, '31 m²'),
(18, '32 m²'),
(19, '33 m²'),
(20, '34 m²'),
(21, '35 m²'),
(22, '36 m²'),
(23, '37 m²'),
(24, '38 m²'),
(25, '39 m²'),
(26, '40 m²'),
(27, '41 m²'),
(28, '42 m²'),
(29, '+ 42 m²');

-- --------------------------------------------------------

--
-- Structure de la table `annonces_taille`
--

CREATE TABLE `annonces_taille` (
  `id` int(4) NOT NULL,
  `taille` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  `cadre` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `contenu`, `cadre`) VALUES
(51, 'cadre bas', 'contenu du cadre du bas', 'cadre_bas'),
(49, 'cadre bas droit', 'sdfgs', 'cadre_bas_droit'),
(50, 'cadre haut', 'contenu du cadre haut', 'cadre_haut');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `telephone` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ville_expedition` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rue_expedition` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `code_postal_expedition` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ville_facturation` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rue_facturation` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `code_postal_facturation` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'default',
  `permissions` int(1) NOT NULL DEFAULT '1',
  `actif` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id`, `email`, `password`, `nom`, `prenom`, `telephone`, `ville_expedition`, `rue_expedition`, `code_postal_expedition`, `ville_facturation`, `rue_facturation`, `code_postal_facturation`, `avatar`, `permissions`, `actif`) VALUES
(1, 'admin@test.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Test', 'Admin', '0610203040', 'test', '3 boulevard Hérriot', '82000', 'Montauban', '3 boulevard Hérriot', '82000', 'admin@test_fr', 3, 1),
(4, 'test@test.fr', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Test', 'Test', '0610203040', 'Test', 'Test', '82000', 'Test', 'Test', '82000', 'test@test_fr', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `departement_id` int(11) NOT NULL,
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_uppercase` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom_soundex` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`departement_id`, `departement_code`, `departement_nom`, `departement_nom_uppercase`, `departement_slug`, `departement_nom_soundex`) VALUES
(1, '01', 'Ain', 'AIN', 'ain', 'A500'),
(2, '02', 'Aisne', 'AISNE', 'aisne', 'A250'),
(3, '03', 'Allier', 'ALLIER', 'allier', 'A460'),
(5, '05', 'Hautes-Alpes', 'HAUTES-ALPES', 'hautes-alpes', 'H32412'),
(4, '04', 'Alpes-de-Haute-Provence', 'ALPES-DE-HAUTE-PROVENCE', 'alpes-de-haute-provence', 'A412316152'),
(6, '06', 'Alpes-Maritimes', 'ALPES-MARITIMES', 'alpes-maritimes', 'A41256352'),
(7, '07', 'Ardèche', 'ARDÈCHE', 'ardeche', 'A632'),
(8, '08', 'Ardennes', 'ARDENNES', 'ardennes', 'A6352'),
(9, '09', 'Ariège', 'ARIÈGE', 'ariege', 'A620'),
(10, '10', 'Aube', 'AUBE', 'aube', 'A100'),
(11, '11', 'Aude', 'AUDE', 'aude', 'A300'),
(12, '12', 'Aveyron', 'AVEYRON', 'aveyron', 'A165'),
(13, '13', 'Bouches-du-Rhône', 'BOUCHES-DU-RHÔNE', 'bouches-du-rhone', 'B2365'),
(14, '14', 'Calvados', 'CALVADOS', 'calvados', 'C4132'),
(15, '15', 'Cantal', 'CANTAL', 'cantal', 'C534'),
(16, '16', 'Charente', 'CHARENTE', 'charente', 'C653'),
(17, '17', 'Charente-Maritime', 'CHARENTE-MARITIME', 'charente-maritime', 'C6535635'),
(18, '18', 'Cher', 'CHER', 'cher', 'C600'),
(19, '19', 'Corrèze', 'CORRÈZE', 'correze', 'C620'),
(20, '2a', 'Corse-du-sud', 'CORSE-DU-SUD', 'corse-du-sud', 'C62323'),
(21, '2b', 'Haute-corse', 'HAUTE-CORSE', 'haute-corse', 'H3262'),
(22, '21', 'Côte-d\'or', 'CÔTE-D\'OR', 'cote-dor', 'C360'),
(23, '22', 'Côtes-d\'armor', 'CÔTES-D\'ARMOR', 'cotes-darmor', 'C323656'),
(24, '23', 'Creuse', 'CREUSE', 'creuse', 'C620'),
(25, '24', 'Dordogne', 'DORDOGNE', 'dordogne', 'D6325'),
(26, '25', 'Doubs', 'DOUBS', 'doubs', 'D120'),
(27, '26', 'Drôme', 'DRÔME', 'drome', 'D650'),
(28, '27', 'Eure', 'EURE', 'eure', 'E600'),
(29, '28', 'Eure-et-Loir', 'EURE-ET-LOIR', 'eure-et-loir', 'E6346'),
(30, '29', 'Finistère', 'FINISTÈRE', 'finistere', 'F5236'),
(31, '30', 'Gard', 'GARD', 'gard', 'G630'),
(32, '31', 'Haute-Garonne', 'HAUTE-GARONNE', 'haute-garonne', 'H3265'),
(33, '32', 'Gers', 'GERS', 'gers', 'G620'),
(34, '33', 'Gironde', 'GIRONDE', 'gironde', 'G653'),
(35, '34', 'Hérault', 'HÉRAULT', 'herault', 'H643'),
(36, '35', 'Ile-et-Vilaine', 'ILE-ET-VILAINE', 'ile-et-vilaine', 'I43145'),
(37, '36', 'Indre', 'INDRE', 'indre', 'I536'),
(38, '37', 'Indre-et-Loire', 'INDRE-ET-LOIRE', 'indre-et-loire', 'I536346'),
(39, '38', 'Isère', 'ISÈRE', 'isere', 'I260'),
(40, '39', 'Jura', 'JURA', 'jura', 'J600'),
(41, '40', 'Landes', 'LANDES', 'landes', 'L532'),
(42, '41', 'Loir-et-Cher', 'LOIR-ET-CHER', 'loir-et-cher', 'L6326'),
(43, '42', 'Loire', 'LOIRE', 'loire', 'L600'),
(44, '43', 'Haute-Loire', 'HAUTE-LOIRE', 'haute-loire', 'H346'),
(45, '44', 'Loire-Atlantique', 'LOIRE-ATLANTIQUE', 'loire-atlantique', 'L634532'),
(46, '45', 'Loiret', 'LOIRET', 'loiret', 'L630'),
(47, '46', 'Lot', 'LOT', 'lot', 'L300'),
(48, '47', 'Lot-et-Garonne', 'LOT-ET-GARONNE', 'lot-et-garonne', 'L3265'),
(49, '48', 'Lozère', 'LOZÈRE', 'lozere', 'L260'),
(50, '49', 'Maine-et-Loire', 'MAINE-ET-LOIRE', 'maine-et-loire', 'M346'),
(51, '50', 'Manche', 'MANCHE', 'manche', 'M200'),
(52, '51', 'Marne', 'MARNE', 'marne', 'M650'),
(53, '52', 'Haute-Marne', 'HAUTE-MARNE', 'haute-marne', 'H3565'),
(54, '53', 'Mayenne', 'MAYENNE', 'mayenne', 'M000'),
(55, '54', 'Meurthe-et-Moselle', 'MEURTHE-ET-MOSELLE', 'meurthe-et-moselle', 'M63524'),
(56, '55', 'Meuse', 'MEUSE', 'meuse', 'M200'),
(57, '56', 'Morbihan', 'MORBIHAN', 'morbihan', 'M615'),
(58, '57', 'Moselle', 'MOSELLE', 'moselle', 'M240'),
(59, '58', 'Nièvre', 'NIÈVRE', 'nievre', 'N160'),
(60, '59', 'Nord', 'NORD', 'nord', 'N630'),
(61, '60', 'Oise', 'OISE', 'oise', 'O200'),
(62, '61', 'Orne', 'ORNE', 'orne', 'O650'),
(63, '62', 'Pas-de-Calais', 'PAS-DE-CALAIS', 'pas-de-calais', 'P23242'),
(64, '63', 'Puy-de-Dôme', 'PUY-DE-DÔME', 'puy-de-dome', 'P350'),
(65, '64', 'Pyrénées-Atlantiques', 'PYRÉNÉES-ATLANTIQUES', 'pyrenees-atlantiques', 'P65234532'),
(66, '65', 'Hautes-Pyrénées', 'HAUTES-PYRÉNÉES', 'hautes-pyrenees', 'H321652'),
(67, '66', 'Pyrénées-Orientales', 'PYRÉNÉES-ORIENTALES', 'pyrenees-orientales', 'P65265342'),
(68, '67', 'Bas-Rhin', 'BAS-RHIN', 'bas-rhin', 'B265'),
(69, '68', 'Haut-Rhin', 'HAUT-RHIN', 'haut-rhin', 'H365'),
(70, '69', 'Rhône', 'RHÔNE', 'rhone', 'R500'),
(71, '70', 'Haute-Saône', 'HAUTE-SAÔNE', 'haute-saone', 'H325'),
(72, '71', 'Saône-et-Loire', 'SAÔNE-ET-LOIRE', 'saone-et-loire', 'S5346'),
(73, '72', 'Sarthe', 'SARTHE', 'sarthe', 'S630'),
(74, '73', 'Savoie', 'SAVOIE', 'savoie', 'S100'),
(75, '74', 'Haute-Savoie', 'HAUTE-SAVOIE', 'haute-savoie', 'H321'),
(76, '75', 'Paris', 'PARIS', 'paris', 'P620'),
(77, '76', 'Seine-Maritime', 'SEINE-MARITIME', 'seine-maritime', 'S5635'),
(78, '77', 'Seine-et-Marne', 'SEINE-ET-MARNE', 'seine-et-marne', 'S53565'),
(79, '78', 'Yvelines', 'YVELINES', 'yvelines', 'Y1452'),
(80, '79', 'Deux-Sèvres', 'DEUX-SÈVRES', 'deux-sevres', 'D2162'),
(81, '80', 'Somme', 'SOMME', 'somme', 'S500'),
(82, '81', 'Tarn', 'TARN', 'tarn', 'T650'),
(83, '82', 'Tarn-et-Garonne', 'TARN-ET-GARONNE', 'tarn-et-garonne', 'T653265'),
(84, '83', 'Var', 'VAR', 'var', 'V600'),
(85, '84', 'Vaucluse', 'VAUCLUSE', 'vaucluse', 'V242'),
(86, '85', 'Vendée', 'VENDÉE', 'vendee', 'V530'),
(87, '86', 'Vienne', 'VIENNE', 'vienne', 'V500'),
(88, '87', 'Haute-Vienne', 'HAUTE-VIENNE', 'haute-vienne', 'H315'),
(89, '88', 'Vosges', 'VOSGES', 'vosges', 'V200'),
(90, '89', 'Yonne', 'YONNE', 'yonne', 'Y500'),
(91, '90', 'Territoire de Belfort', 'TERRITOIRE DE BELFORT', 'territoire-de-belfort', 'T636314163'),
(92, '91', 'Essonne', 'ESSONNE', 'essonne', 'E250'),
(93, '92', 'Hauts-de-Seine', 'HAUTS-DE-SEINE', 'hauts-de-seine', 'H32325'),
(94, '93', 'Seine-Saint-Denis', 'SEINE-SAINT-DENIS', 'seine-saint-denis', 'S525352'),
(95, '94', 'Val-de-Marne', 'VAL-DE-MARNE', 'val-de-marne', 'V43565'),
(96, '95', 'Val-d\'oise', 'VAL-D\'OISE', 'val-doise', 'V432'),
(97, '976', 'Mayotte', 'MAYOTTE', 'mayotte', 'M300'),
(98, '971', 'Guadeloupe', 'GUADELOUPE', 'guadeloupe', 'G341'),
(99, '973', 'Guyane', 'GUYANE', 'guyane', 'G500'),
(100, '972', 'Martinique', 'MARTINIQUE', 'martinique', 'M6352'),
(101, '974', 'Réunion', 'RÉUNION', 'reunion', 'R500');

-- --------------------------------------------------------

--
-- Structure de la table `fabricant`
--

CREATE TABLE `fabricant` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ad_www` varchar(50) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `ad_wwwi` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `maili` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_c1` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom_c1` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel_c1` int(10) NOT NULL,
  `mail_c1` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `q_c1` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom_c2` varchar(20) NOT NULL,
  `pre_c2` varchar(20) NOT NULL,
  `tel_c2` int(10) NOT NULL,
  `e_mail_c2` varchar(100) NOT NULL,
  `qual_c2` varchar(20) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fabricant`
--

INSERT INTO `fabricant` (`id`, `nom`, `ad_www`, `ad_wwwi`, `tel`, `mail`, `maili`, `nom_c1`, `prenom_c1`, `tel_c1`, `mail_c1`, `q_c1`, `nom_c2`, `pre_c2`, `tel_c2`, `e_mail_c2`, `qual_c2`, `logo`) VALUES
(1, 'ijino_technique', '1069 route de la beneche', '1069 route de la beneche', 610137284, 'thibaut.royer2@gmail.com', 'thibaut.royer2@gmail.com', 'thibaut', 'royer', 610137284, 'thibaut.royer2@gmail.com', '90000', '', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) NOT NULL,
  `comptes` int(2) NOT NULL,
  `saisies` int(2) NOT NULL,
  `annonces` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notifications`
--

INSERT INTO `notifications` (`id`, `comptes`, `saisies`, `annonces`) VALUES
(1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `notifications_utilisateur`
--

CREATE TABLE `notifications_utilisateur` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notifications_utilisateur`
--

INSERT INTO `notifications_utilisateur` (`id`, `email`, `message`, `active`) VALUES
(1, 'mathieu@test.fr', 'Votre annonce créée le 23/05/2017, portant le nom adza a été validée par un administrateur.', 0),
(2, 'mathieu@test.fr', 'Votre annonce crÃ©Ã©e le 23/05/2017, portant le nom dazda a Ã©tÃ© validÃ©e par un administrateur.', 0),
(3, 'mathieu@test.fr', 'Votre annonce crÃ©Ã©e le 23/05/2017, portant le nom \'fazef\' a Ã©tÃ© validÃ©e par un administrateur.', 0),
(4, 'test@test.fr', 'Votre annonce crÃ©Ã©e le 24/05/2017, portant le nom \'grzegr\' a Ã©tÃ© validÃ©e par un administrateur.', 0),
(5, 'test@test.fr', 'Votre annonce crÃ©Ã©e le 24/05/2017, portant le nom \'fzef\' a Ã©tÃ© validÃ©e par un administrateur.', 0),
(6, 'admin@test.fr', 'Votre annonce crÃ©Ã©e le 24/05/2017, portant le nom \'dazda\' a Ã©tÃ© validÃ©e par un administrateur.', 0),
(7, 'admin@test.fr', 'Votre annonce crÃ©Ã©e le 24/05/2017, portant le nom \'dfzdaz\' a Ã©tÃ© validÃ©e par un administrateur.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `susp_materiaux`
--

CREATE TABLE `susp_materiaux` (
  `id` int(11) NOT NULL,
  `id_fab` int(11) NOT NULL,
  `ref` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `eq1` int(11) NOT NULL,
  `eq2` int(11) NOT NULL,
  `eq3` int(11) NOT NULL,
  `mat` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rupture` int(11) NOT NULL,
  `diam` int(11) NOT NULL,
  `couleur` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `susp_materiaux`
--

INSERT INTO `susp_materiaux` (`id`, `id_fab`, `ref`, `eq1`, `eq2`, `eq3`, `mat`, `rupture`, `diam`, `couleur`) VALUES
(1, 10, 'var', 2, 20, 200, 'carbonne', 100, 200, 'red'),
(2, 1, 'test', 1, 1, 1, 'ae', 0, 0, 'e'),
(3, 1, 'matraiqux 1', 1, 2, 0, 'fer', 434, 40, 'rouge '),
(4, 1, 'matra', 0, 0, 0, '', 0, 0, ''),
(5, 1, 'efef', 2, 1, 4, 'ezfzef', 0, 0, 'ezfefzef');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_articles`
--

CREATE TABLE `tarifs_articles` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `tarifht` decimal(10,2) DEFAULT NULL,
  `tarifttc` decimal(10,2) DEFAULT NULL,
  `pourcent` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarifs_articles`
--

INSERT INTO `tarifs_articles` (`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES
(1, 'dvkdjfbgbdesrgbsr', '7.00', '9.00', '50'),
(2, 'Tarif unitaire à partir de la deuxième', '10.00', '8.00', '50'),
(3, 'Tarif unitaire à partir de la cinquième	', '20.00', '7.00', '50'),
(4, 'Magic-bag 260(taille S), 280(taille M) ou 300 (taille L)', '40.00', '49.00', '50'),
(5, 'Tarif unitaire à partir de la deuxième', '10.00', '44.00', '50'),
(6, 'Tarif unitaire à partir de la cinquième', '20.00', '39.00', '50'),
(7, 'Magic-bag biplace 340 ou 360', '43.00', '52.00', '50'),
(8, 'Tarif unitaire à partir de la deuxième', '10.00', '46.00', '50'),
(9, 'Tarif unitaire à partir de la cinquième', '20.00', '41.00', '50'),
(10, 'Tibo', '10.00', '12.00', '50');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_reparation`
--

CREATE TABLE `tarifs_reparation` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `tarifht` decimal(10,2) DEFAULT NULL,
  `tarifttc` decimal(10,2) DEFAULT NULL,
  `pourcent` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarifs_reparation`
--

INSERT INTO `tarifs_reparation` (`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES
(1, 'Remplacement suspente', '15.00', '18.00', '50'),
(2, 'Tarif unitaire à partir de la deuxième', '15.00', '15.00', '50'),
(3, 'Tarif unitaire à partir de la cinquième', '30.00', '12.00', '50'),
(4, 'Remplacement caisson partiel ', '62.00', '75.00', '50'),
(5, 'Remplacement caisson', '125.00', '150.00', '50'),
(6, 'Heure atelier', '33.00', '40.00', '50');

-- --------------------------------------------------------

--
-- Structure de la table `tarifs_revision`
--

CREATE TABLE `tarifs_revision` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `tarifht` decimal(10,2) DEFAULT NULL,
  `tarifttc` decimal(10,2) DEFAULT NULL,
  `pourcent` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarifs_revision`
--

INSERT INTO `tarifs_revision` (`id`, `nom`, `tarifht`, `tarifttc`, `pourcent`) VALUES
(1, 'Révision parapente', '91.00', '110.00', '50'),
(2, 'Révision biplace +10%	', '100.00', '121.00', '10'),
(3, 'Recalage parapente', '25.00', '30.00', '15'),
(4, 'Recalage biplace +10%', '27.00', '33.00', '50'),
(5, 'Changement suspente', '9.00', '11.00', '50'),
(6, 'Remplacement caisson partiel ', '50.00', '60.00', '50'),
(7, 'Remplacement caisson', '100.00', '120.00', '50'),
(8, 'Commande d\'un Magic-bag', '33.00', '40.00', '50'),
(9, 'Pliage secours', '29.00', '35.00', '50'),
(10, 'Heure atelier', '33.00', '40.00', '50');

-- --------------------------------------------------------

--
-- Structure de la table `voile`
--

CREATE TABLE `voile` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id_const` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nb_tail` int(1) NOT NULL,
  `date_s` varchar(10) NOT NULL,
  `cert` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `plan` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `manuel` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `valider` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voile`
--

INSERT INTO `voile` (`id`, `nom`, `id_const`, `nb_tail`, `date_s`, `cert`, `plan`, `manuel`, `valider`) VALUES
(77, 'IJINO', '1', 4, '16/05/1997', 'rgsth', 'sgrtgs.pdf', 'sgrtgs.pdf', 0),
(76, 'moi', '1', 2, 'zerzersefs', 'zerzer', 'moi_plan0.pdf', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `voile_assemblage_sup`
--

CREATE TABLE `voile_assemblage_sup` (
  `idvoile` varchar(20) NOT NULL DEFAULT '',
  `A1` varchar(10) DEFAULT NULL,
  `A2` varchar(10) DEFAULT NULL,
  `A3` varchar(10) DEFAULT NULL,
  `A4` varchar(10) DEFAULT NULL,
  `A5` varchar(10) DEFAULT NULL,
  `A6` varchar(10) DEFAULT NULL,
  `A7` varchar(10) DEFAULT NULL,
  `A8` varchar(10) DEFAULT NULL,
  `A9` varchar(10) DEFAULT NULL,
  `A10` varchar(10) DEFAULT NULL,
  `A11` varchar(10) DEFAULT NULL,
  `A12` varchar(10) DEFAULT NULL,
  `A13` varchar(10) DEFAULT NULL,
  `A14` varchar(10) DEFAULT NULL,
  `A15` varchar(10) DEFAULT NULL,
  `A16` varchar(10) DEFAULT NULL,
  `A17` varchar(10) DEFAULT NULL,
  `A18` varchar(10) DEFAULT NULL,
  `A19` varchar(10) DEFAULT NULL,
  `A20` varchar(10) DEFAULT NULL,
  `A21` varchar(10) DEFAULT NULL,
  `A22` varchar(10) DEFAULT NULL,
  `A23` varchar(10) DEFAULT NULL,
  `A24` varchar(10) DEFAULT NULL,
  `A25` varchar(10) DEFAULT NULL,
  `B1` varchar(10) DEFAULT NULL,
  `B2` varchar(10) DEFAULT NULL,
  `B3` varchar(10) DEFAULT NULL,
  `B4` varchar(10) DEFAULT NULL,
  `B5` varchar(10) DEFAULT NULL,
  `B6` varchar(10) DEFAULT NULL,
  `B7` varchar(10) DEFAULT NULL,
  `B8` varchar(10) DEFAULT NULL,
  `B9` varchar(10) DEFAULT NULL,
  `B10` varchar(10) DEFAULT NULL,
  `B11` varchar(10) DEFAULT NULL,
  `B12` varchar(10) DEFAULT NULL,
  `B13` varchar(10) DEFAULT NULL,
  `B14` varchar(10) DEFAULT NULL,
  `B15` varchar(10) DEFAULT NULL,
  `B16` varchar(10) DEFAULT NULL,
  `B17` varchar(10) DEFAULT NULL,
  `B18` varchar(10) DEFAULT NULL,
  `B19` varchar(10) DEFAULT NULL,
  `B20` varchar(10) DEFAULT NULL,
  `B21` varchar(10) DEFAULT NULL,
  `B22` varchar(10) DEFAULT NULL,
  `B23` varchar(10) DEFAULT NULL,
  `B24` varchar(10) DEFAULT NULL,
  `B25` varchar(10) DEFAULT NULL,
  `C1` varchar(10) DEFAULT NULL,
  `C2` varchar(10) DEFAULT NULL,
  `C3` varchar(10) DEFAULT NULL,
  `C4` varchar(10) DEFAULT NULL,
  `C5` varchar(10) DEFAULT NULL,
  `C6` varchar(10) DEFAULT NULL,
  `C7` varchar(10) DEFAULT NULL,
  `C8` varchar(10) DEFAULT NULL,
  `C9` varchar(10) DEFAULT NULL,
  `C10` varchar(10) DEFAULT NULL,
  `C11` varchar(10) DEFAULT NULL,
  `C12` varchar(10) DEFAULT NULL,
  `C13` varchar(10) DEFAULT NULL,
  `C14` varchar(10) DEFAULT NULL,
  `C15` varchar(10) DEFAULT NULL,
  `C16` varchar(10) DEFAULT NULL,
  `C17` varchar(10) DEFAULT NULL,
  `C18` varchar(10) DEFAULT NULL,
  `C19` varchar(10) DEFAULT NULL,
  `C20` varchar(10) DEFAULT NULL,
  `C21` varchar(10) DEFAULT NULL,
  `C22` varchar(10) DEFAULT NULL,
  `C23` varchar(10) DEFAULT NULL,
  `C24` varchar(10) DEFAULT NULL,
  `C25` varchar(10) DEFAULT NULL,
  `D1` varchar(10) DEFAULT NULL,
  `D2` varchar(10) DEFAULT NULL,
  `D3` varchar(10) DEFAULT NULL,
  `D4` varchar(10) DEFAULT NULL,
  `D5` varchar(10) DEFAULT NULL,
  `D6` varchar(10) DEFAULT NULL,
  `D7` varchar(10) DEFAULT NULL,
  `D8` varchar(10) DEFAULT NULL,
  `D9` varchar(10) DEFAULT NULL,
  `D10` varchar(10) DEFAULT NULL,
  `D11` varchar(10) DEFAULT NULL,
  `D12` varchar(10) DEFAULT NULL,
  `D13` varchar(10) DEFAULT NULL,
  `D14` varchar(10) DEFAULT NULL,
  `D15` varchar(10) DEFAULT NULL,
  `D16` varchar(10) DEFAULT NULL,
  `D17` varchar(10) DEFAULT NULL,
  `D18` varchar(10) DEFAULT NULL,
  `D19` varchar(10) DEFAULT NULL,
  `D20` varchar(10) DEFAULT NULL,
  `D21` varchar(10) DEFAULT NULL,
  `D22` varchar(10) DEFAULT NULL,
  `D23` varchar(10) DEFAULT NULL,
  `D24` varchar(10) DEFAULT NULL,
  `D25` varchar(10) DEFAULT NULL,
  `E1` varchar(10) DEFAULT NULL,
  `E2` varchar(10) DEFAULT NULL,
  `E3` varchar(10) DEFAULT NULL,
  `E4` varchar(10) DEFAULT NULL,
  `E5` varchar(10) DEFAULT NULL,
  `E6` varchar(10) DEFAULT NULL,
  `E7` varchar(10) DEFAULT NULL,
  `E8` varchar(10) DEFAULT NULL,
  `E9` varchar(10) DEFAULT NULL,
  `E10` varchar(10) DEFAULT NULL,
  `E11` varchar(10) DEFAULT NULL,
  `E12` varchar(10) DEFAULT NULL,
  `E13` varchar(10) DEFAULT NULL,
  `E14` varchar(10) DEFAULT NULL,
  `E15` varchar(10) DEFAULT NULL,
  `E16` varchar(10) DEFAULT NULL,
  `E17` varchar(10) DEFAULT NULL,
  `E18` varchar(10) DEFAULT NULL,
  `E19` varchar(10) DEFAULT NULL,
  `E20` varchar(10) DEFAULT NULL,
  `E21` varchar(10) DEFAULT NULL,
  `E22` varchar(10) DEFAULT NULL,
  `E23` varchar(10) DEFAULT NULL,
  `E24` varchar(10) DEFAULT NULL,
  `E25` varchar(10) DEFAULT NULL,
  `BR1` varchar(10) DEFAULT NULL,
  `BR2` varchar(10) DEFAULT NULL,
  `BR3` varchar(10) DEFAULT NULL,
  `BR4` varchar(10) DEFAULT NULL,
  `BR5` varchar(10) DEFAULT NULL,
  `BR6` varchar(10) DEFAULT NULL,
  `BR7` varchar(10) DEFAULT NULL,
  `BR8` varchar(10) DEFAULT NULL,
  `BR9` varchar(10) DEFAULT NULL,
  `BR10` varchar(10) DEFAULT NULL,
  `BR11` varchar(10) DEFAULT NULL,
  `BR12` varchar(10) DEFAULT NULL,
  `BR13` varchar(10) DEFAULT NULL,
  `BR14` varchar(10) DEFAULT NULL,
  `BR15` varchar(10) DEFAULT NULL,
  `BR16` varchar(10) DEFAULT NULL,
  `BR17` varchar(10) DEFAULT NULL,
  `BR18` varchar(10) DEFAULT NULL,
  `BR19` varchar(10) DEFAULT NULL,
  `BR20` varchar(10) DEFAULT NULL,
  `BR21` varchar(10) DEFAULT NULL,
  `BR22` varchar(10) DEFAULT NULL,
  `BR23` varchar(10) DEFAULT NULL,
  `BR24` varchar(10) DEFAULT NULL,
  `BR25` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `voile_controle_long`
--

CREATE TABLE `voile_controle_long` (
  `idvoile` varchar(20) NOT NULL DEFAULT '',
  `A1` varchar(10) DEFAULT NULL,
  `A2` varchar(10) DEFAULT NULL,
  `A3` varchar(10) DEFAULT NULL,
  `A4` varchar(10) DEFAULT NULL,
  `A5` varchar(10) DEFAULT NULL,
  `A6` varchar(10) DEFAULT NULL,
  `A7` varchar(10) DEFAULT NULL,
  `A8` varchar(10) DEFAULT NULL,
  `A9` varchar(10) DEFAULT NULL,
  `A10` varchar(10) DEFAULT NULL,
  `A11` varchar(10) DEFAULT NULL,
  `A12` varchar(10) DEFAULT NULL,
  `A13` varchar(10) DEFAULT NULL,
  `A14` varchar(10) DEFAULT NULL,
  `A15` varchar(10) DEFAULT NULL,
  `A16` varchar(10) DEFAULT NULL,
  `A17` varchar(10) DEFAULT NULL,
  `A18` varchar(10) DEFAULT NULL,
  `A19` varchar(10) DEFAULT NULL,
  `A20` varchar(10) DEFAULT NULL,
  `A21` varchar(10) DEFAULT NULL,
  `A22` varchar(10) DEFAULT NULL,
  `A23` varchar(10) DEFAULT NULL,
  `A24` varchar(10) DEFAULT NULL,
  `A25` varchar(10) DEFAULT NULL,
  `B1` varchar(10) DEFAULT NULL,
  `B2` varchar(10) DEFAULT NULL,
  `B3` varchar(10) DEFAULT NULL,
  `B4` varchar(10) DEFAULT NULL,
  `B5` varchar(10) DEFAULT NULL,
  `B6` varchar(10) DEFAULT NULL,
  `B7` varchar(10) DEFAULT NULL,
  `B8` varchar(10) DEFAULT NULL,
  `B9` varchar(10) DEFAULT NULL,
  `B10` varchar(10) DEFAULT NULL,
  `B11` varchar(10) DEFAULT NULL,
  `B12` varchar(10) DEFAULT NULL,
  `B13` varchar(10) DEFAULT NULL,
  `B14` varchar(10) DEFAULT NULL,
  `B15` varchar(10) DEFAULT NULL,
  `B16` varchar(10) DEFAULT NULL,
  `B17` varchar(10) DEFAULT NULL,
  `B18` varchar(10) DEFAULT NULL,
  `B19` varchar(10) DEFAULT NULL,
  `B20` varchar(10) DEFAULT NULL,
  `B21` varchar(10) DEFAULT NULL,
  `B22` varchar(10) DEFAULT NULL,
  `B23` varchar(10) DEFAULT NULL,
  `B24` varchar(10) DEFAULT NULL,
  `B25` varchar(10) DEFAULT NULL,
  `C1` varchar(10) DEFAULT NULL,
  `C2` varchar(10) DEFAULT NULL,
  `C3` varchar(10) DEFAULT NULL,
  `C4` varchar(10) DEFAULT NULL,
  `C5` varchar(10) DEFAULT NULL,
  `C6` varchar(10) DEFAULT NULL,
  `C7` varchar(10) DEFAULT NULL,
  `C8` varchar(10) DEFAULT NULL,
  `C9` varchar(10) DEFAULT NULL,
  `C10` varchar(10) DEFAULT NULL,
  `C11` varchar(10) DEFAULT NULL,
  `C12` varchar(10) DEFAULT NULL,
  `C13` varchar(10) DEFAULT NULL,
  `C14` varchar(10) DEFAULT NULL,
  `C15` varchar(10) DEFAULT NULL,
  `C16` varchar(10) DEFAULT NULL,
  `C17` varchar(10) DEFAULT NULL,
  `C18` varchar(10) DEFAULT NULL,
  `C19` varchar(10) DEFAULT NULL,
  `C20` varchar(10) DEFAULT NULL,
  `C21` varchar(10) DEFAULT NULL,
  `C22` varchar(10) DEFAULT NULL,
  `C23` varchar(10) DEFAULT NULL,
  `C24` varchar(10) DEFAULT NULL,
  `C25` varchar(10) DEFAULT NULL,
  `D1` varchar(10) DEFAULT NULL,
  `D2` varchar(10) DEFAULT NULL,
  `D3` varchar(10) DEFAULT NULL,
  `D4` varchar(10) DEFAULT NULL,
  `D5` varchar(10) DEFAULT NULL,
  `D6` varchar(10) DEFAULT NULL,
  `D7` varchar(10) DEFAULT NULL,
  `D8` varchar(10) DEFAULT NULL,
  `D9` varchar(10) DEFAULT NULL,
  `D10` varchar(10) DEFAULT NULL,
  `D11` varchar(10) DEFAULT NULL,
  `D12` varchar(10) DEFAULT NULL,
  `D13` varchar(10) DEFAULT NULL,
  `D14` varchar(10) DEFAULT NULL,
  `D15` varchar(10) DEFAULT NULL,
  `D16` varchar(10) DEFAULT NULL,
  `D17` varchar(10) DEFAULT NULL,
  `D18` varchar(10) DEFAULT NULL,
  `D19` varchar(10) DEFAULT NULL,
  `D20` varchar(10) DEFAULT NULL,
  `D21` varchar(10) DEFAULT NULL,
  `D22` varchar(10) DEFAULT NULL,
  `D23` varchar(10) DEFAULT NULL,
  `D24` varchar(10) DEFAULT NULL,
  `D25` varchar(10) DEFAULT NULL,
  `E1` varchar(10) DEFAULT NULL,
  `E2` varchar(10) DEFAULT NULL,
  `E3` varchar(10) DEFAULT NULL,
  `E4` varchar(10) DEFAULT NULL,
  `E5` varchar(10) DEFAULT NULL,
  `E6` varchar(10) DEFAULT NULL,
  `E7` varchar(10) DEFAULT NULL,
  `E8` varchar(10) DEFAULT NULL,
  `E9` varchar(10) DEFAULT NULL,
  `E10` varchar(10) DEFAULT NULL,
  `E11` varchar(10) DEFAULT NULL,
  `E12` varchar(10) DEFAULT NULL,
  `E13` varchar(10) DEFAULT NULL,
  `E14` varchar(10) DEFAULT NULL,
  `E15` varchar(10) DEFAULT NULL,
  `E16` varchar(10) DEFAULT NULL,
  `E17` varchar(10) DEFAULT NULL,
  `E18` varchar(10) DEFAULT NULL,
  `E19` varchar(10) DEFAULT NULL,
  `E20` varchar(10) DEFAULT NULL,
  `E21` varchar(10) DEFAULT NULL,
  `E22` varchar(10) DEFAULT NULL,
  `E23` varchar(10) DEFAULT NULL,
  `E24` varchar(10) DEFAULT NULL,
  `E25` varchar(10) DEFAULT NULL,
  `BR1` varchar(10) DEFAULT NULL,
  `BR2` varchar(10) DEFAULT NULL,
  `BR3` varchar(10) DEFAULT NULL,
  `BR4` varchar(10) DEFAULT NULL,
  `BR5` varchar(10) DEFAULT NULL,
  `BR6` varchar(10) DEFAULT NULL,
  `BR7` varchar(10) DEFAULT NULL,
  `BR8` varchar(10) DEFAULT NULL,
  `BR9` varchar(10) DEFAULT NULL,
  `BR10` varchar(10) DEFAULT NULL,
  `BR11` varchar(10) DEFAULT NULL,
  `BR12` varchar(10) DEFAULT NULL,
  `BR13` varchar(10) DEFAULT NULL,
  `BR14` varchar(10) DEFAULT NULL,
  `BR15` varchar(10) DEFAULT NULL,
  `BR16` varchar(10) DEFAULT NULL,
  `BR17` varchar(10) DEFAULT NULL,
  `BR18` varchar(10) DEFAULT NULL,
  `BR19` varchar(10) DEFAULT NULL,
  `BR20` varchar(10) DEFAULT NULL,
  `BR21` varchar(10) DEFAULT NULL,
  `BR22` varchar(10) DEFAULT NULL,
  `BR23` varchar(10) DEFAULT NULL,
  `BR24` varchar(10) DEFAULT NULL,
  `BR25` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `voile_long_susp_cut`
--

CREATE TABLE `voile_long_susp_cut` (
  `idvoile` varchar(20) NOT NULL,
  `r1` varchar(10) DEFAULT NULL,
  `r2` varchar(10) DEFAULT NULL,
  `r3` varchar(10) DEFAULT NULL,
  `r4` varchar(10) DEFAULT NULL,
  `r5` varchar(10) DEFAULT NULL,
  `r6` varchar(10) DEFAULT NULL,
  `r7` varchar(10) DEFAULT NULL,
  `r8` varchar(10) DEFAULT NULL,
  `r9` varchar(10) DEFAULT NULL,
  `r10` varchar(10) DEFAULT NULL,
  `r11` varchar(10) DEFAULT NULL,
  `r12` varchar(10) DEFAULT NULL,
  `r13` varchar(10) DEFAULT NULL,
  `r14` varchar(10) DEFAULT NULL,
  `r15` varchar(10) DEFAULT NULL,
  `r16` varchar(10) DEFAULT NULL,
  `r17` varchar(10) DEFAULT NULL,
  `r18` varchar(10) DEFAULT NULL,
  `r19` varchar(10) DEFAULT NULL,
  `r20` varchar(10) DEFAULT NULL,
  `r21` varchar(10) DEFAULT NULL,
  `r22` varchar(10) DEFAULT NULL,
  `r23` varchar(10) DEFAULT NULL,
  `r24` varchar(10) DEFAULT NULL,
  `r25` varchar(10) DEFAULT NULL,
  `r26` varchar(10) DEFAULT NULL,
  `r27` varchar(10) DEFAULT NULL,
  `r28` varchar(10) DEFAULT NULL,
  `r29` varchar(10) DEFAULT NULL,
  `r30` varchar(10) DEFAULT NULL,
  `r31` varchar(10) DEFAULT NULL,
  `r32` varchar(10) DEFAULT NULL,
  `r33` varchar(10) DEFAULT NULL,
  `r34` varchar(10) DEFAULT NULL,
  `r35` varchar(10) DEFAULT NULL,
  `r36` varchar(10) DEFAULT NULL,
  `r37` varchar(10) DEFAULT NULL,
  `r38` varchar(10) DEFAULT NULL,
  `r39` varchar(10) DEFAULT NULL,
  `r40` varchar(10) DEFAULT NULL,
  `r41` varchar(10) DEFAULT NULL,
  `r42` varchar(10) DEFAULT NULL,
  `r43` varchar(10) DEFAULT NULL,
  `r44` varchar(10) DEFAULT NULL,
  `r45` varchar(10) DEFAULT NULL,
  `r46` varchar(10) DEFAULT NULL,
  `r47` varchar(10) DEFAULT NULL,
  `r48` varchar(10) DEFAULT NULL,
  `r49` varchar(10) DEFAULT NULL,
  `r50` varchar(10) DEFAULT NULL,
  `r51` varchar(10) DEFAULT NULL,
  `r52` varchar(10) DEFAULT NULL,
  `r53` varchar(10) DEFAULT NULL,
  `r54` varchar(10) DEFAULT NULL,
  `r55` varchar(10) DEFAULT NULL,
  `r56` varchar(10) DEFAULT NULL,
  `r57` varchar(10) DEFAULT NULL,
  `r58` varchar(10) DEFAULT NULL,
  `r59` varchar(10) DEFAULT NULL,
  `r60` varchar(10) DEFAULT NULL,
  `r61` varchar(10) DEFAULT NULL,
  `r62` varchar(10) DEFAULT NULL,
  `r63` varchar(10) DEFAULT NULL,
  `r64` varchar(10) DEFAULT NULL,
  `r65` varchar(10) DEFAULT NULL,
  `r66` varchar(10) DEFAULT NULL,
  `r67` varchar(10) DEFAULT NULL,
  `r68` varchar(10) DEFAULT NULL,
  `r69` varchar(10) DEFAULT NULL,
  `r70` varchar(10) DEFAULT NULL,
  `r71` varchar(10) DEFAULT NULL,
  `r72` varchar(10) DEFAULT NULL,
  `r73` varchar(10) DEFAULT NULL,
  `r74` varchar(10) DEFAULT NULL,
  `r75` varchar(10) DEFAULT NULL,
  `r76` varchar(10) DEFAULT NULL,
  `r77` varchar(10) DEFAULT NULL,
  `r78` varchar(10) DEFAULT NULL,
  `r79` varchar(10) DEFAULT NULL,
  `r80` varchar(10) DEFAULT NULL,
  `r81` varchar(10) DEFAULT NULL,
  `r82` varchar(10) DEFAULT NULL,
  `r83` varchar(10) DEFAULT NULL,
  `r84` varchar(10) DEFAULT NULL,
  `r85` varchar(10) DEFAULT NULL,
  `r86` varchar(10) DEFAULT NULL,
  `r87` varchar(10) DEFAULT NULL,
  `r88` varchar(10) DEFAULT NULL,
  `r89` varchar(10) DEFAULT NULL,
  `r90` varchar(10) DEFAULT NULL,
  `r91` varchar(10) DEFAULT NULL,
  `r92` varchar(10) DEFAULT NULL,
  `r93` varchar(10) DEFAULT NULL,
  `r94` varchar(10) DEFAULT NULL,
  `r95` varchar(10) DEFAULT NULL,
  `r96` varchar(10) DEFAULT NULL,
  `r97` varchar(10) DEFAULT NULL,
  `r98` varchar(10) DEFAULT NULL,
  `r99` varchar(10) DEFAULT NULL,
  `r100` varchar(10) DEFAULT NULL,
  `r101` varchar(10) DEFAULT NULL,
  `r102` varchar(10) DEFAULT NULL,
  `r103` varchar(10) DEFAULT NULL,
  `r104` varchar(10) DEFAULT NULL,
  `r105` varchar(10) DEFAULT NULL,
  `r106` varchar(10) DEFAULT NULL,
  `r107` varchar(10) DEFAULT NULL,
  `r108` varchar(10) DEFAULT NULL,
  `r109` varchar(10) DEFAULT NULL,
  `r110` varchar(10) DEFAULT NULL,
  `r111` varchar(10) DEFAULT NULL,
  `r112` varchar(10) DEFAULT NULL,
  `r113` varchar(10) DEFAULT NULL,
  `r114` varchar(10) DEFAULT NULL,
  `r115` varchar(10) DEFAULT NULL,
  `r116` varchar(10) DEFAULT NULL,
  `r117` varchar(10) DEFAULT NULL,
  `r118` varchar(10) DEFAULT NULL,
  `r119` varchar(10) DEFAULT NULL,
  `r120` varchar(10) DEFAULT NULL,
  `r121` varchar(10) DEFAULT NULL,
  `r122` varchar(10) DEFAULT NULL,
  `r123` varchar(10) DEFAULT NULL,
  `r124` varchar(10) DEFAULT NULL,
  `r125` varchar(10) DEFAULT NULL,
  `r126` varchar(10) DEFAULT NULL,
  `r127` varchar(10) DEFAULT NULL,
  `r128` varchar(10) DEFAULT NULL,
  `r129` varchar(10) DEFAULT NULL,
  `r130` varchar(10) DEFAULT NULL,
  `r131` varchar(10) DEFAULT NULL,
  `r132` varchar(10) DEFAULT NULL,
  `r133` varchar(10) DEFAULT NULL,
  `r134` varchar(10) DEFAULT NULL,
  `r135` varchar(10) DEFAULT NULL,
  `r136` varchar(10) DEFAULT NULL,
  `r137` varchar(10) DEFAULT NULL,
  `r138` varchar(10) DEFAULT NULL,
  `r139` varchar(10) DEFAULT NULL,
  `r140` varchar(10) DEFAULT NULL,
  `r141` varchar(10) DEFAULT NULL,
  `r142` varchar(10) DEFAULT NULL,
  `r143` varchar(10) DEFAULT NULL,
  `r144` varchar(10) DEFAULT NULL,
  `r145` varchar(10) DEFAULT NULL,
  `r146` varchar(10) DEFAULT NULL,
  `r147` varchar(10) DEFAULT NULL,
  `r148` varchar(10) DEFAULT NULL,
  `r149` varchar(10) DEFAULT NULL,
  `r150` varchar(10) DEFAULT NULL,
  `r151` varchar(10) DEFAULT NULL,
  `r152` varchar(10) DEFAULT NULL,
  `r153` varchar(10) DEFAULT NULL,
  `r154` varchar(10) DEFAULT NULL,
  `r155` varchar(10) DEFAULT NULL,
  `r156` varchar(10) DEFAULT NULL,
  `r157` varchar(10) DEFAULT NULL,
  `r158` varchar(10) DEFAULT NULL,
  `r159` varchar(10) DEFAULT NULL,
  `r160` varchar(10) DEFAULT NULL,
  `r161` varchar(10) DEFAULT NULL,
  `r162` varchar(10) DEFAULT NULL,
  `r163` varchar(10) DEFAULT NULL,
  `r164` varchar(10) DEFAULT NULL,
  `r165` varchar(10) DEFAULT NULL,
  `r166` varchar(10) DEFAULT NULL,
  `r167` varchar(10) DEFAULT NULL,
  `r168` varchar(10) DEFAULT NULL,
  `r169` varchar(10) DEFAULT NULL,
  `r170` varchar(10) DEFAULT NULL,
  `r171` varchar(10) DEFAULT NULL,
  `r172` varchar(10) DEFAULT NULL,
  `r173` varchar(10) DEFAULT NULL,
  `r174` varchar(10) DEFAULT NULL,
  `r175` varchar(10) DEFAULT NULL,
  `r176` varchar(10) DEFAULT NULL,
  `r177` varchar(10) DEFAULT NULL,
  `r178` varchar(10) DEFAULT NULL,
  `r179` varchar(10) DEFAULT NULL,
  `r180` varchar(10) DEFAULT NULL,
  `r181` varchar(10) DEFAULT NULL,
  `r182` varchar(10) DEFAULT NULL,
  `r183` varchar(10) DEFAULT NULL,
  `r184` varchar(10) DEFAULT NULL,
  `r185` varchar(10) DEFAULT NULL,
  `r186` varchar(10) DEFAULT NULL,
  `r187` varchar(10) DEFAULT NULL,
  `r188` varchar(10) DEFAULT NULL,
  `r189` varchar(10) DEFAULT NULL,
  `r190` varchar(10) DEFAULT NULL,
  `r191` varchar(10) DEFAULT NULL,
  `r192` varchar(10) DEFAULT NULL,
  `r193` varchar(10) DEFAULT NULL,
  `r194` varchar(10) DEFAULT NULL,
  `r195` varchar(10) DEFAULT NULL,
  `r196` varchar(10) DEFAULT NULL,
  `r197` varchar(10) DEFAULT NULL,
  `r198` varchar(10) DEFAULT NULL,
  `r199` varchar(10) DEFAULT NULL,
  `r200` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `voile_mat_susp_cut`
--

CREATE TABLE `voile_mat_susp_cut` (
  `idvoile` varchar(20) NOT NULL,
  `r1` varchar(10) DEFAULT NULL,
  `r2` varchar(10) DEFAULT NULL,
  `r3` varchar(10) DEFAULT NULL,
  `r4` varchar(10) DEFAULT NULL,
  `r5` varchar(10) DEFAULT NULL,
  `r6` varchar(10) DEFAULT NULL,
  `r7` varchar(10) DEFAULT NULL,
  `r8` varchar(10) DEFAULT NULL,
  `r9` varchar(10) DEFAULT NULL,
  `r10` varchar(10) DEFAULT NULL,
  `r11` varchar(10) DEFAULT NULL,
  `r12` varchar(10) DEFAULT NULL,
  `r13` varchar(10) DEFAULT NULL,
  `r14` varchar(10) DEFAULT NULL,
  `r15` varchar(10) DEFAULT NULL,
  `r16` varchar(10) DEFAULT NULL,
  `r17` varchar(10) DEFAULT NULL,
  `r18` varchar(10) DEFAULT NULL,
  `r19` varchar(10) DEFAULT NULL,
  `r20` varchar(10) DEFAULT NULL,
  `r21` varchar(10) DEFAULT NULL,
  `r22` varchar(10) DEFAULT NULL,
  `r23` varchar(10) DEFAULT NULL,
  `r24` varchar(10) DEFAULT NULL,
  `r25` varchar(10) DEFAULT NULL,
  `r26` varchar(10) DEFAULT NULL,
  `r27` varchar(10) DEFAULT NULL,
  `r28` varchar(10) DEFAULT NULL,
  `r29` varchar(10) DEFAULT NULL,
  `r30` varchar(10) DEFAULT NULL,
  `r31` varchar(10) DEFAULT NULL,
  `r32` varchar(10) DEFAULT NULL,
  `r33` varchar(10) DEFAULT NULL,
  `r34` varchar(10) DEFAULT NULL,
  `r35` varchar(10) DEFAULT NULL,
  `r36` varchar(10) DEFAULT NULL,
  `r37` varchar(10) DEFAULT NULL,
  `r38` varchar(10) DEFAULT NULL,
  `r39` varchar(10) DEFAULT NULL,
  `r40` varchar(10) DEFAULT NULL,
  `r41` varchar(10) DEFAULT NULL,
  `r42` varchar(10) DEFAULT NULL,
  `r43` varchar(10) DEFAULT NULL,
  `r44` varchar(10) DEFAULT NULL,
  `r45` varchar(10) DEFAULT NULL,
  `r46` varchar(10) DEFAULT NULL,
  `r47` varchar(10) DEFAULT NULL,
  `r48` varchar(10) DEFAULT NULL,
  `r49` varchar(10) DEFAULT NULL,
  `r50` varchar(10) DEFAULT NULL,
  `r51` varchar(10) DEFAULT NULL,
  `r52` varchar(10) DEFAULT NULL,
  `r53` varchar(10) DEFAULT NULL,
  `r54` varchar(10) DEFAULT NULL,
  `r55` varchar(10) DEFAULT NULL,
  `r56` varchar(10) DEFAULT NULL,
  `r57` varchar(10) DEFAULT NULL,
  `r58` varchar(10) DEFAULT NULL,
  `r59` varchar(10) DEFAULT NULL,
  `r60` varchar(10) DEFAULT NULL,
  `r61` varchar(10) DEFAULT NULL,
  `r62` varchar(10) DEFAULT NULL,
  `r63` varchar(10) DEFAULT NULL,
  `r64` varchar(10) DEFAULT NULL,
  `r65` varchar(10) DEFAULT NULL,
  `r66` varchar(10) DEFAULT NULL,
  `r67` varchar(10) DEFAULT NULL,
  `r68` varchar(10) DEFAULT NULL,
  `r69` varchar(10) DEFAULT NULL,
  `r70` varchar(10) DEFAULT NULL,
  `r71` varchar(10) DEFAULT NULL,
  `r72` varchar(10) DEFAULT NULL,
  `r73` varchar(10) DEFAULT NULL,
  `r74` varchar(10) DEFAULT NULL,
  `r75` varchar(10) DEFAULT NULL,
  `r76` varchar(10) DEFAULT NULL,
  `r77` varchar(10) DEFAULT NULL,
  `r78` varchar(10) DEFAULT NULL,
  `r79` varchar(10) DEFAULT NULL,
  `r80` varchar(10) DEFAULT NULL,
  `r81` varchar(10) DEFAULT NULL,
  `r82` varchar(10) DEFAULT NULL,
  `r83` varchar(10) DEFAULT NULL,
  `r84` varchar(10) DEFAULT NULL,
  `r85` varchar(10) DEFAULT NULL,
  `r86` varchar(10) DEFAULT NULL,
  `r87` varchar(10) DEFAULT NULL,
  `r88` varchar(10) DEFAULT NULL,
  `r89` varchar(10) DEFAULT NULL,
  `r90` varchar(10) DEFAULT NULL,
  `r91` varchar(10) DEFAULT NULL,
  `r92` varchar(10) DEFAULT NULL,
  `r93` varchar(10) DEFAULT NULL,
  `r94` varchar(10) DEFAULT NULL,
  `r95` varchar(10) DEFAULT NULL,
  `r96` varchar(10) DEFAULT NULL,
  `r97` varchar(10) DEFAULT NULL,
  `r98` varchar(10) DEFAULT NULL,
  `r99` varchar(10) DEFAULT NULL,
  `r100` varchar(10) DEFAULT NULL,
  `r101` varchar(10) DEFAULT NULL,
  `r102` varchar(10) DEFAULT NULL,
  `r103` varchar(10) DEFAULT NULL,
  `r104` varchar(10) DEFAULT NULL,
  `r105` varchar(10) DEFAULT NULL,
  `r106` varchar(10) DEFAULT NULL,
  `r107` varchar(10) DEFAULT NULL,
  `r108` varchar(10) DEFAULT NULL,
  `r109` varchar(10) DEFAULT NULL,
  `r110` varchar(10) DEFAULT NULL,
  `r111` varchar(10) DEFAULT NULL,
  `r112` varchar(10) DEFAULT NULL,
  `r113` varchar(10) DEFAULT NULL,
  `r114` varchar(10) DEFAULT NULL,
  `r115` varchar(10) DEFAULT NULL,
  `r116` varchar(10) DEFAULT NULL,
  `r117` varchar(10) DEFAULT NULL,
  `r118` varchar(10) DEFAULT NULL,
  `r119` varchar(10) DEFAULT NULL,
  `r120` varchar(10) DEFAULT NULL,
  `r121` varchar(10) DEFAULT NULL,
  `r122` varchar(10) DEFAULT NULL,
  `r123` varchar(10) DEFAULT NULL,
  `r124` varchar(10) DEFAULT NULL,
  `r125` varchar(10) DEFAULT NULL,
  `r126` varchar(10) DEFAULT NULL,
  `r127` varchar(10) DEFAULT NULL,
  `r128` varchar(10) DEFAULT NULL,
  `r129` varchar(10) DEFAULT NULL,
  `r130` varchar(10) DEFAULT NULL,
  `r131` varchar(10) DEFAULT NULL,
  `r132` varchar(10) DEFAULT NULL,
  `r133` varchar(10) DEFAULT NULL,
  `r134` varchar(10) DEFAULT NULL,
  `r135` varchar(10) DEFAULT NULL,
  `r136` varchar(10) DEFAULT NULL,
  `r137` varchar(10) DEFAULT NULL,
  `r138` varchar(10) DEFAULT NULL,
  `r139` varchar(10) DEFAULT NULL,
  `r140` varchar(10) DEFAULT NULL,
  `r141` varchar(10) DEFAULT NULL,
  `r142` varchar(10) DEFAULT NULL,
  `r143` varchar(10) DEFAULT NULL,
  `r144` varchar(10) DEFAULT NULL,
  `r145` varchar(10) DEFAULT NULL,
  `r146` varchar(10) DEFAULT NULL,
  `r147` varchar(10) DEFAULT NULL,
  `r148` varchar(10) DEFAULT NULL,
  `r149` varchar(10) DEFAULT NULL,
  `r150` varchar(10) DEFAULT NULL,
  `r151` varchar(10) DEFAULT NULL,
  `r152` varchar(10) DEFAULT NULL,
  `r153` varchar(10) DEFAULT NULL,
  `r154` varchar(10) DEFAULT NULL,
  `r155` varchar(10) DEFAULT NULL,
  `r156` varchar(10) DEFAULT NULL,
  `r157` varchar(10) DEFAULT NULL,
  `r158` varchar(10) DEFAULT NULL,
  `r159` varchar(10) DEFAULT NULL,
  `r160` varchar(10) DEFAULT NULL,
  `r161` varchar(10) DEFAULT NULL,
  `r162` varchar(10) DEFAULT NULL,
  `r163` varchar(10) DEFAULT NULL,
  `r164` varchar(10) DEFAULT NULL,
  `r165` varchar(10) DEFAULT NULL,
  `r166` varchar(10) DEFAULT NULL,
  `r167` varchar(10) DEFAULT NULL,
  `r168` varchar(10) DEFAULT NULL,
  `r169` varchar(10) DEFAULT NULL,
  `r170` varchar(10) DEFAULT NULL,
  `r171` varchar(10) DEFAULT NULL,
  `r172` varchar(10) DEFAULT NULL,
  `r173` varchar(10) DEFAULT NULL,
  `r174` varchar(10) DEFAULT NULL,
  `r175` varchar(10) DEFAULT NULL,
  `r176` varchar(10) DEFAULT NULL,
  `r177` varchar(10) DEFAULT NULL,
  `r178` varchar(10) DEFAULT NULL,
  `r179` varchar(10) DEFAULT NULL,
  `r180` varchar(10) DEFAULT NULL,
  `r181` varchar(10) DEFAULT NULL,
  `r182` varchar(10) DEFAULT NULL,
  `r183` varchar(10) DEFAULT NULL,
  `r184` varchar(10) DEFAULT NULL,
  `r185` varchar(10) DEFAULT NULL,
  `r186` varchar(10) DEFAULT NULL,
  `r187` varchar(10) DEFAULT NULL,
  `r188` varchar(10) DEFAULT NULL,
  `r189` varchar(10) DEFAULT NULL,
  `r190` varchar(10) DEFAULT NULL,
  `r191` varchar(10) DEFAULT NULL,
  `r192` varchar(10) DEFAULT NULL,
  `r193` varchar(10) DEFAULT NULL,
  `r194` varchar(10) DEFAULT NULL,
  `r195` varchar(10) DEFAULT NULL,
  `r196` varchar(10) DEFAULT NULL,
  `r197` varchar(10) DEFAULT NULL,
  `r198` varchar(10) DEFAULT NULL,
  `r199` varchar(10) DEFAULT NULL,
  `r200` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `voile_ref_susp_cut`
--

CREATE TABLE `voile_ref_susp_cut` (
  `idvoile` varchar(20) NOT NULL,
  `r1` varchar(10) DEFAULT NULL,
  `r2` varchar(10) DEFAULT NULL,
  `r3` varchar(10) DEFAULT NULL,
  `r4` varchar(10) DEFAULT NULL,
  `r5` varchar(10) DEFAULT NULL,
  `r6` varchar(10) DEFAULT NULL,
  `r7` varchar(10) DEFAULT NULL,
  `r8` varchar(10) DEFAULT NULL,
  `r9` varchar(10) DEFAULT NULL,
  `r10` varchar(10) DEFAULT NULL,
  `r11` varchar(10) DEFAULT NULL,
  `r12` varchar(10) DEFAULT NULL,
  `r13` varchar(10) DEFAULT NULL,
  `r14` varchar(10) DEFAULT NULL,
  `r15` varchar(10) DEFAULT NULL,
  `r16` varchar(10) DEFAULT NULL,
  `r17` varchar(10) DEFAULT NULL,
  `r18` varchar(10) DEFAULT NULL,
  `r19` varchar(10) DEFAULT NULL,
  `r20` varchar(10) DEFAULT NULL,
  `r21` varchar(10) DEFAULT NULL,
  `r22` varchar(10) DEFAULT NULL,
  `r23` varchar(10) DEFAULT NULL,
  `r24` varchar(10) DEFAULT NULL,
  `r25` varchar(10) DEFAULT NULL,
  `r26` varchar(10) DEFAULT NULL,
  `r27` varchar(10) DEFAULT NULL,
  `r28` varchar(10) DEFAULT NULL,
  `r29` varchar(10) DEFAULT NULL,
  `r30` varchar(10) DEFAULT NULL,
  `r31` varchar(10) DEFAULT NULL,
  `r32` varchar(10) DEFAULT NULL,
  `r33` varchar(10) DEFAULT NULL,
  `r34` varchar(10) DEFAULT NULL,
  `r35` varchar(10) DEFAULT NULL,
  `r36` varchar(10) DEFAULT NULL,
  `r37` varchar(10) DEFAULT NULL,
  `r38` varchar(10) DEFAULT NULL,
  `r39` varchar(10) DEFAULT NULL,
  `r40` varchar(10) DEFAULT NULL,
  `r41` varchar(10) DEFAULT NULL,
  `r42` varchar(10) DEFAULT NULL,
  `r43` varchar(10) DEFAULT NULL,
  `r44` varchar(10) DEFAULT NULL,
  `r45` varchar(10) DEFAULT NULL,
  `r46` varchar(10) DEFAULT NULL,
  `r47` varchar(10) DEFAULT NULL,
  `r48` varchar(10) DEFAULT NULL,
  `r49` varchar(10) DEFAULT NULL,
  `r50` varchar(10) DEFAULT NULL,
  `r51` varchar(10) DEFAULT NULL,
  `r52` varchar(10) DEFAULT NULL,
  `r53` varchar(10) DEFAULT NULL,
  `r54` varchar(10) DEFAULT NULL,
  `r55` varchar(10) DEFAULT NULL,
  `r56` varchar(10) DEFAULT NULL,
  `r57` varchar(10) DEFAULT NULL,
  `r58` varchar(10) DEFAULT NULL,
  `r59` varchar(10) DEFAULT NULL,
  `r60` varchar(10) DEFAULT NULL,
  `r61` varchar(10) DEFAULT NULL,
  `r62` varchar(10) DEFAULT NULL,
  `r63` varchar(10) DEFAULT NULL,
  `r64` varchar(10) DEFAULT NULL,
  `r65` varchar(10) DEFAULT NULL,
  `r66` varchar(10) DEFAULT NULL,
  `r67` varchar(10) DEFAULT NULL,
  `r68` varchar(10) DEFAULT NULL,
  `r69` varchar(10) DEFAULT NULL,
  `r70` varchar(10) DEFAULT NULL,
  `r71` varchar(10) DEFAULT NULL,
  `r72` varchar(10) DEFAULT NULL,
  `r73` varchar(10) DEFAULT NULL,
  `r74` varchar(10) DEFAULT NULL,
  `r75` varchar(10) DEFAULT NULL,
  `r76` varchar(10) DEFAULT NULL,
  `r77` varchar(10) DEFAULT NULL,
  `r78` varchar(10) DEFAULT NULL,
  `r79` varchar(10) DEFAULT NULL,
  `r80` varchar(10) DEFAULT NULL,
  `r81` varchar(10) DEFAULT NULL,
  `r82` varchar(10) DEFAULT NULL,
  `r83` varchar(10) DEFAULT NULL,
  `r84` varchar(10) DEFAULT NULL,
  `r85` varchar(10) DEFAULT NULL,
  `r86` varchar(10) DEFAULT NULL,
  `r87` varchar(10) DEFAULT NULL,
  `r88` varchar(10) DEFAULT NULL,
  `r89` varchar(10) DEFAULT NULL,
  `r90` varchar(10) DEFAULT NULL,
  `r91` varchar(10) DEFAULT NULL,
  `r92` varchar(10) DEFAULT NULL,
  `r93` varchar(10) DEFAULT NULL,
  `r94` varchar(10) DEFAULT NULL,
  `r95` varchar(10) DEFAULT NULL,
  `r96` varchar(10) DEFAULT NULL,
  `r97` varchar(10) DEFAULT NULL,
  `r98` varchar(10) DEFAULT NULL,
  `r99` varchar(10) DEFAULT NULL,
  `r100` varchar(10) DEFAULT NULL,
  `r101` varchar(10) DEFAULT NULL,
  `r102` varchar(10) DEFAULT NULL,
  `r103` varchar(10) DEFAULT NULL,
  `r104` varchar(10) DEFAULT NULL,
  `r105` varchar(10) DEFAULT NULL,
  `r106` varchar(10) DEFAULT NULL,
  `r107` varchar(10) DEFAULT NULL,
  `r108` varchar(10) DEFAULT NULL,
  `r109` varchar(10) DEFAULT NULL,
  `r110` varchar(10) DEFAULT NULL,
  `r111` varchar(10) DEFAULT NULL,
  `r112` varchar(10) DEFAULT NULL,
  `r113` varchar(10) DEFAULT NULL,
  `r114` varchar(10) DEFAULT NULL,
  `r115` varchar(10) DEFAULT NULL,
  `r116` varchar(10) DEFAULT NULL,
  `r117` varchar(10) DEFAULT NULL,
  `r118` varchar(10) DEFAULT NULL,
  `r119` varchar(10) DEFAULT NULL,
  `r120` varchar(10) DEFAULT NULL,
  `r121` varchar(10) DEFAULT NULL,
  `r122` varchar(10) DEFAULT NULL,
  `r123` varchar(10) DEFAULT NULL,
  `r124` varchar(10) DEFAULT NULL,
  `r125` varchar(10) DEFAULT NULL,
  `r126` varchar(10) DEFAULT NULL,
  `r127` varchar(10) DEFAULT NULL,
  `r128` varchar(10) DEFAULT NULL,
  `r129` varchar(10) DEFAULT NULL,
  `r130` varchar(10) DEFAULT NULL,
  `r131` varchar(10) DEFAULT NULL,
  `r132` varchar(10) DEFAULT NULL,
  `r133` varchar(10) DEFAULT NULL,
  `r134` varchar(10) DEFAULT NULL,
  `r135` varchar(10) DEFAULT NULL,
  `r136` varchar(10) DEFAULT NULL,
  `r137` varchar(10) DEFAULT NULL,
  `r138` varchar(10) DEFAULT NULL,
  `r139` varchar(10) DEFAULT NULL,
  `r140` varchar(10) DEFAULT NULL,
  `r141` varchar(10) DEFAULT NULL,
  `r142` varchar(10) DEFAULT NULL,
  `r143` varchar(10) DEFAULT NULL,
  `r144` varchar(10) DEFAULT NULL,
  `r145` varchar(10) DEFAULT NULL,
  `r146` varchar(10) DEFAULT NULL,
  `r147` varchar(10) DEFAULT NULL,
  `r148` varchar(10) DEFAULT NULL,
  `r149` varchar(10) DEFAULT NULL,
  `r150` varchar(10) DEFAULT NULL,
  `r151` varchar(10) DEFAULT NULL,
  `r152` varchar(10) DEFAULT NULL,
  `r153` varchar(10) DEFAULT NULL,
  `r154` varchar(10) DEFAULT NULL,
  `r155` varchar(10) DEFAULT NULL,
  `r156` varchar(10) DEFAULT NULL,
  `r157` varchar(10) DEFAULT NULL,
  `r158` varchar(10) DEFAULT NULL,
  `r159` varchar(10) DEFAULT NULL,
  `r160` varchar(10) DEFAULT NULL,
  `r161` varchar(10) DEFAULT NULL,
  `r162` varchar(10) DEFAULT NULL,
  `r163` varchar(10) DEFAULT NULL,
  `r164` varchar(10) DEFAULT NULL,
  `r165` varchar(10) DEFAULT NULL,
  `r166` varchar(10) DEFAULT NULL,
  `r167` varchar(10) DEFAULT NULL,
  `r168` varchar(10) DEFAULT NULL,
  `r169` varchar(10) DEFAULT NULL,
  `r170` varchar(10) DEFAULT NULL,
  `r171` varchar(10) DEFAULT NULL,
  `r172` varchar(10) DEFAULT NULL,
  `r173` varchar(10) DEFAULT NULL,
  `r174` varchar(10) DEFAULT NULL,
  `r175` varchar(10) DEFAULT NULL,
  `r176` varchar(10) DEFAULT NULL,
  `r177` varchar(10) DEFAULT NULL,
  `r178` varchar(10) DEFAULT NULL,
  `r179` varchar(10) DEFAULT NULL,
  `r180` varchar(10) DEFAULT NULL,
  `r181` varchar(10) DEFAULT NULL,
  `r182` varchar(10) DEFAULT NULL,
  `r183` varchar(10) DEFAULT NULL,
  `r184` varchar(10) DEFAULT NULL,
  `r185` varchar(10) DEFAULT NULL,
  `r186` varchar(10) DEFAULT NULL,
  `r187` varchar(10) DEFAULT NULL,
  `r188` varchar(10) DEFAULT NULL,
  `r189` varchar(10) DEFAULT NULL,
  `r190` varchar(10) DEFAULT NULL,
  `r191` varchar(10) DEFAULT NULL,
  `r192` varchar(10) DEFAULT NULL,
  `r193` varchar(10) DEFAULT NULL,
  `r194` varchar(10) DEFAULT NULL,
  `r195` varchar(10) DEFAULT NULL,
  `r196` varchar(10) DEFAULT NULL,
  `r197` varchar(10) DEFAULT NULL,
  `r198` varchar(10) DEFAULT NULL,
  `r199` varchar(10) DEFAULT NULL,
  `r200` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voile_ref_susp_cut`
--

INSERT INTO `voile_ref_susp_cut` (`idvoile`, `r1`, `r2`, `r3`, `r4`, `r5`, `r6`, `r7`, `r8`, `r9`, `r10`, `r11`, `r12`, `r13`, `r14`, `r15`, `r16`, `r17`, `r18`, `r19`, `r20`, `r21`, `r22`, `r23`, `r24`, `r25`, `r26`, `r27`, `r28`, `r29`, `r30`, `r31`, `r32`, `r33`, `r34`, `r35`, `r36`, `r37`, `r38`, `r39`, `r40`, `r41`, `r42`, `r43`, `r44`, `r45`, `r46`, `r47`, `r48`, `r49`, `r50`, `r51`, `r52`, `r53`, `r54`, `r55`, `r56`, `r57`, `r58`, `r59`, `r60`, `r61`, `r62`, `r63`, `r64`, `r65`, `r66`, `r67`, `r68`, `r69`, `r70`, `r71`, `r72`, `r73`, `r74`, `r75`, `r76`, `r77`, `r78`, `r79`, `r80`, `r81`, `r82`, `r83`, `r84`, `r85`, `r86`, `r87`, `r88`, `r89`, `r90`, `r91`, `r92`, `r93`, `r94`, `r95`, `r96`, `r97`, `r98`, `r99`, `r100`, `r101`, `r102`, `r103`, `r104`, `r105`, `r106`, `r107`, `r108`, `r109`, `r110`, `r111`, `r112`, `r113`, `r114`, `r115`, `r116`, `r117`, `r118`, `r119`, `r120`, `r121`, `r122`, `r123`, `r124`, `r125`, `r126`, `r127`, `r128`, `r129`, `r130`, `r131`, `r132`, `r133`, `r134`, `r135`, `r136`, `r137`, `r138`, `r139`, `r140`, `r141`, `r142`, `r143`, `r144`, `r145`, `r146`, `r147`, `r148`, `r149`, `r150`, `r151`, `r152`, `r153`, `r154`, `r155`, `r156`, `r157`, `r158`, `r159`, `r160`, `r161`, `r162`, `r163`, `r164`, `r165`, `r166`, `r167`, `r168`, `r169`, `r170`, `r171`, `r172`, `r173`, `r174`, `r175`, `r176`, `r177`, `r178`, `r179`, `r180`, `r181`, `r182`, `r183`, `r184`, `r185`, `r186`, `r187`, `r188`, `r189`, `r190`, `r191`, `r192`, `r193`, `r194`, `r195`, `r196`, `r197`, `r198`, `r199`, `r200`) VALUES
('201', '554e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('541', '12', '14', '16', '18', '20', '22', '24', '26', '28', '30', '32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('etstxl', '1', '3', '5', '7', '9', '11', '13', '15', '17', '19', '21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('etst600', '2', '4', '6', '8', '10', '12', '14', '16', '18', '20', '22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `voile_taille`
--

CREATE TABLE `voile_taille` (
  `idvoile` int(11) NOT NULL,
  `T1` varchar(11) NOT NULL,
  `T2` varchar(11) DEFAULT NULL,
  `T3` varchar(11) DEFAULT NULL,
  `T4` varchar(11) DEFAULT NULL,
  `T5` varchar(11) DEFAULT NULL,
  `T6` varchar(11) DEFAULT NULL,
  `T7` varchar(11) DEFAULT NULL,
  `T8` varchar(11) DEFAULT NULL,
  `T9` varchar(11) DEFAULT NULL,
  `T10` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `voile_taille`
--

INSERT INTO `voile_taille` (`idvoile`, `T1`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `T8`, `T9`, `T10`) VALUES
(55, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'zer', 'zer', 'zer', 'zer', NULL, NULL, NULL, NULL, NULL, NULL),
(71, 'test', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'xl', '600', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'XS', 's', 'L', 'M', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_annee`
--
ALTER TABLE `annonces_annee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_localisation`
--
ALTER TABLE `annonces_localisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_marque`
--
ALTER TABLE `annonces_marque`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_modele`
--
ALTER TABLE `annonces_modele`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_ptv`
--
ALTER TABLE `annonces_ptv`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_surface`
--
ALTER TABLE `annonces_surface`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `annonces_taille`
--
ALTER TABLE `annonces_taille`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`departement_id`),
  ADD KEY `departement_slug` (`departement_slug`),
  ADD KEY `departement_code` (`departement_code`),
  ADD KEY `departement_nom_soundex` (`departement_nom_soundex`);

--
-- Index pour la table `fabricant`
--
ALTER TABLE `fabricant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications_utilisateur`
--
ALTER TABLE `notifications_utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `susp_materiaux`
--
ALTER TABLE `susp_materiaux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tarifs_articles`
--
ALTER TABLE `tarifs_articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tarifs_reparation`
--
ALTER TABLE `tarifs_reparation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tarifs_revision`
--
ALTER TABLE `tarifs_revision`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voile`
--
ALTER TABLE `voile`
  ADD PRIMARY KEY (`id`,`nom`);

--
-- Index pour la table `voile_assemblage_sup`
--
ALTER TABLE `voile_assemblage_sup`
  ADD PRIMARY KEY (`idvoile`);

--
-- Index pour la table `voile_controle_long`
--
ALTER TABLE `voile_controle_long`
  ADD PRIMARY KEY (`idvoile`);

--
-- Index pour la table `voile_long_susp_cut`
--
ALTER TABLE `voile_long_susp_cut`
  ADD PRIMARY KEY (`idvoile`);

--
-- Index pour la table `voile_mat_susp_cut`
--
ALTER TABLE `voile_mat_susp_cut`
  ADD PRIMARY KEY (`idvoile`);

--
-- Index pour la table `voile_ref_susp_cut`
--
ALTER TABLE `voile_ref_susp_cut`
  ADD PRIMARY KEY (`idvoile`);

--
-- Index pour la table `voile_taille`
--
ALTER TABLE `voile_taille`
  ADD PRIMARY KEY (`idvoile`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonces`
--
ALTER TABLE `annonces`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `annonces_annee`
--
ALTER TABLE `annonces_annee`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `annonces_localisation`
--
ALTER TABLE `annonces_localisation`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `annonces_marque`
--
ALTER TABLE `annonces_marque`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `annonces_modele`
--
ALTER TABLE `annonces_modele`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `annonces_ptv`
--
ALTER TABLE `annonces_ptv`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `annonces_surface`
--
ALTER TABLE `annonces_surface`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `annonces_taille`
--
ALTER TABLE `annonces_taille`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `departement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `fabricant`
--
ALTER TABLE `fabricant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `notifications_utilisateur`
--
ALTER TABLE `notifications_utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `susp_materiaux`
--
ALTER TABLE `susp_materiaux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `tarifs_articles`
--
ALTER TABLE `tarifs_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `tarifs_reparation`
--
ALTER TABLE `tarifs_reparation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `tarifs_revision`
--
ALTER TABLE `tarifs_revision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `voile`
--
ALTER TABLE `voile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
