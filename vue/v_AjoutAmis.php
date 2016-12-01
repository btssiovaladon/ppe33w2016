	<?php 
		
		function connexion_bd(){
			$source='mysql:host=localhost;dbname=ppeamis';
			$user='root';
			$passwd='';
			try {
				$connex = new PDO($source, $user, $passwd,  array(
											PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
											PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
											));
				return $connex;
				
			} catch (PDOException $e) {
				//vérification de la connexion
				echo "Erreur : ".$e->getMessage();
				exit;
			}
		}
		
		
		
		
		function ajouteAmis($liste){
			$connex = connexion_bd();
			
			$parrain1 = explode(" ",$liste[9]);
			$parrain2 = explode(" ",$liste[10]);
			
			$num_parrain1 = chercherNumAmis($parrain1[0],$parrain1[1]);
			$num_parrain2 = chercherNumAmis($parrain2[0],$parrain2[1]);
			
			
			if(isset($_POST['ajouter'])){
				$ajoutamis="INSERT INTO AMIS (`NOM_AMIS`, `PRENOM_AMIS`, `TELEPHONEFIXE_AMIS`, `TELEPHONEPORTABLE_AMIS`, `EMAIL_AMIS`, `NUMADRESSE_AMIS`, `ADRESSERUE_AMIS`,  `ADRESSEVILLE_AMIS`, `DATEENTREE_AMIS`, `	NUM_AMIS_1`, `NUM_AMIS_2`) VALUES(:param1,:param2,:param3,:param4,:param5,:param6,:param7,:param8,:param9,:param10,:param11)";
				$res=$connex -> prepare($ajoutamis);
				$res->execute(array(
				'param1'=>$liste[0],
				'param2'=>$liste[1],
				'param3'=>$liste[2],
				'param4'=>$liste[3],
				'param5'=>$liste[4],
				'param6'=>$liste[5],
                'param7'=>$liste[6],
				'param8'=>$liste[7],
				'param9'=>$liste[8],
                'param10'=>$num_parrain1,
                'param11'=>$num_parrain2));
				
				unset($connex);
			}
			$res->closeCursor();
		}
		
		function selectAmis(){
			$connex = connexion_bd();
			$voiramis="SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";
			
			$res_amis=$connex -> prepare($voiramis);
			$res_amis->execute();
			
			while ($row_amis=$res_amis->fetch(PDO::FETCH_OBJ)) {
				$nom = $row_amis->NOM_AMIS;
				$prenom = $row_amis->PRENOM_AMIS;
				$liste_amis[] = $nom." ".$prenom;
			}
			
			$res_amis->closeCursor();
			
			return $liste_amis;
		}
        
        $liste_amis = selectAmis();
		print_r($liste_amis);
		
		
		function prepare_listeauto($input){
			$connex = connexion_bd();
			$voiramis="SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";
			
			$res_amis=$connex -> prepare($voiramis);
			$res_amis->execute();
			
			while ($row_amis=$res_amis->fetch(PDO::FETCH_OBJ)) {
				$nom = $row_amis->NOM_AMIS;
				$prenom = $row_amis->PRENOM_AMIS;
				$liste_amis[] = $nom." ".$prenom;
			}
			
			$res_amis->closeCursor();
			
			
			?>
			<script>	

				var listeamis = <?php echo json_encode($liste_amis); ?>;
				$(<?php echo "'#".$input."'"; ?>).autocomplete({
					source : listeamis,
					autofocus:true
				});
			</script>
			<?php 
		}
	?>
	
	
	
	
	
	<h2>Création d'un ami</h2>
	<form id="formulaire" action="#" method="POST">
		<div id="firstwrapper">
			<fieldset id="edit">
				<div id="secondwrapper">
				
					<label class="labelnom" for="nom">Nom :</label>
					<input type="text" name="nom" id="nom" class="labelinput" />
			
					<label class="labelprenom" for="prenom">Prénom:</label>
					<input type="text" name="prenom" id="prenom" class="labelinput" />
					
					<label class="labeltelf" for="telf">Telephone fixe :</label>
					<input type="text" name="telf" id="telf" class="labelinput" />
					
					<label class="labeltelp" for="telp">Telephone portable :</label>
					<input type="text" name="telp" id="telp" class="labelinput" />
					
					<label class="labelemail" for="end">Email :</label>
					<input type="text" name="email" id="email" class="labelinput" />
					
					<label class="labelrue" for="rue">Rue :</label>
					<input type="text" name="rue" id="rue" class="labelinput" />
					
					<label class="labelcp" for="cp">Code Postal :</label>
					<input type="text" name="cp" id="cp" class="labelinput" />
					
					<label class="labelville" for="ville">Ville :</label>
					<input type="text" name="ville" id="ville" class="labelinput" />
					
					<label class="labeldate" for="date">Date :</label>
					<input type="text" name="date" id="date" class="labelinput" />
					
					<label class="labelparrain1" for="parrain">Parrain 1 :</label>
					<input type="text" name="parrain1" id="parrain1" class="labelauto" />
					
					<label class="labelfparrain2" for="parrain2">Parrain 2 :</label>
					<input type="text" name="parrain2" id="parrain2" class="labelauto" />
				</div>
				<input type="submit" name="submit" id="submit" class="bouton" value="Ajouter"/>
			</fieldset>
		</div>
	</form>
	
	<?php prepare_listeauto("parrain1"); ?>
