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
$id_film = (isset($_GET['id_film']))? (int) $_GET['id_film'] : 1;
$id_film = filter_var($id_film, FILTER_VALIDATE_INT);

$id_acteur = (isset($_GET['id_acteur']))? (int) $_GET['id_acteur'] : 1;
$id_acteur = filter_var($id_acteur, FILTER_VALIDATE_INT);

$id_realisateur = (isset($_GET['id_realisateur']))? (int) $_GET['id_realisateur'] : 1;
$id_realisateur = filter_var($id_realisateur, FILTER_VALIDATE_INT);

$nom_genre = (isset($_POST['nom_genre']))? $_GET['nom_genre'] : "";
$nom_genre = htmlspecialchars($nom_genre);

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
  case 'detailFilm' : $ctrCinema->detailFilm($id_film); // au clic sur un film, on affiche les infos du films + casting du film (acteurs + rôles)
  break;
  case 'detailActeur' : $ctrCinema->detailActeur($id_acteur); // au clic sur un acteur, on affiche les infos de l'acteur + filmographie (films + rôles)
  break;
  case 'detailRealisateur' : $ctrCinema->detailRealisateur($id_realisateur); // au clic sur un réalisateur, on affiche les infos du réalisateur + liste des films réalisés
  break;
  case 'addGenre' : $ctrCinema->addGenre(); // Créer une vue pour ajouter un nouveau genre cinématographique dans ta base de données 
  break; 
  default :  $ctrCinema->listFilms();
}

?>