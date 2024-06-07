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

  // cast du typage des variables obtenues du formulaire
  settype($prix, "float");
  settype($quantite, "int");

  if($nom && $prix && $quantite){
    // Methode objet __construct(string $nom, float $prix, int $quantite, float $Prix_total)
    $produit = new Produit($nom, $prix, $quantite, $Prix_total);
    $_SESSION['produit_POO'][] = $produit;

// Methode procedurale
    $_SESSION['produit'][] = ['nom' => $nom, 'prix' => $prix, 'quantite' => $quantite, 'Prix_total' => $Prix_total];

  //Afficher le nombre de produits présents en session à tout moment, quelle que soit la page affichée (on parle ici de la quantité totale d’articles, non pas du nombre de produits distincts)
  $_SESSION['nombreArticles'] += $quantite;
  }
  $_SESSION['dernierAjout'] = true;
}
else{$_SESSION['dernierAjout'] = false;}
header('Location: index.php');
