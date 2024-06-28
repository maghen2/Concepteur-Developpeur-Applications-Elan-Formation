<?php ob_start(); ?>
<form action="?action=addActeur" method="post">
    <fieldset>
        <legend><h3>Créer une nouvelle personne</h3></legend>
    
    <label for="prenom">Prenom</label><input type="text" name="prenom" id="prenom" placeholder="Prenom" required>
    <label for="nom">Nom</label><input type="text" name="nom" id="nom" placeholder="Nom" required>
    <label for="sexe">Sexe</label><select name="sexe" id="sexe">
        <option value="M">Masculin</option> 
        <option value="F">Féminin</option>  
    </select>
    <label for="date_naissance">Date de naissance</label><input type="date" name="date_naissance" id="date_naissance" title="Date de naissance" required>
    <fieldset>
        <legend>Fonction de de la personne</legend>
   
    <input type="radio" name="fonction" value="acteur" id="acteur" checked><label for="acteur">Acteur</label>
    <input type="radio" name="fonction" value="realisateur" id="realisateur"><label for="realisateur">Réalisateur</label>
    <input type="radio" name="fonction" value="acteurRealisateur" id="acteurRealisateur"><label for="acteurRealisateur">Acteur & Réalisateur</label>
    </fieldset>
    <input type="submit" value="Créer une nouvelle personne">
    </fieldset>
    </form>
<p>
    Il y'a <b> <?= count($acteurs); ?> acteurs </b>dans la base de données
</p>
<table>
    <thead>
        <tr>
            <th>Acteurs</th>
            <th>Sexe</th>
            <th>Date de Naissance</th>
            <th>Nombre de films</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($acteurs as $acteur){?>
            <tr>
                <td><a href='?action=detailActeur&id=<?= $acteur['id_acteur'] ?>'><?= $acteur['acteur'] ?></a></td>
                <td><?= $acteur['sexe'] ?></td>
                <td><?= $acteur['date_naissance'] ?></td>
                <td><?= $acteur['Nombre_films'] ?></td>
            </tr>
        <?php }; ?>
    </tbody>
</table>

<?php 
$title = $title2 ="Liste des acteurs";
$content = ob_get_clean();
require_once("View/template.php");