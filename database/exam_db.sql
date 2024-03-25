-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 18 mars 2024 à 14:11
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `exam_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_acc`
--

DROP TABLE IF EXISTS `admin_acc`;
CREATE TABLE IF NOT EXISTS `admin_acc` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_user` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_pass` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'herihasinamichael@gmail.com', 'herihasinam1221');

-- --------------------------------------------------------

--
-- Structure de la table `course_tbl`
--

DROP TABLE IF EXISTS `course_tbl`;
CREATE TABLE IF NOT EXISTS `course_tbl` (
  `cou_id` int NOT NULL AUTO_INCREMENT,
  `cou_name` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cou_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `num_etudiant` varchar(1000) NOT NULL,
  `exmne_fullname` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `exmne_course` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `exmne_gender` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `exmne_birthdate` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `niveau` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ard_email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `exmne_password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `exmne_status` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`num_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `num_exam` varchar(1000) NOT NULL,
  `num_etudiant` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `annee_univ` varchar(1000) CHARACTER SET utf32 COLLATE utf32_general_ci NOT NULL,
  `note` int NOT NULL,
  `cou_id` int NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`num_exam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exam_answers`
--

DROP TABLE IF EXISTS `exam_answers`;
CREATE TABLE IF NOT EXISTS `exam_answers` (
  `exans_id` int NOT NULL AUTO_INCREMENT,
  `axmne_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `quest_id` int NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`exans_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `exam_attempt`
--

DROP TABLE IF EXISTS `exam_attempt`;
CREATE TABLE IF NOT EXISTS `exam_attempt` (
  `examat_id` int NOT NULL AUTO_INCREMENT,
  `num_etudiant` varchar(1000) NOT NULL,
  `exam_id` int NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used',
  PRIMARY KEY (`examat_id`),
  KEY `examat_id` (`num_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks_tbl`
--

DROP TABLE IF EXISTS `feedbacks_tbl`;
CREATE TABLE IF NOT EXISTS `feedbacks_tbl` (
  `fb_id` int NOT NULL AUTO_INCREMENT,
  `num_etudiant` varchar(1000) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL,
  PRIMARY KEY (`fb_id`),
  KEY `fb_id` (`num_etudiant`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `num_quest` int NOT NULL AUTO_INCREMENT,
  `exam_id` int NOT NULL,
  `question` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reponse1` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reponse2` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reponse3` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reponse4` varchar(1000) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`num_quest`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `num_exam` FOREIGN KEY (`num_exam`) REFERENCES `etudiant` (`num_etudiant`);

--
-- Contraintes pour la table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD CONSTRAINT `examat_id` FOREIGN KEY (`num_etudiant`) REFERENCES `etudiant` (`num_etudiant`);

--
-- Contraintes pour la table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD CONSTRAINT `fb_id` FOREIGN KEY (`num_etudiant`) REFERENCES `etudiant` (`num_etudiant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
