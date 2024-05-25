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

    <h1>Exercice 5</h1>
    <p>Créer  une  fonction  personnalisée  permettant  de  créer  un  formulaire  de  champs  de  texte  en 
précisant le nom des champs associés. 
Exemple : 
$nomsInput = ["Nom","Prénom","Ville"]; 
afficherInput($nomsInput); </p> 
  
<h2>Résultat</h2>
<?php
  //<label for="name">$name:</label> <input type="text" id="name" name="name" />
  function afficherInput($nomsInput){
    $inputID= ["nom"=>"Nom","prenom"=>"Prénom","ville"=>"Ville"];
    echo "<form>";
    for($i=0; $i<count($nomsInput); $i++){
      $nom=$nomsInput[$i];
      if (($id = array_search($nom, $inputID))) {
        echo "<label for='$id'>$nom:</label><br><input type='text' id='$id' name='$id' /><br><br>";
      } else {
        echo "« $nom » ce champ de formulaire n'existe pas  <br><br>";
      }
    }
    echo "</form>";
  }

$nomsInput = ["Nom","Prénom","Ville"]; 
afficherInput($nomsInput);

?>
  </body>
</html>

