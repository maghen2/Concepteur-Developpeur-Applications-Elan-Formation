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

(isset($_GET['id_potion']))? $id_potion = $_GET['id_potion'] : $id_potion = 0;

$sql ="
SELECT
    ingredient.nom_ingredient,
    ingredient.cout_ingredient,
    composer.qte,
    SUM(
        composer.qte * ingredient.cout_ingredient
    ) AS `Prix Total`
FROM
    ingredient
JOIN composer ON composer.id_ingredient = ingredient.id_ingredient
JOIN potion ON potion.id_potion = composer.id_potion
WHERE
    potion.id_potion = $id_potion
GROUP BY
    composer.id_ingredient,
    composer.id_potion
";

    $query = $myPDO->prepare($sql);
    $query->execute();
    $recipes = $query->fetchAll();
?>    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Exo_POO_PHP_Gaulois</title>
    </head>
    <body>
        <h1>Exo_POO_PHP_Gaulois</h1>
    <div id="container">
    <table>
    <caption><h2>liste des ingredients de potion</h2></caption>
    <tr>
    <th>Nom du personnage</th>
    <th>Spécialité</th>
    <th>Lieu</th>
    </tr>
    
        <?php
        $tr="";
        foreach($recipes as $recipe){
            $tr .= "<tr>
            <td>".$recipe[0]."</td>
            <td>".$recipe[1]."</td>
            <td>".$recipe[2]."</td>
            </tr>";
        }
        echo $tr;
        ?>
    </table> 