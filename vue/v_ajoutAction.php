<?php
$res_amis = $pdo->pdo_get_amis();
$res_commission = $pdo->pdo_get_commission();
?>
<form method="POST" action="index.php?controleur=c_action$action=a_enregistrement_action">
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
<?php

/*if(isset($validation)) { 

	$sql_ajout_action="INSERT INTO 'action'('NOM_ACTION','NUM_AMIS','NUM_COMMISSION','DUREE_ACTION','DATEDEBUT_ACTION')
	VALUES('$nom_action','$num_amis','$num_commission','$duree_action','$datedebut_action')";
	$req =$pdo->prepare($sql_ajout_action);
	// cette méthode te retourne true/false si ça a réussi/échoué
	$result = $req->execute($tab);
	// Du coup, on peux tester sur le retour et afficher l'erreur en cas de soucis
	if (!$result){
		// ça t'affiche juste un code. C'est suffisant en prod pour que l'utilisateur te fasse un retour
		echo "Une erreur est survenue : " . $req->errorCode();
	}
}*/

echo"</form>";
?>