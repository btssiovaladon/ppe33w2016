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

if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $nbpers=$_POST['nbpers_val'];

 modif_partdiner($row);
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
pdo_sup_partdiner($id)
 echo "success";
 exit();
}

?>
