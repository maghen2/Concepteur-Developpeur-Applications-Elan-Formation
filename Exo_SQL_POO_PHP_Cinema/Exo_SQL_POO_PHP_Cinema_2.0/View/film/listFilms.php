<?php ob_start(); 
?>
<form action="?action=addFilm" method="post">
<fieldset>
        <legend><h3>Créer un nouveau film</h3></legend>
    <label for="titre">Titre du film</label><input type="text" name="titre" id="titre" placeholder="Titre du film" required>
    <label for="date_sortie_fr">Date de sortie en France</label><input type="date" name="date_sortie_fr" id="date_sortie_fr" title="Date de sortie en France" required>
    <label for="duree">Durée du film</label><input type="time" name="duree" id="duree" itle="Durée du film" required>
    <textarea name="synopsis" id="" cols="30" rows="10" required>Racontez le synopsis du film en quelques phrases</textarea>
    <label for="id_realisteur">Réalisateur</label><select name="id_realisteur" id="id_realisteur">
        <?php foreach($realisateurs as $realisateur){?>
        <option value="<?=$realisateur['id_realisateur']?>"><?=$realisateur['realisateur']?></option>
        <?php }?>    
    </select>
    <label for="id_genres">Genre</label><select name="id_genres[]" id="id_genres" size=8 multiple required>
        <?php foreach($genres as $genre){?>
        <option value="<?=$genre['id_genre']?>"><?=$genre['nom_genre']?></option>
        <?php }?>    
    </select>
    <input type="submit" value="Créer un nouveau film">
</fieldset>
</form>
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