<html>
<body>

	<table>
		<tr>
			<th>lieudiner</th>
			<th>datediner</th>
			<th>Prixdiner</th>
		</tr>
		<tr>
		<?php
 
		//$info =$pdo-> ajouterNewDiner($lieu,$date,$prix);
		//foreach ($variable as $key => $value) {
		 	# 
		 //} //($info as $key ) {
			
		?>

		
		<th><?php echo $key.$lieu['lieu']?>;</th>
			<th><?php echo $key.$date['date']?>;</th>
			<th><?php echo $key.$prix['prix']?>;</th>
		</tr>
		<?php
		
		?>
	</table>
</body>

</html>