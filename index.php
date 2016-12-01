
<?php 
		//include("controleurs/c_connexion.php");
	


require_once("include/inc_fonctions.php");
require_once("include/inc_pdo_amis.php");

session_start();

$pdo= new Pdo_amis();

/*if(!isset($_REQUEST['controleur']) || !$estConnecte){
     $_REQUEST['controleur'] = 'connexion';
}*/	 
$controleur = $_REQUEST['controleur'];
switch($controleur){
	case 'c_action':{
		include("controleur/c_action.php");
        break;
	}
	case'c_Cotisation':{
		include ("controleur/c_Cotisation.php");
		break;
	}
	case'c_enreg_cotisation':{
		include ("controleur/c_enreg_cotisation.php");
		break;	
}
}
?>

