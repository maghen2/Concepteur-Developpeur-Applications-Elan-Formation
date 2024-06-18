CREATE TABLE ingredient(
   id_ingredient INT,
   nom VARCHAR(50),
   unite_mesure VARCHAR(50),
   prix DECIMAL(15,2),
   PRIMARY KEY(id_ingredient)
);

CREATE TABLE categorie(
   id_categorie INT,
   nom VARCHAR(50),
   PRIMARY KEY(id_categorie)
);

CREATE TABLE Recette(
   id_recette INT,
   nom VARCHAR(50),
   temps_preparation INT,
   instruction TEXT,
   id_categorie INT NOT NULL,
   PRIMARY KEY(id_recette),
   FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)
);

CREATE TABLE Preparer(
   id_recette INT,
   id_ingredient INT,
   quantite INT,
   PRIMARY KEY(id_recette, id_ingredient),
   FOREIGN KEY(id_recette) REFERENCES Recette(id_recette),
   FOREIGN KEY(id_ingredient) REFERENCES ingredient(id_ingredient)
);
