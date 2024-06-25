<?php ob_start(); ?>
<p>
    Il y'a <?= $query->rowCount(); ?> acteurs dans la base de données
</p>
<table>
    <thead>
        <tr>
            <th>Acteurs</th>
            <th>Sexe</th>
            <th>Date de Naissance</th>
            <th>Nombre de films</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($query->fetchAll() as $acteur){?>
            <tr>
                <td><?= $film['acteur'] ?></td>
                <td><?= $film['Sexe'] ?></td>
                <td><?= $film['date_naissance'] ?></td>
                <td><?= $film['Nombre_films'] ?></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php 
$title = $title2 ="Liste des films";
$content = ob_get_clean();
require_once("View/template.php");