Sub Create_Tables()

DoCmd.RunSQL "CREATE TABLE CompteBancaire(" & _
   "idCompteBancaire INT," & _
   "solde DECIMAL(15,2)," & _
   "titulaire VARCHAR(50)," & _
   "_typeComptes VARCHAR(50)," & _
   "_devises VARCHAR(50)," & _
   "PRIMARY KEY(idCompteBancaire)" & _
");"   

DoCmd.RunSQL "CREATE TABLE TitulaireCompteBancaire(" & _
   "idTitulaireCompteBancaire INT," & _
   "nom VARCHAR(50)," & _
   "prenom VARCHAR(50)," & _
   "dateNaissance DATE," & _
   "ville VARCHAR(50)," & _
   "PRIMARY KEY(idTitulaireCompteBancaire)" & _
");"   

DoCmd.RunSQL "CREATE TABLE InfoCompte(" & _
   "idCompteBancaire INT," & _
   "idTitulaireCompteBancaire INT," & _
   "PRIMARY KEY(idCompteBancaire, idTitulaireCompteBancaire)," & _
   "FOREIGN KEY(idCompteBancaire) REFERENCES CompteBancaire(idCompteBancaire)," & _
   "FOREIGN KEY(idTitulaireCompteBancaire) REFERENCES TitulaireCompteBancaire(idTitulaireCompteBancaire)" & _
");"   

End Sub