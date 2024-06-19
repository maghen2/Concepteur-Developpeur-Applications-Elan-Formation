/* EXERCICE SQL RECETTES

ELAN
14 rue du Rhône
67100 STRASBOURG
TEL : 03.88.30.78.30
www.elan-formation.fr

Vous avez la charge de modéliser une base de données permettant de mettre en place des recettes de 
cuisine. Une recette sera caractérisée par un nom, un temps de préparation (en minutes) et des instructions. 
Chaque recette contiendra des ingrédients avec une certaine quantité, une unité de mesure et on pourra 
définir le prix de chaque ingrédient. Chaque recette appartiendra à une catégorie unique : entrée, plat ou 
dessert.

Modéliser la base de données et définir des requêtes
Réaliser le modèle conceptuel de données (MCD) d’une telle application. Vous déduirez 
logiquement le modèle logique de données (MLD) afin d’y faire apparaître les clés étrangères et les 
éventuelles tables associatives s’il devait y en avoir. Votre modélisation devra être vérifiée par un 
formateur avant de passer à la suite.
Vous mettrez en place la base de données sur HeidiSQL et vous l’alimenterez en conséquence avec 
au moins 10 recettes. Vous devrez ensuite définir les requêtes suivantes :
*/
--1- Afficher toutes les recettes disponibles (nom de la recette, catégorie et temps de préparation) triées de façon décroissante sur la durée de réalisation
SELECT `Recette`.`nom` AS `Recette`, `categorie`.`nom` AS `Categorie`, `Recette`.`temps_preparation` AS `Temps de préparation` 
FROM `Recette`, `categorie` 
WHERE `categorie`.`id_categorie` = `Recette`.`id_categorie` 
ORDER BY `temps_preparation` DESC

--2- En modifiant la requête précédente, faites apparaître le nombre d’ingrédients nécessaire par recette.
SELECT `Recette`.`nom` AS `Recette`, `categorie`.`nom` AS `Categorie`, `Recette`.`temps_preparation` AS `Temps de préparation`, count(`Preparer`.`id_recette`) AS `Nbr d'ingrédients`
FROM `Recette`, `categorie`,`Preparer` 
WHERE `categorie`.`id_categorie` = `Recette`.`id_categorie` AND `Preparer`.`id_recette`= `Recette`.`id_recette` 
GROUP BY `Recette`.`id_recette` 
ORDER BY `temps_preparation` DESC

-- 3- Afficher les recettes qui nécessitent au moins 30 min de préparation
SELECT `Recette`.`nom` AS `Recette`, `Recette`.`temps_preparation` AS `Temps de préparation` 
FROM `Recette`
WHERE `Recette`.`temps_preparation` >= 30
ORDER BY `temps_preparation` ASC

-- 4- Afficher les recettes dont le nom contient le mot « Salade » (peu importe où est situé le mot en question)
SELECT `Recette`.`nom` AS `Recettes de salade`
FROM `Recette`
WHERE `nom` LIKE '%Salade%'

-- 5- Insérer une nouvelle recette : « Pâtes à la carbonara » dont la durée de réalisation est de 20 min avec les instructions de votre choix. Pensez à alimenter votre base de données en conséquence afin de pouvoir lister les détails de cette recettes (ingrédients)
INSERT INTO `Recette`(id_recette,nom,temps_preparation,instruction,id_categorie)
VALUES (21,'Pâtes à la carbonara',50,'instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction instruction ',1);

INSERT INTO preparer (id_recette,id_ingredient,quantite)
VALUES(21,16,10),
(21,1,10),
(21,2,30),
(21,3,40),
(21,4,50),
(21,5,20),
(21,10,20),
(21,12,20),
(21,8,20),
(21,9,10),
(21,20,50),
(21,19,42),
(21,17,53),
(21,11,124),
(21,6,153);

-- 6- Modifier le nom de la recette ayant comme identifiant id_recette = 3 (nom de la recette à votre convenance)
UPDATE recette
SET nom = 'Modifier le nom de la recette id_recette = 3'
WHERE id_recette = 3
LIMIT 1

-- 7- Supprimer la recette n°2 de la base de données
DELETE FROM preparer
WHERE id_recette = 2;

DELETE FROM recette
WHERE id_recette = 2
LIMIT 1
-- 8- Afficher le prix total de la recette n°5
-- Afficher le prix total pour chaque recette ou juste le recette 5
SELECT `Recette`.`id_recette` AS `N°`, `Recette`.`nom` AS `Recette`,  SUM(`ingredient`.`prix`*`preparer`.`quantite`) AS `Prix Total`
FROM `Recette`, `preparer`, `ingredient` 
WHERE /*`Preparer`.`id_recette` = 5 AND*/ `Preparer`.`id_recette`= `Recette`.`id_recette` AND `Preparer`.`id_ingredient`= `ingredient`.`id_ingredient` 
GROUP BY `Recette`.`id_recette`
-- Afficher les details du prix total d'une recette par exemple recette 5
SELECT *, SUM(preparer.quantite * ingredient.prix) AS `prix total` FROM preparer, ingredient
WHERE id_recette = 5 AND preparer.id_ingredient = ingredient.id_ingredient
GROUP BY id_recette, preparer.id_ingredient

-- 9- Afficher le détail de la recette n°5 (liste des ingrédients, quantités et prix)
SELECT `ingredient`.`nom` AS `Nom de l'ingrédient`, 
`preparer`.`quantite` AS `Qte`, 
`ingredient`.`unite_mesure` AS `unite mèsure`,
`ingredient`.`prix` AS `Prix Unitaire`, 
SUM(preparer.quantite * ingredient.prix) AS `prix total` 
FROM preparer, ingredient
WHERE id_recette = 5 AND preparer.id_ingredient = ingredient.id_ingredient
GROUP BY id_recette, preparer.id_ingredient

-- 10- Ajouter un ingrédient en base de données : Poivre, unité : cuillère à café, prix : 2.5 €
-- 11- Modifier le prix de l’ingrédient n°12 (prix à votre convenance)
-- 12- Afficher le nombre de recettes par catégories : X entrées, Y plats, Z desserts
-- 13- Afficher les recettes qui contiennent l’ingrédient « Poulet »
-- 14- Mettez à jour toutes les recettes en diminuant leur temps de préparation de 5 minutes 
-- 15- Afficher les recettes qui ne nécessitent pas d’ingrédients coûtant plus de 2€ par unité de mesure
-- 16- Afficher la / les recette(s) les plus rapides à préparer
-- 17- Trouver les recettes qui ne nécessitent aucun ingrédient (par exemple la recette de la tasse d’eau chaude qui consiste à verser de l’eau chaude dans une tasse)
-- 18- Trouver les ingrédients qui sont utilisés dans au moins 3 recettes
-- 19- Ajouter un nouvel ingrédient à une recette spécifique
-- 20- Bonus : Trouver la recette la plus coûteuse de la base de données (il peut y avoir des ex aequo, il est donc exclu d’utiliser la clause LIMIT);