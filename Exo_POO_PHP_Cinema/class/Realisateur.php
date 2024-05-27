<?php
class Realisateur extends Personne{
    private array $films;
    
    //getInfo
    public function getInfo(){

    }

        // Ajoute au fur et à mesure les differents films liès à l'objet
        public function addFilm(Film $film){
            $this->films[] = $film;
        }
    
}