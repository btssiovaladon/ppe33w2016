<?php

require_once("include/inc_fonction.php");
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
}

?>