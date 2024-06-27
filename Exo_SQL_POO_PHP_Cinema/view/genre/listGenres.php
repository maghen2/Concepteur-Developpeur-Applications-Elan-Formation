<?php ob_start(); ?>
<form action="?action=addGenre" method="POST">
<input type="text" name="nom_genre" id="nom_genre" placeholder="Nom du nouveau genre cinématographique" size="40" required >
<input type="submit" value="Ajouter un nouveau genre">
</form>
<p>
    Il y'a <b> <?= count($genres); ?> genres cinématographique</b> dans la base de données
</p>    
<ul><b>Liste des genres de film</b>
        
            <?php foreach($genres as $film_genre){?> 
             <li>
                <?=$film_genre['nom_genre']?>
             </li>
        <?php }?>
        </ul>

<?php 
$title = $title2 ="Liste des genres de film en base de donnée";
$content = ob_get_clean();
require_once("View/template.php");