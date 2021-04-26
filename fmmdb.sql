-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mar 07 Janvier 2020 à 09:35
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fmmdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `Adherent`
--

CREATE TABLE `Adherent` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Adherent`
--

INSERT INTO `Adherent` (`id`, `nom`, `prenom`, `mail`, `pass`, `admin`) VALUES
(1, 'Raffy', 'Marc', 'marc.raffy@etu.unilim.fr', 'abcdef', 1),
(2, 'de Weyer', 'François', 'francois.deweyer@etu.unilim.fr', '123456', 0),
(3, '4', 'test', 'test4@etu.unilim.fr', 'test4', 0),
(4, '6', 'test', 'test6@etu.unilim.fr', 'test6', 0),
(5, '7', 'test', 'test7@etu.unilim.fr', 'test7', 0),
(6, '8', 'test', 'test8@etu.unilim.fr', 'test8', 0),
(7, '9', 'test', 'test9@etu.unilim.fr', 'test9', 0),
(8, 'test10', 'test', 'test10@etu.unilim.fr', 'test10', 0),
(9, 'Robuchon', 'Philippe', 'kylian.robuchon@etu.unilim.fr', 'tteesstt', 0),
(10, 'Matet', 'Lise', 'lise.matet@etu.unilim.fr', 'baka', 0),
(11, 'test', 'test', 'test@etu.unilim.fr', 'abc', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `idCommande` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `article` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idCommande`, `ref`, `article`, `quantite`, `idClient`) VALUES
(50, 3, 'Figurine', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `article` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `quantité` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`article`, `prix`, `ref`, `quantité`) VALUES
('Sweet-rose-L', 50, 1, 964),
('Sweet-Bleu-L', 60, 2, 48),
('Figurine', 5, 3, 53),
('antisèche(maths)', 100, 4, 956),
('T-shirt-rose-L', 30, 5, 906),
('T-shirt-bleu-L', 35, 6, 963);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Adherent`
--
ALTER TABLE `Adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`idCommande`),
  ADD KEY `ref` (`ref`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`ref`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Adherent`
--
ALTER TABLE `Adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `idCommande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `ref` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`ref`) REFERENCES `panier` (`ref`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`idClient`) REFERENCES `Adherent` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
