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

    <h1>Exercice 1</h1>
    <p>Créer une fonction personnalisée convertirMajRouge($texte) permettant de transformer une chaîne de caractère passée en argument en majuscules et en rouge. </p> 
  
<h2>Résultat</h2>
<?php
function convertirMajRouge($texte) {
  return "<span style='color:red;'>" . mb_strtoupper($texte) . "</span>";
}
$texte = "Mon texte en paramètre";
echo '$texte='.$texte.'<br>';
echo convertirMajRouge($texte);
?>
  </body>
</html>

