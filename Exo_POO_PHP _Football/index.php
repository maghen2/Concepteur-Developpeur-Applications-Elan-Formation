<?php 
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>Exercices POO PHP Football - Elan Formation</title>
  </head>
  <body>
    <h1>Exercices POO PHP Football - Elan Formation</h1>
    <h1>POO FOOTBALL  </h1>
<h2>Soit une application qui gère des équipes de football  </h2>
<p>Une équipe possède un nom (Paris Saint-Germain, Bayern Munich, Real Madrid, ...) et un ensemble de joueurs </p>
<p>identifié par un prénom, un nom et une date de naissance  </p>
<p>Chaque équipe appartient à un pays (France, Espagne, Allemagne, ...) et chaque joueur a une nationalité (France, </p>
<p>Espagne, Allemagne, ...)  </p>
<p>Un joueur peut jouer dans une ou plusieurs équipes dans sa carrière (avec une année de début de saison)  </p>
<p>Concevez le projet en POO de façon à : </p> 
<ul>
<li>lister toutes les équipes d'un pays (Ex : France --> PSG, OM, OL, RCSA, ...)  </li>
<li>lister tous les joueur s d'une équipe (avec nom, prénom, âge et pays d'origine) Ex : PSG --> Neymar JR  (30 ans), Lionel Messi (35 ans), Kylian Mbappé (23 ans)  </li>
<li>lister toutes les équipes d'un joueur (Ex : Lionel Messi (FC Barcelone 2004, PSG 2021)) </li>
</ul>
<p>On liste les équipes d'un PAYS  </p>
<p>On liste les joueurs de chaque équipe (remarquez que des joueurs apparaissent dans plusieurs équipes à des années différentes)  </p>
<p>On liste la carrière d'un joueur </p>
 
 
<h2>Il faudra d’abord faire un MCD répondant aux exigences citées ci-dessus et le faire valider par un formateur avant de passer à la création des classes</h2>
    <h1>Solution de l'exercice</h1>

  <?php
  // Tableuax des differents objets créer
  $pays=[];
  $equipes=[];
  $joueurs=[];
  $contrats=[];

  $france = new Pays("France");
  $equipe = new Equipe("AAA", $france);

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
    new Joueur("Killian", "Mbappe", "2000-06-15", $pays[0]),
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

*/   
?>

<h2>Modèle Conceptuel de Données (MCD) et Modèle Logique de Données (MLD)</h2>
<img src="MCD_MLD.jpg" width="100%" alt="MCD et MLD" title="Modèle Conceptuel de Données (MCD) et Modèle Logique de Données (MLD)">
</body>
</html>