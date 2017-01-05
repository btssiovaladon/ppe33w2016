<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<?php
require_once("include/inc_fonction.php");
require_once("include/inc_pdo_amis.php");

session_start();



/*
$pdo = new Pdo_amis();

$controleur = $_REQUEST['controleur'];
switch($controleur){

	case 'c_action' : {
		include("controleur/c_action.php");
		break;
	}

	case 'c_commission' : {
		include("controleur/c_commission.php");
		break;

	}
	default: {

		//inclusion de l'accueil qui contient l'entete,zone principale et pied.
		include("controleur/c_accueil.php");

	/*}
}
*/
include ("controleur/c_accueil.php");
?>
