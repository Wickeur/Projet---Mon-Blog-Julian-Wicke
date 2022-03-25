-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 16 mars 2022 à 17:10
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `presentemoi`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `nom_commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu_commentaire` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `nom_commentaire`, `prenom_commentaire`, `email_commentaire`, `contenu_commentaire`) VALUES
(3, 'Deweerdt', 'Simon', 'simon.deweerdt@lacatholille.fr', 'Incroyable ce site, moi j\'ai pas encore commencé #cestlahess'),
(5, 'Lyautey', 'Thomas', 'thomas.lyautey@lacatholille.fr', 'ouais pas mal'),
(6, 'Wicke', 'Arnaud', 'arnaud.wicke@wanadoo.fr', 'Dans la partie \"Formation\", il faudrait rajouter une frise chronologique mais sinon, c\'est bien'),
(8, 'Chevalier', 'Enzo', 'enzo.chevalier@lacatholille.fr', 'Wow');

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id` int(11) NOT NULL,
  `nom_competence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_competence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_competence` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id`, `nom_competence`, `type_competence`, `image_competence`) VALUES
(1, 'HTML', 'Web', 'https://1.bp.blogspot.com/-NBvQoJVGIEU/XpSRW899qtI/AAAAAAAAA9M/5I0aS-7eXrQWYotZL7uyMkUJ0-8IbK1MgCLcBGAsYHQ/w800/PicsArt_04-13-09.18.29.png'),
(2, 'CSS', 'Web', 'https://3wa.fr/wp-content/uploads/2020/04/logo-css.png'),
(3, 'JavaScript', 'Web', 'https://tse4.mm.bing.net/th?id=OIP.7M2ozah2nfvoMu9kcYd5_AHaIA&pid=Api'),
(4, 'PHP', 'Web', 'https://tse1.mm.bing.net/th?id=OIP.jYfZQUnGHGVVhKsJ4ZmtCAHaFE&pid=Api'),
(5, 'Python', 'Programmation', 'https://ent2d.ac-bordeaux.fr/disciplines/mathematiques/wp-content/uploads/sites/3/2017/02/python-logo.jpg'),
(6, 'Java', 'Programmation', 'https://2.bp.blogspot.com/-UICquv1dBMU/XGYIXqyhKeI/AAAAAAAAR8M/Evjt3ADUYEYqwDHPLhl_lK5_FTrb_VZpgCLcBGAs/s1600/Java.png'),
(7, 'C', 'Programmation', 'https://www.goodworklabs.com/wp-content/uploads/2018/12/C-programming.png'),
(8, 'Traitement de Base de Donnée', 'Programmation', 'https://pngimg.com/uploads/mysql/mysql_PNG23.png'),
(9, 'Word', 'Logiciel', 'https://logodownload.org/wp-content/uploads/2018/10/word-logo-0.png'),
(10, 'Powerpoint', 'Logiciel', 'https://logodownload.org/wp-content/uploads/2020/04/microsoft-powerpoint-logo-0.png'),
(11, 'Excel', 'Logiciel', 'http://tous-logos.com/wp-content/uploads/2017/10/Logo-Excel.png'),
(12, 'SolidWorks', 'Logiciel', 'https://img-new.cgtrader.com/items/93786/solidworks_icon_logo_3d_model_1ac90a5c-2802-4366-8d01-9a96097882de.jpg'),
(13, 'Illustrator', 'Logiciel', 'https://www.creatienest.nl/wp-content/uploads/2020/06/logo-adobe-illustrator-2020-2-1-1030x1005.png'),
(14, 'Paint', 'Logiciel', 'https://ih1.redbubble.net/image.1108714422.0327/fposter,small,wall_texture,product,750x1000.jpg');

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
('DoctrineMigrations\\Version20220311133902', '2022-03-11 13:39:17', 301),
('DoctrineMigrations\\Version20220311135514', '2022-03-11 13:55:20', 100);

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `nom_poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_poste` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieu_entreprise` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut_exp` date NOT NULL,
  `date_fin_exp` date DEFAULT NULL,
  `descriptif_exp` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `experience`
--

