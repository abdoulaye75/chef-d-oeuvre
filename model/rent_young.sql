-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 24 Août 2017 à 17:30
-- Version du serveur :  5.7.19-0ubuntu0.17.04.1
-- Version de PHP :  7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `rent_young`
--

-- --------------------------------------------------------

--
-- Structure de la table `accompagnists`
--

CREATE TABLE `accompagnists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accompagnists`
--

INSERT INTO `accompagnists` (`id`, `name`, `firstname`, `login`, `password`) VALUES
(1, 'blanc', 'michel', 'michel', 'blanc');

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'abdoulaye', 'paris18');

-- --------------------------------------------------------

--
-- Structure de la table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `drivers`
--

INSERT INTO `drivers` (`id`, `name`, `firstname`, `login`, `password`) VALUES
(1, 'dabo', 'abdoulaye', 'abdoulaye', 'paris');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `dateRent` varchar(255) NOT NULL,
  `timeRent` varchar(255) NOT NULL,
  `dateBack` varchar(255) NOT NULL,
  `timeBack` varchar(255) NOT NULL,
  `idDriver` int(11) NOT NULL,
  `idVehicle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reservations`
--

INSERT INTO `reservations` (`id`, `dateRent`, `timeRent`, `dateBack`, `timeBack`, `idDriver`, `idVehicle`) VALUES
(1, '04/08/17', '10h', '05/08/17', '11h', 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `dateSession` varchar(255) NOT NULL,
  `timeStart` varchar(255) NOT NULL,
  `timeEnd` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `idDriver` int(11) NOT NULL,
  `idAccompagnist` int(11) NOT NULL,
  `idVehicle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `dateSession`, `timeStart`, `timeEnd`, `status`, `idDriver`, `idAccompagnist`, `idVehicle`) VALUES
(2, '29/08/17', '12h', '13h', 'Accepté', 1, 1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `numberPlaces` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vehicles`
--

INSERT INTO `vehicles` (`id`, `brand`, `model`, `type`, `description`, `numberPlaces`, `year`, `picture`) VALUES
(1, 'fiat', '500', 'mini-citadine', 'Parfait pour une personne seule ou un couple sans enfant. Facile à stationner.', 4, '2016', 'fiat_500.jpeg'),
(2, 'renault', 'twingo 3', 'mini-citadine', 'Parfait pour une personne seule ou un couple sans enfant. Facile à stationner.', 4, '2016', 'twingo_3.jpeg'),
(3, 'renault', 'mégane 4', 'compacte', 'Confortable', 5, '2016', 'megane_4.jpeg'),
(4, 'peugeot', '308', 'compacte', 'Confortable, convenable pour un couple avec enfants.', 5, '2017', 'peugeot_308.jpeg'),
(5, 'ford', 'fiesta', 'citadine', 'Facile à stationner. Idéal pour jeune conducteur', 5, '2015', 'ford_fiesta.jpeg'),
(6, 'opel', 'zafira', 'monospace', 'Idéal pour couple avec enfants. Confortable et spacieux. Parfait pour longs trajets', 7, '2016', 'opel_zafira.jpeg'),
(9, 'renault', 'trafic', 'minibus', 'Idéal pour covoiturage', 9, '2015', 'renault_trafic.JPG'),
(10, 'mercedes', 'vito', 'utilitaire', 'Parfait pour transporter des petits meubles', 3, '2015', 'mercedes_vito.jpg'),
(34, 'renault', 'master', 'utilitaire', 'Idéal pour emménager un 2 pièces', 3, '2017', 'renault_master.jpeg'),
(46, 'iveco', 'daily', 'utilitaire', 'Idéal pour emménager un 5 pièces', 3, '2017', 'iveco.jpeg'),
(47, 'renault', 'kangoo', 'utilitaire', 'Idéal pour transporter un petit meuble. Facile à stationner.', 3, '2017', 'renault_kangoo.jpeg'),
(48, 'peugeot', '508', 'berline', 'Parfait sur les longs trajets en famille', 5, '2015', 'peugeot_508.jpeg'),
(49, 'peugeot', '208', 'citadine', 'Idéal pour jeune conducteur. Facile à stationner.', 5, '2016', 'peugeot_208.jpeg');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accompagnists`
--
ALTER TABLE `accompagnists`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDriver` (`idDriver`),
  ADD KEY `idDriver_2` (`idDriver`),
  ADD KEY `idDriver_3` (`idDriver`),
  ADD KEY `idVehicle` (`idVehicle`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idDriver` (`idDriver`),
  ADD KEY `idAccompagnist` (`idAccompagnist`),
  ADD KEY `idVehicle` (`idVehicle`);

--
-- Index pour la table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accompagnists`
--
ALTER TABLE `accompagnists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accompagnists`
--
ALTER TABLE `accompagnists`
  ADD CONSTRAINT `accompagnist_session` FOREIGN KEY (`id`) REFERENCES `sessions` (`idAccompagnist`);

--
-- Contraintes pour la table `drivers`
--
ALTER TABLE `drivers`
  ADD CONSTRAINT `driver_reservation` FOREIGN KEY (`id`) REFERENCES `reservations` (`idDriver`),
  ADD CONSTRAINT `driver_session` FOREIGN KEY (`id`) REFERENCES `sessions` (`idDriver`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;