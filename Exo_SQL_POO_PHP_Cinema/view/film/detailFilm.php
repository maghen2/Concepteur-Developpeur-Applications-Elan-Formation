<?php ob_start(); 
$film = $this->data['film'];
$castings = $this->data['casting'];
?>
<h2>Détails du film <?=$film['titre']?></h2>
<ul>
    <?= $film?>
    <ul></ul>

<?php foreach($castings as $casting){ 
    }
    ?>
</ul>