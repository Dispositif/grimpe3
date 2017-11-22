-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 22 nov. 2017 à 10:35
-- Version du serveur :  5.7.19
-- Version de PHP :  7.0.23

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `grimpe3`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cauteur` int(11) DEFAULT NULL,
  `csortie` int(11) DEFAULT NULL,
  `contenu` mediumtext NOT NULL,
  `date` datetime DEFAULT NULL,
  `alertedate` datetime DEFAULT NULL,
  `alerteuser` int(11) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `commentaire_fk0` (`cauteur`),
  KEY `commentaire_fk1` (`csortie`),
  KEY `commentaire_fk2` (`alerteuser`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`cid`, `cauteur`, `csortie`, `contenu`, `date`, `alertedate`, `alerteuser`) VALUES
(1, 2, 1, 'Je suis libre ? partir de 11h', '2017-10-18 12:00:00', NULL, NULL),
(2, 1, 1, 'Je ramene la corde.\\r\\nC\'est ok pour toi ?', '2017-10-28 00:00:00', NULL, NULL),
(3, 2, 1, 'Pourquoi pas ! :)', '2017-10-28 17:21:05', NULL, NULL),
(4, 1, 1, 'gogogo', '2017-10-28 17:21:05', NULL, NULL),
(11, 1, 1, 'Coooool', '2017-10-29 11:03:44', NULL, NULL),
(20, 1, 1, 'gogo', '2017-10-29 12:50:21', NULL, NULL),
(21, 1, 2, 'sdf', '2017-10-29 13:36:34', NULL, NULL),
(24, 1, 4, 'test', '2017-10-29 13:39:35', NULL, NULL),
(25, 1, 1, 'ééé ààà', '2017-10-29 14:08:04', NULL, NULL),
(26, 1, 1, 'ok\\r\\nc\'est cool', '2017-10-29 14:08:14', NULL, NULL),
(27, 1, 3, 'j\'annule', '2017-10-29 15:30:29', NULL, NULL),
(28, 1, 5, 'oki', '2017-10-29 15:45:34', NULL, NULL),
(29, 1, 5, 'oki', '2017-10-29 15:45:58', NULL, NULL),
(30, 1, 5, 'oki', '2017-10-29 15:46:03', NULL, NULL),
(31, 1, 5, 'oki', '2017-10-29 15:46:04', NULL, NULL),
(32, 1, 5, 'oki', '2017-10-29 15:46:23', NULL, NULL),
(33, 1, 5, 'hein?', '2017-10-29 15:46:37', NULL, NULL),
(34, 1, 8, 'ok', '2017-10-29 15:48:15', NULL, NULL),
(35, 1, 7, 'ok', '2017-10-29 16:45:27', NULL, NULL),
(36, 1, 7, 'ok', '2017-10-29 16:56:14', NULL, NULL),
(37, 1, 7, 'pouet', '2017-10-29 16:56:20', NULL, NULL),
(38, 1, 1, 'popo', '2017-10-29 19:19:01', NULL, NULL),
(39, 1, 2, 'je viens', '2017-11-02 18:49:03', NULL, NULL),
(40, 1, 1, 'qdfs', '2017-11-05 18:31:28', NULL, NULL),
(41, 1, 1, 'sdfg', '2017-11-06 16:26:31', NULL, NULL),
(42, 1, 14, 'vbn', '2017-11-07 15:41:13', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `idmembre` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `isadmin` smallint(6) NOT NULL,
  `datecreated` datetime NOT NULL,
  `lastdate` datetime NOT NULL,
  `lastip` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `niveaumin` varchar(10) DEFAULT NULL,
  `niveaumax` varchar(10) DEFAULT NULL,
  `meval` double NOT NULL,
  `emailvalide` int(11) NOT NULL,
  PRIMARY KEY (`idmembre`),
  UNIQUE KEY `UNIQ_F6B4FB29E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idmembre`, `email`, `nom`, `prenom`, `password`, `isadmin`, `datecreated`, `lastdate`, `lastip`, `telephone`, `avatar`, `niveaumin`, `niveaumax`, `meval`, `emailvalide`) VALUES
(1, 'dispositif@gmail.com', 'Toto', 'Philippe', '$2y$10$JrKdpUJnqS4Kwfvip.EvYOKPVh7bIsf8SZSkyYRbaq3c41ZivQeES', 1, '2017-10-04 00:00:00', '2017-11-09 16:30:34', '::1', '06.06.06.07', 'design/images/myavatar.png', '5a+', '7a', 3, 0),
(2, 'bobbob@yopmail.com', 'Moran', 'Bob', '$2y$10$WB2gRDeQn2kg/he7eD1T4u4ti/urGGLci8n.0lAnTbhRkmlMEG2gu', 0, '2017-10-18 11:36:56', '2017-10-18 11:36:56', '', '11.12', 'design/images/avatars/img_avatar3.png', '6a+', '5a', 1, 0),
(3, 'sdqfs@plop.com', NULL, 'Moumou5', '$2y$10$K3bxCbCpNuaOJUDfzzy2leSGGcnBB8Opg8Om0EUCLz52UC5eGmm8i', 0, '2017-10-23 21:29:40', '2017-10-23 21:29:40', NULL, NULL, NULL, NULL, '', 0, 0),
(4, 'tutu@plop.com', NULL, 'tutu', '$2y$10$JrKdpUJnqS4Kwfvip.EvYOKPVh7bIsf8SZSkyYRbaq3c41ZivQeES', 0, '2017-10-23 21:41:28', '2017-10-23 21:41:28', NULL, NULL, NULL, NULL, '', 0, 0),
(5, 'qsdgfsqd@qdsfdq.com', 'qsdffaz', 'BOB 2', '$2y$10$WB2gRDeQn2kg/he7eD1T4u4ti/urGGLci8n.0lAnTbhRkmlMEG2gu', 0, '2017-10-23 21:42:35', '2017-10-23 21:42:35', '', NULL, 'design/images/avatars/img_avatar1.png', '', '', 0, 0),
(6, 'sqf@qsdfss.com', NULL, 'hop', '$2y$10$K3bxCbCpNuaOJUDfzzy2leSGGcnBB8Opg8Om0EUCLz52UC5eGmm8i', 0, '2017-10-23 21:48:06', '2017-10-23 21:48:06', NULL, NULL, NULL, NULL, '', 0, 0),
(7, 'martin@yopmail.com', NULL, 'Martin', '$2y$10$feUi56C30Y1ECiYkX7a0nObGZbKBjaGSZlS/N3ms76QpOTVltad5y', 0, '2017-10-27 14:36:19', '2017-10-27 14:36:19', '::1', NULL, NULL, NULL, '5c', 0, 0),
(11, 'pir@darftpunk.com', NULL, 'Pir', '$2y$10$uV8/6Xauy/cdJdFZbBvM5OpP1d0M9N/uJOVhTQfjbD0ZybMykbUZ2', 0, '2017-10-29 12:47:42', '2017-10-29 12:47:42', '::1', NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `meteo`
--

DROP TABLE IF EXISTS `meteo`;
CREATE TABLE IF NOT EXISTS `meteo` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `lieu` int(11) NOT NULL,
  `data` varchar(250) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `nauteur` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` longtext NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `News_fk0` (`nauteur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`nid`, `nauteur`, `date`, `titre`, `contenu`) VALUES
(1, 1, '2017-10-17 11:00:00', 'Premi?re news', 'Le site vient d\'ouvrir. \\r\\n\\r\\nC\'est formidable :) ');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rnom` varchar(100) NOT NULL,
  `rlatitude` float NOT NULL,
  `rlongitude` float NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`rid`, `rnom`, `rlatitude`, `rlongitude`) VALUES
