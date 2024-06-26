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

$id_film = (isset($_GET['id_film']))? (int) $_GET['id_film'] : 1;

if(!isset($_GET["action"])){
  $_GET["action"]="";
}

switch($_GET["action"]){
  case 'listFilms' : $ctrCinema->listFilms(); // Affichage de la liste des films
  break;
  case 'listActeurs' : $ctrCinema->listActeurs(); // Affichage de la liste des acteurs
  break;
  case 'listRealisateurs' : $ctrCinema->listRealisateurs(); // Affichage de la liste des réalisateurs
  break;
  case 'detailFilm' : $ctrCinema->detailFilm(); // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)
  break;
  case 'detailActeur' : $ctrCinema->detailActeur(); // au clic sur un acteur, on affiche les infos de l'acteur + filmographie (films + rôles)
  break;
  case 'detailRealisateur' : $ctrCinema->detailRealisateur(); // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
  break;
  default :  $ctrCinema->listFilms();
}

?>