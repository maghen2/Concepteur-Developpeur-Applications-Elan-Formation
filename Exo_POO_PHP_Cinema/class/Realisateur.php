<?php
class Realisateur extends Personne{
    private array $films;

    public function __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
        parent::__construct($prenom, $nom, $sexe, $dateNaissance);
    }

    //getInfo
    public function getInfo(){

    }

        // Ajoute au fur et à mesure les differents films liès à l'objet
        public function addFilm(Film $film){
            $this->films[] = $film;
        }
    
}