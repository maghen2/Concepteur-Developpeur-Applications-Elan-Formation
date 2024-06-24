CREATE DATABASE IF NOT EXISTS `maghen_cinema` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `maghen_cinema`;

CREATE TABLE Personne(
   id_personne INT AUTO_INCREMENT NOT NULL,
   prenom VARCHAR(255) NOT NULL,
   nom VARCHAR(255) NOT NULL,
   sexe VARCHAR(255) NOT NULL,
   date_naissance DATE NOT NULL,
   PRIMARY KEY(id_personne)
);

CREATE TABLE Acteur(
   id_acteur INT AUTO_INCREMENT NOT NULL,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_acteur),
   UNIQUE(id_personne),
   FOREIGN KEY(id_personne) REFERENCES Personne(id_personne)
);

CREATE TABLE Realisateur(
   id_realisateur_ INT AUTO_INCREMENT NOT NULL,
   id_personne INT NOT NULL,
   PRIMARY KEY(id_realisateur_),
   UNIQUE(id_personne),
   FOREIGN KEY(id_personne) REFERENCES Personne(id_personne)
);

CREATE TABLE Film(
   id_film INT AUTO_INCREMENT NOT NULL,
   titre VARCHAR(255) NOT NULL,
   date_sortie_fr_ DATE NOT NULL,
   duree INT NOT NULL,
   synopsis TEXT NOT NULL,
   id_realisateur_ INT NOT NULL,
   PRIMARY KEY(id_film),
   FOREIGN KEY(id_realisateur_) REFERENCES Realisateur(id_realisateur_)
);

CREATE TABLE Genre(
   id_genre INT AUTO_INCREMENT NOT NULL,
   nom_genre VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_genre)
);

CREATE TABLE Role(
   id_role INT AUTO_INCREMENT NOT NULL,
   nom_personnage VARCHAR(255) NOT NULL,
   PRIMARY KEY(id_role)
);

CREATE TABLE film_genres(
   id_film INT NOT NULL,
   id_genre INT NOT NULL,
   PRIMARY KEY(id_film, id_genre),
   FOREIGN KEY(id_film) REFERENCES Film(id_film),
   FOREIGN KEY(id_genre) REFERENCES Genre(id_genre)
);

CREATE TABLE Casting(
   id_acteur INT NOT NULL,
   id_film INT NOT NULL,
   id_role INT NOT NULL,
   PRIMARY KEY(id_acteur NOT NULL, id_film NOT NULL, id_role) NOT NULL,
   FOREIGN KEY(id_acteur) REFERENCES Acteur(id_acteur) NOT NULL,
   FOREIGN KEY(id_film) REFERENCES Film(id_film),
   FOREIGN KEY(id_role) REFERENCES Role(id_role)
);
