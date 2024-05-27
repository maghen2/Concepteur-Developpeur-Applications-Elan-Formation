<?php
    private array $castings;
    class Acteur extends Personne{
        //getInfo
        public function getInfo(){

        }
        
        // Ajoute au fur et à mesure les differents castings liès à l'objet
        public function addCasting(Casting $casting){
            $this->castings[] = $casting;
        }
    

}