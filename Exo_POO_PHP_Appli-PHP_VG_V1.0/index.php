<?php 
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});
?>
<!DOCTYPE html>
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
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
    <div class="form">
    <h2 style="text-align: center">Ajouter des produits</h2>
    <form action="traitement.php" method="post">
      <label for="nom">Nom du produit
      <input type="text" name="nom" id="nom" required>
      </label>

      <label for="prix">Prix unitaire
      <input type="number" name="prix" id="prix" min="0" max="100" step="0.01" required>
      </label>

      <label for="quantite">Quantité
      <input type="number" name="quantite" min=1 id="quantite" required>
      </label>
      <label for="Prix_total" >Prix total
      <input type="number" name="Prix_total" id="Prix_total" disabled>
      </label>
      <label for="submit">
      <button type="submit" name="submit">Ajouter</button> <button type="reset" name="reset">Annuler</button>
      </label>
    </form>
    <p><a href="recap.php">Voir le récapitulatif du panier</a></p>
    </div>

  <?php
 