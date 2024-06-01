Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Auteur(" & _
   "id_auteur INT," & _
   "nom VARCHAR(255) NOT NULL," & _
   "prenom VARCHAR(255) NOT NULL," & _
   "sexe VARCHAR(50)," & _
   "date_naissance DATE NOT NULL," & _
   "PRIMARY KEY(id_auteur)" & _
");"   

DoCmd.RunSQL "CREATE TABLE genre_livre(" & _
   "id_genre INT," & _
   "nom_genre VARCHAR(50)," & _
   "PRIMARY KEY(id_genre)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Livre(" & _
   "id_livre INT," & _
   "titre VARCHAR(255)," & _
   "date_sortie DATE," & _
   "nombre_page INT," & _
   "resume TEXT," & _
   "id_genre INT NOT NULL," & _
   "id_auteur INT NOT NULL," & _
   "PRIMARY KEY(id_livre)," & _
   "FOREIGN KEY(id_genre) REFERENCES genre_livre(id_genre)," & _
   "FOREIGN KEY(id_auteur) REFERENCES Auteur(id_auteur)" & _
");"   

End Sub