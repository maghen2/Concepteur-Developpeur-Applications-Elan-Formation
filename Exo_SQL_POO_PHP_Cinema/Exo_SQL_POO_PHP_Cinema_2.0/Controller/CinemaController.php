<?php
// CinemaController.php
namespace Controller;

use Model\PersonneManager;
use Model\FilmManager;
use Model\Connect;
use \PDO;

class CinemaController{
    private int $id_film, $id_acteur, $id_realisateur;
    private string $nom_genre;
    private FilmManager $filmManager;
    private PersonneManager $personneManager;

    public function __construct(){
        $this->filmManager = new FilmManager();
        $this->personneManager = new PersonneManager();

        // Reception des ID envoyés par l'utilisateur
        $this->id_film = (isset($_GET['id_film']))? (int) $_GET['id_film'] : 1;
        $this->id_film = filter_var($this->id_film, FILTER_VALIDATE_INT);

        $this->id_acteur = (isset($_GET['id_acteur']))? (int) $_GET['id_acteur'] : 1;
        $this->id_acteur = filter_var($this->id_acteur, FILTER_VALIDATE_INT);

        $this->id_realisateur = (isset($_GET['id_realisateur']))? (int) $_GET['id_realisateur'] : 1;
        $this->id_realisateur = filter_var($this->id_realisateur, FILTER_VALIDATE_INT);


    }

    // Lister les films
    public function listFilms(){
            // on crée un nouveau PDO pour la connexion à la base de données
        $films = $this->filmManager->getFilms();
        $genres = $this->filmManager->getGenres();
        $realisateurs = $this->personneManager->getRealisateurs();
        require_once("View/Film/listFilms.php");
        }

        // Lister les acteurs
        public function listActeurs(){
            $acteurs = $this->personneManager->getActeurs();
            require_once("View/Acteur/listActeurs.php");
        }

        
        // Lister les réalisateurs
        public function listRealisateurs(){
            $realisateurs = $this->personneManager->getRealisateurs();
                require_once("View/realisateur/listRealisateurs.php");
            }

            // Lister les genres
            public function listGenres(){
            $genres = $this->filmManager->getGenres();
            require_once("View/genre/listGenres.php");
            }
            
            // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
            public function addGenre(){
                $this->nom_genre = (isset($_POST['nom_genre']))? $_POST['nom_genre'] : "";
                $this->nom_genre = htmlspecialchars($this->nom_genre);
                if(!empty($this->nom_genre)){
                    if($this->filmManager->addGenre($this->nom_genre)) // si addGenre s'effectue correctement on redirige l'utilisateur
                    header('Location:?action=listGenres');
                }                   
            }
            // Créer une vue pour ajouter un nouveau film dans ta base de données 
            public function addFilm(){
                // Récupération des variables envoyée via le formulaire
                $titre = (isset($_POST['titre']))? $_POST['titre'] : "";
                $titre = htmlspecialchars($titre);
                $date_sortie_fr = (isset($_POST['date_sortie_fr']))? $_POST['date_sortie_fr'] : "";
                $date_sortie_fr = htmlspecialchars($date_sortie_fr);
                $duree = (isset($_POST['duree']))? $_POST['duree'] : "";
                $duree = htmlspecialchars($duree);
                $synopsis = (isset($_POST['synopsis']))? $_POST['synopsis'] : "";
                $synopsis = htmlspecialchars($synopsis);
                $id_realisteur = (isset($_POST['id_realisteur']))? $_POST['id_realisteur'] : 0;
                $id_realisteur = filter_var($id_realisteur, FILTER_VALIDATE_INT);
                $id_genres = (isset($_POST['id_genres']))? $_POST['id_genres'] : "";
                $id_genres = filter_var_array($id_genres, FILTER_VALIDATE_INT);
                var_dump($id_genres);
                if(!empty($titre) or !empty($date_sortie_fr) or !empty($duree) or !empty($synopsis) or !empty($id_realisteur)){
                    if($this->filmManager->addFilm($titre,$date_sortie_fr,$duree,$synopsis,$id_realisteur,$id_genres)) // si addFilm s'effectue correctement on redirige l'utilisateur
                    header('Location:?action=listFilms');
                }                   
            }

            // Créer une vue pour ajouter un nouveau acteur cinématographique dans ta base de données 
            public function addActeur($realisateur = false){
                $prenom = (isset($_POST['prenom']))? $_POST['prenom'] : ""; 
                $prenom = htmlspecialchars($prenom);
                $nom = (isset($_POST['nom']))? $_POST['nom'] : ""; 
                $nom = htmlspecialchars($nom);
                $sexe = (isset($_POST['sexe']))? $_POST['sexe'] : ""; 
                $sexe = htmlspecialchars($sexe);
                $date_naissance = (isset($_POST['date_naissance']))? $_POST['date_naissance'] : "";
                $date_naissance = htmlspecialchars($date_naissance); 
                $fonction = (isset($_POST['fonction']))? $_POST['fonction'] : ""; 
                $fonction = htmlspecialchars($fonction);
                if(!empty($prenom) and !empty($nom) and !empty($sexe) and !empty($date_naissance) and !empty($fonction)){
                    if($this->personneManager->addPersonne($prenom, $nom, $sexe, $date_naissance, $fonction) and $realisateur == false) // si addGenre s'effectue correctement on redirige l'utilisateur
                        header('Location:?action=listActeurs');
                    else 
                        return true;
                }                   
            }
            // Créer une vue pour ajouter un nouveau realisateur cinématographique dans ta base de données 
            public function addRealisateur(){
                    if($this->addActeur(true)) // si addActeur s'effectue correctement on redirige l'utilisateur
                    header('Location:?action=listRealisateurs');                  
            }

        // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)    
        public function detailFilm($id_film){
            $films = $this->filmManager->getFilms($id_film);
            $film = $films[0];
            $genres = $this->filmManager->getGenres($id_film);
            $castings = $this->filmManager->getCastings(null,$id_film);
            require_once("View/film/detailFilm.php");
        }
        

        // au clic sur un acteur, on affiche les infos de l'acteur + acteurographie (acteurs + rôles)
        public function detailActeur($id_acteur){
            $acteurs = $this->personneManager->getActeurs($id_acteur);
            $acteur = $acteurs[0];
            $filmographies  = $this->personneManager->getFilmographies($id_acteur);
        require_once("View/acteur/detailActeur.php");
         }
 
 
        // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
        public function detailRealisateur($id_realisateur){
            $realisateurs = $this->personneManager->getRealisateurs($id_realisateur);
            $realisateur = $realisateurs[0];
            $filmographies  = $this->personneManager->getFilmographies(null, $id_realisateur);
   
   require_once("View/realisateur/detailRealisateur.php");

        }

        }
