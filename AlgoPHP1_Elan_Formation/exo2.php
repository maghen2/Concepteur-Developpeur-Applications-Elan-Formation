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

    <h1>Exercice 2</h1>
    <p>$capitales = 
[France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"]; 
Réaliser un algorithme permettant d’afficher le tableau HTML suivant (notez que le nom du pays 
s’affichera en majuscule et que le tableau est trié par ordre alphabétique du nom de pays) grâce à 
une fonction personnalisée. 
Vous devrez appeler la fonction comme suit : afficherTableHTML($capitales); </p> 
  
<h2>Résultat</h2>
<?php
function afficherTableHTML($capitales) {
  ksort($capitales);
  echo "<table border=1>
  <tr><th>Pays</th><th>Capitale</th></tr>";
  foreach ($capitales as $pays => $capitale) {
    echo "<tr><td>" . mb_strtoupper($pays) . "</td><td>$capitale</td></tr>";
  }
  echo "</table>";
}
$capitales = ["France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"];
afficherTableHTML($capitales);
?>
  </body>
</html>

