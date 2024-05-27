<?php
class Casting{
    private Acteur $acteur;
    private Film $film;
    private Role $role;

    // constructeur
    public function __construct(Acteur $acteur, Film $film, Role $role){
        $this->acteur = $acteur;
        $this->film = $film;
        $this->role = $role;
    }

    //__toString
    public function __toString(){
        return " Acteur : ".$this->acteur."\n Film : ".$this->film."\n Rôle : ".$this->role."\n";
    }

    //getInfo
    public function getInfo(){

    }

}