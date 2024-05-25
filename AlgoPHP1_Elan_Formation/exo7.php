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

    <h1>Exercice 7</h1>
    <p>Créer une fonction personnalisée permettant de générer des cases à cocher. On pourra préciser 
dans le tableau associatif si la case est cochée ou non. 
Exemple : 
genererCheckbox($elements); 
//où $elements est un tableau associatif clé => valeur avec 3 entrées.  </p> 
  
<h2>Résultat</h2>
<?php
function genererCheckbox($elements) {
  echo "<form>";
  foreach ($elements as $key => $value) {
    echo "<input type='checkbox' id='$key' name='$key' $value /> <label for='$key'>$key</label><br>";
  }
  echo "</form>";
}
$elements = ["Choix 1"=>"","Choix 2"=>"checked","Choix 3"=>""]; 
genererCheckbox($elements);

?>
  </body>
</html>

