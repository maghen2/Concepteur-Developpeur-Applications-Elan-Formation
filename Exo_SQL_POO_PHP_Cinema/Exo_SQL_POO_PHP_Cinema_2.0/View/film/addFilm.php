<?php
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});

// création de l'objet PDO pour la connexion à la base de données
try{
    $myPDO = new PDO(
        'mysql:host=localhost;dbname=cinema;charset=utf8',
        'root',
        ''
    );
}
catch(Exception $error){
    die('Erreur: '.$error->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo_SQL_POO_PHP_Cinema</title>
</head>
<body>   
<h1>Exo_SQL_POO_PHP_Cinema</h1> 
<p>Vous travaillez au sein d'une web agency en tant que développeur-intégrateur web. Suite à la commande d’un client (dont le formateur interprétera le rôle), vous vous occupez de la conception d’un wiki de films, de genres cinématographiques et d’acteurs / actrices.  </p>
<p>Les films seront identifiés par un identifiant unique, leur titre, leur année de sortie en France, leur durée (en minutes) ainsi que leur réalisateur (unique). Un résumé du film (synopsis) pourra éventuellement être renseigné, une note (sur 5) ainsi qu’une affiche du film.  </p>
<p>Chaque film pourra posséder un ou plusieurs genres cinématographiques (science-fiction, aventure, action, …) identifiés par un numéro unique et un libellé.  </p>
<p>Votre base de données devra recenser également les acteurs de chacun des films. On désire connaître le nom, le prénom, le sexe et la date de naissance de l’acteur ainsi que le rôle (nom du personnage) joué par l’acteur dans le(s) film(s) concerné(s). </p>
<h2>Travail à réaliser : </h2>
<ol>
<li>Réalisez le MCD d’une telle gestion des données. Vérifiez-le auprès du formateur. </li>
<li>Créez et remplissez la base de données. </li>
<li>Réalisez les requêtes SQL suivantes avec HeidiSQL ou PhpMyAdmin (rédigez les requêtes dans un fichier .sql afin de garder un historique de celles-ci) : entre parenthèses les champs servant de référence aux requêtes. </li>
<ol type="a">
    <li>Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur  </li>
    <li>Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)  </li>
    <li>Liste des films d’un réalisateur (en précisant l’année de sortie)  </li>
    <li>Nombre de films par genre (classés dans l’ordre décroissant) </li>
    <li>Nombre de films par réalisateur (classés dans l’ordre décroissant) </li>
    <li>Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe </li>
    <li>Films tournés par un acteur en particulier (id_acteur) avec leur rôle et l’année de sortie (du film le plus récent au plus ancien) </li>
    <li>Liste des personnes qui sont à la fois acteurs et réalisateurs </li>
    <li>Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien) </li>
    <li>Nombre d’hommes et de femmes parmi les acteurs </li>
    <li>Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu) </li>
    <li>Acteurs ayant joué dans 3 films ou plus </li>
</ol>
<li>Grâce à un outil de maquettage (type figma), réalisez un mockup de la page d’accueil, puis un wireframe des écrans principaux de l’application permettant de gérer les différentes entités de la base de données : affichage, insertion / modification / suppression (apportez un soin particulier à l’ergonomie de l’application pour garder une navigation cohérente). </li>
</ol>
</body>
</html>