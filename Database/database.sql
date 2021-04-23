-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 23 avr. 2021 à 12:21
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `safeTodoList`
--

-- --------------------------------------------------------

--
-- Structure de la table `create_todos`
--

CREATE TABLE `create_todos` (
  `id_todos` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order_todos` int(11) DEFAULT NULL,
  `task` text NOT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `createdAT` datetime DEFAULT NULL,
  `updatedAT` datetime DEFAULT NULL,
  `deadLine` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `number_todos_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `create_todos`
--
ALTER TABLE `create_todos`
  ADD PRIMARY KEY (`id_todos`);

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
  MODIFY `id_todos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;