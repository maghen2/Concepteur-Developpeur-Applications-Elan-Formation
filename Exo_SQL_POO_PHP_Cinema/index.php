<?php
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once($class.".php");
});

// implementation du CinemaController
use Controller\CinemaController;
$ctrCinema = new CinemaController();

// Reception des ID envoyés par l'utilisateur
$id = (isset($_GET['id']))? (int) $_GET['id'] : 1;
$id = filter_var($id, FILTER_VALIDATE_INT);


if(!isset($_GET["action"]))  $_GET["action"]=""; // Si aucune précision on éxecute l'action par défaut
switch($_GET["action"]){
  case 'listFilms' : $ctrCinema->listFilms(); // Affichage de la liste des films
  break;
  case 'listActeurs' : $ctrCinema->listActeurs(); // Affichage de la liste des acteurs
  break;
  case 'listRealisateurs' : $ctrCinema->listRealisateurs(); // Affichage de la liste des réalisateurs
  break;  
  case 'listGenres' : $ctrCinema->listGenres(); // Affichage de la liste des genres
  break;
  case 'detailFilm' : $ctrCinema->detailFilm($id); // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)
  break;
  case 'detailActeur' : $ctrCinema->detailActeur($id); // au clic sur un acteur, on affiche les infos de l'acteur + filmographie (films + rôles)
  break;
  case 'detailRealisateur' : $ctrCinema->detailRealisateur($id); // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
  break;
  case 'addGenre' : $ctrCinema->addGenre(); // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
  break; 
  default :  $ctrCinema->listFilms();
}

?>