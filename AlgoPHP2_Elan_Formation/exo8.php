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

    <h1>Exercice 8</h1>
    <p>Soit l’URL suivante : http://my.mobirise.com/data/userpic/764.jpg 
Créer une fonction personnalisée permettant d’afficher l’image N fois à l’écran. 
Exemple : 
repeterImage($url,4); </p> 
  
<h2>Résultat</h2>
<?php
function repeterImage($url, $n) {
  for ($i=0; $i<$n; $i++) {
    echo "<img src='$url' />";
  }
}
$url = "http://my.mobirise.com/data/userpic/764.jpg";
repeterImage($url, 4);

?>
  </body>
</html>

