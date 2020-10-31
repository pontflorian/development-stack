<?php
    include("fonctions.php");

    $activ = $_POST["activ"];
    $fichier = fopen("inscrits.txt", "r");
    $prelim=array();
    while(!feof($fichier)) {
        $ligne=fgets($fichier);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            /*  "if ($tableau[1]==$activ)" ne marche pas
                mais on peut tester si une chaîne est sous-chaîne de l'autre */
             if (strstr($tableau[1],$activ)!="") {
                $prelim[]=$tableau[0];
            }
        }
    }
    fclose($fichier);
    $fichier2= fopen("etudiant.txt", "r");
    while(!feof($fichier2)) {
        $ligne=fgets($fichier2);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            if (est_present($tableau[0],$prelim)) {
                echo "<tr><td> ".$tableau[1]." </td><td> ".$tableau[2]." </td></tr>";
            }
        }
    }
    fclose($fichier);
    echo "</tbody></table>";
?>
