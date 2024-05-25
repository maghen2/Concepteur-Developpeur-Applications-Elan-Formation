<?php 
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
require_once("classe/db.php");
spl_autoload_register(function($class){
  require_once("classe/".$class.".php");
});
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <title>Exercices POO PHP Banque - Elan Formation </title>
  </head>
  <body>
    <h1>Exercices POO PHP Banque - Elan Formation</h1>
    <h2>II. Banque </h2>
    <h3>Vous êtes chargé(e) de créer un projet orienté objet permettant de gérer des titulaires 
et leurs comptes bancaires respectifs. 
    </h3>
    <h4>Un compte bancaire est composé des éléments suivants :</h4>
<ul>
  <li>Un libellé (compte courant, livret A, ...) </li>
  <li>Un solde initial </li>
  <li>Une devise monétaire </li>
  <li>Un titulaire unique </li>
</ul>
<h4>Un titulaire comporte :</h4>  </li>
<ul>
  <li>Un nom </li>
  <li>Un prénom </li>
  <li>Une date de naissance </li>
  <li>Une ville </li>
  <li>L'ensemble de ses comptes bancaires. </li>
</ul>
<h4>Sur un compte bancaire, on doit pouvoir :</h4>
<ul>
  <li>Créditer le compte de X euros </li>
  <li>Débiter le compte de X euros </li>
  <li>Effectuer un virement d'un compte à l'autre. </li>
</ul>
<h4>On doit pouvoir :</h4>
<ul>
  <li>Afficher  toutes  les  informations  d'un(e)  titulaire  (dont  l'âge)  et  l'ensemble  des  comptes </li>
<li>appartenant à celui(celle)-ci. </li>
  <li>Afficher toutes les informations d'un compte bancaire, notamment le nom / prénom du </li>
<li>titulaire du compte. </li>
</ul>

<?php  
$compteBancaires = [];
$titulaireCompteBancaires=[];


// creation et affichage d'objets TitulaireCompteBancaire __construct(string $nom, string $prenom, string $dateNaissance, string $ville){
    
echo"<h1>Résultat</h1><h2>Liste des Titulaires de Comptes Bancaires</h2><ol>";
for($i=0;$i<5;$i++){
    $randomIndex=rand(0,(count($dbTitulaireCompteBancaires)-1)); //var_dump($randomIndex);
    $titulaireCompteBancaire = $dbTitulaireCompteBancaires[$randomIndex]; //var_dump($titulaireCompteBancaire);
    $nom=$titulaireCompteBancaire["nom"];
    $prenom=$titulaireCompteBancaire["prenom"];
    $dateNaissance=$titulaireCompteBancaire["dateNaissance"];
    $ville=$titulaireCompteBancaire["ville"];

    $titulaireCompteBancaires[$i]=new TitulaireCompteBancaire($nom, $prenom, $dateNaissance, $ville); //var_dump($titulaireCompteBancaires);
    echo "<li><pre>".$titulaireCompteBancaires[$i]->getInfo()."</pre></li>";
}
echo"</ol>";

// creation et affichage d'objets CompteBancaire __construct(int $typeCompte, float $solde, int $devise, string $titulaire)
echo"<h2>Liste des Comptes Bancaires</h2><ol>";
for($i=0;$i<25;$i++){
    $randomIndex=rand(0,(count($titulaireCompteBancaires)-1)); //var_dump($randomIndex);
    $titulaireCompteBancaire = $titulaireCompteBancaires[$randomIndex]; // on selectionne au hasrd des titulaires de compte
    $compteBancaires[$i]=new CompteBancaire(rand(0,2), round((rand(-100000,100000)*lcg_value()),2), rand(0,3), $titulaireCompteBancaire);
    echo "<li><pre>".$compteBancaires[$i]->getInfo()."</pre></li>";
}
echo"</ol>";
//echo"<pre>"; var_dump($compteBancaires);

// Affichage de la liste des titulaire de comptes bancaires avec leurs comptes banciares respectifs
echo"<h2>Liste des Titulaires avec leurs Comptes Bancaires respectifs</h2>";
// var_dump($titulaireCompteBancaires);
for($i=0;$i<(count($titulaireCompteBancaires)-1);$i++){
  echo "<ol type='I'><li><pre>".$titulaireCompteBancaires[$i]->getInfo()."</pre></li><ol>";
  foreach($titulaireCompteBancaires[$i]->getComptes() as $compteBancaire)
  echo "<li><pre>".$compteBancaire->getInfo()."</pre></li>";
echo"</ol></ol>";
}

// Exemple de crédit et débit du Compte Bancaire
echo"
<table border=1>
  <caption><h2>Exemple de crédit et débit du Compte Bancaire ".$compteBancaires[0]."</h2></caption>
  <tr><th>Solde Initial</th><th>Crédit/Débit</th><th>Solde Final</th></tr>"
  ;
  for($i=0; $i<4; $i++){
  echo"<tr><td>".$compteBancaires[0]->getSolde()."</td><td>";
  $credit=round((rand(-100000,100000)*lcg_value()),2);
  $compteBancaires[0]->crediterCompteBancaire($credit);
  echo "$credit</td><td>".$compteBancaires[0]->getSolde()."</td></tr>";
}
echo"</table>";

// Exemple de crédit et débit du Compte Bancaire
echo"
<table border=1>
  <caption><h2>Exemple de virement de ".$compteBancaires[0]." vers ".$compteBancaires[1]."</h2></caption>
  <tr><th>Solde Compte Source</th><th>Mont du virement</th><th>Solde Compte Bénéficaire</th></tr>
  <tr><th>".$compteBancaires[0]->getSolde()."</th><th>0</th><th>".$compteBancaires[1]->getSolde()."</th></tr>
  ";
  for($i=0; $i<4; $i++){
  $credit=round((rand(1,100000)*lcg_value()),2);
  $compteBancaires[0]->virementCompteBancaire($credit, $compteBancaires[1]);
  echo"<tr><td>".$compteBancaires[0]->getSolde()."</td><td>$credit</td><td>".$compteBancaires[1]->getSolde()."</td></tr>";
}
echo"</table>";
?>



