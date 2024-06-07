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

if(isset($_SESSION['produit'])){  // on verifie si des produits existent dans la session
  //Supprimer un produit en session (selon le choix de l'utilisateur)
  // Supprimer tous les produits en session en une seule fois
  if(isset($_GET["action"]) and $_GET["action"] !=""){ // on verifie si l'utlisateur demande une action
    switch($_GET["action"]){
      case 'clear' :
       $_SESSION['produit'] = [];
       $_SESSION['nombreArticles'] = 0;
       
        // unset($_SESSION["produit"]);
        break;
      case 'delete' :
        if(isset($_GET["id"]) and isset($_SESSION['produit'][$_GET["id"]]) ){ // on verifie si l'utlisateur a trasmis l'id d'un produit valide
          $script = '<script>alert("produit '.$_SESSION["produit"][$_GET["id"]]["nom"].' supprimé!")</script>'; 
          $_SESSION['script'] .= $script; 
          $_SESSION['nombreArticles'] -= $_SESSION['produit'][$_GET["id"]]["quantite"];         
          unset($_SESSION['produit'][$_GET["id"]]);

        }
        break; 
        case 'up-qtt' :
          if(isset($_GET["id"]) and isset($_SESSION['produit'][$_GET["id"]]) ){ // on verifie si l'utlisateur a trasmis l'id d'un produit valide
            $_SESSION['produit'][$_GET["id"]]["quantite"] += 1;  
            $_SESSION['nombreArticles'] += 1; 
          }
          break; 
          case 'down-qtt' :
            if(isset($_GET["id"]) and isset($_SESSION['produit'][$_GET["id"]]) ){ // on verifie si l'utlisateur a trasmis l'id d'un produit valide
              $_SESSION['produit'][$_GET["id"]]["quantite"] -= 1;  
              //($quantite>0)? $_SESSION['nombreArticles'] -= 1 : unset($_SESSION['produit'][$_GET["id"]]);
              if ($_SESSION['produit'][$_GET["id"]]["quantite"]>=0) $_SESSION['nombreArticles'] -= 1;
              else unset($_SESSION['produit'][$_GET["id"]]);
            }
            break;          
      default :

    }
  }
}

header('Location: recap.php');
/*
if(isset($_SESSION['HTTP_REFERER']) and stripos($_SERVER['HTTP_REFERER'], "recap.php")){
header('Location: recap.php');
}
else {header('Location: index.php');}
*/
?>