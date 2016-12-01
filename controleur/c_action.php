<?php
$action = $_REQUEST['action'];

switch($action){
    case 'a_getAction':{
        $listeAction = $pdo -> pdo_get_action();
        if($listeAction == null){
            echo "<h2>Il n'y a aucune action existante !!!</h2>";
        }
        else{
            include("vue/v_modifAction.php");
        }
        break;
    }
    case 'a_addAmi_action':{
        include("vue/v_ajoutAmisTache.php");
        break;
    }
}
?>
