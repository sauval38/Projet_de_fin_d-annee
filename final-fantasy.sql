-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2024 at 09:42 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final-fantasy`
--

-- --------------------------------------------------------

--
-- Table structure for table `boss`
--

CREATE TABLE `boss` (
  `id` int(11) NOT NULL,
  `games_id` int(11) DEFAULT NULL,
  `name_boss` varchar(255) DEFAULT NULL,
  `descriptions_boss` text,
  `HP_boss` bigint(20) DEFAULT NULL,
  `MP_boss` bigint(20) DEFAULT NULL,
  `loots_boss` varchar(255) DEFAULT NULL,
  `weakness_boss` varchar(255) DEFAULT NULL,
  `location_boss` varchar(255) DEFAULT NULL,
  `gils_boss` bigint(20) DEFAULT NULL,
  `experiences_boss` bigint(20) DEFAULT NULL,
  `images_boss` text,
  `path` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boss`
--

INSERT INTO `boss` (`id`, `games_id`, `name_boss`, `descriptions_boss`, `HP_boss`, `MP_boss`, `loots_boss`, `weakness_boss`, `location_boss`, `gils_boss`, `experiences_boss`, `images_boss`, `path`, `created_at`, `updated_at`) VALUES
(2, 6, 'Sergent', 'Utilisez votre magie pour lui ôter plus de vie et protégez-vous avec Carapace et Leurre. Pensez toujours à bien vous soigner.', 420, 10, 'Armet Mithril, Hache Mithril, Armure Mithril, Arc Mithril', '', '', NULL, NULL, NULL, 'assets/images/', '2024-07-30 14:21:59', '2024-08-02 11:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `character`
--

CREATE TABLE `character` (
  `id` int(11) NOT NULL,
  `games_id` int(11) DEFAULT NULL,
  `names_character` varchar(255) DEFAULT NULL,
  `descriptions_character` text,
  `jobs_character` varchar(50) DEFAULT NULL,
  `limits_break_character` varchar(25) DEFAULT NULL,
  `age_character` int(200) DEFAULT NULL,
  `armed_character` text,
  `size_character` decimal(11,2) DEFAULT NULL,
  `date_o_birth_character` datetime DEFAULT NULL,
  `place_of_birth_character` varchar(100) DEFAULT NULL,
  `images_character` text,
  `path` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `character`
--

INSERT INTO `character` (`id`, `games_id`, `names_character`, `descriptions_character`, `jobs_character`, `limits_break_character`, `age_character`, `armed_character`, `size_character`, `date_o_birth_character`, `place_of_birth_character`, `images_character`, `path`, `created_at`, `updated_at`) VALUES
(10, 5, 'Guerrier', 'Le Guerrier est le personnage de front par excellence. Sa force, sa constitution ainsi que son nombre de HP impressionnant font de lui le pion majeur des équipes formées pour le combat. Son agilité est respectable mais sa sagesse ne se développera qu’une fois devenu Paladin. Il peut porter le choix le plus large d’armes et d’armures, mais sa valeur ne se révèle que lorsqu’il est équipé des meilleurs équipements, qui malheureusement coûtent assez cher. Un personnage très puissant, aussi bien en défense qu’en attaque, mais également très coûteux.', '', '', 0, '', NULL, NULL, '', 'guerrier ff1.jpg', 'assets/images/', '2024-07-25 15:07:50', '2024-07-25 15:07:50'),
(11, 6, 'Firion', 'Orphelin du royaume de Fynn, il fut adopté par les parents de Maria et de Léon. Il décide de se joindre à la résistance après la mort de ses parents adoptifs. Ceux-ci furent tués par l’Empire de Palamécia lors de l’attaque de Fynn. C’est un jeune homme déterminé, prêt à tout pour venger la mort de ceux qu’il a aimés, mais aussi pour défendre la vie de ceux qui ont survécu. Armé d’une épée, il redouble de puissance.', '', '', NULL, 'Epée', NULL, NULL, '', 'ff2 firion.jpg', 'assets/images/', '2024-07-30 14:18:54', '2024-07-30 14:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `titles_article` varchar(100) NOT NULL,
  `descriptions_article` text NOT NULL,
  `story_article` text NOT NULL,
  `platforms_article` varchar(150) NOT NULL,
  `modes_article` varchar(50) NOT NULL,
  `genres_article` varchar(50) NOT NULL,
  `designers_article` varchar(50) NOT NULL,
  `developers_article` varchar(50) NOT NULL,
  `editors_article` varchar(50) NOT NULL,
  `gameplay_article` text NOT NULL,
  `informations_article` text NOT NULL,
  `dates_release` date NOT NULL,
  `images_article` text NOT NULL,
  `path` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `titles_article`, `descriptions_article`, `story_article`, `platforms_article`, `modes_article`, `genres_article`, `designers_article`, `developers_article`, `editors_article`, `gameplay_article`, `informations_article`, `dates_release`, `images_article`, `path`, `created_at`, `updated_at`) VALUES
(5, 'Final Fantasy I', 'Final Fantasy I est un jeu vidéo de rôle (RPG) développé par Square Enix (alors Square) et initialement publié en 1987 pour la Nintendo Entertainment System (NES). C\'est le premier jeu de la célèbre série Final Fantasy, marquant le début d\'une saga qui allait devenir l\'une des franchises les plus emblématiques du genre RPG.', 'L\'histoire se déroule dans un monde de fantasy où les 4 Guerriers de la Lumière se lèvent pour restaurer l\'équilibre du monde. Les héros, chacun portant une Orbe de la lumière, doivent combattre les ténèbres qui menacent de plonger le monde dans le chaos. Leur quête les amène à voyager à travers divers paysages, combattre des monstres et affronter des ennemis puissants pour rétablir la lumière.', ' PlayStation Portable', 'Solo', 'JRPG, Jeu d\'aventure', 'Akitoshi Kawazu, Kōichi Ishii, Hiromichi Tanaka', 'Square, Square Enix', 'Square Enix (anciennement Square Soft)', 'e combat se déroule en mode tour par tour, où les joueurs choisissent les actions de leurs personnages, comme attaquer, utiliser des sorts magiques ou des objets. L\'équipement joue un rôle crucial ; les personnages peuvent acquérir et équiper diverses armes, armures et accessoires pour améliorer leurs capacités. En accumulant de l\'expérience à travers les combats, les personnages montent de niveau, augmentant leurs statistiques et débloquant de nouvelles compétences.', 'Pour l’époque, Final Fantasy 1 offrait des graphismes en 8 bits qui, bien que simples par rapport aux standards modernes, étaient innovants pour le genre. La musique du jeu, composée par Nobuo Uematsu, est très mémorable et a contribué à définir l\'identité musicale de la série.', '1987-12-18', 'final_fantasy_1.jpg', 'assets/images/', '2024-07-23 13:42:38', '2024-07-23 13:42:38'),
(6, 'Final Fantasy II', 'Final Fantasy II est un jeu vidéo de rôle (RPG) développé par Square Enix, initialement sorti au Japon en 1988 pour la Nintendo Entertainment System (NES). C\'est le deuxième jeu de la célèbre série Final Fantasy. Contrairement à son prédécesseur, Final Fantasy II introduit une nouvelle histoire, de nouveaux personnages et des mécanismes de jeu innovants.', 'L\'histoire de Final Fantasy II se concentre sur un groupe de jeunes orphelins, Firion, Maria, Guy et Leon, dont le village est détruit par l\'Empire Palamecia. Ils rejoignent la résistance pour lutter contre l\'Empire et restaurer la paix dans le monde. Le jeu explore des thèmes de guerre, de perte et de camaraderie, offrant une narration plus profonde que son prédécesseur.', ' PlayStation Portable', 'Solo', 'JRPG, Jeu d\'aventure', 'Yoshitaka Amano, Nobuo Uematsu', ' Square, Square Enix, TOSE', 'Square, Square Enix, SQUARE ENIX CO., LTD.', 'Le gameplay de Final Fantasy II diffère notablement du premier jeu. Au lieu d\'utiliser un système de niveaux traditionnel, les personnages améliorent leurs compétences en utilisant des armes et des sorts spécifiques. Par exemple, utiliser une épée fréquemment augmentera la compétence de l\'utilisateur avec les épées. Ce système unique a été un point de divergence pour de nombreux joueurs.', 'inal Fantasy II a reçu des critiques mitigées à sa sortie initiale en raison de ses mécanismes de jeu non conventionnels, mais il est maintenant apprécié pour son innovation et son influence sur les futurs jeux de la série. Il a été réédité plusieurs fois sur diverses plateformes, permettant à de nouvelles générations de joueurs de découvrir ce classique.', '1988-12-17', 'final_fantasy_2.jpg', 'assets/images/', '2024-07-30 14:18:01', '2024-07-30 14:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `last_connection` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `last_connection`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Ch.SAUVAL', '$2y$10$w/1teOBlGCzuwYblNxmUSO0uSe1OAshcaZlTqwb16pUMPbXLrUJGm', 'boubou601@live.fr', 'admin', '2024-07-12 13:00:49', 1, '2024-07-12 13:00:49', '2024-08-02 08:17:11'),
(2, 'superkiri69', '$2y$10$ducvUE4lVGIyKpYUcgsIT.zL0wZqQSs4TdDqtdprwXZG8/QG8oUyy', 'jenniferblasco230389@hotmail.com', 'user', '2024-07-17 09:56:06', 1, '2024-07-17 09:56:06', '2024-07-17 09:56:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boss`
--
ALTER TABLE `boss`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_games_boss` (`games_id`);

--
-- Indexes for table `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_games_character` (`games_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boss`
--
ALTER TABLE `boss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `character`
--
ALTER TABLE `character`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `boss`
--
ALTER TABLE `boss`
  ADD CONSTRAINT `fk_games_boss` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`);

--
-- Constraints for table `character`
--
ALTER TABLE `character`
  ADD CONSTRAINT `fk_games_character` FOREIGN KEY (`games_id`) REFERENCES `games` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
