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

    <h1>Exercice 11</h1>
    <p>Ecrire une fonction personnalisée qui affiche une date en français (en toutes lettres) à partir d’une 
chaîne de caractère représentant une date. 
Exemple : 
formaterDateFr("2018-02-23");   </p> 
  
<h2>Résultat</h2>
<?php
function formaterDateFr($date) {
  $date = new DateTime($date);
  setlocale(LC_TIME, 'fr_FR.utf8','fra');
  echo strftime('%A %d %B %Y', $date->getTimestamp());
}
formaterDateFr("2018-02-23");
?>
  </body>
</html>

