<input type="hidden" value="<?php echo $_POST['NOM_PERSONNE']  ?>" /> <!-- nom membre -->
<input type="hidden" value="<?php echo $_POST['lstFonctions'] ?>" /> <!-- numero fonction -->


<table border="1">
	<tr>
		

	<?php
	
		foreach($lesFonctions as $uneFonction) {
			
			$idFonction = $uneFonction['num_fonction'];
			$nomFonction = $uneFonction['nom_fonction'];
			
			?>
			
			<td><?php echo $nomFonction ?></td>
			<td><!-- nom personne -->
			
			<?php
			
			
		}
	
	?>
	</tr>
</table>