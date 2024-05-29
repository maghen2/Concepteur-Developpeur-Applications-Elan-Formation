<?php
class Film{
    private string $titre, $synopsys;
    private int $duree;
    private DateTime $dateSortie;
    private Genre $genre;
    private Realisateur $realisateur;
    private array $castings;

    // constructeur
    public function __construct(string $titre, string $synopsys, int $duree, string $dateSortie, Genre $genre, Realisateur $realisateur){
        $this->titre = $titre;
        $this->synopsys = $synopsys;
        $this->duree = $duree;
        $this->dateSortie = new DateTime($dateSortie);
        $this->genre = $genre;
        $this->genre->addFilm($this);
        $this->realisateur = $realisateur;
        $this->realisateur->addFilm($this);
        $this->castings = [];
    }

    //__toString
    public function __toString(){
        return $this->titre."(".$this->dateSortie->format('d-m-Y').")";
    }

    //getInfo
    public function getInfo(){

    }

    // Ajoute au fur et à mesure les differents castings liès à l'objet
    public function addCasting(Casting $casting){
        $this->castings[] = $casting;
    }

    //GetCasting permet d'onbtenir la liste des acteurs ainsi que le rôle joué dans le film
    public function getCasting(): array{
        $castings = [];
        for($i=0; $i<count($this->castings); $i++){
            $castings[$i]["acteur"] = $this->castings[$i]->getActeur();
            $castings[$i]["role"] = $this->castings[$i]->getRole();
        }
        return $castings;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of synopsys
     */ 
    public function getSynopsys()
    {
        return $this->synopsys;
    }

    /**
     * Set the value of synopsys
     *
     * @return  self
     */ 
    public function setSynopsys($synopsys)
    {
        $this->synopsys = $synopsys;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of dateSortie
     */ 
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set the value of dateSortie
     *
     * @return  self
     */ 
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
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
     * Get the value of realisateur
     */ 
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set the value of realisateur
     *
     * @return  self
     */ 
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    /**
     * Get the value of castings
     */ 
    public function getCastings()
    {
        return $this->castings;
    }

    /**
     * Set the value of castings
     *
     * @return  self
     */ 
    public function setCastings($castings)
    {
        $this->castings = $castings;

        return $this;
    }
}