(1, 'Bouches du Rh', 43.7501, 5.77168),
(2, 'Paris', 2.37475, 48.8529);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `siteid` int(11) NOT NULL AUTO_INCREMENT,
  `sitenom` varchar(50) NOT NULL,
  `type` varchar(150) NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `description` text,
  `ville` varchar(250) DEFAULT NULL,
  `sregion` int(11) DEFAULT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `svalide` tinyint(1) NOT NULL,
  PRIMARY KEY (`siteid`),
  KEY `site_fk1` (`sregion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`siteid`, `sitenom`, `type`, `longitude`, `latitude`, `description`, `ville`, `sregion`, `adresse`, `svalide`) VALUES
(1, 'Pilon du Roi', 'falaise', 5.45176, 43.408, '[img]https://media.camptocamp.org/c2corg_active/1469205335_83692239BI.jpg[/img]\\r\\nLe Pilon du Roi est décrit par certains comme une mini Candelle et visible de loin, que l\'on soit coté Aix ou coté Marseille. Le site est classé terrain d\'aventure par la fédé, mais même si quelques voies se prêtent à la pose de coinceurs, il vaut mieux le considérer comme un vieux site sportif. L\'équipement est assez hétéroclite et certains relais font peur à voir. De plus, le rocher sensible au gel prendrait une petite purge dans certains coins, et particulièrement en face sud.\\r\\n\\r\\n[img]https://services.sitytrail.com/GeolivesWS/DownloadMedia.ashx?TrailID=101344&Media=943_1.jpg[/img]\\r\\nLe site peut se décomposer en deux faces et deux petits gendarmes offrant chacun 3 voies d\'une vingtaine de mètres.\\r\\n\\r\\nFace Ouest: Beau mur vertical plutôt soutenu en magnifique cailloux. Les voies commencent dans le 6 et sont parfois engagées.\\r\\nFace Sud:\\r\\nPilier Sud Ouest:\\r\\nPilier Sud Est:\\r\\n\\r\\nDescente des voies\\r\\nMoulinette (attention à l\'état des relais)\\r\\n\\r\\nRemarques\\r\\nLe relai de la classique a été rééquipé. Attention aux maillons sinon.\\r\\nAccès pédestre\\r\\nDepuis Mimet: se garer au parking de ND des anges et monter au col Saint Anne. Au col prendre la piste qui part en direction de l\'antenne et poursuivre jusqu\'à avoir le Pilon en visuel. Prendre une trace sur la gauche (balisage bleu) qui monte au pied de la face Sud.', 'Mimet', 1, 'Mimet', 1),
(2, 'Barre de l\'Etoile', 'falaise', 5.42602, 43.3837, '[img]http://a403.idata.over-blog.com/0/22/52/21/Etoile/01-2010/DSCN4969rec-reg-red-comp.jpg[/img]\\r\\n\\r\\nPrésentation\\r\\nCe long bandeau calcaire domine Marseille de sa quasi centaine de voies.\\r\\nEquipé de scellements, l\'escalade est souvent technique et à doigts sur un mur compact émaillé de quelques dièdres plus faciles.\\r\\nAu soleil pour l\'hiver jusqu\'au milieu de l\'après-midi.\\r\\nRéglementation particulière\\r\\nDu 1er juin au 30 septembre, l\'accès des massifs des Bouches du Rhône est réglementé selon le risque d\'incendie. \\r\\n\\r\\nAttention ! Certaines communes restreignent davantage l\'accès à leurs espaces naturels.\\r\\n\\r\\nDes zones particulièrement surveillées restent accessibles même en risque sévère. (ZAPEF)\\r\\n\\r\\nAfin de connaitre les possibilités d\'accès aux différents massifs et communes, consulter le site : http://www.ancien.paca.gouv.fr/files/massif/index.php ou téléphoner au : 08.11.20.13.13\\r\\n\\r\\nInformations sur la falaise\\r\\nHauteur minimale : 10 m\\r\\nHauteur maximale : 22 m\\r\\nLongueur totale des voies : 1800 m', 'Marseille', 1, '13013 Septemes-les-Vallons', 1),
(3, 'Block\'Out', 'salle', 2.32509, 48.9111, 'Salle de bloc en région parisienne.\\r\\n\\r\\nHoraires : \\r\\ndu lundi au vendredi de 11h à 23h\\r\\nle week-end de 9h à 21h', 'Saint-Ouen', 2, '50 Rue Ardoin, 93400 Saint-Ouen', 1),
(5, 'Niolon : Boule', 'falaise', 5.23751, 43.3516, 'La Boule\\r\\nPetite boule de calcaire de 20 mètres, à proximité d\'une route calme, des voies faciles avec un équipement en scellements, relativement abrité du mistral, niveau allant de 4c à 6a+. Voies de 15 à 20m. Adapté à l\'initiation.\\r\\nCalypso et Mouvement Perpétuel\\r\\n\\r\\nDeux secteurs plus au sud (accès barrière verte) avec 7 voies de 35m niveau 6c à 7c+.\\r\\n\\r\\nAccès routier :\\r\\nDepuis Marseille prendre la A55 et sortir à L\'Estaque. Traverser L\'Estaque et se rendre au village du Rove, se diriger vers Ensues et prendre à gauche la D48 qui descend vers le hameau de Niolon (ou celui de La Vesse). Un parking à Niolon à partir des premières maisons.', NULL, NULL, '', 1),
(6, 'Sainte-Baume : Pic de Bertagne', 'falaise', 5.68891, 43.3121, 'C\'est la falaise d\'entrainement à la montagne et à l\'alpinisme pour les habitants de la région. la meilleure période pour y grimper est la saison chaude car étant à plus de 1000m d\'altitude, il y fait souvent frais . L\'hiver il y fait vraiment froid et on peut s’aguerrir à la grimpe hivernale surtout si le vent est levé car dans ce cas, il peut vraiment faire très froid…\\r\\nLe côté nord et le côté ouest sont les plus réputés mais les itineraires les plus verticaux sont en face ouest. la raideur de la face est bien plus imposante que dans les calanques ou à la sainte victoire.\\r\\nC\'est la mecque locale des itineraires de TA.\\r\\nIl y a de nombreux itinéraire très typés artif mais aussi de nombreuses voies plus faciles (ou plus dur) en libre. Ce site est un peu abandonné, mais peut être que l\'essor récent du trad va redorer cette face à l\'ambiance magique et à l\'escalade technique , assez exigeante et soutenue. Certes la mer n\'est pas en dessous comme dans les calanques, mais la vue sur les sommets du pays d’Aubagne, la mer au loin et Marseille vaut le détour ! et surtout la fraicheur qu\'elle apporte en été permet de profiter pleinement de ce massif.\\r\\n\\r\\nRocher\\r\\nC\'est un calcaire gris type face nord qui peut faire penser au verdon.\\r\\nLe rocher y est solide et sain (un peu moins en bas) ce qui permet la pose de protections fiables (plus que dans beaucoup d\'endroit des calanques).', NULL, NULL, '', 1),
(7, 'Testo', 'couenne,bloc', 5.32084, 43.3626, 'test', 'Marseille', 1, '2 Boulevard Fenouil, 13016 Marseille, France', 1);

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
CREATE TABLE IF NOT EXISTS `sortie` (
  `idsortie` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `ssite` int(11) DEFAULT NULL,
  `organisateur` int(11) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `annonce` mediumtext,
  `niveaumin` varchar(10) DEFAULT NULL,
  `niveaumax` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idsortie`),
  KEY `sortie_fk0` (`ssite`),
  KEY `sortie_fk1` (`organisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sortie`
--

INSERT INTO `sortie` (`idsortie`, `date`, `ssite`, `organisateur`, `datecreated`, `annonce`, `niveaumin`, `niveaumax`) VALUES
(1, '2017-11-15 11:00:00', 2, 1, '2017-10-18 11:38:48', 'On grimpe ?\\r\\n\\r\\nFirst !', '5a', '6c'),
(2, '2017-11-15 11:00:00', 2, 2, '2017-10-24 11:14:21', 'gogo', '', ''),
(3, '2017-11-15 11:00:00', 3, 1, '2017-10-24 11:16:00', 'suuuper', '', ''),
(4, '2017-11-15 11:00:00', 2, 1, '2017-10-24 11:16:00', 'gfgsdfg', '', ''),
(5, '2017-11-25 11:00:00', 2, 1, '2017-10-27 14:47:25', 'ouais c\'est coio', '6a', ''),
(6, '2017-11-26 12:00:00', 2, 7, '2017-10-27 14:47:43', 'sqdfsqdfqs', '', ''),
(7, '2017-11-25 15:00:00', 1, 2, '2017-10-27 14:48:06', 'xcvnbcvx\\r\\n\\r\\nfsdq\\r\\n', '', ''),
(8, '2017-10-31 14:00:00', 2, 1, '2017-10-29 13:53:17', 'zdf', '', ''),
(9, '2017-11-04 14:00:00', 3, 1, '2017-10-29 15:31:02', 'Une petite séance ?', '', ''),
(10, '2017-10-31 14:00:00', 3, 1, '2017-10-29 15:31:33', 'qsfd', '5a', '6a'),
(11, '2017-10-30 12:00:00', 3, 1, '2017-10-29 15:40:40', 'pour 1 heure', '5a', '5a'),
(12, '2017-10-31 14:00:00', 2, 1, '2017-10-29 19:23:59', 'Venez !', '6a', '6c'),
(13, '2017-11-26 12:00:00', 2, 1, '2017-11-06 14:58:56', 'sqdf', '', ''),
(14, '2017-11-09 11:00:00', 2, 1, '2017-11-06 15:05:52', 'testons', '', '');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `sortievue`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `sortievue`;
CREATE TABLE IF NOT EXISTS `sortievue` (
`idsortie` int(11)
,`date` datetime
,`ssite` int(11)
,`organisateur` int(11)
,`datecreated` datetime
,`annonce` mediumtext
,`niveaumin` varchar(10)
,`niveaumax` varchar(10)
,`prenom` varchar(30)
,`commentaires` bigint(21)
,`participants` bigint(21)
,`suiveurs` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure de la table `suivisortie`
--

DROP TABLE IF EXISTS `suivisortie`;
CREATE TABLE IF NOT EXISTS `suivisortie` (
  `ssid` int(11) NOT NULL AUTO_INCREMENT,
  `sssortie` int(11) DEFAULT NULL,
  `ssmembre` int(11) DEFAULT NULL,
  `ssdate` datetime NOT NULL,
  `mode` int(11) NOT NULL,
  PRIMARY KEY (`ssid`),
  KEY `suivi_sortie_fk0` (`sssortie`),
  KEY `suivi_sortie_fk1` (`ssmembre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suivisortie`
--

INSERT INTO `suivisortie` (`ssid`, `sssortie`, `ssmembre`, `ssdate`, `mode`) VALUES
(1, 1, 1, '2017-10-18 00:00:00', 2),
(2, 1, 2, '2017-10-18 00:00:00', 2),
(3, 1, 5, '2017-11-05 20:32:34', 2),
(4, 1, 7, '2017-11-05 20:32:34', 1),
(5, 2, 1, '2017-11-06 12:23:28', 2),
(6, 5, 1, '2017-11-06 14:26:42', 2),
(7, 14, 1, '2017-11-06 15:05:53', 2),
(8, 4, 1, '2017-11-07 14:40:28', 2),
(9, 3, 1, '2017-11-08 09:54:23', 2),
(10, 7, 1, '2017-11-08 14:02:44', 2);

-- --------------------------------------------------------

--
-- Structure de la vue `sortievue`
--
DROP TABLE IF EXISTS `sortievue`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sortievue`  AS  select `grimpe`.`sortie`.`idsortie` AS `idsortie`,`grimpe`.`sortie`.`date` AS `date`,`grimpe`.`sortie`.`ssite` AS `ssite`,`grimpe`.`sortie`.`organisateur` AS `organisateur`,`grimpe`.`sortie`.`datecreated` AS `datecreated`,`grimpe`.`sortie`.`annonce` AS `annonce`,`grimpe`.`sortie`.`niveaumin` AS `niveaumin`,`grimpe`.`sortie`.`niveaumax` AS `niveaumax`,`grimpe`.`membre`.`prenom` AS `prenom`,count(`grimpe`.`commentaire`.`cid`) AS `commentaires`,(select count(`grimpe`.`suivisortie`.`ssid`) from `grimpe`.`suivisortie` where ((`grimpe`.`suivisortie`.`sssortie` = `grimpe`.`sortie`.`idsortie`) and (`grimpe`.`suivisortie`.`mode` = 2))) AS `participants`,(select count(`grimpe`.`suivisortie`.`ssid`) from `grimpe`.`suivisortie` where ((`grimpe`.`suivisortie`.`sssortie` = `grimpe`.`sortie`.`idsortie`) and (`grimpe`.`suivisortie`.`mode` = 1))) AS `suiveurs` from ((`grimpe`.`sortie` left join `grimpe`.`commentaire` on((`grimpe`.`sortie`.`idsortie` = `grimpe`.`commentaire`.`csortie`))) left join `grimpe`.`membre` on((`grimpe`.`membre`.`idmembre` = `grimpe`.`sortie`.`organisateur`))) group by `grimpe`.`sortie`.`idsortie` ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_fk0` FOREIGN KEY (`cauteur`) REFERENCES `membre` (`idmembre`),
  ADD CONSTRAINT `commentaire_fk1` FOREIGN KEY (`csortie`) REFERENCES `sortie` (`idsortie`),
  ADD CONSTRAINT `commentaire_fk2` FOREIGN KEY (`alerteuser`) REFERENCES `membre` (`idmembre`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `News_fk0` FOREIGN KEY (`nauteur`) REFERENCES `membre` (`idmembre`);

--
-- Contraintes pour la table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_fk1` FOREIGN KEY (`sregion`) REFERENCES `region` (`rid`);

--
-- Contraintes pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD CONSTRAINT `sortie_fk0` FOREIGN KEY (`ssite`) REFERENCES `site` (`siteid`),
  ADD CONSTRAINT `sortie_fk1` FOREIGN KEY (`organisateur`) REFERENCES `membre` (`idmembre`);

--
-- Contraintes pour la table `suivisortie`
--
ALTER TABLE `suivisortie`
  ADD CONSTRAINT `suivi_sortie_fk0` FOREIGN KEY (`sssortie`) REFERENCES `sortie` (`idsortie`),
  ADD CONSTRAINT `suivi_sortie_fk1` FOREIGN KEY (`ssmembre`) REFERENCES `membre` (`idmembre`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
