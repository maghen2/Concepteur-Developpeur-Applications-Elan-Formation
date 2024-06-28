<?php
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once($class.".php");
});

// implementation du CinemaController
use Controller\CinemaController;
$cinemaController = new CinemaController();

// Reception des ID envoyés par l'utilisateur
$id = (isset($_GET['id']))? (int) $_GET['id'] : 1;
$id = filter_var($id, FILTER_VALIDATE_INT);


if(!isset($_GET["action"]))  $_GET["action"]=""; // Si aucune précision on éxecute l'action par défaut
switch($_GET["action"]){
  case 'listFilms' : $cinemaController->listFilms(); // Affichage de la liste des films
  break;
  case 'listActeurs' : $cinemaController->listActeurs(); // Affichage de la liste des acteurs
  break;
  case 'listRealisateurs' : $cinemaController->listRealisateurs(); // Affichage de la liste des réalisateurs
  break;  
  case 'listGenres' : $cinemaController->listGenres(); // Affichage de la liste des genres
  break;
  case 'detailFilm' : $cinemaController->detailFilm($id); // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)
  break;
  case 'detailActeur' : $cinemaController->detailActeur($id); // au clic sur un acteur, on affiche les infos de l'acteur + filmographie (films + rôles)
  break;
  case 'detailRealisateur' : $cinemaController->detailRealisateur($id); // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
  break;
  case 'addGenre' : $cinemaController->addGenre(); // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
  break; 
  case 'addFilm' : $cinemaController->addFilm(); // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
  break; 
  case 'addActeur' : $cinemaController->addActeur(); // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
  break; 
  case 'addRealisateur' : $cinemaController->addRealisateur(); // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
  break; 
  
  default :  $cinemaController->listFilms();
}

?>