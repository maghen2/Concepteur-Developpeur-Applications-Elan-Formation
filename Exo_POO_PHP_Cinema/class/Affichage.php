<?php
    class Affichage{
        private string $string;

        public function __construct()($tab){
            
            $this->tab = $tab;
            $this->string = "";
        }   
         
        // Méthode ,d'affichage en liste
        public function liste($tab){
            $this->string .= "<ul>";
            foreach($tab as $valeur){
                $this->string .= "<li>".$valeur."</li>";
            }
            $this->string .= "</ul>";
        }
        $this->string .=  "<table border='1'>";
        foreach($tab as $ligne){
            $this->string .=  "<tr>";
            foreach($ligne as $valeur){
                $this->string .=   "<td>".$valeur."</td>";
            }
            $this->string .=   "</tr>";
        }
        $this->string .=   "</table>";
    }
    return $this->string;

    public function __toString(){
        return $this->string;

        

    }