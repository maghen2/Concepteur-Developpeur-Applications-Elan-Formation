Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE ingredient(" & _
   "id_ingredient INT," & _
   "nom VARCHAR(50)," & _
   "unite_mesure VARCHAR(50)," & _
   "prix DECIMAL(15,2)," & _
   "PRIMARY KEY(id_ingredient)" & _
");"   

DoCmd.RunSQL "CREATE TABLE categorie(" & _
   "id_categorie INT," & _
   "nom VARCHAR(50)," & _
   "PRIMARY KEY(id_categorie)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Recette(" & _
   "id_recette INT," & _
   "nom VARCHAR(50)," & _
   "temps_preparation INT," & _
   "instruction TEXT," & _
   "id_categorie INT NOT NULL," & _
   "PRIMARY KEY(id_recette)," & _
   "FOREIGN KEY(id_categorie) REFERENCES categorie(id_categorie)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Preparer(" & _
   "id_recette INT," & _
   "id_ingredient INT," & _
   "quantite INT," & _
   "PRIMARY KEY(id_recette, id_ingredient)," & _
   "FOREIGN KEY(id_recette) REFERENCES Recette(id_recette)," & _
   "FOREIGN KEY(id_ingredient) REFERENCES ingredient(id_ingredient)" & _
");"   

End Sub