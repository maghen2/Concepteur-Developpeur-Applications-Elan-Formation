Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Pays(" & _
   "id_pays INT," & _
   "nom VARCHAR(50)," & _
   "PRIMARY KEY(id_pays)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Equipe(" & _
   "id_equipe INT," & _
   "nom VARCHAR(50)," & _
   "id_pays INT NOT NULL," & _
   "PRIMARY KEY(id_equipe)," & _
   "FOREIGN KEY(id_pays) REFERENCES Pays(id_pays)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Joeur(" & _
   "id_joeur INT," & _
   "prenom VARCHAR(50)," & _
   "nom VARCHAR(50)," & _
   "date_naissance_ DATE," & _
   "id_pays INT NOT NULL," & _
   "PRIMARY KEY(id_joeur)," & _
   "FOREIGN KEY(id_pays) REFERENCES Pays(id_pays)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Contrat(" & _
   "id_contrat VARCHAR(50)," & _
   "date_debut DATE," & _
   "date_fin DATE," & _
   "id_joeur INT NOT NULL," & _
   "id_equipe INT NOT NULL," & _
   "PRIMARY KEY(id_contrat)," & _
   "FOREIGN KEY(id_joeur) REFERENCES Joeur(id_joeur)," & _
   "FOREIGN KEY(id_equipe) REFERENCES Equipe(id_equipe)" & _
");"   

End Sub