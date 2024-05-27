<?php
class Role{
    private string $role;

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

}
