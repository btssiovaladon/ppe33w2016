﻿<!-- Inclure entete et pied de page -->

<div>
<h2>Saisie du bureau de la commission</h2>
<h3>Commission à sélectionner : </h3>

	<form action="index.php?controleur=c_commission&action=a_saisieMembre" method="post">
		<div>
			<table>
				<tr>
					<td>
						<label for="lstCommmissions">Commission : </label>
					</td>
					
					<td>
						<select name="lstCommmissions" id="lstCommissions" size="1" onchange="submit()">
						<option selected>Choisir...</option>
						<?php 
						
						foreach($lesCommissions as $uneCommission) {
							$idCommission = $uneCommission['num_commission'];
							$nomCommission = $uneCommission['nom_commission'];
							
							if($idCommission == $commission_selection) {
								?>
								<option selected="selected" value="<?php echo $idCommission ?>" ><?php echo $nomCommission ?> </option>
							<?php
							}else {
								?>
								<option value="<?php echo $idCommission ?>" ><?php echo $nomCommission ?> </option>
							<?php
							}
							
						}
						
					
						?>
						</select>
					</td>
					
					<!--<td>
						<input type="submit" name="valider">
					</td>-->
				</tr>
			</table>
		
		</div>
	</form>
	
	<?php
	
	//Si la commission a été choisie
	if($commission_selection != "") {
		?>
		<form action="index.php?controleur=c_commission&action=a_lstMembreCommission" method="post">
		
		<div>
			<table>
				<tr>
					<td>
						<label for="nomMembre">Veuillez saisir un nom : </label>
					</td>
				
					<td>
						<input type="text" id="nomMembre" name="NOM_PERSONNE"
						onkeyup="javascript:envoipersajax(this.value)">
					</td>
				</tr>
			</table>
			
			
			Liste des membres : <br />
			<td>
				<select id="listeMembres" size="5">
					<option value="">Un nom</option>
				</select>
			</td>
			
			<br />
			<br />
				
			<table>	
				
				<tr>
					<td>
						<label for="nomFonction">Choisir une fonction : </label>
					</td>
					<td>
						<select id="listeFonctions" name="listeFonctions">
					
						<?php
							foreach($lesFonctions as $uneFonction) {
								$idFonction = $uneFonction["num_fonction"];
								$nomFonction = $uneFonction["nom_fonction"];
							
							?>
							
								<option value="<?php echo $idFonction ?>"><?php echo $nomFonction ?></option>
							
							<?php
						}
					
						?>
						</select>
					</td>
				</tr>
				
				<tr>
					<td>
						<input type="submit" name="valider" />
					</td>
				</tr>
			</table>
		</div>
		</form>
	<?php
	}
	
?>
</div>