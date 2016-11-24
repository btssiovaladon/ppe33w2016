function envoipersajax(nom) {
	
	var requete = $.ajax({ // ajax :la variable requete envoie un objet XMLHttpRequest.
		url: "v_saisieMembre.php", // url de la page à charger
		type:"POST",
		data:"NOM_PERSONNE=" + escape(nom),//les données à envoyer avec l’URL.
		//cache: false, // pas de mise en cache
		
		success:function(){ // si la requête est un succès
		
			var selectMembre = document.getElementById("listeMembres"); //initialisation de la liste déroulante
			
			if(requete.responseText == '') { //normalement, requete.responseText
	
				selectMembre.length=0;
				//document.getElementById("prix").innerHTML='';
			}else {
				
				var membre,i,nb,pers;
				
				membre = requete.responseText.split('/'); 
				// personne est un tableau contenant toutes les lignes renvoyées par la requête. 
				//La fonction split() permet de scinder une chaîne de caractères et de retourner les résultats dans un tableau
				nb=membre.length; // nb contient le nombre de lignes du tableau
				selectMembre.length = nb; // ce sera donc le nombre d’éléments présents dans la liste.
				
				for (i = 0; i < nb; i++) { //boucle pour afficher tous les elements dans la liste
	
					pers = membre[i].split('*'); //On sépare le code, le nom et le prénom
					selectMembre.options[i].value = pers[0];//le code personne devient la valeur de la liste
					selectMembre.options[i].text = pers[1] + " " + pers[2];// le texte de la liste est composé de la concatenation du nom et du prénom
				}
				
			selectMembre.options[0].selected = 'selected';
			}
		},
		error:function(){ //dans le cas d’échec, envoyer un message.
		alert("perdu");
		}		
	});
	return;
}
