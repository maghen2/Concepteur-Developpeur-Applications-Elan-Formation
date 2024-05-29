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
        
        // Affichage de la liste des films d'un réalisateur précis
        public function afficherFilmographie() : string {
            $string = "<h2>Filmographie de l'acteur ".$this."</h2>";
            $string .="<ul>";
            foreach($this->getCastings() as $casting){
                $string .= "<li>".$casting->getFilm()."</li>";
            }
            $string .= "</ul>";
            return $string;
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