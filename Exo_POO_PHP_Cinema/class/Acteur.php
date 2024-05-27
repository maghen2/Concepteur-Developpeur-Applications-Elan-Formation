<?php
    class Acteur extends Personne{
        private array $castings;
        
        //getInfo
        public function getInfo(){

        }
        
        // Ajoute au fur et à mesure les differents castings liès à l'objet
        public function addCasting(Casting $casting){
            $this->castings[] = $casting;
        }
    

}