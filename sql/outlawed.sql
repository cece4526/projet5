-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 02 fév. 2021 à 21:05
-- Version du serveur :  8.0.18
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `outlawed`
--

-- --------------------------------------------------------

--
-- Structure de la table `boss`
--

DROP TABLE IF EXISTS `boss`;
CREATE TABLE IF NOT EXISTS `boss` (
  `boss_id` int(11) NOT NULL AUTO_INCREMENT,
  `boss_title` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `boss_content` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `boss_createdAt` datetime NOT NULL,
  `boss_raid_id` int(11) NOT NULL,
  `boss_user_id` int(11) NOT NULL,
  PRIMARY KEY (`boss_id`),
  KEY `fk_boss_raid1_idx` (`boss_raid_id`),
  KEY `fk_user_id` (`boss_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `boss`
--

INSERT INTO `boss` (`boss_id`, `boss_title`, `boss_content`, `boss_createdAt`, `boss_raid_id`, `boss_user_id`) VALUES
(5, 'Hurlaile', '<h2>Hurlaile</h2>\r\n<p>&nbsp;</p>\r\n<p>Phase 1<br />Cri gla&ccedil;ant (Tous les tiers de la barre d\'&eacute;nergie du boss) : Vous devez casser la ligne de vue avec le boss pour reduire les d&eacute;g&acirc;ts subis (On passe de 100% de d&eacute;g&acirc;ts &agrave; 25%). Vous poserez &eacute;galement une flaque au sol qui va pourrir votre salle. IL FAUT PACKER LES FLAQUES !!<br />Exsanguin&eacute; : Vous allez stacker un debuff sur vous qui va vous r&eacute;duire les soins et recus ainsi que des d&eacute;g&acirc;ts sur la dur&eacute;e. Vous devez simplement slacker dans les AOE rouge au sol pour perdre 1 stack/1.5 seconde donc retirer votre debuff.<br />Echolocalisation : Le boss va cibler 3 joueurs avec une AOE rouge pendant 8 secondes. Il faudra simplement s\'&eacute;carter du raid &agrave; plus de 6 m&egrave;tres de ses copains pour exploser dans son coin et faire 0 damage.<br /><br />En H&eacute;ro&iuml;que : Le boss va faire apparaitre des SONAR dans la salle. Il faut simplement les &eacute;viter. Si jamais vous &ecirc;tes touch&eacute;s par 1 de ces AOE, vous allez &ecirc;tre fear pendant 4 secondes ET vous allez recevoir une descente sur la t&ecirc;te qui va vous infliger des d&eacute;g&acirc;ts &agrave; vous et a vos amis &agrave; moins de 6 m&egrave;tres de vous. Conseil : Evitez absolument ces AOE puisqu\'elles peuvent &ecirc;tre mortelles si vous slackez &agrave; plusieurs dans un sonar identique ! :D<br /><br />Phase 2<br />Durant cette phase, le boss est immunis&eacute; aux d&eacute;g&acirc;ts, jouez la donc full survie et aidez vos healer en balan&ccedil;ant quelques sorts de soins ! :)<br />SURTOUT, on ne touche pas le boss au risque de se faire tuer instantann&eacute;ment !<br /><br />Echolocalisation : Le boss va s\'arr&ecirc;ter et caster son cri. Il faudra veiller &agrave; bien se positionner derri&egrave;re un pyl&ocirc;ne afin de ne pas &ecirc;tre fear et de rester en vie.<br />Durant cette phase, il y &eacute;galement des sonar dans toute la salle qu\'il faudra donc &eacute;viter &agrave; tout prix !!<br />Conseil : Vous n\'&ecirc;tes pas oblig&eacute; de rester coll&eacute; au pyl&ocirc;ne, puisque vous avez simplement besoin d\'&ecirc;tre en LOS avec le boss.<br /><br />Et on recommence .. :D</p>\r\n<p><strong>Tank :</strong></p>\r\n<p>Morsure d\'exsanguination : Vous allez stacker le debuff Exsanguin&eacute; &agrave; 10 stacks et prendre une grosse claque !<br />L\'autre tank doit absoluement taunt d&egrave;s que vous chopez le debuff.<br />Vous devez donc, par la suite aller destacker votre debuff en slackant dans l\'AOE rouge au sol. Allez y rapidement puisque vous recevez beaucoup moins de heal et subissez des d&eacute;g&acirc;ts suppl&eacute;mentaires tant que le d&eacute;buff est actif !<br /><br />Placer le boss autour du pilier de fa&ccedil;on a simplifier le placement de votre groupe qui se packera au c&ocirc;t&eacute; oppos&eacute; en fonction du pyl&ocirc;ne.</p>\r\n<p><strong>R&ocirc;le DPS m&ecirc;l&eacute;e:</strong></p>\r\n<p>Sachez toujours de quel c&ocirc;t&eacute; du pyl&ocirc;ne vous allez vous placer pour &eacute;viter le cri du boss et le LOS. Une flaque mal plac&eacute;e peut emb&ecirc;ter tout votre raid.<br /><br />Si vous &ecirc;tes cibl&eacute;s par la descente (Grosse AOE rouge autour de vous), vous devez vous &eacute;carter vers l\'ext&eacute;rieur de votre raid.<br /><br />N\'h&eacute;sitez pas &agrave; claquer des CD d&eacute;fensifs lorsque vous avez des stacks d\'Exsanguin&eacute; puisque les soins recus vous seront r&eacute;duits ! :)<br /><br />Durant la P2 : LE DPS EST INUTILE !!! Jouez survie, soyez vos alli&eacute;s et &eacute;vitez les sonar !!!</p>\r\n<p>&nbsp;</p>\r\n<p><strong>R&ocirc;le DPS distant:</strong></p>\r\n<p>Sachez toujours de quel c&ocirc;t&eacute; du pyl&ocirc;ne vous allez vous placer pour &eacute;viter le cri du boss et le LOS. Une flaque mal plac&eacute;e peut emb&ecirc;ter tout votre raid.<br /><br />Si vous &ecirc;tes cibl&eacute;s par la descente (Grosse AOE rouge autour de vous), vous devez vous &eacute;carter vers l\'ext&eacute;rieur de votre raid.<br /><br />N\'h&eacute;sitez pas &agrave; claquer des CD d&eacute;fensifs lorsque vous avez des stacks d\'Exsanguin&eacute; puisque les soins recus vous seront r&eacute;duits ! :)<br /><br />Durant la P2 : LE DPS EST INUTILE !!! Jouez survie, soyez vos alli&eacute;s et &eacute;vitez les sonar !!!</p>\r\n<p><strong>R&ocirc;le Heal</strong>&nbsp;:</p>\r\n<p>Pr&eacute;tez attention aux personnes qui ont les debuffs (si ils ont trop de stack, mettez leur plut&ocirc;t des shield ou des r&eacute;ductions de d&eacute;g&acirc;ts suis, puisques les soins recus sont r&eacute;duis de 10%/stack.<br /><br />Les d&eacute;g&acirc;ts de raid se pr&eacute;voient puisqu\'ils interviennent sur le packing du cri, des 3 descentes sur les joueurs OU si les personnes slacks dans les sonar !</p>\r\n<p>Voici la vid&eacute;o de Kirling pour les visuels des sorts ! :D<br /><br /><br /><iframe src=\"https://www.youtube.com/embed/R1pqpC39DEs?t=471s\" width=\"560\" height=\"314\" allowfullscreen=\"allowfullscreen\" data-mce-fragment=\"1\"></iframe></p>', '2021-01-19 21:38:06', 1, 1),
(7, 'test2', '<p>zdad</p>', '2021-01-28 17:02:06', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `content` longtext,
  `boss_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `flag` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comments_boss1_idx` (`boss_id`),
  KEY `fk_comments_users1_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `pseudo`, `content`, `boss_id`, `user_id`, `createdAt`, `flag`) VALUES
(4, NULL, 'ces bien', 5, 1, '2021-01-19 22:40:58', 0);

-- --------------------------------------------------------

--
-- Structure de la table `extension`
--

DROP TABLE IF EXISTS `extension`;
CREATE TABLE IF NOT EXISTS `extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `extension`
--

INSERT INTO `extension` (`id`, `title`, `createdAt`) VALUES
(1, 'ShadowLand', '2021-01-19 15:36:07'),
(7, 'test extension', '2021-01-28 17:04:03');

-- --------------------------------------------------------

--
-- Structure de la table `raid`
--

DROP TABLE IF EXISTS `raid`;
CREATE TABLE IF NOT EXISTS `raid` (
  `raid_id` int(11) NOT NULL AUTO_INCREMENT,
  `raid_title` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `raid_createdAt` datetime NOT NULL,
  `raid_extension_id` int(11) NOT NULL,
  PRIMARY KEY (`raid_id`),
  KEY `fk_raid_extension_idx` (`raid_extension_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `raid`
--

INSERT INTO `raid` (`raid_id`, `raid_title`, `raid_createdAt`, `raid_extension_id`) VALUES
(1, 'Château Nathria', '2021-01-19 17:50:40', 1),
(16, 'test raid', '2021-01-28 17:12:33', 7);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'moderateur'),
(3, 'user');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_role1_idx` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `createdAt`, `role_id`) VALUES
(1, 'eoen4526', '$2y$10$oOGceRx1poumUCRJIGI7mudyAfARyMzIMNj5nPB9B2WOW4EFBuQja', '2021-01-14 17:33:03', 1),
(2, 'tete', '$2y$10$YZkOSknRc41UE4dOrGZ3se28JBLNdt3jb7eeewMI6nl89J6BRcXI.', '2021-01-14 17:36:58', 3);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `boss`
--
ALTER TABLE `boss`
  ADD CONSTRAINT `fk_raid_id` FOREIGN KEY (`boss_raid_id`) REFERENCES `raid` (`raid_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`boss_user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comments_boss1` FOREIGN KEY (`boss_id`) REFERENCES `boss` (`boss_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_comments_users1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `raid`
--
ALTER TABLE `raid`
  ADD CONSTRAINT `fk_raid_extension` FOREIGN KEY (`raid_extension_id`) REFERENCES `extension` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_users_role1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
