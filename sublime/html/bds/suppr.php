<!DOCTYPE html>

<html>
<head>
    <title>Supprimer un étudiant</title>
    <script type="text/javascript" src="fonctions.js"></script>
    <meta charset="utf-8" />
</head>

<body>
<?php
    if (isset($_POST["liste"]) && ($_POST["liste"]!="vide")) {
        $etu=$_POST["liste"];
        $fichier1 = fopen("etudiant.txt", "r");
        $prelim=array();
        while(!feof($fichier1)) {
            $ligne=fgets($fichier1);
            if ($ligne!="") {
                $tableau=explode(" ",$ligne);
                if ($tableau[0]!=$etu) $prelim[]=$ligne;
            }
        }
        fclose($fichier1);
        $fichier1 = fopen("etudiant.txt", "w");
        for($i=0;$i<count($prelim);$i++) {
            fwrite($fichier1, $prelim[$i]);
        }
        fclose($fichier1);
        $fichier2 = fopen("inscrits.txt", "r");
        $prelim=array();
        while(!feof($fichier2)) {
            $ligne=fgets($fichier2);
            if ($ligne!="") {
                $tableau=explode(" ",$ligne);
                if ($tableau[0]!=$etu) $prelim[]=$ligne;
            }
        }
        fclose($fichier2);
        $fichier2 = fopen("inscrits.txt", "w");
        for($i=0;$i<count($prelim);$i++) {
            fwrite($fichier2, $prelim[$i]);
        }
        fclose($fichier2);
   }
?>
<form id="monform" action="#" method="POST">
<div><label>Choisissez un étudiant à supprimer:</label></div>
<div>
<select id="liste" name="liste">
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
</select></div>
<input type="submit" value="Envoyer" />
</form>

</body>
</html>
