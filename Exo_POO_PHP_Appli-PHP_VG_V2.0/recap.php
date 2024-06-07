<?php 
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});
session_start();
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

<div class="form">
  <table border=1 collapse>
    <caption><h2>récapitulatif du panier </h2></caption>
    <?php if(isset($_SESSION['nombreArticles'])) echo' <h3>'.$_SESSION['nombreArticles'].' articles actuellement présents dans le panier</h3>'; ?>
    <thead>
      <tr>
        <th>N°</th>
        <th>Nom du produit</th>
        <th>Prix unitaire</th>
        <th>Quantité</th>
        <th>Prix total</th>
        <th><a href='?id=All&action=supprimerTous'><img width= "40px" src='src/supprimer.png' alt='Supprimer tous les artcles' title='Supprimer tous les artcles' /> </a></th>
        </tr>
    </thead>
  <?php
   if(isset($_SESSION['produit'])){  // on verifie si des produits existent dans la session

    //Supprimer un produit en session (selon le choix de l'utilisateur)
    // Supprimer tous les produits en session en une seule fois
    if(isset($_GET["action"]) and $_GET["action"] !=""){ // on verifie si l'utlisateur demande une action
      echo $_GET["action"];
      switch($_GET["action"]){
        case 'supprimerTous' :
          $_SESSION['produit'] = [];
          break;
        case 'supprimer' :
          if(isset($_GET["id"]) and isset($_SESSION['produit'][$_GET["id"]]) ){ // on verifie si l'utlisateur a trasmis l'id d'un produit valide
            unset($_SESSION['produit'][$_GET["id"]]);  
          }
          break;  
        default :
      }
    }
    $total = 0;
    foreach($_SESSION['produit'] as $id => $produit){
      $total += $produit['Prix_total'];
      echo "<tr> <td>".$id."</td> <td>".$produit['nom']."</td> <td>".$produit['prix']."€</thd> <td>".$produit['quantite']."</td> <td>".$produit['Prix_total']." €</td> <td><a href='?id=".$id.'&action=supprimer\'><img width="30px" src="src/supprimer.png" alt="Supprimer l\'artcle" title="Supprimer l\'artcle"> </a></td></tr>';
    }
    echo "<tr> <th colspan=4>Total</th> <th colspan=2>".$total." €</th> </tr>";
  }
  ?>
   
  </table>
  <nav>
      <li><a href="traitement.php">Ajouter de nouveaux produits</a></li>
      <li><a href="recap.php">Voir le récapitulatif du panier</a></li>
  </nav>
</div>
