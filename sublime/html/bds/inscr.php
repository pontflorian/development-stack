<!DOCTYPE html>

<html>
<head>
    <title>Inscrire/désinscrire un étudiant à une activité</title>
    <script type="text/javascript" src="fonctions.js"></script>
    <meta charset="utf-8" />
</head>

<body>
<?php

    if (isset($_POST["liste1"]) && ($_POST["liste1"]!="vide") && isset($_POST["liste2"]) && ($_POST["liste2"]!="vide")) {
        $etu=$_POST["liste1"];
        $activ=$_POST["liste2"];
        $fichier1 = fopen("inscrits.txt", "a");
        $nouvelleligne=$etu." ".$activ."\n";
        fwrite($fichier1, $nouvelleligne);
        fclose($fichier1);      
    }
    if (isset($_POST["liste3"]) && ($_POST["liste3"]!="vide") && isset($_POST["liste4"]) && ($_POST["liste4"]!="vide")) {
        $etu=$_POST["liste3"];
        $activ=$_POST["liste4"];
        $fichier1 = fopen("inscrits.txt", "r");
        $prelim=array();
        while(!feof($fichier1)) {
            $ligne=fgets($fichier1);
            if ($ligne!="") {
                $tableau=explode(" ",$ligne);
                if (($tableau[0]!=$etu) || (strstr($tableau[1],$activ)=="")) $prelim[]=$ligne;
            }
        }
        fclose($fichier1);
        $fichier1 = fopen("inscrits.txt", "w");
        for($i=0;$i<count($prelim);$i++) {
            fwrite($fichier1, $prelim[$i]);
        }
        fclose($fichier1);
    }
?>
<h1>Inscrire un étudiant à une activité</h1>
<form id="monform1" action="#" method="POST">
<div><label>Choisissez un étudiant, puis une activité où il n'est pas encore inscrit:</label></div>
<div>
<select id="liste1" name="liste1" onchange="etudnoinscr()">
<option value="vide"></option>
<?php
    $fichier = fopen("etudiant.txt", "r");
    while(!feof($fichier)) {
        $ligne=fgets($fichier);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            echo "<option value='$tableau[0]'> $tableau[2] $tableau[1] </option>";
        }
    }
    fclose($fichier);

?>
</select>
<select id="liste2" name="liste2">
<option value="vide"></option>
</select>
</div>
<input type="submit" value="Inscrire" />
</form>

<h1>Désinscrire un étudiant d'une activité</h1>
<form id="monform2" action="#" method="POST">
<div><label>Choisissez un étudiant, puis une activité où il est inscrit:</label></div>
<div>
<select id="liste3" name="liste3" onchange="etudinscr()">
<option value="vide"></option>
<?php
    $fichier = fopen("etudiant.txt", "r");
    while(!feof($fichier)) {
        $ligne=fgets($fichier);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            echo "<option value='$tableau[0]'> $tableau[2] $tableau[1] </option>";
        }
    }
    fclose($fichier);

?>
</select>
<select id="liste4" name="liste4">
<option value="vide"></option>
</select>
</div>
<input type="submit" value="Désinscrire" />
</form>

</body>
</html>
