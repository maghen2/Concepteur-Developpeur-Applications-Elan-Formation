<?php
class Role{
    private string $role;
    private array $castings;

    // constructeur
    public function __construct(string $role){
        $this->role = $role;
        $this->castings = [];
    }

    //__toString
    public function __toString(){
        return $this->role;
    }

    //getInfo
    public function getInfo(){

    }

    //GetActors permet d'onbtenir la liste des acteurs ayant incarné un rôle précis
    public function getActeurs() : array{
        $acteurs = [];
        for($i=0; $i<count($this->castings); $i++){
            $acteurs[$i]["acteur"] = $this->castings[$i]->getActeur();
            $acteurs[$i]["film"] = $this->castings[$i]->getFilm();
        }
        /*
        foreach($this->castings as $casting){
            $acteurs[] = $casting->getActeur();
        }*/
        return $acteurs;
    }

    // Ajoute au fur et à mesure les differents castings liès à l'objet
    public function addCasting(Casting $casting){
        $this->castings[] = $casting;
    }

    // Affichage de la liste des acteurs
    public function afficheActeurs() : string {
        $string = "<h2>Liste des acteurs ayant incarné le rôle de ".$this."</h2>";
        $string .="<ul>";
        foreach($this->getActeurs() as $actor){
            $string .= "<li>".$actor["acteur"]." a joué ce role dans le film ".$actor["film"]."</li>";
        }
        $string .= "</ul>";
        return $string;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

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
