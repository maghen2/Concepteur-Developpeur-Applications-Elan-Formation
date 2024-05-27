<?php
class Role{
    private string $role;
    private array $castings;

    // constructeur
    public function __construct(string $role){
        $this->role = $role;

    }

    //__toString
    public function __toString(){
        return $this->role;
    }

    //getInfo
    public function getInfo(){

    }

    // Ajoute au fur et à mesure les differents castings liès à l'objet
    public function addCasting(Casting $casting){
        $this->castings[] = $casting;
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
