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
        
        // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)    
        public function detailFilm(){
            $pdo = Connect::seConnecter();  // on crée un nouveau PDO pour la connexion à la base de données
            (isset($_GET['id_film']))? $id_film = (int) $_GET['id_film'] : $_GET['id_film'] = 1;

            // infos du film
            $sql = "SELECT film.titre, DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`, SEC_TO_TIME(film.duree*60) AS `Duree`, film.synopsis, CONCAT(personne.prenom, ' ', personne.nom) AS `realisateur`
                    FROM film
                    JOIN realisateur on film.id_realisateur = realisateur.id_realisateur
                    JOIN personne ON personne.id_personne = realisateur.id_personne
                    WHERE film.id_film = $id_film;
            ";
            $query = $pdo->query($sql);
            $film = $query->fetch();
            
            // casting du film (acteurs + rôles)   
            $sql = "SELECT
                        CONCAT(
                            personne.prenom,
                            ' ',
                            personne.nom
                        ) AS acteur,
                        personne.sexe,
                        DATE_FORMAT(
                            personne.date_naissance,
                            '%d/%m/%Y'
                        ) AS `date_naissance`,
                        role.nom_personnage
                FROM
                    personne
                JOIN acteur ON personne.id_personne = acteur.id_personne
                JOIN casting ON casting.id_acteur = acteur.id_acteur
                JOIN role ON role.id_role = casting.id_role
                WHERE
                    casting.`id_film` = 1
                ORDER BY
                    `acteur`
                DESC
           ";
            $query = $pdo->query($sql);
            $casting = $query->fetchAll();
            
            require_once("View/film/detailFilm.php");

        }


        // au clic sur un acteur, on affiche les infos de l'acteur + filmographie (films + rôles)
        public function detailActeur(){

        }

        // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
        public function detailRealisateur(){

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