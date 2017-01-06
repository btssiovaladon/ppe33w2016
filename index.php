<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php 
include("include/inc_pdo_amis.php");
 $estConnecte= new Pdo_amis();
session_start();

if(!isset($_REQUEST['controleur']) || !$estConnecte){
   $_REQUEST['controleur'] = 'connexion';}

//include("controleurs/c_connexion.php");
	
require_once("include/inc_fonctions.php");
require_once("include/inc_pdo_amis.php");
//session_start();

$pdo = new Pdo_amis();
$controleur = $_REQUEST['controleur'];

switch($controleur){

	case 'c_mangerdiner':{
		include("controleur/c_mangerdiner.php");
		break;
	}


    case 'c_action':{
        include("controleur/c_action.php");

        break;
    }

    case 'c_commission' : {
        include("controleur/c_commission.php");
         break;
    }

	case'c_releve':{
		include ("controleur/c_releve_annuel.php");
		break;
	}

    case'c_enreg_cotisation':{
		include ("controleur/c_enreg_cotisation.php");
		break;	
    }
}

?>



