-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 26 mars 2021 à 12:14
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `TodoList`
--

-- --------------------------------------------------------

--
-- Structure de la table `create_todos`
--

CREATE TABLE `create_todos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `task` text NOT NULL,
  `createdAT` datetime DEFAULT NULL,
  `updatedAT` datetime DEFAULT NULL,
  `deadLine` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `create_todos`
--

INSERT INTO `create_todos` (`id`, `id_user`, `task`, `createdAT`, `updatedAT`, `deadLine`) VALUES
(61, 22, 'test avec la database', '2021-03-15 00:28:02', NULL, NULL),


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID`, `username`, `pass`) VALUES
(22, 'admin', '$2y$10$0tqZWtefszc9K6RUt3v4uOQ4w9VcVlLENGisvbdUlOtan7/slBLLW'),

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `create_todos`
--
ALTER TABLE `create_todos`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `create_todos`
--
ALTER TABLE `create_todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;