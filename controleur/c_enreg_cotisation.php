<?php
/*$action = $_REQUEST['action'];
if $action == 'a_Cotisation'{*/
$montant = $_POST['montant'];
echo $montant;
$pdo->modif_cotisation($montant);
//}
?>
<td>Le montant a bien été enregistré</td>