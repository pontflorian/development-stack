function activ() {
    var xhr = new XMLHttpRequest();
    var reponse;
    var html = "<table border='1'><thead><th>Nom</th><th>Prénom</th></thead><tbody>";
    var activ = document.getElementById('liste').options[document.getElementById('liste').selectedIndex].value;
    xhr.onreadystatechange = function(){
          if(xhr.readyState == 4 && xhr.status == 200){
		reponse = xhr.responseText;
		html+=reponse;
		pere = document.getElementById('resultat');
		pere.innerHTML=html;
	  }
        }
	xhr.open("POST","liste.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded;charset=iso-8859-1');
    xhr.send("activ="+activ);
}

function etudnoinscr() {
    var xhr = new XMLHttpRequest();
    var reponse;
    var etud1 = document.getElementById('liste1').options[document.getElementById('liste1').selectedIndex].value;
    xhr.onreadystatechange = function(){
          if(xhr.readyState == 4 && xhr.status == 200){
		reponse = xhr.responseText;
		pere = document.getElementById('liste2');
		pere.innerHTML=reponse;
	  }
        }
	xhr.open("POST","activnoinscr.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded;charset=iso-8859-1');
    xhr.send("etud1="+etud1);
}

function etudinscr() {
    var xhr = new XMLHttpRequest();
    var reponse;
    var etud2 = document.getElementById('liste3').options[document.getElementById('liste3').selectedIndex].value;
    xhr.onreadystatechange = function(){
          if(xhr.readyState == 4 && xhr.status == 200){
		reponse = xhr.responseText;
		pere = document.getElementById('liste4');
		pere.innerHTML=reponse;
	  }
        }
	xhr.open("POST","activinscr.php",true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded;charset=iso-8859-1');
    xhr.send("etud2="+etud2);
}

