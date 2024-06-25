<?php ob_start(); ?>
<p>
    Il y'a <?= $query->rowCount(); ?> réalisateurs dans la base de données
</p>
<table>
    <thead>
        <tr>
            <th>Réalisateurs</th>
            <th>Sexe</th>
            <th>Date de Naissance</th>
            <th>Nombre de films</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($query->fetchAll() as $acteur){?>
            <tr>
                <td><?= $acteur['realisateur'] ?></td>
                <td><?= $acteur['sexe'] ?></td>
                <td><?= $acteur['date_naissance'] ?></td>
                <td><?= $acteur['Nombre_films'] ?></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php 
$title = $title2 ="Liste des réalisateurs";
$content = ob_get_clean();
require_once("View/template.php");