<?php
Class Genre{
    private string $genre;
    private array $films;

    // constructeur
    public function __construct(string $genre){
        $this->genre = $genre;
    }

    //__toString
    public function __toString(){
        return $this->genre;
    }

    //getInfo
    public function getInfo(){

    }
    // Ajoute au fur et à mesure les differents films liès à l'objet
    public function addFilm(Film $film){
        $this->films[] = $film;
    }


}