<html>
<head>
<meta charset="utf-8"/>
<script  src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(function() {
		$( "#datepicker" ).datepicker({
			altField: "#datepicker",
			closeText: 'Fermer',
			prevText: 'Précédent',
			nextText: 'Suivant',
			currentText: 'Aujourd\'hui',
			monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
			monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
			dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
			dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
			dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
			weekHeader: 'Sem.',
			dateFormat: 'yy/mm/dd'
		});
	});
</script>




</head>

<body>
<form  action="index.php?controleur=c_mangerdiner&action=sauvediner" method="POST">

	<h3>Votre réservation dîner</h3>
	<fieldset>
		<legend>Votre réservation </legend>

		<label for="LieuDiner">*Lieu du Diner</label>
		<input type ="text" name="LieuDiner" id="LIEU_DINER" size="12" placeholder ="Votre lieu pour manger" pattern="[A-Z][a-z]{5}"/><br/>

		<label for="DateDiner">*Date du Dîner</label>
		<input type="date" name="DateDiner" id="datepicker" size="30" value="<?php echo date('yy/m/d')?>"/><br/>





		<label for="PrixDinner">*Prix du Dîner</label>
		<input type="number" name="PrixDinner" id="PrixDinner" size="30" placeholder="Le prix du diner" pattern=[0-9999]{4}/><br/>


		<p class="submit"> <button type="submit">Ajouter</button></p>

	

</fieldset>

</form>


   <script type="text/javascript">

	
		var LieuDiner = document.getElementById("LieuDiner");

		LieuDiner.addEventListener('blur',function(){

			if(this.value.length==0){
				alert("Champs obligatoire");
			}
		}
	});

    var PrixDinner = document.getElementById("PrixDinner");

    PrixDinner.addEventListener('blur',function(){
    	if(this.value.lengt==0){
    		alert("Champs obligatoire"));
    	}
    }
}


</script>


</body>
</html>
