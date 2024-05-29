<?php
class Realisateur extends Personne{
    private array $films;

    public function __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
        parent::__construct($prenom, $nom, $sexe, $dateNaissance);
        $this->films = [];
    }

    //getInfo
    public function getInfo(){

    }

        // Ajoute au fur et à mesure les differents films liès à l'objet
        public function addFilm(Film $film){
            $this->films[] = $film;
        }
    

    /**
     * Get the value of films
     */ 
    public function getFilms()
    {
        return $this->films;
    }

    /**
     * Set the value of films
     *
     * @return  self
     */ 
    public function setFilms($films)
    {
        $this->films = $films;

        return $this;
    }
}