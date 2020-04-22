-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 11:39 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaire_et_vente`
--

-- --------------------------------------------------------

--
-- Table structure for table `Commandes`
--

CREATE TABLE IF NOT EXISTS `Commandes` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `details_commande` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `courriel` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Commandes`
--

INSERT INTO `Commandes` (`id`, `utilisateur_id`, `details_commande`, `courriel`) VALUES
(1, 1, 'Laptop avec un SSD a installer', 'utilisateur@hotmail.com'),
(2, 1, 'Souris, microphone et clavier pour performer dans les jeux', 'utilisateur@hotmail.com'),
(3, 1, 'test', 'courriel@hotmail.com'),
(4, 1, 'Commande pour tester ajout de commande', 'test@hotmail.com'),
(5, 1, 'Commande pour tester ajout de commande', 'test@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Produits`
--

CREATE TABLE IF NOT EXISTS `Produits` (
  `id` int(11) NOT NULL,
  `nom_produit` varchar(255) NOT NULL,
  `prix_unitaire` decimal(10,2) NOT NULL,
  `description_produit` text NOT NULL,
  `en_stock` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Produits`
--

INSERT INTO `Produits` (`id`, `nom_produit`, `prix_unitaire`, `description_produit`, `en_stock`) VALUES
(1, 'ASUS (C434TA-DSM4T)Ordinateur portable Chromebook', 549.81, '14 po FHD (1 920 x 1 080) Intel M3-8100Y (1,1 GHz) mémoire vive 4 Go DDR4 64 Go eMMC Intel UHD Chrome OS', 1),
(2, 'Blue (Snowball iCE)', 69.99, 'Microphone USB électrostatique avec ensemble d''accessoires conception cardioïde qualité audio CD inclus le pied et le câble USB noir', 1),
(3, 'Razer (Basilisk)', 70.19, 'Souris de jeu ergonomique multicolore 16 000 PPP capteur optique 5G', 0),
(4, 'Razer (BlackWidow Elite)', 250.19, 'Clavier de jeu mécanique touches mécaniques Razer Green (tactile et clicky) commande multimédia repose', 0),
(5, 'Samsung (860 EVO)', 219.99, 'Disque électronique 2,5 po de 1 To SATA III lecture: 550 Mo/s, écriture: 520 Mo/s [MZ-76E1T0B/AM]', 1),
(6, 'Polaroid (Originals OneStep 2)', 140.20, 'Appareil photo instantané i-Type Blanc avec viseur étendu Gris foncé', 1),
(7, 'ASRock B450M', 94.99, 'HDV R4.0 AMD AM4 Socket Dual Channel, PCIe 3.0, M.2 USB 3.1, DVI-D, HDMI, D-Sub, mATX Motherboard', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Produits_commande`
--

CREATE TABLE IF NOT EXISTS `Produits_commande` (
  `id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite_produit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Produits_commande`
--

INSERT INTO `Produits_commande` (`id`, `commande_id`, `produit_id`, `quantite_produit`) VALUES
(3, 2, 2, 2),
(4, 2, 3, 1),
(5, 2, 4, 1),
(12, 1, 3, 23),
(13, 2, 5, 2),
(14, 1, 4, 2),
(16, 4, 7, 1),
(17, 3, 1, 1),
(18, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Utilisateurs`
--

CREATE TABLE IF NOT EXISTS `Utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `identifiant` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id`, `nom`, `identifiant`, `mot_de_passe`) VALUES
(1, 'Yasser Soliman', 'ysoliman', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `Produits`
--
ALTER TABLE `Produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Produits_commande`
--
ALTER TABLE `Produits_commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commande_id` (`commande_id`),
  ADD KEY `produit_id` (`produit_id`);

--
-- Indexes for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Commandes`
--
ALTER TABLE `Commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Produits`
--
ALTER TABLE `Produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Produits_commande`
--
ALTER TABLE `Produits_commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commandes`
--
ALTER TABLE `Commandes`
  ADD CONSTRAINT `commandes_utilisateur` FOREIGN KEY (`utilisateur_id`) REFERENCES `Utilisateurs` (`id`);

--
-- Constraints for table `Produits_commande`
--
ALTER TABLE `Produits_commande`
  ADD CONSTRAINT `commandes_produitscommande` FOREIGN KEY (`commande_id`) REFERENCES `Commandes` (`id`),
  ADD CONSTRAINT `produits_produitscommande` FOREIGN KEY (`produit_id`) REFERENCES `Produits` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
