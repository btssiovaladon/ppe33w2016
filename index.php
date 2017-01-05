<?php
	require_once("include/inc_fonction.php");
	require_once("include/inc_pdo_amis.php");
	
	session_start();	
	
	$pdo = new Pdo_amis();


	$controleur = $_REQUEST['controleur'];
	switch($controleur){
		
		case 'c_action' : {
			include("controleur/c_action.php");
			break;
		}
		
		case 'c_amis' : {
			include("controleur/c_amis.php");
			break;
		}
		
		case 'c_commission' : {
			include("controleur/c_commission.php");
			break;
		}

	}

?>