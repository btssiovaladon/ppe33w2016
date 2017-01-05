<?php
$action = $_REQUEST['action'];

switch($action){
    case 'a_getAction':{
        $listeAction=$pdo->pdo_get_action();	
        if($listeAction == null){
            echo "<h2>Il n'y a aucune action existante !!!</h2>";
        }
        else{
            include("vue/v_tabAction.php");
        }
        break;
    }
	
	case 'a_ajoutAction':{
		include("vue/v_ajoutAction.php");
        break;
	}
	
	case 'a_consultation_participant':{
		include("vue/v_consultation_membres_actions.php");
        break;
	}
	
	case 'a_choix_action':{
		$num_action=$_POST['num_action'];
        include("vue/v_tableau_action.php");
        break;
    }

    case 'a_updateAction':{
        $numAc = $_GET['num_action'];
        $infosAction = $pdo -> pdo_get_actionSelect($numAc);
        $listeAmis = $pdo -> pdo_get_amis();
        $listeCommission = $pdo -> pdo_get_commission();

        include("vue/v_modifAction.php");
		break;
	}
	
    case 'a_submitAction':{
        $pdo -> pdo_maj_action($_POST['numaction'], $_POST['idAmis'], $_POST['idCommission'], $_POST['nomaction'], $_POST['dureeaction'], $_POST['dateaction'], $_POST['fondsaction']);
        
        $listeAction=$pdo->pdo_get_action();	
        if($listeAction == null){
            echo "<h2>Il n'y a aucune action existante !!!</h2>";
        }
        else{
            include("vue/v_tabAction.php");
        }
        break;
    }
	
    case 'a_deleteAction':{
        $numAc = $_GET['num_action'];
        $pdo -> pdo_sup_action($numAc);

        $listeAction=$pdo->pdo_get_action();	
        if($listeAction == null){
            echo "<h2>Il n'y a aucune action existante !!!</h2>";
        }
        else{
            include("vue/v_tabAction.php");
        }
        break;
    }
	
	case 'a_deleteParticipant':{
		$numAc = $_GET['num_action'];
		$numAmis = $_GET['num_amis'];

        $pdo -> pdo_sup_participant($numAmis,$numAc);
		include("vue/v_consultation_membres_actions.php");
        break;
	}
	
    case 'a_addAmi_action':{
        include("vue/v_ajoutAmisTache.php");
        break;
    }
	case 'a_enregistrement_action':{
		$nom_action=$_POST['nom_action'];
		$num_amis=$_POST ['num_amis'];
		$num_commission=$_POST ['num_commission'];
		$duree_action=$_POST ['duree_action'];
		$datedebut_action=$_POST ['datedebut_action'];
		$pdo -> pdo_add_action($nom_action,$num_amis,$num_commission,$duree_action,$datedebut_action);
	} 

}
?>
