<?php
// CinemaController.php
namespace Controller;

use Model\CinemaManager;
use Model\Connect;
use \PDO;

class CinemaController{
    private int $id_film, $id_acteur, $id_realisateur;
    private string $nom_genre;
    private CinemaManager $cinemaManager;

    public function __construct(){
        $this->cinemaManager = new CinemaManager();

        // Reception des ID envoyés par l'utilisateur
        $this->id_film = (isset($_GET['id_film']))? (int) $_GET['id_film'] : 1;
        $this->id_film = filter_var($this->id_film, FILTER_VALIDATE_INT);

        $this->id_acteur = (isset($_GET['id_acteur']))? (int) $_GET['id_acteur'] : 1;
        $this->id_acteur = filter_var($this->id_acteur, FILTER_VALIDATE_INT);

        $this->id_realisateur = (isset($_GET['id_realisateur']))? (int) $_GET['id_realisateur'] : 1;
        $this->id_realisateur = filter_var($this->id_realisateur, FILTER_VALIDATE_INT);

        $this->nom_genre = (isset($_POST['nom_genre']))? $_POST['nom_genre'] : "";
        $this->nom_genre = htmlspecialchars($this->nom_genre);
    }

    // Lister les films
    public function listFilms(){
            // on crée un nouveau PDO pour la connexion à la base de données
        $films = $this->cinemaManager->getFilms();
        require_once("View/Film/listFilms.php");
        }

        // Lister les acteurs
        public function listActeurs(){
            $acteurs = $this->cinemaManager->getActeurs();
            require_once("View/Acteur/listActeurs.php");
        }

        
        // Lister les réalisateurs
        public function listRealisateurs(){
            $realisateurs = $this->cinemaManager->getRealisateurs();
                require_once("View/realisateur/listRealisateurs.php");
            }

            // Lister les genres
            public function listGenres(){
            $genres = $this->cinemaManager->getGenres();
            require_once("View/genre/listGenres.php");
            }
            
            // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
            public function addGenre(){
                if(!empty($this->nom_genre)){
                    if($this->cinemaManager->addGenre($this->nom_genre)) // si addGenre s'effectue correctement on redirige l'utilisateur
                    header('Location:?action=listGenres');
                }                   
            }

        // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)    
        public function detailFilm($id_film){
            $films = $this->cinemaManager->getFilms($id_film);
            $film = $films[0];
            $genres = $this->cinemaManager->getGenres($id_film);
            $castings = $this->cinemaManager->getCastings(null,$id_film);
            require_once("View/film/detailFilm.php");
        }
        

        // au clic sur un acteur, on affiche les infos de l'acteur + acteurographie (acteurs + rôles)
        public function detailActeur($id_acteur){
            $acteurs = $this->cinemaManager->getActeurs($id_acteur);
            $acteur = $acteurs[0];
            $filmographies  = $this->cinemaManager->getFilmographies($id_acteur);
        require_once("View/acteur/detailActeur.php");
         }
 
 
        // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
        public function detailRealisateur($id_realisateur){
            $realisateurs = $this->cinemaManager->getRealisateurs($id_realisateur);
            $realisateur = $realisateurs[0];
            $filmographies  = $this->cinemaManager->getFilmographies(null, $id_realisateur);
   
   require_once("View/realisateur/detailRealisateur.php");

        }

        }
