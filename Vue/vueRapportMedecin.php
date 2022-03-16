<html>
    <section class="services" id="services">

    <h2 class="heading"> Les rapports du Médecin </h2>

    <br>
    <br>
    <div class="box-container">
        <?php 
            for ($i=0; $i<count($RapportsMedecin); $i++){
        ?>
            <div class="box">
                    <i class="fas fa-file-alt"></i>
                    <h3> La date :<?php echo $RapportsMedecin[$i]['date']?></h3>
                    <p> Le motif :<?php echo $RapportsMedecin[$i]['motif']?></p>
                    <p> Le bilan :<?php echo $RapportsMedecin[$i]['bilan']?></p>
                    <?php echo "<a href='./?action=Rapports&type=FicheRapport&id=".$RapportsMedecin[$i]['id']. "'class='btn'>"?>  </a>
            </div>
        <?php
            $i++;
            }
        ?>
    </div>
    </section>
</html>