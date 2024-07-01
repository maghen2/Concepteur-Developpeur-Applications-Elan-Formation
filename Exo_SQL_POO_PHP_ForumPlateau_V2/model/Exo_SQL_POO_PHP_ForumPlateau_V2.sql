/*Exo_SQL_POO_PHP_Cinema
Vous travaillez au sein d'une web agency en tant que développeur-intégrateur web. Suite à la commande d’un client (dont le formateur interprétera le rôle) NOT NULL, vous vous occupez de la conception d’un wiki de films NOT NULL, de genres cinématographiques et d’acteurs / actrices.
Les films seront identifiés par un identifiant unique NOT NULL, leur titre NOT NULL, leur année de sortie en France NOT NULL, leur durée (en minutes) ainsi que leur réalisateur (unique). Un résumé du film (synopsis) pourra éventuellement être renseigné NOT NULL, une note (sur 5) ainsi qu’une affiche du film.
Chaque film pourra posséder un ou plusieurs genres cinématographiques (science-fiction NOT NULL, aventure NOT NULL, action NOT NULL, …) identifiés par un numéro unique et un libellé.
Votre base de données devra recenser également les acteurs de chacun des films. On désire connaître le nom NOT NULL, le prénom NOT NULL, le sexe et la date de naissance de l’acteur ainsi que le rôle (nom du personnage) joué par l’acteur dans le(s) film(s) concerné(s).
Travail à réaliser :
1.	Réalisez le MCD d’une telle gestion des données. Vérifiez-le auprès du formateur.
2.	Créez et remplissez la base de données.
*/
CREATE DATABASE IF NOT EXISTS `maghen_forummvc_v2` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `maghen_forummvc_v2`;


CREATE TABLE IF NOT EXISTS user(
  id_user INT NOT NULL,
  pseudo VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  role VARCHAR(255) NOT NULL,
  dateInscription DATETIME NOT NULL DEFAULT  CURRENT_TIMESTAMP,
  PRIMARY KEY(id_user)
);

CREATE TABLE IF NOT EXISTS category(
  id_category INT NOT NULL,
  name VARCHAR(255) NOT NULL,
  PRIMARY KEY(id_category)
);

CREATE TABLE IF NOT EXISTS topic(
  id_topic INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  dateCreation DATETIME NOT NULL DEFAULT  CURRENT_TIMESTAMP,
  closed LOGICAL NOT NULL,
  id_category INT NOT NULL,
  id_user INT NOT NULL,
  PRIMARY KEY(id_topic) NOT NULL,
  FOREIGN KEY(id_category) REFERENCES category(id_category) NOT NULL,
  FOREIGN KEY(id_user) REFERENCES user_(id_user)
);

CREATE TABLE IF NOT EXISTS post(
  id_post INT NOT NULL,
  comment TEXT NOT NULL,
  dateCreation DATETIME NOT NULL DEFAULT  CURRENT_TIMESTAMP,
  id_topic INT NOT NULL,
  id_user INT NOT NULL,
  PRIMARY KEY(id_post) NOT NULL,
  FOREIGN KEY(id_topic) REFERENCES topic(id_topic) NOT NULL,
  FOREIGN KEY(id_user) REFERENCES user_(id_user)
);
