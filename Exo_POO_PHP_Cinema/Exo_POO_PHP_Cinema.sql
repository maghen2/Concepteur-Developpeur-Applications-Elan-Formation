Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Personne(" & _
   "id_personne INT," & _
   "prenom VARCHAR(50)," & _
   "nom_ VARCHAR(50)," & _
   "sexe VARCHAR(50)," & _
   "date_naissance DATE," & _
   "PRIMARY KEY(id_personne)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Acteur(" & _
   "id_acteur INT," & _
   "id_personne INT NOT NULL," & _
   "PRIMARY KEY(id_acteur)," & _
   "UNIQUE(id_personne)," & _
   "FOREIGN KEY(id_personne) REFERENCES Personne(id_personne)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Realisateur(" & _
   "id_realisateur_ INT," & _
   "id_personne INT NOT NULL," & _
   "PRIMARY KEY(id_realisateur_)," & _
   "UNIQUE(id_personne)," & _
   "FOREIGN KEY(id_personne) REFERENCES Personne(id_personne)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Genre(" & _
   "id_genre INT," & _
   "nom_genre VARCHAR(50) NOT NULL," & _
   "PRIMARY KEY(id_genre)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Role(" & _
   "id_role INT," & _
   "nom_personnage VARCHAR(50) NOT NULL," & _
   "PRIMARY KEY(id_role)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Film(" & _
   "id_film INT," & _
   "titre VARCHAR(50)," & _
   "date_sortie_fr_ DATE," & _
   "duree INT," & _
   "synopsis TEXT," & _
   "id_genre INT NOT NULL," & _
   "id_realisateur_ INT NOT NULL," & _
   "PRIMARY KEY(id_film)," & _
   "FOREIGN KEY(id_genre) REFERENCES Genre(id_genre)," & _
   "FOREIGN KEY(id_realisateur_) REFERENCES Realisateur(id_realisateur_)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Casting(" & _
   "id_acteur INT," & _
   "id_film INT," & _
   "id_role INT," & _
   "PRIMARY KEY(id_acteur, id_film, id_role)," & _
   "FOREIGN KEY(id_acteur) REFERENCES Acteur(id_acteur)," & _
   "FOREIGN KEY(id_film) REFERENCES Film(id_film)," & _
   "FOREIGN KEY(id_role) REFERENCES Role(id_role)" & _
");"   

End Sub