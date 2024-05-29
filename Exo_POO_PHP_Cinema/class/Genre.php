<?php
Class Genre{
    private string $genre;
    private array $films;

    // constructeur
    public function __construct(string $genre){
        $this->genre = $genre;
        $this->films = [];
    }

    //__toString
    public function __toString(){
        return $this->genre;
    }

    //getInfo
    public function getInfo(){

    }
    // Affichage de la liste des films d'un genre précis
    public function afficheFilms() : string {
        $string = "<h2>Liste des films du genre ".$this."</h2>";
        $string .="<ul>";
        foreach($this->getFilms() as $film){
            $string .= "<li>$film</li>";
        }
        $string .= "</ul>";
        return $string;
    }

    // Ajoute au fur et à mesure les differents films liès à l'objet
    public function addFilm(Film $film){
        $this->films[] = $film;
    }



    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
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