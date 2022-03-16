<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
        <title>Les medecins</title>
    </head>
    <center>
    <h2>Entrez votre rapport de consultation</h2>
    <p style="color:#FF0000"><?php print($dateErr);?></p>
    <p style="color:#FF0000"><?php print($motifErr);?></p>
    <p style="color:#FF0000"><?php print($bilanErr);?></p>
    <p style="color:#FF0000"><?php print($idMedecinErr);?></p>

    <br>
        <form action="./?action=Rapports&type=RemplirRapport" method="POST">
            <input type="date" name="date" id="date" placeholder="date">
            <br>
            <input name="motif" id="motif" placeholder="motif">
            <br>
            <input name="bilan" id="bilan" placeholder="bilan">
            <br>
            <input list="medecin" name="idMedecin" id="idMedecin" class="box" placeholder="Nom du médecin">
                <datalist id="medecin">
                    <?php
                        for ($i=0; $i<count($listeMedecins); $i++){
                            ?>
                            <option value="<?php echo $listeMedecins[$i]["id"] ?>">
                                <?php echo $listeMedecins[$i]["nom"]."\n".$listeMedecins[$i]["prenom"]?>
                            </option>
                        <?php
                        }
                        ?>
                </datalist>
            <br>
            <br>
            <input type="submit" value="Enregistrer">
        </form>
    </center>
</html>