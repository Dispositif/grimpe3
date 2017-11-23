-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 23 nov. 2017 à 15:22
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
  `alerteuser` int(11) DEFAULT NULL,
  `contenu` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `alertedate` datetime DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `commentaire_fk0` (`cauteur`),
  KEY `commentaire_fk1` (`csortie`),
  KEY `commentaire_fk2` (`alerteuser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `lastip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveaumin` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveaumax` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eval` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `datecreated`, `lastip`, `telephone`, `avatar`, `niveaumin`, `niveaumax`, `eval`) VALUES
(1, 'Pouet4', 'pouet4', 'pouet4@yopmail.com', 'pouet4@yopmail.com', 1, NULL, '$2y$13$6Am6ianwVSBAjzh8DirONu4aX7obHjFAD6jJ7veSzj.DjT2f3e5VC', NULL, NULL, NULL, 'a:0:{}', NULL, 'Pouet4', NULL, '::1', NULL, NULL, NULL, NULL, NULL),
(2, 'Philippe', 'philippe', 'dispositif@gmail.com', 'dispositif@gmail.com', 1, NULL, '$2y$13$ynkuIzHWZZuh5vo8xaK5tO8bjVX5vC9zScOXu73yzO2GzdkNUgzlS', '2017-11-23 14:48:46', NULL, NULL, 'a:10:{\'ROLE_ADMIN\'}', NULL, 'Philippe', NULL, '::1', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `meteo`
--

DROP TABLE IF EXISTS `meteo`;
CREATE TABLE IF NOT EXISTS `meteo` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL,
  `lieu` int(11) NOT NULL,
  `data` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `nauteur` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `titre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nid`),
  KEY `News_fk0` (`nauteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `rnom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rlatitude` double NOT NULL,
  `rlongitude` double NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`rid`, `rnom`, `rlatitude`, `rlongitude`) VALUES
(1, 'Bouches du Rhône', 43.75, 5.772),
(2, 'Paris', 2.37475, 48.8529);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `siteid` int(11) NOT NULL AUTO_INCREMENT,
  `sregion` int(11) DEFAULT NULL,
  `sitenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `ville` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `svalide` tinyint(1) NOT NULL,
  PRIMARY KEY (`siteid`),
  KEY `site_fk1` (`sregion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`siteid`, `sregion`, `sitenom`, `type`, `longitude`, `latitude`, `description`, `ville`, `adresse`, `svalide`) VALUES
