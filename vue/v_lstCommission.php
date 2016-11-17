<!-- Inclure entete et pied de page -->

<div>
<h2>Saisie du bureau de la commission</h2>
<h3>Commission à sélectionner : </h3>

	<form action="index.php?controleur=c_commission&action=a_saisieMembre" method="post">
		<div>
			<p>
				<label for="lstCommmissions">Commission : </label>
				<select name="lstCommmissions" id="lstCommissions" size="1">
					<?php 
					
						foreach($lesCommissions as $uneCommission) {
							$idCommission = $uneCommission['num_commission'];
							$nomCommission = $uneCommission['nom_commission'];
							
							$idCommissionChoisie = $idCommission;
							
							/*if($idCommissionChoisie == $commissionSelection) {
								?>
									<option selected value="<?php echo $idCommission ?>"><?php echo $nomCommission ?></option>
								<?php
							}
							*/
							?>
							
								<option value="<?php echo $idCommission ?>"><?php echo $nomCommission ?></option>
						
							<?php
						}
					
					?>
				</select>
				
				<input id="validerCommission" name="validerCommission" type="submit" value="Valider" size="20" />
			</p>
		</div>
	</form>


</div>