<?php
class Film{
    private string $titre, $synopsys;
    private int $duree;
    private DateTime $dateSortie;
    private Genre $genre;
    private Realisateur $realisateur;
    private array $castings;

    // constructeur
    public function __construct(string $titre, string $synopsys, int $duree, DateTime $dateSortie, Genre $genre, Realisateur $realisateur){
        $this->titre = $titre;
        $this->synopsys = $synopsys;
        $this->duree = $duree;
        $this->dateSortie = $dateSortie;
        $this->genre = $genre;
        $this->realisateur = $realisateur;
        $castings[] = ;
    }

    //__toString
    public function __toString(){
        return $this->titre."(".$this->dateSortie.")";
    }

    //getInfo
    public function getInfo(){

    }


    
}