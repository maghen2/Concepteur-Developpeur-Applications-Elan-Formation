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
    new Joueur("Cristiano", "Ronaldo", "1987-02-24", $pays[2]),
    new Joueur("Lionel", "Messi", "1990-09-06", $pays[4]),
    new Joueur("Neymar", "Junior", "1988", $pays[5])
];

// Creations des contrats __construct(string $date, Joueur $joueur, Equipe $equipe)
$contrats = [
    new Contrat("2024-04-16", $joueurs[0], $equipes[0]),
    new Contrat("2024-04-12",  $joueurs[1], $equipes[0]),
    new Contrat("2024-04-02",  $joueurs[2], $equipes[0]),
    new Contrat("2024-04-06",  $joueurs[3], $equipes[1]),
    new Contrat("2023-12-15",  $joueurs[1], $equipes[4]),
    new Contrat("2023-12-05",  $joueurs[2], $equipes[4]),
    new Contrat("2023-11-05",  $joueurs[3], $equipes[3]),
    new Contrat("2023-11-06",  $joueurs[0], $equipes[3]),
    new Contrat("2023-11-07",  $joueurs[2], $equipes[3]),
    new Contrat("2023-10-13",  $joueurs[3], $equipes[2]),
    new Contrat("2023-10-05",  $joueurs[0], $equipes[2]),
    new Contrat("2023-10-29",  $joueurs[1], $equipes[5]),
    new Contrat("2022-01-15",  $joueurs[3], $equipes[5]),
    new Contrat("2022-01-02",  $joueurs[2], $equipes[5]),
    new Contrat("2022-02-06",  $joueurs[1], $equipes[4]),
    new Contrat("2022-03-26",  $joueurs[0], $equipes[5]),
    new Contrat("2021-03-26",  $joueurs[1], $equipes[5]),
    new Contrat("2021-04-15",  $joueurs[2], $equipes[1]),
    new Contrat("2021-05-12",  $joueurs[3], $equipes[2]),
    
];

echo $pays[0]->listerEquipes();
echo $equipes[0]->listerJoueurs();
echo $joueurs[0]->listerEquipes();