INSERT INTO `experience` (`id_experience`, `nom_poste`, `type_poste`, `nom_entreprise`, `lieu_entreprise`, `date_debut_exp`, `date_fin_exp`, `descriptif_exp`) VALUES
(1, 'Livreur', 'Indépendant', 'Pizza Per Tutti', 'Thun-Saint-Amand', '2020-11-06', '2021-07-30', 'En étant auto-entrepreneur, je livre en fin de journée pour la pizzeria et j\'encaisse l\'argent des commandes au moment de la livraison'),
(4, 'Opérateur Polyvalent', 'CDD', 'Deprecq', 'Raismes', '2021-06-01', '2021-06-25', 'Construction du Mezzanine et d\'étagères + dégraffage de pièces métalliques sorti du laser de découpe '),
(5, 'Immersion en entreprise', 'Stage', 'Deprecq', 'Raismes', '2021-05-03', '2021-05-28', 'Découverte de l\'entreprise + gestion du service Informatique + Réalisation de présentations de l\'entreprise pour une intervention au près de collégiennes ainsi qu\'à des entreprises extérieurs'),
(6, 'Découverte en Entreprise', 'Stage', 'Agrati', 'Vieux-Condé', '2018-06-18', '2018-06-29', 'Dans le cadre du stage de seconde au lycée, d\'une durée de 2 semaines'),
(7, 'Découverte en entreprise', 'Stage', 'Alstom', 'Petite-Fôret', '2017-01-30', '2017-02-02', 'Dans le cadre d\'un stage de 3e au collège, d\'une durée d\'une semaine');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_formation` int(11) NOT NULL,
  `nom_ecole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_diplome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_domaine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resultat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_formation`, `nom_ecole`, `nom_diplome`, `nom_domaine`, `date_debut`, `date_fin`, `resultat`) VALUES
(1, 'Université Catholique de Lille', 'Licence', 'Informatique', '2020-09-01', '2023-04-28', 'En cours ...'),
(2, 'Lycée Ernest Couteaux', 'Baccalauréat scientifique', 'Siences de l\'ingénieur', '2017-09-05', '2020-06-30', 'Mention Bien'),
(3, 'Collège Fernig', 'Diplôme National du Brevet des Collèges', 'Général', '2013-09-03', '2017-06-30', 'Mention Très Bien');

-- --------------------------------------------------------

--
-- Structure de la table `loisirs`
--

CREATE TABLE `loisirs` (
  `id` int(11) NOT NULL,
  `image_loisirs` longtext COLLATE utf8mb4_unicode_ci,
  `nom_loisirs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_loisirs` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `loisirs`
--

INSERT INTO `loisirs` (`id`, `image_loisirs`, `nom_loisirs`, `description_loisirs`) VALUES
(1, 'https://docraquette.be/wp-content/uploads/2019/10/Badminton-Background.jpg', 'Badminton', 'Je fais du Badminton depuis mes 14 ans'),
(2, 'https://www.pieuvre.ca/wp-content/uploads/2019/02/Cin%C3%A9maSalle.jpg', 'Cinéma', 'Je suis un passionné de films (surtout de science-fiction et de Marvel). J\'y vais régulièrement'),
(3, 'http://cdn-s-www.republicain-lorrain.fr/images/94dc15cf-ffc9-401f-8eeb-d17fa438fe43/BES_06/illustration-soiree-jeux-de-societe_1-1426787060.jpg', 'Les Jeux de société', 'Régulièrement je joue avec mes amis et ma famille à différents jeux'),
(4, 'https://lescahiersdudebutant.fr/wp-content/uploads/2019/11/ps5.jpg', 'Jeux vidéos ', 'Depuis mon plus jeune âge, je joue aux jeux vidéos (surtout sur console)');

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `projet_id` int(11) NOT NULL,
  `projet_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projet_descriptif` longtext COLLATE utf8mb4_unicode_ci,
  `annee_projet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_projet` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`projet_id`, `projet_name`, `projet_descriptif`, `annee_projet`, `image_projet`) VALUES
(1, 'Site sur les Films Marvel', 'Dans le cadre de mes études en informatique lors du mon 1er semestre de ma 2e année, j\'ai réalisé un site regroupant tous les films Marvel avec leur affiche de film, leur date de sortie, leur réalisateur, héros et méchants ...Nous avions aussi une liste de tous les héros et méchants (principaux) des films du MCU.Pour y accéder, il fallait se créer un compte (automatiquement en rôle membre).Si nous étions un administrateur, de nouvelles fonctionnalités étaient disponibles comme l\'ajout de films, de héros, de méchants, ...', '2021', '/Image/mcu-perso.jpg'),
(2, 'Jeu de Cartes de Super Héros', 'À l\'âge de mes 11-12 ans, j\'ai voulu créer un jeu de cartes car j\'ai toujours été attiré par ces jeux-là. Un jour, j\'ai regardé un épisode d\'un dessin animé qui s’appelle « Adventure Time ».\r\n\r\nDans cet épisode, les 2 héros jouaient à un jeu de cartes (avec des hologrammes).\r\nPuis il met venu l’idée de créer mon propre jeu avec des personnages que j’adorais.\r\n\r\nJ’avais pris comme thème les films de super-héros car je suis un grand fan. J’ai imprimé plusieurs de ces héros sur du papier photo (pour que les cartes soient rigides) et je les ai mis dans des pochettes cartes Pokémon pour les protéger.\r\nEnsuite, j’ai fait un système de points de vie et de points d’attaque (P.V et P.A), un peu comme le jeu Hearthstone (que je ne connaissais pas encore à l’époque).\r\n \r\nPuis, j’ai eu l’idée de rajouter des cartes « bonus » que j’ai nommées « Carte Objet ». Ces cartes pouvaient avoir des effets néfastes ou bénéfiques sur les autres personnages. \r\n\r\nJ’ai mis dans cette catégorie des lieux mythiques comme la tour des Avengers, Asgard, etc… mais aussi des objets comme la kryptonite, un minigun, un lance missile, et des moyens de transport comme l’héliporteur du SHIELD.\r\nA l’époque, j’avais confectionné une quarantaine de cartes.\r\n', '2013', '/Image/jeu_carte_hero.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(1, 'Julian', '[\"ROLE_ADMIN\"]', '$2y$13$6JM9LsJFyE/M1U7BWbhQ1u5FNVg2X9gial69TXx7LmkDQD.NvgPW.'),
(2, 'test', '[]', '$2y$13$dDcTfq29pm0PqQzG4NPnTOcF/btgmlrmnStzC9W2M45DWU.kAMAr6'),
(3, 'CoachArno', '[]', '$2y$13$AKbUsxqVGWWxcCoe.nUeeeu.SgFVlufumAIoe/6nPQvKPni/5Vqhi'),
(4, 'Enzo', '[]', '$2y$13$WZMdY0q1ZQivZLTpIEh1IOgmd19Ibo6F6TJivjYoO7lr0MDPqxYR.'),
(5, 'Thomas', '[]', '$2y$13$HCg.j2BnbhL36bszIwBY.uW9jFh8SpZpdkYyipwWJnmekovEBvuCy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `loisirs`
--
ALTER TABLE `loisirs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`projet_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `loisirs`
--
ALTER TABLE `loisirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `projet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
