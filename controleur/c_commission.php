<?php

$action = $_REQUEST['action'];




switch($action) {
	
	//Au chargement de la vue v_lstCommission
	case 'a_choixCommission' : {
		//On récupère le nom de chaque commission
		$lesCommissions = $pdo -> pdo_get_nomcommission();
		include("vue/v_lstCommission.php");
		$commissionSelection=""; //Aucune commission choisie à ce moment là
		break;
	}
	
	//Enregistrement d'un membre
	case 'a_saisieMembre' : {
		break;
	}
	
	
}

?>