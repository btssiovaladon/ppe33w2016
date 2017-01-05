<?php

$action = $_REQUEST['action'];



switch($action) {
	//Ajouter un ami
	case 'a_ajoutAmis' : {
		include("vue/v_ajoutAmis.php");
		break;
	}
}



?>