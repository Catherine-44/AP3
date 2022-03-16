<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Les Rapports</title>
    </head>

    <center>
        <h1> Le rapport </h1>
        <p style="color:#FF0000"><?php print($Err); ?></p>
        <form action="./?action=Rapports&type=EnregModRapport" method="POST">
            <div class="card" style="width: 18rem;">
                <div class="card-header">
                    <li><?php print ($Rapport[0]->getId());?></li>
                    <input name="id" value=<?php print ($Rapport[0]->getId()); ?> type="hidden">
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php print ($Rapport[0]->getDate());?></li>
                    <input  name="motif" value="<?php print ($Rapport[0]->getMotif());?>">
                    <input name="bilan" value="<?php print ($Rapport[0]->getBilan());?>">
                </ul>
                <button type="submit"> Enregistrer </button>
            </div>
        </form>
    </center>