var listeamis = <?php echo json_encode($liste_amis); ?>;
				$(<?php echo "'#".$input."'"; ?>).autocomplete({
					source : listeamis,
					autofocus:true
				});
