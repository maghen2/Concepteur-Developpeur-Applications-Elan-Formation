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


    $films = $genres[0]->getFilms();
    echo"<h2>Le genre ".$genres[0]." est associé à ".count($films)." films </h2>";
    echo"<ul>";
    foreach($films as $film){
      echo"<li>$film</li>";
    }
    echo"</ul>";

    echo"<h2>Filmographie de l'acteur ".$acteurs[0]."</h2>";
    echo"<ul>";
    // var_dump($acteurs[0]->getCastings());
    foreach($acteurs[0]->getCastings() as $casting){
      echo"<li>".$casting->getFilm()."</li>";
    }
    echo"</ul>";

    echo"<h2>Filmographie du réalisateur ".$realisateurs[0]."</h2>";
    echo"<ul>";
    // var_dump($realisateurs[0]->getFilms());
    foreach($realisateurs[0]->getFilms() as $film){
      echo"<li>$film</li>";
    }
  ?>
  <h2>Modèle Conceptuel de Données (MCD) et Modèle Logique de Données (MLD)</h2>
  <img src="MCD_MLD.jpg" width="100%" alt="MCD et MLD" title="Modèle Conceptuel de Données (MCD) et Modèle Logique de Données (MLD)">
  </body>
</html>
