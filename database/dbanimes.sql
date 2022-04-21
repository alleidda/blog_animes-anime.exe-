-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 21 avr. 2022 à 17:05
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbanimes`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`login`, `password`) VALUES
('admin', '$2y$10$mkCJmZyPSzg2cmbhTENIxOvBvW3GRJO9TOVtML5JH8JSGsVc7fore');

-- --------------------------------------------------------

--
-- Structure de la table `anime`
--

CREATE TABLE `anime` (
  `anime_id` int(11) NOT NULL,
  `anime_nom` varchar(250) NOT NULL,
  `anime_photo` varchar(250) NOT NULL,
  `anime_description` text NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `anime`
--

INSERT INTO `anime` (`anime_id`, `anime_nom`, `anime_photo`, `anime_description`, `genre_id`) VALUES
(1, 'Jujutsu Kaisen ', 'jujutsu.jpg', 'L\'intrigue de Jujutsu Kaisen se déroule dans un monde où des fléaux sont créés à partir des émotions négatives des Humains. Ainsi, pour protéger les lieux avec une forte concentration de ces émotions comme les écoles ou les hôpitaux, ces infrastructures possèdent une relique, réceptacle d\'un fléau, car l\'on ne peut lutter contre les fléaux qu\'avec un fléau plus puissant. Ceux-ci sont invisibles aux yeux des humains sauf pour une poignée de personnes, par exemple les exorcistes. Le métier d\'exorciste consiste à éliminer les fléaux et ainsi protéger le peuple de ces derniers, mais cela n\'est pas sans risques, car ces fléaux peuvent être plus ou moins puissants.', 1),
(2, 'L\'Attack des Titans', 'titans.jpg', 'Eren Jäger, alors un petit garçon d\'environ 13 ans, mène une existence paisible avec ses parents et sa sœur adoptive Mikasa à Shiganshina, une ville au bord du mur Maria. Mais malheureusement, alors que les humains n\'ont pas aperçu de Titans aux abords du district depuis plus d\'un siècle, la ville est attaquée par un Titan de 60 mètres qui ouvre une brèche dans le mur contre la ville. Des Titans se déversent alors dans les rues, dévorant tous les humains qu\'ils croisent. Eren et Mikasa sont témoins de la mort de leur mère, qui se fait dévorer sous leurs yeux. Un Titan cuirassé fait à son tour son apparition et perce le mur Maria, permettant aux Titans d\'envahir tout l\'espace compris entre les murs Rose et Maria. Eren et Mikasa réussissent tout de même à s\'enfuir de la ville avant qu\'il ne soit trop tard, avec leur ami Armin', 1),
(3, 'Fruit Basket', 'fruit.jpg', 'Tohru Honda est une lycéenne de 16 ans qui vit seule sous une tente après la mort de sa mère. Sans le savoir, elle s\'est installée sur la propriété de la famille Sôma. Lorsqu\'elle explore les alentours, elle voit une maison et y entre. Elle y rencontre Yuki et Shigure Soma. Ayant appris qu\'elle vivait sous une tente, ils lui proposent de loger chez eux en échange de tâches ménagères. Tohru accepte et commence alors à vivre avec Yuki, Kyô et Shigure. Très vite, elle apprend le secret de la famille : 13 de ses membres sont victimes d\'une malédiction. Ces personnes se transforment en l\'un des douze animaux du zodiaque chinois, et le chat, lorsqu\'une personne du sexe opposé se jette à leur cou ou lorsqu\'ils se sentent gênés, ou encore affaiblis. Ils redeviennent humains quelques minutes plus tard (la durée de la transformation peut varier), mais réapparaissent complètement nus (ce qui peut s\'avérer bien gênant surtout pour Tohru qui est souvent là lors de la transformation).', 2),
(4, 'Gambling School', 'gambling.jpg', 'L\'histoire se passe à l\'Académie privée Hyakkaō, qui abrite les étudiants les plus riches et les plus privilégiés du Japon. De nombreux dirigeants et professionnels sont issus de cette école.\r\n\r\nCette école a une certaine particularité : les élèves ne sont pas évalués selon leurs capacités physiques et intellectuelles, mais plutôt selon leurs performances aux jeux d\'argent, qui détermine leur statut à l\'école et leur place au niveau de la hiérarchie.\r\n\r\nL\'histoire se centre sur l\'apparition d\'une nouvelle étudiante, Yumeko Jabami, à la recherche d\'adrénaline. Celle-ci commence activement à perturber la hiérarchie de l\'école, tandis que le Conseil des élèves tente de trouver un moyen de l\'arrêter.', 3),
(5, 'Seraph of the End', 'seraph.jpg', 'L’histoire suit l\'aventure de Yu, un jeune orphelin et de son démon Ashuramaru. Le monde est ravagé par une terrible maladie. Les enfants de moins de 13 ans étant, pour une raison inconnue, immunisés contre le virus, ont survécu. Mais ces derniers ont été réduits en esclavage par des vampires qui sont tout à coup sortis des profondeurs de la Terre. Yûichirô Hyakuya et Mikael Hyakuya, deux orphelins, servent de « garde-manger » aux vampires : ils ont le droit de vivre, en échange d\'un prélèvement quotidien de leur sang. Après une tentative d\'évasion qui se solde par un massacre de ses amis, Yûichirô réussit à s\'échapper, en laissant pour mort Mikael.\r\n\r\nArrivé à la surface, Yûichirô apprend que l\'Humanité n\'est pas entièrement décimée, et il rejoint les rangs de \"l\'Armée Démoniaque Impériale du Japon\", qui a pour but d\'exterminer les vampires.', 1),
(64, 'Mob', '12132_mob.png', 'Mob est fort  ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `anime_studio`
--

CREATE TABLE `anime_studio` (
  `anime_id` int(11) NOT NULL,
  `studio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `anime_studio`
