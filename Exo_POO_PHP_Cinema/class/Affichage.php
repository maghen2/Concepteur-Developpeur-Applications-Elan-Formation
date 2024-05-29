<?php
    class Affichage{
        private string $string;

        public function __construct(){
            $this->string = "";
        }   
         
        // Méthode d'affichage en liste
        public function liste($tableau) : string{
            $this->string = "<ul>";
            foreach($tableau as $valeur){
                $this->string .= "<li>".$valeur."</li>";
            }
            $this->string .= "</ul>";
            return $this->string;
        }

        // Méthode d'affichage en tableau
        public function tableau($tab) : string{
            $this->string = "<table border='1'>";
            foreach($tab as $ligne){
                $this->string .= "<tr>";
                foreach($ligne as $valeur){
                    $this->string .= "<td>".$valeur."</td>";
                }
                $this->string .= "</tr>";
            }
            $this->string .= "</table>";
            return $this->string;
        }

    }