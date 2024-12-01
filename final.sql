-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 01 déc. 2024 à 21:11
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `final`
--

-- --------------------------------------------------------

--
-- Structure de la table `banned_table`
--

CREATE TABLE `banned_table` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `banned` int(11) DEFAULT NULL,
  `login_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `banned_table`
--

INSERT INTO `banned_table` (`id`, `ip_address`, `banned`, `login_count`) VALUES
(1, '127.0.0.1', 0, 0),
(15, '::1', 1683664804, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `nom_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `nom_cat`) VALUES
(3, 'Medical'),
(7, 'Sports'),
(11, 'Boissons');

-- --------------------------------------------------------

--
-- Structure de la table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'SkanLDS2598@gmail.com', '96444', 1682634891),
(2, 'SkanLDS2598@gmail.com', '53095', 1682634930),
(3, 'SkanLDS2598@gmail.com', '38257', 1682635035),
(4, 'SkanLDS2598@gmail.com', '53962', 1682689314),
(5, 'SkanLDS2598@gmail.com', '95232', 1682689415),
(6, 'SkanLDS2598@gmail.com', '40336', 1682692717),
(7, 'SkanLDS2598@gmail.com', '89423', 1682692764),
(8, 'SkanLDS2598@gmail.com', '66989', 1683190695);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `panier` varchar(100) NOT NULL,
  `id_commande` int(8) NOT NULL,
  `pay` varchar(255) NOT NULL,
  `adda` varchar(20) NOT NULL,
  `code_post` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `tel` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`panier`, `id_commande`, `pay`, `adda`, `code_post`, `f_name`, `l_name`, `tel`) VALUES
('medoussemaboussida@gmail.com', 43, 'Anti-Stress (1), ChillVen(1)', '21 Chotrana 3 , La S', 'fff', 'med', 'boussida', 54007403),
('medoussemaboussida@gmail.com', 44, 'Anti-Stress (1), ChillVen(1), Gants de box(1), Anti-Stress (1)', 'zahra', '1111', 'boughdiri', 'ahmed', 54007403),
('medoussemaboussida@gmail.com', 45, 'Anti-Stress (1), ChillVen(1), Gants de box(1), Anti-Stress (1)', 'zahra', '1111', 'boughdiri', 'ahmed', 54007403),
('medoussemaboussida@gmail.com', 46, 'Anti-Stress (1), ChillVen(1), Gants de box(1), Anti-Stress (1)', 'zahra', '1111', 'boughdiri', 'ahmed', 54007403);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_u` int(11) NOT NULL,
  `id_demande` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `hauteur` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id_e` int(11) NOT NULL,
  `titre_e` varchar(255) NOT NULL,
  `image_e` varchar(255) NOT NULL,
  `description_e` varchar(255) NOT NULL,
  `date_e` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`id_e`, `titre_e`, `image_e`, `description_e`, `date_e`) VALUES
(17, 'yyyyy', 'anime-boys-cute-tanjiro-demon-slayer-35l4bjtj4qxesq06.jpg', 'azer', '2024-11-20'),
(18, 'sssss', 'bootstrap-5-admin-template.jpg', 'aaaa', '2012-11-25'),
(22, 'AAAA', 'footer.png', 'aaaa', '2001-11-25'),
(23, 'ousemaeveent', 'cisco.PNG', 'efwdfs', '1000-05-05');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id_panier` int(11) NOT NULL,
  `namee` varchar(20) NOT NULL,
  `quantite` int(20) NOT NULL,
  `prix_total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `namee`, `quantite`, `prix_total`) VALUES
(120, 'Anti-Stress ', 1, 17),
(121, 'ChillVen', 1, 30),
(122, 'Gants de box', 1, 20),
(123, 'Anti-Stress ', 1, 17),
(124, 'Anti-Stress ', 1, 17),
(125, 'Gants de box', 1, 20),
(126, 'Gants de box', 2, 20),
(127, 'Anti-Stress ', 1, 17),
(128, 'Anti-Stress ', 1, 17);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(50) NOT NULL,
  `categorie_produit` varchar(50) NOT NULL,
  `quantite_produit` int(50) NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `image_produit` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `nom_produit`, `categorie_produit`, `quantite_produit`, `prix_produit`, `image_produit`) VALUES
