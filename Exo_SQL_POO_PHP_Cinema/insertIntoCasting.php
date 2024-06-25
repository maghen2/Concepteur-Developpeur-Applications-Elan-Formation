<?php
declare(strict_types=1);
error_reporting(E_ALL);
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
spl_autoload_register(function($class){
  require_once("class/".$class.".php");
});

// création de l'objet PDO pour la connexion à la base de données
try{
    $myPDO = new PDO(
        'mysql:host=localhost;dbname=cinema;charset=utf8',
        'root',
        ''
    );
}
catch(Exception $error){
    die('Erreur: '.$error->getMessage());
}

// GENERATION DES DONNEES POUR INSERT INTO Casting (id_film, id_acteur) VALUES
$sql ='SELECT DISTINCT id_film
FROM film
ORDER BY id_film ASC';

$query = $myPDO->prepare($sql);
$query->execute();
$recipes = $query->fetchAll();
foreach ($recipes as $recipe){
    $id_films[] = $recipe['id_film'];
}

// var_dump($id_films);

$sql ='SELECT DISTINCT id_acteur
FROM acteur
ORDER BY id_acteur ASC';

$query = $myPDO->prepare($sql);
$query->execute();
$recipes = $query->fetchAll();
foreach ($recipes as $recipe){
    $id_acteurs[] = $recipe['id_acteur'];
}
// var_dump($id_acteurs);

$sql ='SELECT DISTINCT id_role
FROM role
ORDER BY id_role ASC';

$query = $myPDO->prepare($sql);
$query->execute();
$recipes = $query->fetchAll();
foreach ($recipes as $recipe){
    $id_roles[] = $recipe['id_role'];
}
// var_dump($id_acteurs);

$sql ='INSERT IGNORE INTO Casting (id_film, id_acteur, id_role ) VALUES';
$numbers_of_actor = count($id_acteurs);
$numbers_of_role = count($id_roles);

foreach ($id_films as $id_film){
    $number_of_casting = rand(20, 60);
    for ($i=0; $i<$number_of_casting; $i++){
        $id_acteur = $id_acteurs[rand(0, $numbers_of_actor-1)];
        $id_role = $id_roles[rand(0, $numbers_of_role-1)];
        $sql .= "\n(".$id_film.', '.$id_acteur.', '.$id_role.'),';
    }
}
echo('<pre>'.$sql.'</pre>');
