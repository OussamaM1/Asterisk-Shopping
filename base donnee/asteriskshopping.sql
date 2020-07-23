-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 23 juil. 2020 à 14:44
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `asteriskshopping`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `design` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `design`, `prix`, `categorie`, `created_at`, `updated_at`) VALUES
(1, 'Samsung Galaxy Note10 Lite.', 'https://www.iam.ma/ImagesMarocTelecom/vitrine-mobile/Xr%20noir%20face.png', 7600, 'Composants', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(2, 'Samsung Galaxy A30s', 'https://www.iam.ma/ImagesMarocTelecom/vitrine-mobile/Maroc-Telecom-F7-Xiaomi%20Note%207-face.jpg', 20000, 'Composants', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(3, 'Lenovo PC Portable Ideapad.', 'https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/65/263163/1.jpg?4772', 10000, 'Composants', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(4, 'Samsung S7 2018.', 'https://www.iam.ma/ImagesMarocTelecom/vitrine-mobile/SM-A105F_001_Front_Black.jpg', 16600, 'Accessoires', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(5, 'Lenovo PC Portable V15.', 'https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/58/717953/1.jpg?7165', 12600, 'Accessoires', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(6, 'Hp PC PORTABLE HP 250.', 'https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/58/717953/1.jpg?7165', 25400, 'Composants', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(7, 'Havic HV-136 Casque D\'écoute', 'https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/93/246753/1.jpg?6685', 28100, 'Ordinateurs', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(8, 'Logitech M171 - Souris sans fil.', 'https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/12/233613/1.jpg?1934', 18000, 'Accessoires', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(9, 'Cable HDMI', 'https://ma.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/81/412133/1.jpg?9729', 16400, 'Logiciels', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(10, 'Iphone XS 2020', 'https://www.iam.ma/ImagesMarocTelecom/vitrine-mobile/iPhone_11_Pro_Max_Gold_2-Up_Vertical_US-EN_SCREEN.jpg', 27600, 'Ordinateurs', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(11, 'Microsoft Windows 7', 'https://cdn.shopify.com/s/files/1/0855/1446/products/14075723110__78320_c73345c3-9169-413c-ae2e-3a6b8ee89c9c_1024x1024.jpg?v=1536295538', 17200, 'Composants', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(12, 'Microsoft Office 2007', 'https://cdn.shopify.com/s/files/1/0855/1446/products/14075723110__78320_c73345c3-9169-413c-ae2e-3a6b8ee89c9c_1024x1024.jpg?v=1536295538', 10600, 'Logiciels', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(13, 'Cyberlink-powerdvd', 'https://www.cdiscount.com/pdt2/7/4/4/1/700x700/cyb4711162038744/rw/cyberlink-powerdvd-17-ultra-pc.jpg', 29800, 'Logiciels', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(14, 'Norton Antivirus Pack small', 'https://media.ldlc.com/r1600/ld/products/00/00/88/80/LD0000888093_2.jpg', 20400, 'Ordinateurs', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(15, 'Adobe Photoshop 2020', 'https://i.imgur.com/i9PapIm.jpg', 25300, 'Ordinateurs', '2020-07-22 14:51:23', '2020-07-22 14:51:23'),
(16, 'Adobe Illustrator CC', 'https://cdn.shopify.com/s/files/1/0855/1446/products/14075723110__78320_c73345c3-9169-413c-ae2e-3a6b8ee89c9c_1024x1024.jpg?v=1536295538', 25300, 'Composants', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(17, 'Adobe Premier Pro CC', 'https://cdn.shopify.com/s/files/1/0855/1446/products/14075723110__78320_c73345c3-9169-413c-ae2e-3a6b8ee89c9c_1024x1024.jpg?v=1536295538', 19800, 'Logiciels', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(18, 'PC Gamer GTS501', 'https://images.g2a.com/newlayout/470x470/1x1x0/7dc44f5ac569/5bc9efa15bafe38ccb55fdb6', 20700, 'Accessoires', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(19, 'Samsung J7 2020', 'https://www.iam.ma/ImagesMarocTelecom/vitrine-mobile/Xr%20noir%20face.png', 15800, 'Logiciels', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(20, 'PC Gamer RTX990', 'https://www.materielmaroc.com/wp-content/uploads/2019/05/tgf-PC.jpg', 21300, 'Logiciels', '2020-07-22 14:51:24', '2020-07-22 14:51:24');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `nom`, `prenom`, `age`, `adresse`, `ville`, `email`, `email_verified_at`, `remember_token`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Kris', 'Valentina', 70, '5644 Catalina Gateway\nCorinebury, MO 82334-5986', 'Donnellyburgh', 'glover.creola@bradtke.biz', NULL, NULL, '$2y$10$5RszteEqBVGnLbSYXEbIhO1EkpBOftCOWMXoFRsyowPzOhNyKrxSS', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(2, 'Schultz', 'Nyasia', 88, '93967 Dooley Curve Suite 050\nSabinaland, WA 52023-1345', 'Port Devante', 'atillman@hotmail.com', NULL, NULL, '$2y$10$a87Gn7Qc1SnqpFogL2tFdeq2j3Fe5zUlNvYibLnMzfvMBEsiMs4w.', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(3, 'Schimmel', 'Seth', 53, '30183 Beahan Ferry\nPort Albertahaven, PA 10050-8518', 'Garrettstad', 'omer.rippin@bechtelar.com', NULL, NULL, '$2y$10$lr2/mdgoLZsZnDrzc9JD7OiXwNzgexMtfIWRrPENO6cnQyJbTKQOa', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(4, 'Huels', 'Gwen', 18, '85089 Robb Wells Apt. 871\nNew Irving, NV 51484-7031', 'Lake Margie', 'gunner.upton@gmail.com', NULL, NULL, '$2y$10$cWYafyH6tyny4QyfTp.Dw.M09OyhF6LV/zmjA8YMbN2bim6nWv3Qy', '2020-07-22 14:51:24', '2020-07-22 14:51:24'),
(5, 'Orn', 'Gerda', 88, '550 Lehner Tunnel\nJadeland, CA 64058-9969', 'Lake Genechester', 'clementina86@johnson.biz', NULL, NULL, '$2y$10$JPwQiRouLcq4BuTfrT7qyeLZzbhOW73BsNx0R2FlRmAHTsmFkjnBG', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(6, 'Considine', 'Renee', 40, '64950 Marilou Springs\nSengermouth, CT 94214-5720', 'Abbottfort', 'wehner.taurean@gmail.com', NULL, NULL, '$2y$10$KxuVSrfC9b6wG148ZVspU.KJp7k5P2w6yPhvr6jiuWcFV5C1jtav6', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(7, 'Ziemann', 'Milan', 36, '592 Stanton Ports Apt. 954\nBoyleborough, CO 70572', 'West Reneechester', 'miller.melody@hotmail.com', NULL, NULL, '$2y$10$0/xcJuw7o8w6XUG7JK/ZQOul9OibwXLGPwPyuBQpJhpc/fffepZ3C', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(8, 'Shields', 'Arturo', 69, '611 Vandervort Village Apt. 428\nLincolnland, MD 84293', 'Baumbachside', 'edwin07@hotmail.com', NULL, NULL, '$2y$10$fWd02U.2O.4sy6ejuXc4rOhOivpzGCmmtz98QUbWS7sSX4Id0p2qm', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(9, 'Rowe', 'Joannie', 90, '50023 Doug Trail Apt. 960\nBodefort, KS 33816', 'Marionview', 'kiara.denesik@ritchie.biz', NULL, NULL, '$2y$10$MgOnOZ.EAAgyB.IKKS6gFe82ACmWKZuoAiKy2J4HQQWoXEulkxSYi', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(10, 'Rath', 'Moshe', 55, '8293 Leopoldo Creek\nLemkefort, MI 44418-9520', 'Lake Quentinstad', 'boris23@hotmail.com', NULL, NULL, '$2y$10$38LZImcGNMFZwvzBTcHlXuwZx91K5pSOrSBCxT5PMv7Nc/1G4OZY2', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(11, 'Boehm', 'Meaghan', 72, '498 Hellen Crescent Apt. 418\nPort Darronhaven, OK 73304-4368', 'Kenyonport', 'kaya50@gislason.net', NULL, NULL, '$2y$10$4H.Ru9hwS7yHkZ6UZAFCyuyYzdzaYZVvqbnQaylBxKmS.BuZMmFEe', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(12, 'Lockman', 'Sylvester', 99, '22787 Ethan Run Suite 823\nCummerataview, PA 21543-1026', 'Altenwerthborough', 'doug.ondricka@yahoo.com', NULL, NULL, '$2y$10$Z3zoSu5XWK2t/9T.SMPegeJZytWZL3P3Lei9mZ/3Cpqp/t0KIKome', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(13, 'Ferry', 'Darrion', 36, '2140 Trantow Groves Suite 875\nVonRuedenview, AK 27035', 'Conroychester', 'cummings.jaylen@ritchie.com', NULL, NULL, '$2y$10$LFWsN33ITzi1YEXnYUmAxOzeL9bRiAzTyUqSm7bv.bZjjHskl5Fs2', '2020-07-22 14:51:25', '2020-07-22 14:51:25'),
(14, 'Waters', 'Scottie', 34, '9133 Lauretta Fields Apt. 072\nLeuschkeburgh, UT 61453-0031', 'Funkville', 'koby.treutel@yahoo.com', NULL, NULL, '$2y$10$N6aCBhfVe7xGOIjMoIyFl.H/zxFFbiDtFgM5595leuk1EH452oxM.', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(15, 'Pollich', 'Haley', 71, '674 Dare Extensions\nRemingtontown, CO 78330-5988', 'Toreyhaven', 'sage39@hotmail.com', NULL, NULL, '$2y$10$6E6OUbxxb4d40kH7sp466OMdONB/Pg6LtcJpNZ5ByYiFEjT.d4oXO', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(16, 'Fahey', 'Rebeca', 22, '1683 Marcus Isle\nWest Lorenzo, MD 56401', 'Valentinaborough', 'ireichel@yahoo.com', NULL, NULL, '$2y$10$Hq0r5zQ6vQgCmuAvfouImeKUsXpHH0M1iuNqsLCepVV8wLIsoVNsm', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(17, 'Bernier', 'Michaela', 62, '961 Deckow Points Suite 928\nWest Herminiachester, WV 60118', 'North Vance', 'lukas.heaney@kertzmann.biz', NULL, NULL, '$2y$10$XBnF3ilvP.Tp7pv1m8jXNepw6GBP0Z3KY/FTL1q.iG54I79yhk9gy', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(18, 'Price', 'Aiden', 59, '812 Annabel Skyway\nLake Joannybury, IL 80794-7868', 'Port Kiaraview', 'glennie.beahan@haley.com', NULL, NULL, '$2y$10$qdKA/y98hphlDPywbvJwB.ffxgcGRScUWcP3lOOtCoFyjtzjdSc2O', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(19, 'Abshire', 'Golden', 65, '935 Watsica Key\nEmelybury, AK 50659-8621', 'West Rowena', 'jamil01@gmail.com', NULL, NULL, '$2y$10$3dWsAtNJaSxzGyHj/9qD5eBYTzwFEPdRC48NiCWJHn3P1OAUmN/P2', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(20, 'Zulauf', 'Keith', 92, '487 Bogisich Junction\nMonserratshire, NH 76131', 'New Branson', 'savanna96@hyatt.com', NULL, NULL, '$2y$10$T5nnAhUUach7LnqNNIwQTuMgK/hcYPrB5LFGEOys4KUthBMKsBlOS', '2020-07-22 14:51:26', '2020-07-22 14:51:26'),
(21, 'Oussama', 'Makhlouk', 21, 'test adress', 'Agadir', 'moro.gami12@gmail.com', NULL, NULL, '$2y$10$aCzJIqZWu5zcFvWoAnjNGuisb3dCv7IoSk1b/LQf9S9zr4mmQB4i6', '2020-07-22 16:02:29', '2020-07-22 16:02:29');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `client_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 21, '2020-07-22', '2020-07-22 16:03:18', '2020-07-22 16:03:18'),
(2, 21, '1970-01-01', '2020-07-22 16:27:59', '2020-07-22 16:27:59'),
(3, 21, '2020-07-22', '2020-07-22 16:38:11', '2020-07-22 16:38:11'),
(4, 21, '2020-07-22', '2020-07-22 16:44:46', '2020-07-22 16:44:46'),
(5, 21, '2020-07-22', '2020-07-22 17:16:18', '2020-07-22 17:16:18'),
(6, 21, '2020-07-22', '2020-07-22 17:32:46', '2020-07-22 17:32:46'),
(7, 21, '2020-07-22', '2020-07-22 18:25:14', '2020-07-22 18:25:14'),
(8, 21, '1970-01-01', '2020-07-22 18:25:58', '2020-07-22 18:25:58'),
(9, 21, '2020-07-22', '2020-07-22 18:40:53', '2020-07-22 18:40:53'),
(10, 21, '1970-01-01', '2020-07-22 18:41:01', '2020-07-22 18:41:01'),
(11, 21, '2020-07-22', '2020-07-22 19:10:57', '2020-07-22 19:10:57'),
(12, 21, '2020-07-22', '2020-07-22 19:31:45', '2020-07-22 19:31:45'),
(13, 21, '1970-01-01', '2020-07-22 19:36:14', '2020-07-22 19:36:14'),
(14, 21, '2020-07-22', '2020-07-22 23:47:32', '2020-07-22 23:47:32'),
(15, 21, '1970-01-01', '2020-07-22 23:47:43', '2020-07-22 23:47:43'),
(16, 21, '2020-07-23', '2020-07-23 11:58:52', '2020-07-23 11:58:52'),
(17, 21, '2020-07-23', '2020-07-23 11:59:01', '2020-07-23 13:53:36'),
(18, 21, '2020-07-23', '2020-07-23 13:54:21', '2020-07-23 14:00:03'),
(19, 21, '2020-07-23', '2020-07-23 14:04:33', '2020-07-23 14:04:40'),
(20, 21, '2020-07-23', '2020-07-23 14:05:19', '2020-07-23 14:05:27'),
(21, 21, '2020-07-23', '2020-07-23 14:23:45', '2020-07-23 14:23:51'),
(22, 21, '2020-07-23', '2020-07-23 14:24:25', '2020-07-23 14:34:11'),
(23, 21, '2020-07-23', '2020-07-23 14:31:01', '2020-07-23 14:31:08'),
(24, 21, '2020-07-23', '2020-07-23 14:33:54', '2020-07-23 14:33:54'),
(25, 21, '2020-07-23', '2020-07-23 14:53:18', '2020-07-23 14:53:25'),
(26, 21, '2020-07-23', '2020-07-23 14:54:59', '2020-07-23 14:55:05'),
(27, 21, '2020-07-23', '2020-07-23 15:06:53', '2020-07-23 15:32:37'),
(28, 21, '2020-07-23', '2020-07-23 15:32:24', '2020-07-23 15:32:24');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lignes`
--

CREATE TABLE `lignes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_unit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_06_09_225954_create_articles_table', 1),
(4, '2020_06_09_230015_create_clients_table', 1),
(5, '2020_06_09_230045_create_commandes_table', 1),
(6, '2020_06_09_230102_create_lignes_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_client_id_foreign` (`client_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lignes`
--
ALTER TABLE `lignes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lignes_commande_id_foreign` (`commande_id`),
  ADD KEY `lignes_article_id_foreign` (`article_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lignes`
--
ALTER TABLE `lignes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

--
-- Contraintes pour la table `lignes`
--
ALTER TABLE `lignes`
  ADD CONSTRAINT `lignes_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `lignes_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
