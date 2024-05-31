<?php
Class Joueur{
private string $prenom;
private string $nom;
private DateTime $dateNaissance;
private Pays $pays; 

//creation du constructeur
public function __construct(string $prenom, string $nom, string $dateNaissance, Pays $pays){
    $this->prenom = $prenom;
    $this->nom = $nom;
    $this->dateNaissance = new DateTime($dateNaissance);
    $this->pays = $pays;
    $this->pays->addJoueur($this);

}


}
