function envoipersajax(nom) {
	
	var requete = $.ajax({ // ajax :la variable requete envoie un objet XMLHttpRequest.
		url: "v_saisieMembre.php", // url de la page � charger
		type:"POST",
		data:"NOM_PERSONNE=" + escape(nom),//les donn�es � envoyer avec l�URL.
		//cache: false, // pas de mise en cache
		
		success:function(){ // si la requ�te est un succ�s
		
			var selectMembre = document.getElementById("listeMembres"); //initialisation de la liste d�roulante
			
			if(requete.responseText == '') { //normalement, requete.responseText
	
				selectMembre.length=0;
				//document.getElementById("prix").innerHTML='';
			}else {
				
				var membre,i,nb,pers;
				
				membre = requete.responseText.split('/'); 
				// personne est un tableau contenant toutes les lignes renvoy�es par la requ�te. 
				//La fonction split() permet de scinder une cha�ne de caract�res et de retourner les r�sultats dans un tableau
				nb=membre.length; // nb contient le nombre de lignes du tableau
				selectMembre.length = nb; // ce sera donc le nombre d��l�ments pr�sents dans la liste.
				
				for (i = 0; i < nb; i++) { //boucle pour afficher tous les elements dans la liste
	
					pers = membre[i].split('*'); //On s�pare le code, le nom et le pr�nom
					selectMembre.options[i].value = pers[0];//le code personne devient la valeur de la liste
					selectMembre.options[i].text = pers[1] + " " + pers[2];// le texte de la liste est compos� de la concatenation du nom et du pr�nom
				}
				
			selectMembre.options[0].selected = 'selected';
			}
		},
		error:function(){ //dans le cas d��chec, envoyer un message.
		alert("perdu");
		}		
	});
	return;
}
