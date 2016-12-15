<?php

require_once("include/inc_fonction.php");
require_once ("include/inc_pdo_amis.php");

$estConnecte=new Pdo_amis();
session_start();



if(!isset($_REQUEST['controleur']) || !$estConnecte){
     $_REQUEST['controleur'] = 'connexion';
}
$controleur = $_REQUEST['controleur'];
switch($controleur){
	case 'c_mangerdiner':{
		include("controleur/c_mangerdiner.php");
        break;
	}

}

?>
