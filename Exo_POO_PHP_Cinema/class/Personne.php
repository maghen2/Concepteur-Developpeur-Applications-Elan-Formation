<?php
class Personne{
    private string $prenom, $nom, $sexe;
    private DateTime $dateNaissance;

    
    // constructeur
    public function __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->sexe = $sexe;
        $this->dateNaissance = new DateTime($dateNaissance);
    }

    //__toString
    public function __toString(){
        return $this->nom." ".$this->prenom." (".$this->dateNaissance.")";
    }

    //getInfo
    public function getInfo(){

    }

}