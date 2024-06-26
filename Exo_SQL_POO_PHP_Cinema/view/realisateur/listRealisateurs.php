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
        <?php foreach($query->fetchAll() as $realisateur){?>
            <tr>
            <td><a href='?action=detailRealisateur&id_realisateur=<?= $realisateur['id_realisateur'] ?>'><?= $realisateur['realisateur'] ?></a></td>
                <td><?= $realisateur['sexe'] ?></td>
                <td><?= $realisateur['date_naissance'] ?></td>
                <td><?= $realisateur['Nombre_films'] ?></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php 
$title = $title2 ="Liste des réalisateurs";
$content = ob_get_clean();
require_once("View/template.php");