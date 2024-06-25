<?php
// CinemaController.php
namespace Controller;
use Model\Connect;


class CinemaController{
    // Lister les films

    public function listFilms(){
        $pdo = Connect::seConnecter();
        $sql = "SELECT film.titre, DATE_FORMAT(film.date_sortie_fr, '%d/%m/%Y') AS `Date`, SEC_TO_TIME(film.duree*60) AS `Duree`, film.synopsis, CONCAT(personne.prenom, ' ', personne.nom) AS `realisateur`
                FROM film
                JOIN realisateur on film.id_realisateur = realisateur.id_realisateur
                JOIN personne ON personne.id_personne = realisateur.id_personne;
        ";
        $query = $pdo->query($sql);
        require_once("View/Film/listFims.php");
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