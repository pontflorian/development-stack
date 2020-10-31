<?php

    include("fonctions.php"); 
    echo "<option value='vide'></option>";
    $etud = $_POST["etud1"];
    $fichier = fopen("inscrits.txt", "r");
    $prelim=array();
    while(!feof($fichier)) {
        $ligne=fgets($fichier);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            if ($tableau[0]==$etud) {
                $prelim[]=$tableau[1];
            }
        }
    }
    fclose($fichier);
    $fichier2= fopen("activite.txt", "r");
    while(!feof($fichier2)) {
        $ligne=fgets($fichier2);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            if (!est_present($tableau[0],$prelim)) {
                echo "<option value='".$tableau[0]."'>".$tableau[1]." </option>";
            }
        }
    }
    fclose($fichier);

?>