(1, 1, 'Pilon du Roi', 'falaise', 5.452000141143799, 43.40800094604492, '[img]https://media.camptocamp.org/c2corg_active/1469205335_83692239BI.jpg[/img]\\r\\nLe Pilon du Roi est décrit par certains comme une mini Candelle et visible de loin, que l\'on soit coté Aix ou coté Marseille. Le site est classé terrain d\'aventure par la fédé, mais même si quelques voies se prêtent à la pose de coinceurs, il vaut mieux le considérer comme un vieux site sportif. L\'équipement est assez hétéroclite et certains relais font peur à voir. De plus, le rocher sensible au gel prendrait une petite purge dans certains coins, et particulièrement en face sud.\\r\\n\\r\\n[img]https://services.sitytrail.com/GeolivesWS/DownloadMedia.ashx?TrailID=101344&Media=943_1.jpg[/img]\\r\\nLe site peut se décomposer en deux faces et deux petits gendarmes offrant chacun 3 voies d\'une vingtaine de mètres.\\r\\n\\r\\nFace Ouest: Beau mur vertical plutôt soutenu en magnifique cailloux. Les voies commencent dans le 6 et sont parfois engagées.\\r\\nFace Sud:\\r\\nPilier Sud Ouest:\\r\\nPilier Sud Est:\\r\\n\\r\\nDescente des voies\\r\\nMoulinette (attention à l\'état des relais)\\r\\n\\r\\nRemarques\\r\\nLe relai de la classique a été rééquipé. Attention aux maillons sinon.\\r\\nAccès pédestre\\r\\nDepuis Mimet: se garer au parking de ND des anges et monter au col Saint Anne. Au col prendre la piste qui part en direction de l\'antenne et poursuivre jusqu\'à avoir le Pilon en visuel. Prendre une trace sur la gauche (balisage bleu) qui monte au pied de la face Sud.', 'Mimet', 'Mimet', 1),
(2, 1, 'Barre de l\'Etoile', 'falaise', 5.42602014541626, 43.38370132446289, '[img]http://a403.idata.over-blog.com/0/22/52/21/Etoile/01-2010/DSCN4969rec-reg-red-comp.jpg[/img]\\r\\n\\r\\nPrésentation\\r\\nCe long bandeau calcaire domine Marseille de sa quasi centaine de voies.\\r\\nEquipé de scellements, l\'escalade est souvent technique et à doigts sur un mur compact émaillé de quelques dièdres plus faciles.\\r\\nAu soleil pour l\'hiver jusqu\'au milieu de l\'après-midi.\\r\\nRéglementation particulière\\r\\nDu 1er juin au 30 septembre, l\'accès des massifs des Bouches du Rhône est réglementé selon le risque d\'incendie. \\r\\n\\r\\nAttention ! Certaines communes restreignent davantage l\'accès à leurs espaces naturels.\\r\\n\\r\\nDes zones particulièrement surveillées restent accessibles même en risque sévère. (ZAPEF)\\r\\n\\r\\nAfin de connaitre les possibilités d\'accès aux différents massifs et communes, consulter le site : http://www.ancien.paca.gouv.fr/files/massif/index.php ou téléphoner au : 08.11.20.13.13\\r\\n\\r\\nInformations sur la falaise\\r\\nHauteur minimale : 10 m\\r\\nHauteur maximale : 22 m\\r\\nLongueur totale des voies : 1800 m', 'Marseille', '13013 Septemes-les-Vallons', 1),
(3, 2, 'Block\'Out', 'salle', 2.325089931488037, 48.91109848022461, 'Salle de bloc en région parisienne.\\r\\n\\r\\nHoraires : \\r\\ndu lundi au vendredi de 11h à 23h\\r\\nle week-end de 9h à 21h', 'Saint-Ouen', '50 Rue Ardoin, 93400 Saint-Ouen', 1),
(5, NULL, 'Niolon : Boule', 'falaise', 5.2375102043151855, 43.351600646972656, 'La Boule\\r\\nPetite boule de calcaire de 20 mètres, à proximité d\'une route calme, des voies faciles avec un équipement en scellements, relativement abrité du mistral, niveau allant de 4c à 6a+. Voies de 15 à 20m. Adapté à l\'initiation.\\r\\nCalypso et Mouvement Perpétuel\\r\\n\\r\\nDeux secteurs plus au sud (accès barrière verte) avec 7 voies de 35m niveau 6c à 7c+.\\r\\n\\r\\nAccès routier :\\r\\nDepuis Marseille prendre la A55 et sortir à L\'Estaque. Traverser L\'Estaque et se rendre au village du Rove, se diriger vers Ensues et prendre à gauche la D48 qui descend vers le hameau de Niolon (ou celui de La Vesse). Un parking à Niolon à partir des premières maisons.', NULL, '', 1),
(6, NULL, 'Sainte-Baume : Pic de Bertagne', 'falaise', 5.688910007476807, 43.31209945678711, 'C\'est la falaise d\'entrainement à la montagne et à l\'alpinisme pour les habitants de la région. la meilleure période pour y grimper est la saison chaude car étant à plus de 1000m d\'altitude, il y fait souvent frais . L\'hiver il y fait vraiment froid et on peut s’aguerrir à la grimpe hivernale surtout si le vent est levé car dans ce cas, il peut vraiment faire très froid…\\r\\nLe côté nord et le côté ouest sont les plus réputés mais les itineraires les plus verticaux sont en face ouest. la raideur de la face est bien plus imposante que dans les calanques ou à la sainte victoire.\\r\\nC\'est la mecque locale des itineraires de TA.\\r\\nIl y a de nombreux itinéraire très typés artif mais aussi de nombreuses voies plus faciles (ou plus dur) en libre. Ce site est un peu abandonné, mais peut être que l\'essor récent du trad va redorer cette face à l\'ambiance magique et à l\'escalade technique , assez exigeante et soutenue. Certes la mer n\'est pas en dessous comme dans les calanques, mais la vue sur les sommets du pays d’Aubagne, la mer au loin et Marseille vaut le détour ! et surtout la fraicheur qu\'elle apporte en été permet de profiter pleinement de ce massif.\\r\\n\\r\\nRocher\\r\\nC\'est un calcaire gris type face nord qui peut faire penser au verdon.\\r\\nLe rocher y est solide et sain (un peu moins en bas) ce qui permet la pose de protections fiables (plus que dans beaucoup d\'endroit des calanques).', NULL, '', 1),
(9, 2, 'adsf', 'zear', 11, 22, 'dsf', 'zaef', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

DROP TABLE IF EXISTS `sortie`;
CREATE TABLE IF NOT EXISTS `sortie` (
  `idsortie` int(11) NOT NULL AUTO_INCREMENT,
  `ssite` int(11) DEFAULT NULL,
  `organisateur` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `annonce` mediumtext COLLATE utf8_unicode_ci,
  `niveaumin` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `niveaumax` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idsortie`),
  KEY `sortie_fk0` (`ssite`),
  KEY `sortie_fk1` (`organisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `ssdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mode` int(11) NOT NULL,
  PRIMARY KEY (`ssid`),
  KEY `suivi_sortie_fk0` (`sssortie`),
  KEY `suivi_sortie_fk1` (`ssmembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD CONSTRAINT `FK_67F068BC93AA99E5` FOREIGN KEY (`cauteur`) REFERENCES `fos_user` (`id`),
  ADD CONSTRAINT `FK_67F068BCAACFFB57` FOREIGN KEY (`csortie`) REFERENCES `sortie` (`idsortie`),
  ADD CONSTRAINT `FK_67F068BCE9B2A4EA` FOREIGN KEY (`alerteuser`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_1DD39950F27DF825` FOREIGN KEY (`nauteur`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `FK_694309E4FE4C451D` FOREIGN KEY (`sregion`) REFERENCES `region` (`rid`);

--
-- Contraintes pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD CONSTRAINT `FK_3C3FD3F23057BBFA` FOREIGN KEY (`ssite`) REFERENCES `site` (`siteid`),
  ADD CONSTRAINT `FK_3C3FD3F24BD76D44` FOREIGN KEY (`organisateur`) REFERENCES `fos_user` (`id`);

--
-- Contraintes pour la table `suivisortie`
--
ALTER TABLE `suivisortie`
  ADD CONSTRAINT `FK_150B1F4D1780F1FD` FOREIGN KEY (`sssortie`) REFERENCES `sortie` (`idsortie`),
  ADD CONSTRAINT `FK_150B1F4DDD0BD926` FOREIGN KEY (`ssmembre`) REFERENCES `fos_user` (`id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