(18, 'Anti-Stress ', '3', 7, 17, '../Uploads/vitastress.jpg'),
(19, 'Gants de box', '7', 15, 20, '../Uploads/box.jpg'),
(23, 'Doliprane', '3', 15, 30, '../Uploads/doliprane.jpg'),
(24, 'ChillVen', '11', 24, 30, '../Uploads/chilled_cbd.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `program`
--

CREATE TABLE `program` (
  `id_demande` int(11) NOT NULL,
  `type_demande` int(11) NOT NULL,
  `Desc_diet` int(11) NOT NULL,
  `Desc_workout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `program`
--

INSERT INTO `program` (`id_demande`, `type_demande`, `Desc_diet`, `Desc_workout`) VALUES
(1, 4445, 989, 87),
(2, 477, 888, 7777);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id_rec` int(11) NOT NULL,
  `description_rec` varchar(255) NOT NULL,
  `image_rec` varchar(255) NOT NULL,
  `event_rec` int(255) NOT NULL,
  `mail_rec` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id_rec`, `description_rec`, `image_rec`, `event_rec`, `mail_rec`) VALUES
(58, 'RRRRRR', 'schema-requete-http.jpg', 17, 'nour.amara@esprit.tn'),
(59, 'RRRRRR', 'schema-requete-http.jpg', 17, 'mohamedkhaled.tebourbi@esprit.tn'),
(60, 'RRRRRR', 'schema-requete-http.jpg', 17, 'nour.amara@esprit.tn'),
(62, 'eeee', 'tp1 s.png', 17, 'nour.amara@esprit.tn'),
(65, 'c\'est pas possible', 'anime-boys-cute-tanjiro-demon-slayer-35l4bjtj4qxesq06.jpg', 17, 'medoussemaboussida@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_reservation` date NOT NULL,
  `phone` int(11) NOT NULL,
  `type_reservation` varchar(30) NOT NULL,
  `id_seance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `username`, `email`, `date_reservation`, `phone`, `type_reservation`, `id_seance`) VALUES
(185, 'fathii', 'maddeh.fathi@esprit.tn', '2023-05-04', 54454445, 'meditation', 14),
(187, 'ijj', 'maddeh.fathi@esprit.tn', '2023-05-19', 45454545, 'meditation', 14),
(188, 'agfsy', 'maddeh.fathi@esprit.tn', '2023-05-18', 54454445, 'meditation', 14),
(189, 'moez', 'maddeh.fathi@esprit.tn', '2023-05-22', 45454545, 'fitness', 11),
(190, 'okfoe', 'maddeh.fathi@esprit.tn', '2023-05-20', 45454545, 'coaching', 21);

-- --------------------------------------------------------

--
-- Structure de la table `seances`
--

CREATE TABLE `seances` (
  `id_seance` int(11) NOT NULL,
  `type_seance` varchar(50) NOT NULL,
  `dure_seance` int(11) NOT NULL,
  `nbr_maximal` int(11) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `image_seance` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seances`
--

INSERT INTO `seances` (`id_seance`, `type_seance`, `dure_seance`, `nbr_maximal`, `categorie`, `image_seance`) VALUES
(11, 'fitness', 1, 1, 'll', '../Uploads/téléchargement (1).jpg'),
(14, 'meditation', 1, 1, 'kk', '../Uploads/19681127.png'),
(21, 'coaching', 2, 2, 'all', '../Uploads/téléchargement.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'email@email.com', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `user_hub`
--

CREATE TABLE `user_hub` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_hub`
--

INSERT INTO `user_hub` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(1, 'Skander', 'skanderlandolsi29@yahoo.fr', '25f9e794323b453885f5181f1b624d0b', 'admin'),
(23, 'Khaled', 'Khaled@gmail.com', '6269a28fc2c053bb09b5c3419fc78f0f', 'user'),
(31, 'splinter', 'SkanLDS2598@gmail.com', '$2y$10$duACd3zG0ExELJpzlYR5e.TTDEosjCxllMe4Z8EAnzmEyHUMCgjU.', 'user'),
(32, 'Hasna ', 'Hasna@gmail.com', '6728539ab3e931cd045b04e795418d60', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `banned_table`
--
ALTER TABLE `banned_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip_address` (`ip_address`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id_e`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_panier`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_demande`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id_rec`),
  ADD KEY `FK_eventrec` (`event_rec`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_seance` (`id_seance`);

--
-- Index pour la table `seances`
--
ALTER TABLE `seances`
  ADD PRIMARY KEY (`id_seance`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- Index pour la table `user_hub`
--
ALTER TABLE `user_hub`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `banned_table`
--
ALTER TABLE `banned_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id_e` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `program`
--
ALTER TABLE `program`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id_rec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT pour la table `seances`
--
ALTER TABLE `seances`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user_hub`
--
ALTER TABLE `user_hub`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `FK_eventrec` FOREIGN KEY (`event_rec`) REFERENCES `evenement` (`id_e`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_seance`) REFERENCES `seances` (`id_seance`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
