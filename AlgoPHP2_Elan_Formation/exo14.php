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

    <h1>Exercice 14</h1>
    <p>En  utilisant  les  ressources  de  la  page  http://php.net/manual/fr/book.filter.php,  vérifier  si  une 
adresse e-mail a le bon format. 
Affichage 
L’adresse elan@elan-formation.fr est une adresse e-mail valide 
   </p> 
  
<h2>Résultat</h2>
<?php
$email = "elan@elan-formation.fr";
$valide = filter_var($email, FILTER_VALIDATE_EMAIL); 
if ($valide) {
  echo "L’adresse $email est une adresse e-mail valide";
} else {
  echo "L’adresse $email est une adresse e-mail invalide ";
}
?>
  </body>
</html>

