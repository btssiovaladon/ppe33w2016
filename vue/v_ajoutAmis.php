<?php 
	include("vue/v_entete.php");
	if (isset($_POST['submit'])) {
		$liste = array(
			$_POST['nom'], 
			$_POST['prenom'], 
			$_POST['telf'], 
			$_POST['telp'], 
			$_POST['email'],  
			$_POST['cp'], 
			$_POST['rue'], 
			$_POST['ville'], 
			date("Y-m-d"), 
			$_POST['parrain1'],
			$_POST['parrain2'],
			1,2);
		
		$pdo -> ajouteAmis($liste);
	}
?>
	

<h2>Création d'un ami</h2>
<form id="formulaire" action="#" method="POST">
	<div id="firstwrapper">
		<fieldset id="edit">
			<div id="secondwrapper">
			
				<label class="labelprenom" for="prenom">Prénom:</label>
				<input type="text" name="prenom" id="prenom" class="labelinput" />
				<br />
				<label class="labelnom" for="nom">Nom :</label>
				<input type="text" name="nom" id="nom" class="labelinput" />
				<br />
				<label class="labeltelf" for="telf">Telephone fixe :</label>
				<input type="text" name="telf" id="telf" class="labelinput" />
				<br />
				<label class="labeltelp" for="telp">Telephone portable :</label>
				<input type="text" name="telp" id="telp" class="labelinput" />
				<br />
				<label class="labelemail" for="end">Email :</label>
				<input type="text" name="email" id="email" class="labelinput" />
				<br />
				<label class="labelrue" for="rue">Rue :</label>
				<input type="text" name="rue" id="rue" class="labelinput" />
				<br />
				<label class="labelcp" for="cp">Code Postal :</label>
				<input type="text" name="cp" id="cp" class="labelinput" />
				<br />
				<label class="labelville" for="ville">Ville :</label>
				<input type="text" name="ville" id="ville" class="labelinput" />
				<br />
				<label class="labelparrain1" for="parrain1">Parrain 1 :</label>
				<input type="text" name="parrain1" id="parrain1" class="labelauto" />
				<br />
				<label class="labelfparrain2" for="parrain2">Parrain 2 :</label>
				<input type="text" name="parrain2" id="parrain2" class="labelauto" />
				<br />
				<label class="labelcommission1" for="commission1">Commission 1 :</label>
				<input type="text" name="commission1" id="commission1" class="labelauto" />
				<br />
				<label class="labelcommission2" for="commission2">Commission 2 :</label>
				<input type="text" name="commission2" id="commission2" class="labelauto" />
				<br />
			</div>
			<input type="submit" name="submit" id="submit" class="bouton" value="Ajouter"/>
		</fieldset>
	</div>
</form>

<?php	
	$pdo -> prepare_listeautoAmis("parrain1"); 
	$pdo -> prepare_listeautoAmis("parrain2"); 	
	$pdo -> prepare_listeautoComm("commission1");
	$pdo -> prepare_listeautoComm("commission2");
	$liste_amish = $pdo -> selectAmis();
	include("vue/v_pied.php");
?>

	
<script>
	$( "#submit" ).click(function() {
		var total = 0;
		var doublon = 0;
		
		var listeamish = <?php echo json_encode($liste_amish); ?>;
		var monptitami = $("#nom").val() + " " + $("#prenom").val();
		for (var i = 0; i < listeamish.length ;i++){
			if(monptitami == listeamish[i]){
				total = total + 1;
				$("#nom").css("border-color","#f00");
				$("#prenom").css("border-color","#f00");
				doublon = 1;
			}
		}
		
		
		if($("#nom").val().length == 0){
			total = total + 1;
			$("#nom").css("border-color","#f00");
		}
		
		if($("#prenom").val().length == 0){
			$("#prenom").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#parrain1").val().length == 0){
			$("#parrain1").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#parrain2").val().length == 0){
			$("#parrain2").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#commission1").val().length == 0){
			$("#commission1").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#commission2").val().length == 0){
			$("#commission2").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#commission1").val() == $("#commission2").val()){
			$("#commission1").css("border-color","#f00");
			$("#commission2").css("border-color","#f00");
			doublon = doublon + 1;

		}
			
		if($("#parrain1").val() == $("#parrain2").val()){
			$("#parrain1").css("border-color","#f00");
			$("#parrain2").css("border-color","#f00");
			doublon = doublon + 1;
		}
		
		if($("#telf").val().length != 10){
			$("#telf").css("border-color","#f00");
			total = total + 1;
		}
		
		if(isNaN($("#telf").val()) == true){
			$("#telf").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#telp").val().length != 10){
			$("#telp").css("border-color","#f00");
			total = total + 1;
		}
		
		if(isNaN($("#telp").val()) == true){
			$("#telp").css("border-color","#f00");
			total = total + 1;
		}
		
		var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
		if($("#email").val().length == 0 || !regex.test($("#email").val())){
			$("#email").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#rue").val().length == 0){
			$("#rue").css("border-color","#f00");
			total = total + 1;
		}
		
		var regexpostal = /^((0[1-9])|([1-8][0-9])|(9[0-8])|(2A)|(2B))[0-9]{3}$/;
		if($("#cp").val().length == 0 || !regexpostal.test($("#cp").val())){
			$("#cp").css("border-color","#f00");
			total = total + 1;
		}
		
		if($("#ville").val().length == 0){
			$("#ville").css("border-color","#f00");
			total = total + 1;
		}
		
		if(total > 0){
			if(doublon > 0){
				swal({
					title: "Erreur!",
					text: "Doublon présent!",
					type: "error"
				});
			}
			else{
				swal({
					title: "Erreur!",
					text: "Vérifier le formulaire",
					type: "error"
				});
			}
			return false;
		}
		else{
			// $("#submit").change(function() {
			return true;
			// });
		}
		
	});
</script>