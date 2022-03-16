<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Les Rapports</title>
    </head>

    <center>
        <h1> Les rapports </h1>
        <br>
        <form action="./?action=Rapports&type=RechercheRapport" method="POST">
            <input name="date" id="rapport" type="date" placeholder="Recherche Rapport">
            <button type="submit"> Rechercher </button>
        </form>
        <br>
        <br>
        <?php   
            for ($i=0; $i<count($rechercheRapport); $i++){
        ?>
        <div class="card" style="width: 18rem;">
        <div class="card-header">
            <?php print($rechercheRapport[$i]->getDate());?>
        </div>
        <form action="./?action=Rapports&type=ModifierRapport" method="POST">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php print ($rechercheRapport[$i]->getId());?></li> 
                <input name="id" value=<?php print ($rechercheRapport[$i]->getId()); ?> type="hidden">
                <li class="list-group-item"><?php print ($rechercheRapport[$i]->getDate());?></li>
                <li class="list-group-item"><?php print ($rechercheRapport[$i]->getMotif());?></li>
                <li class="list-group-item"><?php print ($rechercheRapport[$i]->getBilan());?></li>
            </ul>
            <button type="submit"> Modifier </button>
        </form>
        </div>
        <br>
        <?php }?>

        <tr>
            <?php
            for ($O=0; $O<count($lesRapports); $O++){
            ?>
            <div class="card" style="width: 18rem;">
            <div class="card-header">
                <?php print($lesRapports[$O]->getDate());?>
            </div>
            <form action="./?action=Rapport&type=ModifierRapport" method="POST">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><?php print ($lesRapports[$O]->getId());?></li> 
                    <input name="id" value=<?php print ($lesRapports[$O]->getId()); ?> type="hidden">
                    <li class="list-group-item"><?php print ($lesRapports[$O]->getDate());?></li>
                    <li class="list-group-item"><?php print ($lesRapports[$O]->getMotif());?></li>
                    <li class="list-group-item"><?php print ($lesRapports[$O]->getBilan());?></li>
                </ul>
                <button type="submit"> Modifier </button>
            </form>
            </div>
            <br>
            <?php
            }
            ?>
        </tr>
    </center>