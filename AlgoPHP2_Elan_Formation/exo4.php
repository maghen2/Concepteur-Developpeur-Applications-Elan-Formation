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

    <h1>Exercice 4</h1>
    <p>A partir de l’exercice 2, ajouter une colonne supplémentaire dans le tableau HTML qui contiendra 
le lien hypertexte de la page Wikipédia de la capitale (le lien hypertexte devra s’ouvrir dans un 
nouvel onglet et le tableau sera trié par ordre alphabétique de la capitale). 
On admet que l’URL de la page Wikipédia de la capitale adopte la forme : 
https://fr.wikipedia.org/wiki/ 
Le tableau passé en argument sera le suivant : 
$capitales = ["France"=>"Paris","Allemagne"=>"Berlin", 
"USA"=>"Washington","Italie"=>"Rome","Espagne"=>"Madrid"]; </p> 
  
<h2>Résultat</h2>
<?php
function afficherTableHTML($capitales) {
  asort($capitales);
  echo "<table border=1>
  <tr><th>Pays</th><th>Capitale</th><th>url</th></tr>";
  foreach ($capitales as $pays => $capitale) {
    $url = "<a href='https://fr.wikipedia.org/wiki/$capitale' target='_blank'>Lien</a>";
    echo "<tr><td>" . mb_strtoupper($pays) . "</td><td>$capitale</td><td>$url</td></tr>";
  }
  echo "</table>";
}
$capitales = ["France"=>"Paris","Allemagne"=>"Berlin","USA"=>"Washington","Italie"=>"Rome"];
afficherTableHTML($capitales);
?>
  </body>
</html>

