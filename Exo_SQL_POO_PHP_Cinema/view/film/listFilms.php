<?php ob_start(); ?>
<p>
    Il y'a <b><?= count($films); ?> films </b>dans la base de données
</p>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Date de sortie</th>
            <th>Durée</th>
            <th>Synopsis</th>
            <th>Réalisateur</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($films as $film){?>
            <tr>
            <td><a href='?action=detailFilm&id=<?= $film['id_film'] ?>'><?= $film['titre'] ?></a></td>
                <td><?= $film['Date'] ?></td>
                <td><?= $film['Duree'] ?></td>
                <td><?= $film['synopsis'] ?></td>
                <td><?= $film['realisateur'] ?></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php 
$title = $title2 ="Liste des films";
$content = ob_get_clean();
require_once("View/template.php");