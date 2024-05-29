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

  /* Création des objets
  // Tableuax des differents objets créer
    $films=[];
    $acteurs=[];
    $realisateurs=[];
    $personnes=[];
    $genres=[];
    $roles=[];
    $castings=[];

    //création des genres de film
    $genres = [
      new Genre("Science-fiction"),
      new Genre("Aventure"),
      new Genre("Action")
    ];

    //création des réalisateurs
    $realisateurs =[ // __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
      new Realisateur("Ridley","Scott","Masculin","1937-11-30"),
      new Realisateur("George","Lucas","Masculin","1944-05-14"),
      new Realisateur("Tim","Burton","Masculin","1958-08-25")
    ];

    //création des acteurs
    $sexe=["Masculin", "Féminin"];
      for($i=0, $j="A"; $i<rand(4,6); $i++,$j++){ // __construct(string $prenom, string $nom, string $sexe, string $dateNaissance){
        $acteurs[$i] = new Acteur("ActeurPrenom$j", "ActeurNom$j", $sexe[rand(0,1)], rand(1920, 20210)."-".rand(1, 12)."-".rand(1, 28));
      }

    // Creation des roles des personnage
    for($i=0, $j="A"; $i<rand(4,6); $i++,$j++){ //  __construct(string $role){
      $roles[$i] = new Role("RôlePrenom$j RôleNom$j");
    }

    //creation des films
    $films = [ // __construct(string $titre, string $synopsys, int $duree, DateTime $dateSortie, Genre $genre, Realisateur $realisateur){
      new Film("Star Wars", 
      "La saga épique de science-fiction créée par George Lucas, qui se déroule dans une galaxie lointaine, très lointaine. Elle suit les aventures des Jedi, des Sith, des rebelles et des personnages emblématiques tels que Luke Skywalker, Leia Organa et Dark Vador.", 
      3240, "2023-10-26", $genres[0],$realisateurs[0]),
      new Film("Blade Runner", 
      "Un film de science-fiction dystopique réalisé par Ridley Scott en 1982. Il se déroule dans un futur sombre où des humains appelés “réplicants” sont créés pour effectuer des tâches dangereuses. Le détective Rick Deckard est chargé de traquer et de “retirer” des réplicants rebelles.", 
      117, "2020-07-15", $genres[1],$realisateurs[1]),
      new Film(
        "Batman", 
        "Le film de Tim Burton sorti en 1989 met en scène le super-héros Batman (Bruce Wayne) dans sa lutte contre le Joker (Jack Napier). Le style visuel du film est sombre et gothique, rappelant l’univers de Gotham City.", 
        126, "2012-12-05", $genres[2],$realisateurs[2]),
        new Film("James Bond 007 Mourir peut attendre", "James Bond n’est plus en service et profite d’une vie tranquille en Italie. Cependant, son répit est de courte durée lorsque l’agent de la CIA Felix Leiter fait son retour pour lui demander son aide1. Ce film marque la vingt-cinquième aventure cinématographique de James Bond et est surtout le dernier à mettre en scène l’acteur Daniel Craig dans le rôle du brillant agent secret. L’intrigue porte sur les thèmes de la famille et de l’héritage, et elle fait de Bond un personnage vulnérable soumis à des choix aux conséquences personnelles majeures",
        136, "2020-06-30", $genres[1],$realisateurs[2]),
        new Film("Le seigneur des anneux", "Dans les Terres du Milieu, l’Anneau unique forgé par Sauron le maléfique pour dominer les hommes, les elfes et les nains est tombé par inadvertance dans les mains de Frodon, paisible hobbit. Ce n’est qu’une question de temps avant que les sinistres Cavaliers Noirs, les Servants de l’Anneau, retrouvent sa trace",
        112, "2022-10-13", $genres[0],$realisateurs[1])
    ];

    // Creation des castings  __construct(Acteur $acteur, Film $film, Role $role){
      for($i=0; $i<6; $i++){
        $castings[$i] = new Casting($acteurs[rand(0,(count($acteurs)-1))], $films[rand(0,(count($films)-1))], $roles[rand(0,(count($roles)-1))]);
      }
      // var_dump($films);
      // var_dump($acteurs);
      // var_dump($realisateurs);
      // var_dump($personnes);
      // var_dump($genres);
      // var_dump($roles);
      // var_dump($castings);
      
    echo $roles[0]->afficheActeurs();
    echo $films[0]->afficheCastings();
    echo $genres[0]->afficheFilms();
    echo $acteurs[0]->afficherFilmographie();
    echo $realisateurs[0]->afficherFilmographie();
 */   
  ?>
  
  <h2>Modèle Conceptuel de Données (MCD) et Modèle Logique de Données (MLD)</h2>
  <img src="MCD_MLD.jpg" width="100%" alt="MCD et MLD" title="Modèle Conceptuel de Données (MCD) et Modèle Logique de Données (MLD)">
  </body>
</html>
