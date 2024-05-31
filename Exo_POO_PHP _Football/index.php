<?php 
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});
?>

    <h1>Solution de l'exercice</h1>

  <?php
  // Tableuax des differents objets créer
  $pays=[];
  $equipes=[];
  $joueurs=[];
  $contrats=[];

  // creations des pays
  $pays = [
    new Pays("France"),
    new Pays("Angleterre"),
    new Pays("Espagne"),
    new Pays("Italie"),
    new Pays("Portugal"),
    new Pays("Argentine"),
  ];

  // creation des equipes
  $equipes = [
    new Equipe("PSG", $pays[0]),
    new Equipe("Strasbourg", $pays[0]),
    new Equipe("Real Madrid", $pays[2]),
    new Equipe("Barcelone", $pays[2]),
    new Equipe("Manchester Utd", $pays[1]),
    new Equipe("Juventus", $pays[3])
  ];

// Creation des joueurs __construct(string $prenom, string $nom, string $dateNaissance, Pays $pays)
$joueurs = [
    new Joueur("Killian", "Mbappe", "2020-06-15", $pays[0]),
    new Joueur("Cristiano", "Ronaldo", "1987-02-24", $pays[4]),
    new Joueur("Lionel", "Messi", "1990-09-06", $pays[5]),
    new Joueur("Neymar", "Junior", "1988", $pays[6])
];

// Creations des contrats
$contrats = [
    new contrat(),
];