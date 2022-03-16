<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <title>Les medicaments</title>
    </head>
    <center>
        <br>
        <br>
        <td>
            Medicaments : 
        </td>
        <br>
        <form action="./?action=Rapports&type=CreeRapportMed" method="post">
        <input type="hidden" name="nbMed" value=<?php echo($nbMed);?>> 
            <?php for($e=0; $e<$nbMed; $e++){
                ?>
                <input list="medicament" name=<?php echo("medicament".$e); ?> placeholder="Medicament">
                <datalist id="medicament">
                <?php
                for ($i=0; $i<count($listeMedicaments); $i++){
                ?>
                <option>
                    <input type="radio" name="category" value="<?php $listeMedicaments[$i]['nomCommercial']?>"/>
                    <label for="<?php $listeMedicaments[$i]['nomCommercial']?>"><?php echo $listeMedicaments[$i]['nomCommercial']?></label>
                </option>
                <?php
                }
                ?>
            </datalist>
            <input type="number" name=<?php echo("quantite".$e); ?> id="quantite" placeholder="Quantité offerte"/>
            <br>
            <br>
            <?php
            }
            ?>
            <button type="submit">Enregistrer</button>
        </form>
    </center>
</html> 