<?php ob_start(); 
$acteur = $this->data['acteur'];
$filmographies = $this->data['filmographie'];
?>
<ul>
    <?php foreach($acteur as $key=>$value){?>
        <li>
            <b style="text-transform: capitalize;"><?=$key?> :</b> <?=$value?>
        </li>
    <?php }; var_dump($filmographie[0]);?>
    </ul>
    <table>
        <thead>
        <h3>filmographie du acteur « <?=$acteur['titre']?> »</h3>
            <tr>
            <th>Acteur</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Personnage</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($filmographies as $filmographie){ ?>
            <tr>
            <td><?=$filmographie["acteur"]?></td>
            <td><?=$filmographie["sexe"]?></td>
            <td><?=$filmographie["date_naissance"]?></td>
            <td><?=$filmographie["nom_personnage"]?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php 
$title = $title2 ="Détails du acteur « ".$acteur['titre']." »";
$content = ob_get_clean();
require_once("View/template.php");