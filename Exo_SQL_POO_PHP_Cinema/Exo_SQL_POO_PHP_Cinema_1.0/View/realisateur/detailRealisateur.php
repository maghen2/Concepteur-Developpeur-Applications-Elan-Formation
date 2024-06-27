<?php ob_start(); 
$realisateur = $this->data['realisateur'];
$filmographies = $this->data['filmographie'];
?>
<ul>
    <?php foreach($realisateur as $key=>$value){?>
        <li>
            <b style="text-transform: capitalize;"><?=$key?> :</b> <?=$value?>
        </li>
    <?php };?>
    </ul>
    <table>
        <thead>
        <h3>filmographie de du réalisateur « <?=$realisateur['realisateur']?> »</h3>
            <tr>
            <th>Titre du film</th>
            <th>Date de sortie</th>
            <th>Durée</th>
            <th>synopsis</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($filmographies as $filmographie){ ?>
            <tr>  
            <td><?=$filmographie["titre"]?></td>
            <td><?=$filmographie["Date"]?></td>
            <td><?=$filmographie["Duree"]?></td>
            <td><?=$filmographie["synopsis"]?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php 
$title = $title2 ="Détails du réalisateur « ".$realisateur['realisateur']." »";
$content = ob_get_clean();
require_once("View/template.php");