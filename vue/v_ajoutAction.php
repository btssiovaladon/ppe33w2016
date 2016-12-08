<form>
Nom action </br>
<input type="text" name="Nom_action"></br>
<?php
echo 'num_amis ';

$res=$pdo->pdo_get_amis();	

 echo '<FORM>
 <SELECT name="num_amis" size="1"';
 foreach($res as $ligne){
	 echo '<OPTION value="'.$ligne['num_amis'].'">'.$ligne['nom_amis']."</OPTION>";
}
echo '</SELECT>
  </FORM>';
  
?>
<!--
* NUM_ACTION : smallint(1)
* NUM_AMIS : smallint(1)
* NUM_COMMISSION : smallint(1)
* NOM_ACTION : char(32)
* DUREE_ACTION : smallint(1)
* DATEDEBUT_ACTION : date
 * FONDSCOLLECTES_ACTION 
!-->
</form>