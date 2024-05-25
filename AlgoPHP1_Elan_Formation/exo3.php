<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Algorithmes PHP n°2 - Elan Formation </title>
  </head>
  <body>
    <h1>Algorithmes PHP n°2 - Elan Formation</h1><br>
    <h2>Les objectifs de cet exercice sont les suivants : </h2>
    <ul>
      <li>Maîtriser  les  principes  des  algorithmes :  variables,  chaînes  de  caractères,  conditions, boucles, tableaux, dates, programmation orientée objet. </li>
      <li>Manipuler les balises HTML de base : table, a, select, input, img, … </li>
      <li>Exploiter des ressources en ligne de référence telles que : PHP.net, Developpez.com ou W3schools.com</li>
    </ul>

    <h1>Exercice 3</h1>
    <p>Afficher un lien hypertexte permettant d’accéder au site d’Elan Formation. Le lien devra s’ouvrir 
dans un nouvel onglet (_blank). </p> 
  
<h2>Résultat</h2>
<?php
$url = "https://elan-formation.fr";
echo"<p><a href='$url' target='_blank'>lien hypertexte permettant d’accéder au site d’Elan Formation dans un nouvel onglet </a></p>"; // afficher un lien hypertexte permettant d’accéder au site d’Elan Formation dans un nouvel onglet
  ?>
  </body>
</html>

