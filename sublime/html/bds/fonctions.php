<?php

    function est_present($rech,$tableau) {
        foreach($tableau as $valeur) {
            /*  NOTE : l'égalité "$valeur==$rech" ne marche visiblement pas avec les fichiers texte
                sans doute parce que le retour à la ligne est considéré comme un caractère
                Pour contourner le problème, on peut utiliser la fonction "strstr"
                qui retourne la première occurrence d'une sous-chaîne dans une chaine
                Exemple 1 : strstr("bonjour tout le monde", "monde") rendra "Bonjour tout le"
                Exemple 2 : strstr("bonjour tout le monde", "111") rendra ""
                Dans notre cas, il suffit donc que strstr($valeur,$rech) ne renvoie pas "" 
                pour en déduire une égalité */
            if (strstr($valeur,$rech)!="") return true;
        }  
        return false;
    }   
    
?>
