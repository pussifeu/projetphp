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
-- Base de données : `exame_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_acc`
--

CREATE TABLE `admin_acc` (
  `admin_id` int(11) NOT NULL,
  `admin_user` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `admin_pass` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_acc`
--

INSERT INTO `admin_acc` (`admin_id`, `admin_user`, `admin_pass`) VALUES
(1, 'herihasinamichael@gmail.com', 'herihasinam1221');

-- --------------------------------------------------------

--
-- Structure de la table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `cou_id` int(11) NOT NULL,
  `cou_name` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `cou_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `course_tbl`
--

INSERT INTO `course_tbl` (`cou_id`, `cou_name`, `cou_created`) VALUES
(10, 'PHP', '2024-03-19 13:30:33'),
(12, 'ANALYSE', '2024-03-22 18:26:28'),
(15, 'FRANCAIS', '2024-03-23 22:46:26'),
(16, 'ARCHI', '2024-03-24 21:27:31');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `num_etudiant` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `exmne_fullname` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `exmne_course` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `exmne_gender` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `exmne_birthdate` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `niveau` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `adr_email` varchar(1000) CHARACTER SET utf8 NOT NULL,
  `exmne_password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `exmne_status` varchar(1000) CHARACTER SET utf8 NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`num_etudiant`, `exmne_fullname`, `exmne_course`, `exmne_gender`, `exmne_birthdate`, `niveau`, `adr_email`, `exmne_password`, `exmne_status`) VALUES
('2970', 'Ladina Be', '12,16,10,15', 'male', '2024-03-07', 'L2', 'ladina@gmail.com', 'ladina', 'active'),
('2971', 'Tsiory Raphael', '12', 'male', '2004-03-06', 'L2', 'Tsiory@gmail.com', 'tsiory', 'active'),
('5555', 'rahery', '10,12,15,16', 'male', '2024-03-14', 'L1', 'rahery@gmail.com', 'herihasinam1221', 'active'),
('5882', 'Test RAKOTO', '10,12,15,16', 'male', '2024-03-19', 'L2', 'rkt.herinjaka@gmail.com', 'test1234', 'active');

-- --------------------------------------------------------

--
-- Structure de la table `examen`
--

CREATE TABLE `examen` (
  `num_exam` int(11) NOT NULL,
  `cou_id` int(11) NOT NULL,
  `ex_title` varchar(1000) NOT NULL,
  `ex_time_limit` varchar(1000) NOT NULL,
  `ex_questlimit_display` int(11) NOT NULL,
  `ex_description` varchar(1000) NOT NULL,
  `ex_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `examen`
--

INSERT INTO `examen` (`num_exam`, `cou_id`, `ex_title`, `ex_time_limit`, `ex_questlimit_display`, `ex_description`, `ex_created`) VALUES
(1, 10, 'PHP ', '30', 10, 'connection BD', '2024-03-19 13:31:25'),
(4, 12, 'Calcule', '60', 10, 'szay', '2024-03-22 19:16:52'),
(5, 15, 'Phrase', '10', 1, 'szay', '2024-03-25 13:52:14'),
(13, 16, 'Architecture', '10', 10, 'qcm', '2024-03-26 00:43:19');

-- --------------------------------------------------------

--
-- Structure de la table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `exans_id` int(11) NOT NULL,
  `axmne_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `quest_id` int(11) NOT NULL,
  `exans_answer` varchar(1000) NOT NULL,
  `exans_status` varchar(1000) NOT NULL DEFAULT 'new',
  `exans_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exam_answers`
--

INSERT INTO `exam_answers` (`exans_id`, `axmne_id`, `exam_id`, `quest_id`, `exans_answer`, `exans_status`, `exans_created`) VALUES
(156, 5882, 5, 24, 's', 'new', '2024-03-26 01:17:21'),
(157, 5882, 4, 20, '24', 'new', '2024-03-26 01:18:25'),
(158, 5882, 4, 17, '156', 'new', '2024-03-26 01:18:25'),
(159, 5882, 4, 19, '24', 'new', '2024-03-26 01:18:25'),
(160, 5882, 4, 16, '72', 'new', '2024-03-26 01:18:25'),
(161, 5882, 4, 22, '60', 'new', '2024-03-26 01:18:25'),
(162, 5882, 4, 21, '15', 'new', '2024-03-26 01:18:25'),
(163, 5882, 4, 18, '48', 'new', '2024-03-26 01:18:25'),
(164, 5882, 4, 23, '54', 'new', '2024-03-26 01:18:25'),
(165, 5882, 4, 15, '65', 'new', '2024-03-26 01:18:25'),
(166, 5882, 4, 14, '24', 'new', '2024-03-26 01:18:25');

-- --------------------------------------------------------

--
-- Structure de la table `exam_attempt`
--

CREATE TABLE `exam_attempt` (
  `examat_id` int(11) NOT NULL,
  `num_etudiant` varchar(1000) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `examat_status` varchar(1000) NOT NULL DEFAULT 'used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exam_attempt`
--

INSERT INTO `exam_attempt` (`examat_id`, `num_etudiant`, `exam_id`, `examat_status`) VALUES
(115, '5882', 5, 'used'),
(116, '5882', 4, 'used');

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks_tbl`
--

CREATE TABLE `feedbacks_tbl` (
  `fb_id` int(11) NOT NULL,
  `num_etudiant` varchar(1000) NOT NULL,
  `fb_exmne_as` varchar(1000) NOT NULL,
  `fb_feedbacks` varchar(1000) NOT NULL,
  `fb_date` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `feedbacks_tbl`
--

INSERT INTO `feedbacks_tbl` (`fb_id`, `num_etudiant`, `fb_exmne_as`, `fb_feedbacks`, `fb_date`) VALUES
(22, '3067', 'Razafibe Tiana', 'norma ee', 'March 19, 2024'),
(23, '2971', 'Tsiory Raphael', 'mety ka', 'March 22, 2024'),
(25, '5555', 'Anonymous', 'inconito\r\n', 'March 23, 2024'),
(28, '2971', 'Tsiory Raphael', '', 'March 25, 2024');

-- --------------------------------------------------------

--
-- Structure de la table `qcm`
--

CREATE TABLE `qcm` (
  `num_quest` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` varchar(1000) NOT NULL,
  `reponse1` varchar(1000) NOT NULL,
  `reponse2` varchar(1000) NOT NULL,
  `reponse3` varchar(1000) NOT NULL,
  `reponse4` varchar(1000) NOT NULL,
  `exam_answer` varchar(1000) NOT NULL,
  `exam_status` varchar(1000) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `qcm`
--

INSERT INTO `qcm` (`num_quest`, `exam_id`, `question`, `reponse1`, `reponse2`, `reponse3`, `reponse4`, `exam_answer`, `exam_status`) VALUES
(14, 4, 'Calculer 19+2', '21', '23', '24', '25', '21', 'active'),
(15, 4, '50+7', '45', '57', '65', '89', '57', 'active'),
(16, 4, '67+4', '74', '76', '72', '71', '71', 'active'),
(17, 4, '55+55', '109', '100', '110', '156', '110', 'active'),
(18, 4, '45+5', '49', '50', '48', '52', '50', 'active'),
(19, 4, '10+10', '20', '54', '24', '26', '20', 'active'),
(20, 4, '19+6', '25', '45', '23', '24', '25', 'active'),
(21, 4, '4+4', '6', '8', '15', '24', '8', 'active'),
(22, 4, '56+4', '55', '59', '61', '60', '60', 'active'),
(23, 4, '47+10', '67', '56', '57', '54', '57', 'active'),
(24, 5, 'Qui est tu?', 'o', 'a', 'i', 's', 's', 'active');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin_acc`
--
ALTER TABLE `admin_acc`
  ADD PRIMARY KEY (`admin_id`);

--
-- Index pour la table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`cou_id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`num_etudiant`);

--
-- Index pour la table `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`num_exam`);

--
-- Index pour la table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`exans_id`);

--
-- Index pour la table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  ADD PRIMARY KEY (`examat_id`);

--
-- Index pour la table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  ADD PRIMARY KEY (`fb_id`);

--
-- Index pour la table `qcm`
--
ALTER TABLE `qcm`
  ADD PRIMARY KEY (`num_quest`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin_acc`
--
ALTER TABLE `admin_acc`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `cou_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `examen`
--
ALTER TABLE `examen`
  MODIFY `num_exam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `exans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT pour la table `exam_attempt`
--
ALTER TABLE `exam_attempt`
  MODIFY `examat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT pour la table `feedbacks_tbl`
--
ALTER TABLE `feedbacks_tbl`
  MODIFY `fb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `qcm`
--
ALTER TABLE `qcm`
  MODIFY `num_quest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
