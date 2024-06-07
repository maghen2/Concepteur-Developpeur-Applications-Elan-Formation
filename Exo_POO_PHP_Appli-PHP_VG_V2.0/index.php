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
  <script src="js/script.js"></script>
  <title>Exo_POO_PHP_Appli-PHP_VG_V2.0 Caddy - Elan Formation</title>
  </head>
  <body>
    <h1>Exo_POO_PHP_Appli-PHP_VG_V2.0 Caddy - Elan Formation</h1>
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
<h2>Améliorer l'application web PHP</h2>
<p>Il vous est désormais demandé de vous occuper de plusieurs fonctionnalités supplémentaires à apporter à votre application :</p>
<p>S'occuper du design (les lignes 6 et 9, respectivement dans index.php et recap.php attendent avec impatience votre feuille de style CSS pour améliorer le rendu visuel de ces deux pages)</p>
<p>Permettre à l'utilisateur d'aller sur la page recap.php ou index.php à tout moment, à l’aide d’une barre de navigation</p>
<p>Afficher le nombre de produits présents en session à tout moment, quelle que soit la page affichée (on parle ici de la quantité totale d’articles, non pas du nombre de produits distincts)</p>
<p>Faire en sorte que le fichier traitement.php, lorsqu'il retourne au formulaire, créé un message (d'erreur ou de succès, selon le cas de figure) et permettre à index.php de l'afficher</p>
<p>Ajouter trois fonctionnalités utiles dans recap.php :</p>
<ul><li>
Supprimer un produit en session (selon le choix de l'utilisateur)
</li><li>
Supprimer tous les produits en session en une seule fois
</li><li>
Modifier les quantités de chaque produit grâce à deux points "+" et "-" positionnés de part et d'autre du nombre dans la cellule
</li></ul>
<p>Ajouter des messages de notifications pour la suppression d’article</p>
<p>Pour faire cohabiter ces fonctionnalités, on utilisera un switch dans traitement.php qui vérifie l’action dans l’url ($_GET) :</p>
    <h1>Solution de l'exercice</h1>
    <div class="form">
    <h2 style="text-align: center">Ajouter des produits</h2>
    <?php 
      if(isset($_SESSION['script'])) echo $_SESSION['script'];
      $_SESSION['script']="";
      
    if(isset($_SESSION['nombreArticles'])) echo' <h3>'.$_SESSION['nombreArticles'].' articles actuellement présents dans le panier</h3>'; 
          if(isset($_SESSION['HTTP_REFERER']) and stripos($_SERVER['HTTP_REFERER'], "index.php")){
            if(isset($_SESSION['dernierAjout']) and $_SESSION['dernierAjout'] == true) $alert= "dernier article a été ajouté avec succés";
            else $alert ="Le dernier article n'a pas pu être ajouté";
            echo "<h4>$alert</h4>";
          }
    ?>
    <form action="traitement.php?action=add" method="post">
      <label for="nom">Nom du produit
      <input type="text" name="nom" id="nom" required>
      </label>

      <label for="prix">Prix unitaire
      <input type="number" name="prix" id="prix" min="0" max="100" step="0.01" required>
      </label>

      <label for="quantite">Quantité
      <input type="number" name="quantite" min=1 step="1" id="quantite" required>
      </label>
      <label for="Prix_total" >Prix total
      <input type="number" name="Prix_total" id="Prix_total" disabled>
      </label>
      <label for="submit">
      <button type="submit" name="submit">Ajouter</button> <button type="reset" name="reset">Annuler</button>
      </label>
    </form>
    <nav>
      <li><a href="index.php">Ajouter de nouveaux produits</a></li>
      <li><a href="recap.php">Voir le récapitulatif du panier</a></li>
    </nav>
    </div>

  <?php
 