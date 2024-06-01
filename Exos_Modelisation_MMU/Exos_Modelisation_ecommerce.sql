Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE Client(" & _
   "id_client INT," & _
   "nom VARCHAR(255) NOT NULL," & _
   "prenom VARCHAR(255) NOT NULL," & _
   "email VARCHAR(255) NOT NULL," & _
   "tel INT NOT NULL," & _
   "mot_passe VARCHAR(255) NOT NULL," & _
   "date_inscription DATE NOT NULL," & _
   "adresse VARCHAR(250) NOT NULL," & _
   "cp VARCHAR(50)," & _
   "ville VARCHAR(250)," & _
   "PRIMARY KEY(id_client)," & _
   "UNIQUE(email)" & _
");"   

DoCmd.RunSQL "CREATE TABLE Produit(" & _
   "id_produit VARCHAR(50)," & _
   "designation VARCHAR(250) NOT NULL," & _
   "prix DECIMAL(15,2) NOT NULL," & _
   "stock INT NOT NULL," & _
   "PRIMARY KEY(id_produit)" & _
");"   

DoCmd.RunSQL "CREATE TABLE commande(" & _
   "id_commande INT," & _
   "date_commande DATETIME NOT NULL," & _
   "id_client INT NOT NULL," & _
   "PRIMARY KEY(id_commande)," & _
   "FOREIGN KEY(id_client) REFERENCES Client(id_client)" & _
");"   

DoCmd.RunSQL "CREATE TABLE commande_detail(" & _
   "id_produit VARCHAR(50)," & _
   "id_commande INT," & _
   "quantite INT NOT NULL," & _
   "PRIMARY KEY(id_produit, id_commande)," & _
   "FOREIGN KEY(id_produit) REFERENCES Produit(id_produit)," & _
   "FOREIGN KEY(id_commande) REFERENCES commande(id_commande)" & _
");"   

End Sub