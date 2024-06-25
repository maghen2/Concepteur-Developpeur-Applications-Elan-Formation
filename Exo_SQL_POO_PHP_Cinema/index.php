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

if(isset($_GET["action"])){
    switch($_GET["action"]){
        case 'listFilms' : $ctrCinema->listFilms(); 
        break;
        case 'listActeurs' : $ctrCinema->listActeurs(); 
        break;
        case 'listRealisateurs' : $ctrCinema->listRealisateurs(); 
        break;
        default :  $ctrCinema->listFilms();
    }
}


?>