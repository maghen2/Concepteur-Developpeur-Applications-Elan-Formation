<?php ob_start(); 
$film_genres = $this->data['film_genres'];
?>
<p>
    Il y'a <?= count($film_genres); ?> genres cinématographique dans la base de données
</p>    
<ul><b>Liste des genres de film</b>
        
            <?php foreach($film_genres as $film_genre){?> 
             <li>
                <?=$film_genre['nom_genre']?>
             </li>
        <?php }?>
        </ul>

<?php 
$title = $title2 ="Liste des genres de film en base de donnée";
$content = ob_get_clean();
require_once("View/template.php");