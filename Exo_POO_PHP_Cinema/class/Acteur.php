<?php
    class Acteur extends Personne{
        private array $castings;

        public function __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
            parent::__construct($prenom, $nom, $sexe, $dateNaissance);
            $this->castings = [];
        }

        //getInfo
        public function getInfo(){

        }
        
        // Ajoute au fur et à mesure les differents castings liès à l'objet
        public function addCasting(Casting $casting){
            $this->castings[] = $casting;
        }
        // Affichage de la liste des films d'un acteur précis
        public function afficherFilmographie() : string {
            $string = "<h2>Filmographie de l'acteur ".$this."</h2>";
            $string .="<ul>";
            foreach($this->getCastings() as $casting){
                $string .= "<li>".$casting->getFilm()."</li>";
            }
            $string .= "</ul>";
            return $string;
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