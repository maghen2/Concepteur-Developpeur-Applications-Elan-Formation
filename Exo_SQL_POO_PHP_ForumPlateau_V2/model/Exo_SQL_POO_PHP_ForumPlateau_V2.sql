/*Exo_SQL_POO_PHP_ForumPlateau_V2
Il est nécessaire, en amont de la conception technique, de fournir deux documents d'analyse afin d'évaluer le respect des contraintes exprimées et la bonne direction du projet.
Un schéma entités-relations de la base de données (créé avec looping par exemple), à mettre en place selon les contraintes suivantes :
  · Les visiteurs sont identifiés par un numéro unique, possèdent un pseudonyme et un mot de passe. Leur date d'inscription est automatiquement renseignée à la création de leur compte dans la base de données.
  · Le forum est constitué de sujets (titre, auteur et date de création) auxquels sont rattachés des messages (texte, auteur et date de création).
  · Sujets et messages sont identifiés dans la base de données par un numéro unique. Leurs dates de création sont automatiquement renseignées lors de leur création.
  · Lorsqu'un sujet est visualisé, la liste des messages est présentée dans l'ordre chronologique. Chaque message est accompagné du nom de son auteur et de sa date de création.
  · Toute information enregistrable dans la base de données en relation avec le forum devra comporter une solution de modération (la solution étant laissée à l'initiative du concepteur)
*/

CREATE DATABASE IF NOT EXISTS `maghen_forummvc_v2` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `maghen_forummvc_v2`;


CREATE TABLE IF NOT EXISTS user(
 id_user INT UNSIGNED NOT NULL AUTO_INCREMENT,
 pseudo VARCHAR(255) NOT NULL,
 password VARCHAR(255) NOT NULL,
 email VARCHAR(255) NOT NULL,
 role VARCHAR(50) NOT NULL,
 dateInscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY(id_user)
);

CREATE TABLE IF NOT EXISTS category(
 id_category INT UNSIGNED NOT NULL AUTO_INCREMENT,
 name VARCHAR(255) NOT NULL,
 PRIMARY KEY(id_category)
);

CREATE TABLE IF NOT EXISTS topic(
 id_topic INT UNSIGNED NOT NULL AUTO_INCREMENT,
 title VARCHAR(255) NOT NULL,
 dateCreation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 closed TINYINT(1) NOT NULL DEFAULT 0,
 category_id INT UNSIGNED NOT NULL,
 user_id INT UNSIGNED NOT NULL,
 PRIMARY KEY(id_topic),
 FOREIGN KEY(category_id) REFERENCES category(id_category),
 FOREIGN KEY(user_id) REFERENCES user(id_user)
);

CREATE TABLE IF NOT EXISTS post(
 id_post INT UNSIGNED NOT NULL AUTO_INCREMENT,
 comment TEXT NOT NULL,
 dateCreation DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
 topic_id INT UNSIGNED NOT NULL,
 user_id INT UNSIGNED NOT NULL,
 PRIMARY KEY(id_post),
 FOREIGN KEY(topic_id) REFERENCES topic(id_topic),
 FOREIGN KEY(user_id) REFERENCES user(id_user)
);

-- Peuplement de la base de données
INSERT INTO user(pseudo, password, email, role) 
VALUES('admin', 'admin', 'admin@exemple.com', 'admin'),
('user', 'user', 'user@exemple.com', 'user'),
('moderator', 'moderator', 'moderator@dmain.ue', 'moderator'),
('user2', 'user2', 'user2@hot.fr', 'user');

INSERT INTO category(name)
VALUES('PHP'), ('SQL'), ('HTML'), ('CSS');

INSERT INTO topic(title, category_id, user_id)
VALUES('PHP 7.4', 1, 1),
('SQL 8.0', 2, 2),
('HTML 5', 3, 3),
('CSS 3', 4, 4),
('PHP 8.0', 1, 1);

INSERT INTO post(comment, topic_id, user_id)
VALUES('PHP 7.4 est une version de PHP', 1, 1),
('SQL 8.0 est une version de SQL', 2, 2),
('HTML 5 est une version de HTML', 3, 3),
('CSS 3 est une version de CSS', 4, 4),
('PHP 8.0 est une version de PHP', 5, 1);

