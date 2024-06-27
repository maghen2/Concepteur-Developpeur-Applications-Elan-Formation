<?php ob_start();?>
<ul>
    <?php foreach($film as $key=>$value){?>
        <li>
            <b style="text-transform: capitalize;"><?=$key?> :</b> <?=$value?>
        </li>
    <?php };?>
    <li><b>Liste des genres du film</b>
        <ul>
            <?php foreach($genres as $film_genre){?> 
             <li>
                <?=$film_genre['nom_genre']?>
             </li>
        <?php }?>
        </ul>
    </li>
    </ul>
    <table>
        <thead>
        <h3>Casting du film « <?=$film['titre']?> »</h3>
            <tr>
            <th>Acteur</th>
            <th>Sexe</th>
            <th>Date de naissance</th>
            <th>Personnage</th>
            </tr>
        </thead>
        <tbody>
            
        <?php foreach($castings as $casting){ ?>
            <tr>
            <td><?=$casting["acteur"]?></td>
            <td><?=$casting["sexe"]?></td>
            <td><?=$casting["date_naissance"]?></td>
            <td><?=$casting["nom_personnage"]?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

<?php 
$title = $title2 ="Détails du film « ".$film['titre']." »";
$content = ob_get_clean();
require_once("View/template.php");