--

INSERT INTO `anime_studio` (`anime_id`, `studio_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 1),
(5, 2),
(64, 1),
(64, 2);

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_nom`) VALUES
(1, 'Shōnen'),
(2, 'Shōjo'),
(3, 'Seinen');

-- --------------------------------------------------------

--
-- Structure de la table `studio`
--

CREATE TABLE `studio` (
  `studio_id` int(250) NOT NULL,
  `studio_nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `studio`
--

INSERT INTO `studio` (`studio_id`, `studio_nom`) VALUES
(1, 'MAPPA'),
(2, 'Wit Studio'),
(3, 'Production I.G'),
(4, 'Studio Deen'),
(5, 'TMS Entertainment'),
(12, 'Studio test');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`login`);

--
-- Index pour la table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`anime_id`),
  ADD KEY `FK_ANIME_GENRE` (`genre_id`);

--
-- Index pour la table `anime_studio`
--
ALTER TABLE `anime_studio`
  ADD PRIMARY KEY (`anime_id`,`studio_id`),
  ADD KEY `FK_STUDIO_ANIME_STUDIO` (`studio_id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index pour la table `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`studio_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `anime`
--
ALTER TABLE `anime`
  MODIFY `anime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `studio`
--
ALTER TABLE `studio`
  MODIFY `studio_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `anime`
--
ALTER TABLE `anime`
  ADD CONSTRAINT `FK_ANIME_GENRE` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`genre_id`);

--
-- Contraintes pour la table `anime_studio`
--
ALTER TABLE `anime_studio`
  ADD CONSTRAINT `FK_ANIME_ANIME_STUDIO` FOREIGN KEY (`anime_id`) REFERENCES `anime` (`anime_id`),
  ADD CONSTRAINT `FK_STUDIO_ANIME_STUDIO` FOREIGN KEY (`studio_id`) REFERENCES `studio` (`studio_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
