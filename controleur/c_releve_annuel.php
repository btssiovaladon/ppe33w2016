<?php



$action = $_REQUEST['action'];
switch($action){
	case 'a_impression':{
		include("vue/v_releve_annuel.php");
		break;
	}
}
switch($action){
	case 'a_Cotisation':{
		include("vue/v_Cotisation.php");
		break;
	}
}
?>