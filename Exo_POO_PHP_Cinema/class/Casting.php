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
        $this->acteur->addCasting($this);
        $this->film->addCasting($this);
        $this->role->addCasting($this);
    }

    //__toString
    public function __toString(){
        return " Acteur : ".$this->acteur."\n Film : ".$this->film."\n Rôle : ".$this->role."\n";
    }

    //getInfo
    public function getInfo(){

    }


    /**
     * Get the value of acteur
     */ 
    public function getActeur()
    {
        return $this->acteur;
    }

    /**
     * Set the value of acteur
     *
     * @return  self
     */ 
    public function setActeur($acteur)
    {
        $this->acteur = $acteur;

        return $this;
    }

    /**
     * Get the value of film
     */ 
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set the value of film
     *
     * @return  self
     */ 
    public function setFilm($film)
    {
        $this->film = $film;

        return $this;
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
}