<?php
include('../include/inc_pdo_amis.php');

//echo'manger';

$action=$_REQUEST['action'];
switch($action){
	case'ajoutdiner':
     // echo'Coucou';
		include("vue/v_diner_form.php");
		break;
	case'sauvediner':
	//echo'Coucou';
	$lieu= $_POST['LieuDiner'];


$monPdo->ajouterNewDiner($lieu,$date,$prix);	
	include("vue/v_infosdiner.php");
		break;

	case'affichemenus':	
		include("vue/v_dinertableau.php");
		break;


}




?>
