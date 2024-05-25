<?php 
declare(strict_types=1);
require_once "Livre.php";
require_once "Auteur.php";
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Exercices POO PHP Livres - Elan Formation </title>
  </head>
  <body>
    <h1>Exercices POO PHP Livres - Elan Formation</h1>
    <h2>I.Livres</h2>
    <p>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des livres et leurs auteurs respectifs.
Les livres sont caractérisés par un titre, un nombre de pages, une année de parution, un prix et un auteur. Un auteur comporte un nom et un prénom.
Une méthode toString() sera appréciée dans chacune de vos classes.
Vous implémenterez une méthode afficherBibliographie() qui permettra d’afficher la bibliographie complète d’un auteur.
</p>

<?php

// Affichage de la liste des livres
    echo"<h2>Liste des Livres</h2><ol>";
    foreach($livres as $livre){
        echo"<li>".$livre."</li>";
    }
    echo"</ol>";

// Affichage de la liste des auteurs 
    echo"<h2>Liste des Auteurs</h2><ol>";
    foreach($auteurs as $auteur){
        echo"<li>".$auteur."</li>";
    }
    echo"</ol>";

// Affichage de la bibliographie de chaque auteur
    foreach($auteurs as $auteur){
        echo $auteur->afficherBibliographie($auteur->getAuteurPrenom(),$auteur->getAuteurNom());
    }