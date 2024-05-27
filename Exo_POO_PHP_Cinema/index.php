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
  <title>Exercices POO PHP cinéma - Elan Formation</title>
  </head>
  <body>
    <h1>Exercices POO PHP cinéma - Elan Formation</h1>
    <h2>Vous avez en charge de gérer différentes entités autour de la thématique du cinéma.</h2>
    <p>Les films seront caractérisés par leur titre, leur date de sortie en France, leur durée (en minutes) ainsi que leur réalisateur (unique, avec nom, prénom, sexe et date de naissance). Un résumé du film (synopsis) pourra éventuellement être renseigné. Chaque film est caractérisé par un seul genre cinématographique (science-fiction, aventure, action, ...).</p>
    <p>Votre application devra recenser également les acteurs de chacun des films. On désire connaître le nom, le prénom, le sexe et la date de naissance de l’acteur ainsi que le rôle (nom du personnage) joué par l’acteur dans le(s) film(s) concerné(s).</p>
    <p>Il serait intéressant d'utiliser la notion d'héritage entre classes dans cet exercice. A vous de le mettre en place correctement !</p>
    <p>Attention, le rôle (par exemple James Bond) ne doit être instancié qu'une seule fois (dans la mesure où ce rôle a été incarné par plusieurs acteurs.)</p>
    <p>On doit pouvoir :</p>
    <ul>
      <li>Lister la liste des acteurs ayant incarné un rôle précis (ex: les acteurs ayant joué le rôle de Batman : Michael Keaton, Val Kilmer, George Clooney, …)</li>
      <li>Lister le casting d'un film (dans le film Star Wars Episode IV, Han Solo a été incarné par Harrison Ford, Luke Skywalker a été incarné par Mark Hamill, ...)</li>
      <li>Lister les films par genre (exemple : le genre SF est associé à X films : Star Wars, Blade Runner, ...)</li>
      <li>Lister la filmographie d'un acteur (dans quels films a-t-il joué ?)</li>
      <li>Lister la filmographie d'un réalisateur (quels sont les films qu'a réalisé ce réalisateur ?)</li>
    </ul>
<h2>Il faudra d’abord faire un MCD répondant aux exigences citées ci-dessus et le faire valider par un formateur avant de passer à la création des classes</h2>
    <h1>Solution de l'exercice</h1>

  <?php
  // Tableuax des differents objets créer
    $films=[];
    $acteurs=[];
    $realisateurs=[];
    $personnes=[];
    $genres=[];

    //création des genres de film
    $genres = [
      new Genre("Science-fiction"),
      new Genre("Aventure"),
      new Genre("Action")
    ];

    //création des réalisateurs
    $realisateurs =[
      new Realisateur(),
      
    ];

    //creation des films
    $films = [ // __construct(string $titre, string $synopsys, int $duree, DateTime $dateSortie, Genre $genre, Realisateur $realisateur){
      new Films("Star Wars", 
      "La saga épique de science-fiction créée par George Lucas, qui se déroule dans une galaxie lointaine, très lointaine. Elle suit les aventures des Jedi, des Sith, des rebelles et des personnages emblématiques tels que Luke Skywalker, Leia Organa et Dark Vador.", 
      3240, 
      $date, ,),
      new Films("Blade Runner", 
      "Un film de science-fiction dystopique réalisé par Ridley Scott en 1982. Il se déroule dans un futur sombre où des humains appelés “réplicants” sont créés pour effectuer des tâches dangereuses. Le détective Rick Deckard est chargé de traquer et de “retirer” des réplicants rebelles.", 
      117, 
      $date, ,),
      new Films(
        "Batman", 
        "Le film de Tim Burton sorti en 1989 met en scène le super-héros Batman (Bruce Wayne) dans sa lutte contre le Joker (Jack Napier). Le style visuel du film est sombre et gothique, rappelant l’univers de Gotham City.", 
        126, 
        $date, ,)
    ];

    echo"<h2>Lister la liste des acteurs ayant incarné un rôle précis (ex: les acteurs ayant joué le rôle de Batman : Michael Keaton, Val Kilmer, George Clooney, …)</h2>";

    // foreach($Filmss as $Films){
    //   echo "<h3>".$Films."</h3>";
    //   echo "<pre>".$Films->getInfo()."</pre>";
    // }
    for($i=0; $i<count($Filmss); $i++){ // création de chambres d'hitels
      for($j=0; $j<rand(5,15); $j++){
        $rooms[] = new Room($j, "Chambre $j", round((rand(100,1000)*lcg_value()),2), (bool)rand(-1,0), (bool)rand(-1,0), rand(1,4), $Filmss[$i]);
      }
    }
    echo"<h2>Lister le casting d'un film (dans le film Star Wars Episode IV, Han Solo a été incarné par Harrison Ford, Luke Skywalker a été incarné par Mark Hamill, ...)</h2>";
    echo"<h2>Lister les films par genre (exemple : le genre SF est associé à X films : Star Wars, Blade Runner, ...)</h2>";
    echo"<h2>Lister la filmographie d'un acteur (dans quels films a-t-il joué ?)</h2>";
    echo"<h2>Lister la filmographie d'un réalisateur (quels sont les films qu'a réalisé ce réalisateur ?)</h2>";
