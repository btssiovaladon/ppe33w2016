<?php
$action = $_REQUEST['action'];

switch($action){
    case 'a_getAction':{
        include("vue/v_tabAction.php");
        break;
    }
	
	case 'a_ajoutAction':{
		include("vue/v_ajoutAction.php");
        break;
	}
	
	case 'a_choix_action':{
		$num_action=$_POST['num_action'];
        include("vue/v_tableau_action.php");
        break;
    }

    case 'a_updateAction':{
        $numAc = 1;
        $nomAc = "Action 1";
        $infosAction = $pdo -> pdo_get_actionSelect($numAc);
        $numAm = 4;
        $nomAmisAction = $pdo -> pdo_get_amisAction($numAm);
        $numCo = 1;
        $nomCommissionAction = $pdo -> pdo_get_commissionAction($numAm);
        $listeAmis = $pdo -> pdo_get_amis();
        $listeCommission = $pdo -> pdo_get_commission();

        include("vue/v_modifAction.php");
		break;
	}
	
    case 'a_submitAction':{
        $pdo -> pdo_maj_action($_POST['numaction'], $_POST['idAmis'], $_POST['idCommission'], $_POST['nomaction'], $_POST['dureeaction'], $_POST['dateaction'], $_POST['fondsaction']);

        include("vue/v_tabAction.php");
        break;
    }
	
    case 'a_deleteAction':{
        $numAc = 5;
        $pdo -> pdo_sup_action($numAc);

        include("vue/v_tabAction.php");
        break;
    }
	
    case 'a_addAmi_action':{
        include("vue/v_ajoutAmisTache.php");
        break;
    }

}
?>
