<!DOCTYPE html>

<html>
<head>
    <title>Ajouter un étudiant</title>
    <script type="text/javascript" src="fonctions.js"></script>
    <meta charset="utf-8" />
</head>

<body>
<?php
    if (isset($_POST["nom"]) && ($_POST["nom"]!="") && isset($_POST["prenom"]) && ($_POST["prenom"]!="")) {
        $fichier1 = fopen("etudiant.txt", "r");
        while(!feof($fichier1)) {
            $ligne=fgets($fichier1);
            if ($ligne!="") {
                $tableau=explode(" ",$ligne);
                $numero=$tableau[0];
            }
        }
        fclose($fichier1);
        $numero++;
        $fichier1 = fopen("etudiant.txt", "a");
        $nouvelleligne=$numero." ".$_POST["nom"]." ".$_POST["prenom"]."\n";
        fwrite($fichier1, $nouvelleligne);
        fclose($fichier1);
   }
?>
<form id="monform" action="#" method="POST">
<div><label>Rentrer un étudiant:</label></div>
<div><label>Nom:</label><input id="nom" name="nom" type="text"/></div>
<div><label>Prénom:</label><input id="prenom" name="prenom" type="text"/></div>
<input type="submit" value="Envoyer" />
</form>

</body>
</html>
