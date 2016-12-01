<?php

$action = $_REQUEST['action'];

//On récupère le nom de chaque commission
$lesCommissions = $pdo->pdo_get_commission();


switch($action) {
	
	//Au chargement de la vue v_lstCommission.php
	case 'a_choixCommission' : {
		
		//On test s'il existe des commissions
		if($lesCommissions == null) {
			echo 'Pas de commissions';
		}else{
			$commission_selection = "";
			include("vue/v_saisieMembre.php");
		}
		break;
	}
	
	//Enregistrement d'un membre
	case 'a_saisieMembre' : {
		
		$commission_selection = $_POST['lstCommmissions'];
		$lesFonctions = $pdo->pdo_get_fonction();
		$nomMembre = ""; //nom du membre : aucun membre choisi pour le moment
		$fonctionMembre = $_POST['lstCommmissions']; //fonction du membre : aucune fonction choisie
		$mesAmis = $pdo->pdo_get_amis();
		include("vue/v_saisieMembre.php");
		
		break;
	}
	
	case 'a_lstMembreCommission' : {
		$lesFonctions = $pdo->pdo_get_fonction();
		$nomMembre = $_POST['NOM_PERSONNE']; //nom du membre saisi
		$fonctionMembre = $_POST['lstFonctions']; //fonction du membre choisie
		include("vue/v_lstMembreAjoute.php");
		break;
	}
	
	
}



?>
