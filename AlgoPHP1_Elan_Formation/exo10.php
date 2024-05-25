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

    <h1>Exercice 10</h1>
    <p>En  utilisant  l’ensemble  des  fonctions  personnalisées  crées  précédemment,  créer  un  formulaire 
complet qui contient les informations suivantes : champs de texte avec nom, prénom, adresse e-
mail, ville, sexe et une liste de choix parmi lesquels on pourra sélectionner un intitulé de formation : 
« Développeur Logiciel », « Designer web », « Intégrateur » ou « Chef de projet ». 
Le formulaire devra également comporter un bouton permettant de le soumettre à un traitement 
de validation (submit).  </p> 
  
<h2>Résultat</h2>
<?php
function createform($formElements) {
  echo "<form>";
  foreach ($formElements as $formElement) {
    echo $formElement;
  }
  echo "<input type='submit' value='Submit'> </form>";
}
$nomsRadio = ["Monsieur","Madame","Mademoiselle"];
afficherRadio($nomsRadio);

?>
  </body>
</html>

