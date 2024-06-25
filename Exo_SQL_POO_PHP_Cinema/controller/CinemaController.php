<?php
// CinemaController.php
namespace Controller;
use Model\Connect;


class CinemaController{


    // Lister les films
    public function listFilms(){
            // on crée un nouveau PDO pour la connexion à la base de données
        $pdo = Connect::seConnecter();
        $sql = "SELECT film.titre, DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`, SEC_TO_TIME(film.duree*60) AS `Duree`, film.synopsis, CONCAT(personne.prenom, ' ', personne.nom) AS `realisateur`
                FROM film
                JOIN realisateur on film.id_realisateur = realisateur.id_realisateur
                JOIN personne ON personne.id_personne = realisateur.id_personne;
        ";
        $query = $pdo->query($sql);
        require_once("View/Film/listFilms.php");
        }

        // Lister les acteurs
        public function listActeurs(){
        // on crée un nouveau PDO pour la connexion à la base de données
        $pdo = Connect::seConnecter();
            $sql = "SELECT CONCAT(personne.prenom, ' ', personne.nom) AS acteur, personne.sexe, DATE_FORMAT(personne.date_naissance, '%d/%m/%Y') AS `date_naissance`, COUNT(casting.id_film) AS `Nombre_films`
                    FROM personne
                    JOIN acteur ON personne.id_personne = acteur.id_personne
                    JOIN casting ON casting.id_acteur = acteur.id_acteur
                    GROUP by casting.id_acteur
                    ORDER by `Nombre_films` DESC
            ";
            $query = $pdo->query($sql);
            require_once("View/Acteur/listActeurs.php");
        }

        
        // Lister les réalisateurs
        public function listRealisateurs(){
            // on crée un nouveau PDO pour la connexion à la base de données
            $pdo = Connect::seConnecter();
                $sql = "SELECT CONCAT(personne.prenom, ' ', personne.nom) AS realisateur, 
                personne.sexe, 
                DATE_FORMAT(personne.date_naissance, '%d/%m/%Y') AS `date_naissance`, 
                COUNT(film.id_film) AS `Nombre_films`
                        FROM personne
                        JOIN realisateur ON personne.id_personne = realisateur.id_personne
                        JOIN film ON film.id_realisateur = realisateur.id_realisateur
                        GROUP by film.id_realisateur
                        ORDER by `Nombre_films` DESC
                ";
                $query = $pdo->query($sql);
                require_once("View/realisateur/listRealisateurs.php");
            }
            
        
    }


/*
    public function listFilms(){
        $pdo = Connect::seConnecter();
        $sql = "SELECT * FROM film";
        $query = $pdo->prepare($sql);
        $query->execute();
        $films = $query>fetchAll();
        foreach($films as $film){
            echo $film['titre']."<br>";
        }
*/

/*

class CinemaController{
    // Lister les films
    private $model;
    private $view;


    public function __construct(){
        $this->model = new CinemaModel();
        $this->view = new CinemaView();
    }

    public function listFilms(){
        $films = $this->model->getFilms();
        $this->view->listFilms($films);
    }

    public function listActeurs(){
        $acteurs = $this->model->getActeurs();
        $this->view->listActeurs($acteurs);
    }
}
*/