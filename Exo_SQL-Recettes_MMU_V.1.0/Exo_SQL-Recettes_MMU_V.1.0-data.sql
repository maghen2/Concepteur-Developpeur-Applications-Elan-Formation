/*CREATION DE LA BASE DE DONNEES*/
CREATE DATABASE IF NOT EXISTS `Maghen_Recette` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Maghen_Recette`;

/*CREATE TABLE IF NOT EXISTS*/
CREATE TABLE IF NOT EXISTS ingredient(
   id_ingredient INT,
   nom VARCHAR(50),
   unite_mesure VARCHAR(50),
   prix DECIMAL(15,2),
   PRIMARY KEY(id_ingredient)
);

CREATE TABLE IF NOT EXISTS categorie(
   id_categorie INT,
   nom VARCHAR(50),
   PRIMARY KEY(id_categorie)
);

CREATE TABLE IF NOT EXISTS Recette(
   id_recette INT,
   nom VARCHAR(50),
   temps_preparation INT,
   instruction TEXT,
   id_categorie INT NOT NULL,
   PRIMARY KEY(id_recette),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
);

CREATE TABLE IF NOT EXISTS Preparer(
   id_recette INT,
   id_ingredient INT,
   quantite INT,
   PRIMARY KEY(id_recette, id_ingredient),
   FOREIGN KEY(id_recette) REFERENCES Recette(id_recette),
   FOREIGN KEY(id_ingredient) REFERENCES ingredient(id_ingredient)
);

/*INSERT DATA*/
INSERT INTO categorie(id_categorie,nom)
VALUES(0,'entrée'),
(1,'plat'),
(2,'dessert');
/*INSERT DATA*/
INSERT INTO ingredient(id_ingredient, nom, unite_mesure, prix)
VALUES(1, 'Farine', 'g', 2.50),
(2, 'Sucre', 'g', 1.50),
(3, 'Beurre', 'g', 3.00),
(4, 'Chocolat', 'g', 5.00),
(5, 'Tomate', 'g', 1.00),
(6, 'Huile d''olive', 'cl', 2.00),
(7, 'Vinaigre balsamique', 'g', 3.00),
(8, 'Sel', 'g', 0.10),
(9, 'Poivre', 'g', 0.10),
(10, 'Basilic', 'g', 1.00),
(11, 'Poulet', 'g', 10.00),
(12, 'Pomme de terre', 'g', 1.00),
(13, 'Carotte', 'g', 0.50),
(14, 'Oignon', 'g', 0.50),
(15, 'Ail', 'g', 0.50),
(16, 'Pain', 'g', 1.00),
(17, 'Fromage', 'g', 2.00),
(18, 'Jambon', 'g', 3.00),
(19, 'Lait', 'cl', 1.00),
(20, 'Oeuf', 'unité', 0.50),
(21, 'Crème fraîche', 'cl', 2.00),
(22, 'Pâte brisée', 'g', 3.00),
(23, 'Pâte feuilletée', 'g', 3.00),
(24, 'Pâte sablée', 'g', 3.00);


INSERT INTO Recette(id_recette, nom, temps_preparation, instruction, id_categorie)
VALUES(0, 'Tarte aux pommes', 60, "Préchauffer le four à 180°C. Étaler la pâte sablée dans un moule à tarte. Éplucher et couper les pommes en tranches fines. Disposer les tranches de pommes sur la pâte. Saupoudrer de sucre et de cannelle. Enfourner pendant 40 minutes.", 2),
(1, 'Salade César', 15, "Laver et couper la salade en morceaux. Ajouter les croûtons, le parmesan et les morceaux de poulet grillé. Assaisonner avec la sauce César. Mélanger et servir.", 0),
(2, 'Mousse au chocolat', 120, "Faire fondre le chocolat au bain-marie. Séparer les blancs des jaunes d'œufs. Monter les blancs en neige. Dans un autre récipient, mélanger les jaunes d'œufs avec le sucre. Ajouter le chocolat fondu et mélanger délicatement. Incorporer les blancs en neige. Réfrigérer pendant au moins 2 heures.", 2),
(3, 'Ratatouille', 60, "Éplucher et couper les légumes en morceaux. Dans une poêle, faire revenir les légumes avec de l'huile d'olive. Ajouter l'ail, le sel, le poivre et les herbes de Provence. Laisser mijoter pendant 30 minutes.", 1),
(4, 'Pancakes', 30, "Dans un saladier, mélanger la farine, le sucre, la levure et une pincée de sel. Ajouter le lait, l'œuf et l'huile. Mélanger jusqu'à obtenir une pâte lisse. Faire chauffer une poêle antiadhésive et verser une louche de pâte. Cuire chaque pancake des deux côtés jusqu'à ce qu'ils soient dorés.", 2),
(5, 'Gâteau au chocolat', 45, "Préchauffer le four à 180°C. Faire fondre le chocolat au bain-marie. Dans un saladier, mélanger le beurre ramolli avec le sucre. Ajouter les œufs un par un en mélangeant bien. Incorporer la farine et la levure. Ajouter le chocolat fondu et mélanger jusqu'à obtenir une pâte homogène. Verser la pâte dans un moule beurré et enfourner pendant 30 minutes.", 2),
(6, 'Pâtes à la carbonara', 20, "Faire cuire les pâtes dans de l'eau bouillante salée. Pendant ce temps, faire revenir les lardons dans une poêle. Dans un saladier, mélanger les œufs, le parmesan râpé, le sel et le poivre. Égoutter les pâtes et les mélanger avec les lardons. Ajouter la préparation aux œufs et mélanger rapidement. Servir chaud.", 1),
(7, 'Salade niçoise', 15, "Laver et couper les légumes en morceaux. Cuire les œufs dans de l'eau bouillante. Disposer les légumes, les œufs, les olives et le thon sur un lit de salade. Assaisonner avec de l'huile d'olive, du vinaigre balsamique, du sel et du poivre. Mélanger et servir.", 0),
(8, 'Quiche lorraine', 45, "Préchauffer le four à 180°C. Étaler la pâte brisée dans un moule à tarte. Dans un saladier, mélanger les œufs, la crème fraîche, le sel et le poivre. Ajouter le fromage râpé et les lardons. Verser la préparation sur la pâte. Enfourner pendant 30 minutes.", 1),
(9, 'Poulet rôti', 90, "Préchauffer le four à 180°C. Éplucher et couper les légumes en morceaux. Farcir le poulet avec les légumes et les herbes aromatiques. Badigeonner le poulet d'huile d'olive. Enfourner pendant 1h30 en arrosant régulièrement.", 1),
(10, 'Tarte à la tomate', 60, "Préchauffer le four à 180°C. Étaler la pâte feuilletée dans un moule à tarte. Laver et couper les tomates en rondelles. Disposer les rondelles de tomates sur la pâte. Ajouter les herbes de Provence, le sel et le poivre. Enfourner pendant 40 minutes.", 2),
(11, 'Pain perdu', 20, "Dans un saladier, mélanger le lait, les œufs, le sucre et la cannelle. Tremper les tranches de pain dans le mélange. Faire chauffer une poêle avec du beurre et faire dorer les tranches de pain des deux côtés. Saupoudrer de sucre et servir chaud.", 2),
(12, 'Salade de chèvre chaud', 15, "Préchauffer le four à 180°C. Laver et couper la salade en morceaux. Couper le fromage de chèvre en rondelles. Disposer les rondelles de chèvre sur des tranches de pain. Enfourner pendant 10 minutes. Disposer la salade dans une assiette, ajouter les croûtons et les rondelles de chèvre chaudes. Assaisonner avec de l'huile d'olive, du vinaigre balsamique, du sel et du poivre.", 0),
(13, 'Poulet curry-coco', 60, "Faire cuire le riz dans de l'eau bouillante salée. Dans une poêle, faire revenir les morceaux de poulet avec de l'huile d'olive. Ajouter l'oignon émincé, l'ail écrasé, le curry et le lait de coco. Laisser mijoter pendant 30 minutes. Servir le poulet avec le riz.", 1),
(14, 'Tarte aux fraises', 60, "Préchauffer le four à 180°C. Étaler la pâte sablée dans un moule à tarte. Laver et équeuter les fraises. Disposer les fraises sur la pâte. Faire chauffer la confiture d'abricot et badigeonner les fraises. Réfrigérer pendant 1 heure.", 2),
(15, 'Pâtes à la bolognaise', 30, "Faire cuire les pâtes dans de l'eau bouillante salée. Dans une poêle, faire revenir la viande hachée avec l'oignon émincé. Ajouter les tomates pelées, le concentré de tomates, l'ail écrasé, le thym et le laurier. Laisser mijoter pendant 20 minutes. Servir la sauce bolognaise sur les pâtes.", 1),
(16, 'Salade de pâtes', 15, "Faire cuire les pâtes dans de l'eau bouillante salée. Laver et couper les légumes en morceaux. Dans un saladier, mélanger les pâtes, les légumes, le thon et les olives. Assaisonner avec de l'huile d'olive, du vinaigre balsamique, du sel et du poivre. Mélanger et servir.", 0),
(17, 'Tarte aux poireaux', 60, "Préchauffer le four à 180°C. Étaler la pâte brisée dans un moule à tarte. Laver et couper les poireaux en rondelles. Faire revenir les poireaux dans une poêle avec de l'huile d'olive. Dans un saladier, mélanger les œufs, la crème fraîche, le sel et le poivre. Ajouter les poireaux et mélanger. Verser la préparation sur la pâte. Enfourner pendant 30 minutes.", 2),
(18, 'Poulet basquaise', 60, "Faire cuire le riz dans de l'eau bouillante salée. Dans une cocotte, faire revenir les morceaux de poulet avec de l'huile d'olive. Ajouter les poivrons, les tomates, l'ail écrasé, le piment d'Espelette et le bouillon de volaille. Laisser mijoter pendant 30 minutes. Servir le poulet avec le riz.", 1),
(19, 'Tarte aux oignons', 60, "Préchauffer le four à 180°C. Étaler la pâte feuilletée dans un moule à tarte. Éplucher et émincer les oignons. Faire revenir les oignons dans une poêle avec de l'huile d'olive. Dans un saladier, mélanger les œufs, la crème fraîche, le sel et le poivre. Ajouter les oignons et mélanger. Verser la préparation sur la pâte. Enfourner pendant 30 minutes.", 2),
(20, 'Pancakes salés', 30, "Dans un saladier, mélanger la farine, la levure, le sel et le poivre. Ajouter le lait, l'œuf et l'huile. Mélanger jusqu'à obtenir une pâte lisse. Faire chauffer une poêle antiadhésive et verser une louche de pâte. Cuire chaque pancake des deux côtés jusqu'à ce qu'ils soient dorés. Servir chaud avec du jambon et du fromage.", 1);



INSERT INTO Preparer(id_recette, id_ingredient, quantite)
VALUES(1, 1, 200),
(1, 2, 150),
(1, 3, 100),
(2, 1, 300),
(2, 2, 200),
(2, 3, 50);

