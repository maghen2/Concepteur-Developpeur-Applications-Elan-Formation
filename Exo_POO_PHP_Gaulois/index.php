<?php
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});

try{
    $myPDO = new PDO(
        'mysql:host=localhost;dbname=gaulois;charset=utf8',
        'root',
        ''
    );
}
catch(Exception $error){
    die('Erreur: '.$error->getMessage());
}
// liste des gaulois (nom + spécialité + lieu) dans un tableau HTML à 3 colonnes
$sql ='-- liste des gaulois (nom + spécialité + lieu) dans un tableau HTML à 3 colonnes
SELECT personnage.nom_personnage, specialite.nom_specialite, lieu.nom_lieu
FROM personnage
JOIN specialite ON personnage.id_specialite = specialite.id_specialite
JOIN lieu ON personnage.id_lieu = lieu.id_lieu';

$query = $myPDO->prepare($sql);
$query->execute();
$recipes = $query->fetchAll();

echo'<pre>';
var_dump($recipes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exo_POO_PHP_Gaulois</title>
</head>
<body>
    <h1>Exo_POO_PHP_Gaulois</h1>
    <p>Bonjour </p>
<p>Une fois que les requêtes Gaulois seront terminées, il faudra concevoir le MCD de la base de données gaulois avec Looping</p>
 
<p>Et une fois que le MCD aura été fait et validé, il faudra créer une simple application PHP qui liste les enregistrements de la table gaulois (ressource : https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914293-accedez-aux-donnees-en-php-avec-pdo) 
On fera les affichages suivants : </p>
<ul>
<li>-- liste des gaulois (nom + spécialité + lieu) dans un tableau HTML à 3 colonnes</li>
<li>-- liste des potions avec le nombre d'ingrédients dans chacune de ces potions dans un tableau HTML à 2 colonnes</li>
<li>-- si on clique sur une potion de la liste, on affiche une autre page avec les informations de la potions (nom de la potion) + liste de ses ingrédients. Comme dans appli_php il faudra faire passer un argument en GET dans l'URL (l'id de la potion afin de réaliser une requête préparée)</li>

<p>Accédez aux données en PHP avec PDO. PHP permet de créer des sites dynamiques : blogs, forums, réseaux sociaux, espaces membres... Découvrez PHP associé à MySQL et créez votre premier site web !</p>

</body>
</html>