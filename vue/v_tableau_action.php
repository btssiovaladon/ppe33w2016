<?php
$res=$pdo->pdo_get_action();
$tab;
foreach($res as $ligne){
	 if ($ligne['num_action']==$num_action){
		 $tab = $ligne;
	 }
}

?>

<table BORDER="1"> 
<tr>
<td>Nom Activite</td>
<td>Ajouter un participant</td>
<td>Consulter</td>
<td>Modifier l'activite</td>
<td>Supprimer l'activite</td>
<td>Imprimer</td>
<td>Imprimer etiquette</td>
</td>
<tr>
<td><?php echo $tab['nom_action']; ?></td>
<!-- FAIRE les liens vers tout les controleur !-->
<td> <!--<a href="index.php?controleur=controleurajout&$num_action=$num_action">!-->LIEN AJOUT PARTICIPANT</a> </td>
<td> LIEN CONSULTER </td>
<td><a href="index.php?controleur=c_action&action=a_updateAction&num_action=<?php echo $num_action; ?>">MODIFIER </td>
<td> LIEN SUPPRIMER L'ACTIVITE </td>
<td> LANCER IMPRESSION </td>
<td> LANCER IMPRESSION ETIQUETTE </td>
</tr>
</table>
