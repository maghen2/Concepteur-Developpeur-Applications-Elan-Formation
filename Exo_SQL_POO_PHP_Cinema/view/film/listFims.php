<?php ob_start(); ?>
<p>
    Il y'a <?= $query->rowCount(); ?> films dans la base de données
</p>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Année de sortie</th>
            <th>Durée</th>
            <th>Réalisateur</th>
        </tr>
    </thead>
</table>