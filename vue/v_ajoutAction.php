<?php
$res_amis = $pdo->pdo_get_amis();
$res_commission = $pdo->pdo_get_commission();
?>
<FORM method="POST" action="index.php?controleur=c_action&action=a_enregistrement_action">
Nom action <br>
<input type="text" name="nom_action"><br>
<?php
echo 'Amis <SELECT name="num_amis" size="1">';
foreach ($res_amis as $ligne) {
    echo '<OPTION value="' . $ligne['num_amis'] . '">' . $ligne['nom_amis'] . "</OPTION>";
}
echo '</SELECT></br>';

echo 'Commission <SELECT name="num_commission" size="1">';
foreach ($res_commission as $ligne) {
    echo '<OPTION value="' . $ligne['num_commission'] . '">' . $ligne['nom_commission'] . "</OPTION>";
}
echo '</SELECT></br>';
?>
durée action</br>
<input type="text" name="duree_action"><br>
date_html</br>
<input type="date" name="datedebut_action"><br>
<input type="submit" name="validation" value="valider"><br> 
<!-- faire apparaitre un message comme quoi l'ajout a eut lieu , et renvoyer au menu principal !-->
</form>
