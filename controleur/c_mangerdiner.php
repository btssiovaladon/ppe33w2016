<?php


$action=$_REQUEST['action'];
switch($action){
	case'ajoutdiner':
    
		include("vue/v_diner_form.php");
		break;
	case'sauvediner':
	
	$lieu=$_POST['LieuDiner'];
	$date=$_POST['DateDiner'];
	$prix=$_POST['PrixDinner'];

$pdo->ajouterNewDiner($lieu,$date,$prix);	

	include("vue/v_diner_form.php");
		break;

	case'affichemenus':	
		include("vue/v_dinertableau.php");
		break;

}

?>
