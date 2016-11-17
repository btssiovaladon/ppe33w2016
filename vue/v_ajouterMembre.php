<!--

Récupérer le numéro de commission 
Formulaire : liste amis avec champ autocomplétion




-->
<h1>Membres du bureau</h1>
<form action="index.php?controleur=c_commission&action=a_" method="post">
	<div>
		<p>
			<label for="">Veuillez saisir un nom : </label>
			<td align="left"><input type="text" id ="nomPers" name="NOM_PERSONNE"
			onkeyup="javascript:envoipersajax(this.value)"></td> // zone de texte
			Liste des personnes : <br />
			<select id="listePers" size="18">
			</select>
		</p>
	</div>
	




</form>