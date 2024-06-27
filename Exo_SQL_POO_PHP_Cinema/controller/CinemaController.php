<?php
// CinemaController.php
namespace Controller;
use Model\Connect;
use PDO;

class CinemaController{
        private \PDO $pdo;
        private array $data;

        public function __construct(){
            $this->pdo = Connect::seConnecter();
            $this->data = [];
        }

    // Lister les films
    public function listFilms(){
            // on crée un nouveau PDO pour la connexion à la base de données
        $pdo = Connect::seConnecter();
        $sql = "SELECT film.id_film, film.titre, DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`, SEC_TO_TIME(film.duree*60) AS `Duree`, film.synopsis, CONCAT(personne.prenom, ' ', personne.nom) AS `realisateur`
                FROM film
                JOIN realisateur on film.id_realisateur = realisateur.id_realisateur
                JOIN personne ON personne.id_personne = realisateur.id_personne
                ORDER BY film.date_sortie_fr DESC
        ";
        $query = $pdo->query($sql);
        require_once("View/Film/listFilms.php");
        }

        // Lister les acteurs
        public function listActeurs(){
        // on crée un nouveau PDO pour la connexion à la base de données
        $pdo = Connect::seConnecter();
            $sql = "SELECT acteur.id_acteur, CONCAT(personne.prenom, ' ', personne.nom) AS acteur, personne.sexe, DATE_FORMAT(personne.date_naissance, '%d/%m/%Y') AS `date_naissance`, COUNT(casting.id_film) AS `Nombre_films`
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
                $sql = "SELECT realisateur.id_realisateur, CONCAT(personne.prenom, ' ', personne.nom) AS realisateur, 
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

            // Lister les genres
            public function listGenres(){
                      // Genres du film
                      $sql ="SELECT genre.nom_genre 
                      FROM `genre`
                      ORDER BY genre.nom_genre
                      ";                
            $query = $this->pdo->query($sql);
            $this->data['film_genres'] = $query->fetchAll(PDO::FETCH_ASSOC);
            require_once("View/genre/listGenres.php");
            }
            
            // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
            public function addGenre(){
                $nom_genre = (isset($_POST['nom_genre']))? $_POST['nom_genre'] : "";
                $nom_genre = htmlspecialchars($nom_genre);

                if(!empty($nom_genre)){
                    $sql ="INSERT INTO genre(`nom_genre`) 
                    VALUES (:nom_genre)
                    ";                
                    $query = $this->pdo->prepare($sql);
                    $query->execute(["nom_genre" => $nom_genre]);
                }    
                
                header('Location:?action=listGenres');
                // require_once("View/genre/addGenre.php");
            }

        // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)    
        public function detailFilm($id_film){
            // infos du film
            $sql = "SELECT film.titre, DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date de sortie`, SEC_TO_TIME(film.duree*60) AS `Duree`, film.synopsis, CONCAT(personne.prenom, ' ', personne.nom) AS `realisateur`
                    FROM film
                    JOIN realisateur on film.id_realisateur = realisateur.id_realisateur
                    JOIN personne ON personne.id_personne = realisateur.id_personne
                    WHERE film.id_film = :id_film;
            ";
            $query = $this->pdo->prepare($sql);
            $query->execute(["id_film" => $id_film]);
            $this->data["film"] = $query->fetch(PDO::FETCH_ASSOC);
            
            // Genres du film
            $sql ="SELECT genre.nom_genre 
                    FROM `genre`
                    JOIN film_genres ON film_genres.id_genre = genre.id_genre
                    JOIN film ON film.id_film = film_genres.id_film
                    WHERE film.id_film = :id_film
                    ";
             $query = $this->pdo->prepare($sql);
             $query->execute(["id_film" => $id_film]);
             $this->data["film_genres"] = $query->fetchAll(PDO::FETCH_ASSOC);

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
                    casting.`id_film` = :id_film
                ORDER BY
                    `acteur`
           ";
            $query = $this->pdo->prepare($sql);
            $query->execute(["id_film" => $id_film]);
            $this->data["casting"] = $query->fetchAll(PDO::FETCH_ASSOC);
            
            require_once("View/film/detailFilm.php");

        }
        

        // au clic sur un acteur, on affiche les infos de l'acteur + acteurographie (acteurs + rôles)
        public function detailActeur($id_acteur){
            // infos de l'acteur
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
                        ) AS `date de naissance`,
                        COUNT(casting.id_film) AS `Nombre de films`
                    FROM
                        personne
                    JOIN acteur ON personne.id_personne = acteur.id_personne
                    JOIN casting ON casting.id_acteur = acteur.id_acteur
                    WHERE
                        acteur.id_acteur = :id_acteur;
                    GROUP BY
                        casting.id_acteur
                    ORDER BY
                        `Nombre_acteurs`
                    DESC
    
              ";
 
    $query = $this->pdo->prepare($sql);
    $query->execute(["id_acteur" => $id_acteur]);
    $this->data["acteur"] = $query->fetch(PDO::FETCH_ASSOC);
    
    // filmographie de l'acteur(rôles / films)   
    $sql = "SELECT
                role.nom_personnage,
                film.titre,
                DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`,
                SEC_TO_TIME(film.duree * 60) AS `Duree`,
                film.synopsis,
                CONCAT(
                    personne.prenom,
                    ' ',
                    personne.nom
                ) AS `realisateur`
            FROM
                film
            JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
            JOIN personne ON personne.id_personne = realisateur.id_personne
            JOIN casting ON casting.id_film = film.id_film
            JOIN role ON role.id_role = casting.id_role
            WHERE
                casting.`id_acteur` = :id_acteur
            ORDER BY
                film.date_sortie_fr
            DESC
   ";
    $query = $this->pdo->prepare($sql);
    $query->execute(["id_acteur" => $id_acteur]);
    $this->data["filmographie"] = $query->fetchAll(PDO::FETCH_ASSOC);
    
    require_once("View/acteur/detailActeur.php");
 
         }
 
 
        // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
        public function detailRealisateur($id_realisateur){
                       // infos de l'realisateur
                       $sql = "SELECT CONCAT(personne.prenom, ' ', personne.nom) AS realisateur, 
                       personne.sexe, 
                       DATE_FORMAT(personne.date_naissance, '%d/%m/%Y') AS `date de naissance`, 
                       COUNT(film.id_film) AS `Nombre de films`
                               FROM personne
                               JOIN realisateur ON personne.id_personne = realisateur.id_personne
                               JOIN film ON film.id_realisateur = realisateur.id_realisateur
                               WHERE realisateur.id_realisateur = :id_realisateur
                               GROUP by film.id_realisateur
                               ORDER by `Nombre de films` DESC
                       ";

   $query = $this->pdo->prepare($sql);
   $query->execute(["id_realisateur" => $id_realisateur]);
   $this->data["realisateur"] = $query->fetch(PDO::FETCH_ASSOC);
   
   // filmographie du realisateur(rôles / films)   
   $sql = "SELECT
               film.titre,
               DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`,
               SEC_TO_TIME(film.duree * 60) AS `Duree`,
               film.synopsis
           FROM
               film
           JOIN realisateur ON film.id_realisateur = realisateur.id_realisateur
           WHERE
               film.`id_realisateur` = :id_realisateur
           ORDER BY
               film.date_sortie_fr
           DESC
  ";
   $query = $this->pdo->prepare($sql);
   $query->execute(["id_realisateur" => $id_realisateur]);
   $this->data["filmographie"] = $query->fetchAll(PDO::FETCH_ASSOC);
   
   require_once("View/realisateur/detailRealisateur.php");

        }

        }


/*
    function listFilms(){
        $pdo = Connect::seConnecter();
        $sql = "SELECT * FROM film";
        $query = $pdo->prepare($sql);
        $query->execute();
        $films = $query>fetchAll();
        foreach($films as $film){
            echo $film['titre']."<br>";
        }


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