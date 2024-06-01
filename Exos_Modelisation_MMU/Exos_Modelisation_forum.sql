Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Utilisateur(" & _
   "id_utilisateur VARCHAR(50)," & _
   "pseudo VARCHAR(50) NOT NULL," & _
   "email VARCHAR(255) NOT NULL," & _
   "mot_de_passe VARCHAR(255) NOT NULL," & _
   "PRIMARY KEY(id_utilisateur)," & _
   "UNIQUE(email)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Role(" & _
   "id_role VARCHAR(50)," & _
   "administrateur LOGICAL NOT NULL," & _
   "moderateur LOGICAL NOT NULL," & _
   "utilisateur LOGICAL," & _
   "PRIMARY KEY(id_role)" & _
");"   

DoCmd.RunSQL "CREATE TABLE sujet(" & _
   "id_sujet INT," & _
   "message TEXT NOT NULL," & _
   "id_utilisateur VARCHAR(50) NOT NULL," & _
   "PRIMARY KEY(id_sujet)," & _
   "FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)" & _
");"   

DoCmd.RunSQL "CREATE TABLE droit(" & _
   "id_utilisateur VARCHAR(50)," & _
   "id_role VARCHAR(50)," & _
   "PRIMARY KEY(id_utilisateur, id_role)," & _
   "FOREIGN KEY(id_utilisateur) REFERENCES Utilisateur(id_utilisateur)," & _
   "FOREIGN KEY(id_role) REFERENCES Role(id_role)" & _
");"   

End Sub