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

    $hotels = [ // (int $idHotel, string $hotelName, string $adress, string $zipCode, string $city)
      new Hotel(1, "Hotel de Paris", "1 rue de Paris", "75001", "Paris"),
      new Hotel(2, "Hotel de Lyon", "1 rue de Lyon", "69001", "Lyon"),
      new Hotel(3, "Hotel de Marseille", "1 rue de Marseille", "13001", "Marseille"),
      new Hotel(4, "Hotel de Lille", "1 rue de Lille", "59001", "Lille"),
      new Hotel(5, "Hotel de Bordeaux", "1 rue de Bordeaux", "33001", "Bordeaux"),
      new Hotel(6, "Hotel de Strasbourg", "1 rue de Strasbourg", "67001", "Strasbourg"),
    ];
    // foreach($hotels as $hotel){
    //   echo "<h3>".$hotel."</h3>";
    //   echo "<pre>".$hotel->getInfo()."</pre>";
    // }
    for($i=0; $i<count($hotels); $i++){ // création de chambres d'hitels
      for($j=0; $j<rand(5,15); $j++){
        $rooms[] = new Room($j, "Chambre $j", round((rand(100,1000)*lcg_value()),2), (bool)rand(-1,0), (bool)rand(-1,0), rand(1,4), $hotels[$i]);
      }
    }

    // echo "<h2>Liste des Hotels avec leurs chrambres</h2>";
    // foreach($hotels as $hotel){
    //   echo "<h3>".$hotel."</h3>";
    //   echo "<pre>".$hotel->getInfo()."</pre><ol>";
    //   foreach($hotel->getRooms() as $room){
    //     echo "<li>".$room->getInfo()."</li>";
    //   }
    //   echo "</ol>";
    // }

    // creation des clients (int $idCustomer, string $firstName, string $lastName){
      // echo "<h2>Classe Customer</h2>";
      for($i=0, $j="A"; $i<rand(5,15); $i++,$j++){ // création de chambres d'hitels
        $customers[$i] = new Customer($i, "Prenom$j", "Nom$j");
        // echo "<h3>".$customers[$i]."</h3>";
        //  echo "<pre>".$customers[$i]->getInfo()."</pre>";
      }

      //creation des reservations (Room $room, Customer $customer, DateTime $dateBooking, DateTime $dateEntry, DateTime $dateLeaving)
      for($i=0; $i<20; $i++){
        $annee = rand(2024, 2027);
        $mois = rand(1,11);
        $jour = rand(1,28);
        $dateBooking = new DateTime("now");
        $dateEntry = new DateTime("now");
        $dateEntry = $dateEntry->setDate($annee, $mois, $jour);
        $dateLeaving  = new DateTime("now");
        $dateLeaving  = $dateLeaving->setDate($annee, ($mois+rand(1,11))%12, ($jour+rand(1,28))%28);
        $bookings[$i]= new Booking($rooms[rand(0, (count($rooms)-1))], $customers[rand(0, (count($customers)-1))], $dateBooking, $dateEntry, $dateLeaving);
      }
      /*
      Hilton **** Strasbourg
10 route de la Gare 67000 STRASBOURG
Nombre de chambres: 30
Nombre de chambres réservées: 3
Nombre de chambres dispo: 27
      */
      $hotel=$hotels[rand(0, (count($hotels)-1))];
      $customer=$customers[rand(0, (count($customers)-1))];
      echo $hotel->getHotelStatus();
      echo $hotel->getReservations();
      echo $customer->getReservations();
      echo $hotel->getRoomStatus();

