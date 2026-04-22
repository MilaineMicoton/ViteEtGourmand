-- Création de la BDD à modifier pour viteetgourmand !!!!! ne pas oublier!--------
CREATE DATABASE IF NOT EXISTS `viteetgourmand`;
USE `viteetgourmand`;

--
-- Base de données : `viteetgourmand`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `commande_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `menu_id` INT(11) NOT NULL,
  `date_commande` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_livraison` date NOT NULL,
  `heure_livraison` varchar(50) NOT NULL,
  `prix_menu` double NOT NULL,
  `nombre_personne` int(11) NOT NULL,
  `precision_complement` varchar(70) NOT NULL,
  `statut` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- faire table rase si elle existait déjà

delete from `commande`;

--
-- Déchargement des données de la table `commande`
--
-- ************************* A REMPLIR ICI:::::::: les données de 'commande' ***********
INSERT INTO `commande` (`commande_id`, `utilisateur_id`, `menu_id`, `date_commande`, `date_livraison`, `heure_livraison`, `prix_menu`, `nombre_personne`, `precision_complement`, `statut`) VALUES
(1, 2, 1, '2026-03-18 09:24:57', '2026-05-31', '11h', 12, 2, '', 'Commande validée');

-- --------------------------------------------------------
--
-- Structure de la table `menu`
-- 

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `sous_titre` varchar(50) NOT NULL,
  `nbre_personne-min` int(11) NOT NULL,
  `prix_par_personne` double NOT NULL,
  `regime` varchar(50) NOT NULL,
  `menu_ligne1` varchar(50) NOT NULL,
  `menu_ligne2` varchar(50) NOT NULL,
  `menu_ligne3` varchar(50) NOT NULL,
  `menu_ligne4` varchar(50) NOT NULL,
  `menu_ligne5` varchar(50) NOT NULL,
  `quantite_restante` int(11) NOT NULL,
  `url_photo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- faire table rase si elle existait déjà

delete from `menu`;

--
-- Déchargement des données de la table `menu`
--

INSERT INTO `menu` (`menu_id`, `titre`, `sous_titre`, `nbre_personne-min`, `prix_par_personne`, `regime`, `menu_ligne1`, `menu_ligne2`, `menu_ligne3`, `menu_ligne4`, `menu_ligne5`, `quantite_restante`, `url_photo`) VALUES
(1, 'Le classique', 'Un repas traditionnel', 1, 12, 'général', 'Soupe', 'Viande', 'Légumes', 'Fromage', 'Dessert', 10, '../images/circles-9451627_640.jpg'),
(2, 'Le gourmand', 'Pour les bons appétits', 2, 22, 'général', 'Appéro (boisson et grignotage)', 'Entrée crudités', 'Poisson frais', 'Gibier et légumes', 'Dessert et café', 8, '../images/hearts-9463310_640.jpg'),
(5, 'La ligne en vue', 'Pour garder la ligne', 1, 18, 'minceur', 'Soupe claire', 'Viande bouillie', 'Légumes vapeur', 'Fromage 0%', 'Dessert sans sucre ajouté', 10, '../images/hearts-9463312_640.jpg'),
(6, 'Le veggie', 'menu végérarien', 2, 18, 'végétarien', 'Entrée crudités et yahourt', 'Lentilles corail', 'Burger vegétarien', 'Potatoes', 'Café gourmand', 8, '../images/hex-9452616_640.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `utilisateur id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `telephone` int(50) NOT NULL,
  `ville` int(50) NOT NULL,
  `adresse` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- faire table rase si elle existait déjà

delete from `utilisateur`;

--
-- Déchargement des données de la table `utilisateur`
--
-- ************************* A REMPLIR ICI:::::::: les données de 'utilisateur' ***********


-- --------------------------------------------------------

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`commande_id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur id`);


--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `commande_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;