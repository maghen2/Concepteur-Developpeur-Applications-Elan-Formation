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
                <td><a href='?action=detailActeur&id=<?= $acteur['id_acteur'] ?>'><?= $acteur['acteur'] ?></a></td>
                <td><?= $acteur['sexe'] ?></td>
                <td><?= $acteur['date_naissance'] ?></td>
                <td><?= $acteur['Nombre_films'] ?></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php 
$title = $title2 ="Liste des acteurs";
$content = ob_get_clean();
require_once("View/template.php");