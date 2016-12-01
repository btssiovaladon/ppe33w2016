<?php
$param = $pdo->pdo_get_cotisation();
$montant_cotisation = $param['MONTANT_COTISATION'];

?>
<h3>Saisie de la cotisation annuelle</h3>
<form method='POST' action='index.php?controleur=c_enreg_cotisation'>

<td>Montant de la cotisation</td>
<input name="montant"value ="<?php echo $montant_cotisation ?>" rows="1" cols="40">
</br>
</br>

<form>
<INPUT TYPE="submit" NAME="nom" VALUE="Valider">
</form>

<?php

    
?>