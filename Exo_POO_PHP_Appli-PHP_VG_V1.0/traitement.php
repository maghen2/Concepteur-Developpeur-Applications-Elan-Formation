<?php 
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});

session_start();

if(isset($_POST['submit'])){
  $nom = filter_input(INPUT_POST, "nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $prix = filter_input(INPUT_POST, "prix", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
  $quantite = filter_input(INPUT_POST, "quantite", FILTER_VALIDATE_INT);
  $Prix_total = $prix * $quantite;

  if($nom && $prix && $quantite){
    /* Methode objet
    $produit = new Produit($nom, $prix, $quantite, $Prix_total);
    $_SESSION['produit'][] = $produit;
*/

// Methode procedurale
    $_SESSION['produit'][] = ['nom' => $nom, 'prix' => $prix, 'quantite' => $quantite, 'Prix_total' => $Prix_total];

  }

}
header('Location: index.php');
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/style.css">
  <title>Exo_POO_PHP_Appli-PHP_VG_V1.0 Caddy - Elan Formation</title>
  </head>
  <body>
    <h1>Exo_POO_PHP_Appli-PHP_VG_V1.0 Caddy - Elan Formation</h1>
<h2>Cahier des charges  </h2>
<p>L'application doit permettre à un utilisateur de renseigner différents produits par le biais d'un formulaire, produits qui seront consultables sur une page récapitulative. L'enregistrement en session de chaque produit est nécessaire. L'application ne nécessite pour l'instant aucun rendu visuel spécifique. Trois pages sont nécessaires à cela :</p>
<ol>
<li>index.php </li>
<p>Contiendra un formulaire permettant de renseigner les informations suivantes :</p>
<ul>
<li>Le nom du produit</li>
<li>Son prix unitaire</li>
<li>La quantité désirée</li>
</ul>
<li>traitement.php</li>
<p>Traitera la requête provenant de la page index.php (après soumission du formulaire), ajoutera le produit avec son nom, son prix, sa quantité et le total calculé (prix × quantité) en session.</p>
<li>recap.php</li>
<p>Affichera tous les produits en session (et en détail) et présentera le total général de tous les produits ajoutés.</p>
</ol>
    <h1>Solution de l'exercice</h1>

  <?php
 