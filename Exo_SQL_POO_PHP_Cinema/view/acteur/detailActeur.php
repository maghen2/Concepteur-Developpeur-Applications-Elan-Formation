<?php ob_start(); ?>
<ul>
    <?php foreach($acteur as $key=>$value){?>
        <li>
            <b style="text-transform: capitalize;"><?=$key?> :</b> <?=$value?>
        </li>
    <?php };?>
    </ul>
    <table>
        <thead>
        <h3>filmographie de l'acteur « <?=$acteur['acteur']?> »</h3>
            <tr>
            <th>Personnage</th>
            <th>Titre du film</th>
            <th>Date de sortie</th>
            <th>Durée</th>
            <th>synopsis</th>
            <th>Réalisateur</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($filmographies as $filmographie){ ?>
            <tr>
            <td><?=$filmographie["nom_personnage"]?></td>   
            <td><?=$filmographie["titre"]?></td>
            <td><?=$filmographie["Date"]?></td>
            <td><?=$filmographie["Duree"]?></td>
            <td><?=$filmographie["synopsis"]?></td>
            <td><?=$filmographie["realisateur"]?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php 
$title = $title2 ="Détails de l'acteur « ".$acteur['acteur']." »";
$content = ob_get_clean();
require_once("View/template.php");