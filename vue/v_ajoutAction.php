<?php
$res_amis = $pdo->pdo_get_amis();
$res_commission = $pdo->pdo_get_commission();
?>
<form method="POST" action="index.php?controleur=c_action&action=a_enregistrement_action">
Nom action </br>
<input type="text" name="nom_action"></br>
<?php
echo 'Amis <FORM> <SELECT name="num_amis" size="1">';
foreach ($res_amis as $ligne) {
    echo '<OPTION value="' . $ligne['num_amis'] . '">' . $ligne['nom_amis'] . "</OPTION>";
}
echo '</SELECT></FORM></br>';

echo 'Commission <FORM> <SELECT name="num_commission" size="1">';
foreach ($res_commission as $ligne) {
    echo '<OPTION value="' . $ligne['num_commission'] . '">' . $ligne['nom_commission'] . "</OPTION>";
}
echo '</SELECT> </FORM> </br>';
?>
durée action</br>
<input type="text" name="duree_action"></br>
date_html</br>
<input type="date" name="datedebut_action"></br>
<input type="submit" name="validation" value="valider"><br> 
</form>

