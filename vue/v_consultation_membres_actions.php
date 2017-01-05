<?php
$listeAA=$pdo->pdo_get_amis_action();
$num_action = 2;
?>

<table border="1">
<tr>

<td>Code</td>
<td>Nom</td>
<td>Prenom</td>
<td>Rôle</td>
<td>Supprimer l'activité</td>
</tr>

<?php foreach($listeAA as $ligne){ ?>
<?php echo '<tr>'; ?>
<?php echo '<td>'.$ligne['NUM_AMIS'].'</td>'; ?>
<?php echo '<td>'.$ligne['NOM_AMIS'].'</td>'; ?>
<?php echo '<td>'.$ligne['PRENOM_AMIS'].'</td>'; ?>
<?php echo '<td> <FORM> <SELECT name="activite" size="1" onchange="">';
	  echo '<OPTION value="0"> Participant </OPTION>';
	  echo '<OPTION value="1"> Chef </OPTION>';
	  echo '</SELECT> </FORM></td>';
?>
<?php echo '<td>'.'<a href="index.php?controleur=c_action&action=a_deleteParticipant&num_action='.$num_action.'&num_amis='.$ligne['NUM_AMIS'].'" onclick="return confirm(\'Voulez-vous supprimer ce participant ?\');"> SUPPRIMER </td>'; ?>
	
<?php echo '</tr>'; ?>
<?php } ?>
</table>