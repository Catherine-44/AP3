<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Les Rapports</title>
    </head>

    <center>
        <h1> Le rapport </h1>
        <p style="color:#FF0000"><?php print($Err); ?></p>
        <form action="./?action=Medecins&type=EnregModMedecin" method="POST">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <li><?php print ($medecin[0]->getnom());?></li>
                    <input name="id" value=<?php print ($medecin[0]->getid()); ?> type="hidden">
                    <input name="nom" value=<?php print ($medecin[0]->getnom()); ?> type="hidden">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php print ($medecin[0]->getprenom());?></li>
                    <input  name="adresse" value="<?php print ($medecin[0]->getadresse());?>">
                    <input name="tel" value="<?php print ($medecin[0]->gettel());?>">
                </ul>
                <button type="submit"> Enregistrer </button>
            </div>
        </form>
    </center>