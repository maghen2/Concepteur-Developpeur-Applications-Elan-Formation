<?php
Class Genre{
    private string $genre;
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

}