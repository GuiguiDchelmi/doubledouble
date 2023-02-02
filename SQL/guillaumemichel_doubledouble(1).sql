-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : db.3wa.io
-- Généré le : jeu. 05 jan. 2023 à 16:05
-- Version du serveur :  5.7.33-0ubuntu0.18.04.1-log
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `guillaumemichel_doubledouble`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `roles`, `password`) VALUES
(1, 'admin', '[\"ROLE_ADMIN\"]', '$2y$13$GuNT7ZIjHzbndZgnQ5TouOT4ZwQS/4Ml9UfBnL2uDyvwBVK2Ih3JC');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20221121101351', '2022-12-06 10:29:45', 1966),
('DoctrineMigrations\\Version20221121130156', '2022-12-06 10:29:47', 378),
('DoctrineMigrations\\Version20221129141046', '2022-12-06 10:29:47', 550);

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `created_at`, `image_name`, `updated_at`) VALUES
(1, 'planb', 'NOTRE PLAN B POUR LA MARQUE PLAN B EST UN OBJET READY-MADE. EN SKATE, LES  PLANCHES CASSENT SOUVENT. NOTRE IDÉE A ÉTÉ DE LA RÉPARER EN LA SCOTCHANT', '2022-06-30 00:00:00', '220630-skateboard-vignette-6390b17d9077f154737639.jpg', '2022-12-07 15:30:05'),
(2, 'deaf', 'DEAF, C’EST FAIRE LE CHOIX DE NE PLUS PORTER DES VÊTEMENTS MAIS D’ARBORER UN  MESSAGE. NOTRE STUDIO A TRAVAILLÉ AVEC LA MARQUE SUR LES CATALOGUES DES COLLECTIONS SAISON PRINTEMPS/ÉTÉ 2022.', '2022-04-30 00:00:00', 'deaf-container-vignette-6390b24983f26636580869.jpg', '2022-12-07 15:33:29'),
(3, 'acb', 'ACB EST UN COIFFEUR-BARBIER EN CORSE DU SUD. L’IDENTITÉ DES LIEUX A COMME SYMBOLE  LA CULTURE DE LA RUE. UN ENVIRONNEMENT SOMBRE, OÙ LES MATÉRIAUX ONT ÉTÉ CHOISI EN  RÉFÉRENCE AUX GRATTE-CIEL DE NEW YORK.', '2022-01-31 00:00:00', '220719-barber-mockup-vignette-6390b32001e7a490030993.jpg', '2022-12-07 15:37:04'),
(4, 'canal +', 'LE RETOUR DU CRYPTAGE CANAL+ DOIT SE CÉLÉBRER. NOUS AVONS CRÉÉ UNE CASSETTE HOMMAGE QUI INTÈGRE LA DEUXIÈME MI-TEMPS DE FRANCE - BRÉSIL 1998, UN GRAND PRIX À  SILVERSTONE, ET UN FILM DU PREMIER SAMEDI DU MOIS. QUANTITÉ LIMITÉE.', '2022-06-30 00:00:00', '220630-vhs-vignette-6390b399ee3c2141830219.jpg', '2022-12-07 15:39:06'),
(5, 'brooklyn factory', 'BROOKLYN FACTORY EST UN CONCEPT QUI PROPOSE LE BREAKFAST, LE LUNCH ET LE GOUTER.  VOUS POUVEZ DÉGUSTER DES PANCAKES, DES SMOOTHIES, MAIS AUSSI DÉCOUVRIR LE  PREMIER BAR À CÉRÉALES D’ANNECY. NOUS AVONS RÉALISÉ L’IDENTITÉ GRAPHIQUE DU LIEU.', '2022-01-31 00:00:00', 'cereal-vignette-6390b4045bfd4143840493.jpg', '2022-12-07 15:40:52'),
(6, 'marou chenko', 'IL CONNAIT UN SUCCÈS FULGURANT SUR LES RÉSEAUX SOCIAUX, SES CLIPS AFFOLENT LA TOILE  ET SES REFRAINS SONT CHANTÉS À TUE-TÊTE.  MAROU CHENKO, JEUNE HABITANT D\'AIX-LES-BAINS A PLUS D’UN TOUR DANS SON SAC. NOUS  AVONS RÉALISER DES CAMPAGNES ARTISTIQUES POUR LUI ET SON STUDIO DE PRODUCTION.', '2022-01-31 00:00:00', 'vignette-6390b46e8365a625103671.jpg', '2022-12-07 15:42:38'),
(7, 'CUSSET X HÔTEL VILLA MAÏA', 'SUITE À LA FIN DE TOURNÉE DE THE ROLLING STONES EN 2022. L’HÔTEL VILLA MAÏA DE LYON A  ORGANISÉ LA RÉCEPTION DU GROUPE AVEC ENTRE AUTRE LA VENUE DU MIXOLOGISTE ET COCKTAILIER MATHIAS CUSSET. VOICI LE VÊTEMENT RÉALISÉ POUR L’ÉVÈNEMENT. LA VILLA DEVIENT LE RÉCIPIENT D’UN COCKTAIL ET DE SA CUILLÈRE À MÉLANGE. LE JARDIN SE VOIT ORNÉ  DU VISUEL DES ROLLING STONES INNOCEMMENT OBSERVÉ PAR LES MEMBRES DU GROUPE.', '2022-07-31 00:00:00', 'cusset-vignette-6390b5219ed4a134742198.jpg', '2022-12-07 15:45:37'),
(8, 'l\'olympe tizzano', 'UNE DOSE DE CONFORT ET DE NATURE LUXUEUSE POUR BOIRE UN COCKTAIL OU UN VERRE DE  VIN ACCOMPAGNÉ DE TAPAS DANS LE GOLFE DE TIZZANO, VOICI L’OLYMPE.  ICI, LA RÉALISATION D’UNE ENSEIGNE 100% ISSUE D’UPCYCLING. ELLE EST LE REFLET DE SON  CIEL. UN CIEL TRAVERSÉ DE PIED-DE-VENT. LA VÉRITABLE LIGNE DU MONT OLYMPE DÉCORE LE  SOMMET DE L’ENSEIGNE.', '2022-04-30 00:00:00', '220722-olympe-vignette-6390b5dbcd80d321474051.jpg', '2022-12-07 15:48:44'),
(9, 'toccu', 'LA CASQUETTE MIXTE « TOK » A ÉTÉ CONÇU SPÉCIALEMENT AVEC LE TEXTILE MOLESKINE QUI A  FAIT LA NOTORIÉTÉ DE LA MARQUE MONT SAINT-MICHEL. C’EST EN FAISANT APPEL AU SAVOIR-FAIRE DE LA MARQUE MONT SAINT-MICHEL QUE LE STUDIO A DESSINÉ CET ACCESSOIRE.  COMPOSÉ DE SEULEMENT 2 PATRONS, L’UN POUR LA VISIÈRE L’AUTRE POUR LA TÊTE, LE DESIGN  DE CETTE CASQUETTE EST ISSUE D’UNE RÉFLEXION D’ÉCONOMIE DE MOYEN. DEUX COUTURES  ET UN BOUTON SUFFISENT À FORMER L’ENSEMBLE.', '2017-04-30 00:00:00', '220722-toccu-vignette-6390b64d36b74013307537.jpg', '2022-12-07 15:50:37'),
(10, 'gbl', 'CRÉATION DU LOGO, ET DE LA CHARTE GRAPHIQUE DU PHOTOGRAPHE AMERICANO-CORSE  GRICHKA BESSON LEANDRI.', '2021-09-30 00:00:00', 'gbl-vignette-6390b6bbe1d42425763868.jpg', '2022-12-07 15:52:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76F85E0677` (`username`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
