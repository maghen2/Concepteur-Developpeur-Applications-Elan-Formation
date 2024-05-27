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

}
