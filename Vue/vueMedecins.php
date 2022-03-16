<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<head>
    <title>Les medecins</title>
</head>

<center>
    <h1>Les médecins</h1>


    <form action="./?action=Medecins&type=RechercheMedecin" method="POST">
        <input name="nom" type="search" id="medecins" placeholder="Recherche medecins">
    </form>
    <br>
    <?php 
        for ($i=0; $i<count($rechercheMedecins); $i++){
    ?>
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <?php print($rechercheMedecins[$i]->getnom());?>
        </div>
    
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php print ($rechercheMedecins[$i]->getprenom());?></li>
            <li class="list-group-item"><?php print ($rechercheMedecins[$i]->getadresse());?></li>
            <li class="list-group-item"><?php print ($rechercheMedecins[$i]->gettel());?></li>
        </ul>
        <form action="./?action=Medecins&type=EnregMedecin" method="POST">
            <?php echo "<a href='./?action=Medecins&type=ModifierMedecin&id=".$rechercheMedecins[$i]->getid()."'class='btn'>"?> Modifier les informations du docteur </a>
        </form>
        <form action="./?action=Medecins&type=VoirRapport" method="POST">
            <?php echo "<a href='./?action=Rapports&type=VoirRapport&idMedecin=".$rechercheMedecins[$i]->getid()."'class='btn'>"?> Voir les rapports du docteur </a>
        </form>
    </div>
    <br>
    <?php }?>


    <?php
        for ($i=0; $i<count($listeMedecins); $i++){
    ?>
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            <?php  print($listeMedecins[$i]['nom']) ?>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><?php  print($listeMedecins[$i]['prenom']) ?></li>
            <li class="list-group-item"><?php  print($listeMedecins[$i]['adresse']) ?></li>
            <li class="list-group-item"><?php  print($listeMedecins[$i]['tel']) ?></li>
        </ul>
        <form action="./?action=Medecins&type=EnregMedecin" method="POST">
            <input type="hidden" name="name" value=<?php print($listeMedecins[$i]["nom"]);?>>
            <?php echo "<a href='./?action=Medecins&type=ModifierMedecin&id=".$listeMedecins[$i]["id"]. "'class='btn'>"?> Modifier les informations du docteur </a>
        </form>
        <form action="./?action=Medecins&type=VoirRapport" method="POST">
            <input type="hidden" name="name" value=<?php print($listeMedecins[$i]["nom"]);?>>
            <?php echo "<a href='./?action=Rapports&type=VoirRapport&idMedecin=".$listeMedecins[$i]["id"]. "'class='btn'>"?> Voir les rapports du docteur </a>
        </form>
    </div>
    <br>
    <?php
    }
    ?>
</center>