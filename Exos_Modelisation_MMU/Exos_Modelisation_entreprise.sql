Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Entreprise(" & _
   "raison_sociale VARCHAR(126)," & _
   "adresse VARCHAR(255)," & _
   "cp VARCHAR(50)," & _
   "ville VARCHAR(150)," & _
   "date_creation DATE," & _
   "PRIMARY KEY(raison_sociale)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Salarie(" & _
   "id_salarie INT," & _
   "nom VARCHAR(250)," & _
   "prenom VARCHAR(250)," & _
   "date_naissance DATE," & _
   "date_premier_emploi DATE," & _
   "PRIMARY KEY(id_salarie)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Contrat(" & _
   "id_contrat INT," & _
   "type_contrat VARCHAR(50) NOT NULL," & _
   "date_debut DATE NOT NULL," & _
   "date_fin DATE," & _
   "id_salarie INT NOT NULL," & _
   "raison_sociale VARCHAR(126) NOT NULL," & _
   "PRIMARY KEY(id_contrat)," & _
   "FOREIGN KEY(id_salarie) REFERENCES Salarie(id_salarie)," & _
   "FOREIGN KEY(raison_sociale) REFERENCES Entreprise(raison_sociale)" & _
");"   

End Sub