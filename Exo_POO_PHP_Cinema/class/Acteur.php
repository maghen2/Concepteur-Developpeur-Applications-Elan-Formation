<?php
    class Acteur extends Personne{
        private array $castings;

        public function __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
            parent::__construct($prenom, $nom, $sexe, $dateNaissance);
        }

        //getInfo
        public function getInfo(){

        }
        
        // Ajoute au fur et à mesure les differents castings liès à l'objet
        public function addCasting(Casting $casting){
            $this->castings[] = $casting;
        }
    

}