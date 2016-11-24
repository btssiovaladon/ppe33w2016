<?php
$action = $_REQUEST['action'];

switch($action){
    case 'a_getAction':{
        $listeAction = $pdo -> pdo_get_action();
        if($listeAction == null){
            echo "<h2>Il n'y a aucune action existante !!!</h2>";
        }
        else{
            include("vue/v_tabAction.php");
        }
        break;
    }
    case 'a_updateAction':{
        $numAc = 1;
        $nomAc = "Action 1";
        $numAm = 4;
        $nomAmisAction = $pdo -> pdo_get_amisAction($numAm);
        $numCo = 1;
        $nomCommissionAction = $pdo -> pdo_get_commissionAction($numAm);
        $listeAmis = $pdo -> pdo_get_amis();
        $listeCommission = $pdo -> pdo_get_commission();
    
        include("vue/v_modifAction.php");
    }
}
?>