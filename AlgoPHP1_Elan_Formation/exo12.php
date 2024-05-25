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

    <h1>Exercice 12</h1>
    <p>La fonction var_dump($variable) permet d’afficher les informations d’une variable. 
Soit le tableau suivant :  
$tableauValeurs=[true,"texte",10,25.369,["valeur1","valeur2"]]; 
A l’aide d’une boucle, afficher les informations des variables contenues dans le tableau.
<pre>
Affichage 
bool(true)  
string(5) "texte" 
int(10)  
float(25.369)  
array(2) { [0]=> string(7) "valeur1" [1]=> string(7) "valeur2" } 
</pre>
   </p> 
  
<h2>Résultat</h2>
<?php
$tableauValeurs=[true,"texte",10,25.369,["valeur1","valeur2"]];
foreach ($tableauValeurs as $valeur) {
  var_dump($valeur);
  echo "<br>";
}
?>
  </body>
</html>

