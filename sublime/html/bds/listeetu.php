<!DOCTYPE html>

<html>
<head>
    <title>Lister tous les étudiants inscrits à une activité particulière</title>
    <script type="text/javascript" src="fonctions.js"></script>
    <meta charset="utf-8" />
</head>

<body>
Choisissez votre activité : <br/>
<select id="liste" onchange="activ()">
<?php
    $fichier = fopen("activite.txt", "r");
    while(!feof($fichier)) {
        $ligne=fgets($fichier);
        if ($ligne!="") {
            $tableau=explode(" ",$ligne);
            echo "<option value='$tableau[0]'> $tableau[1] </option>";
        }
    }
    fclose($fichier);

?>
</select>
<div id="resultat">
</div>
</body>
</html>
