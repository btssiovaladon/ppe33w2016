<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/modpartdiner.js"></script>
<?php
include("../include/inc_pdo_amis.php");

$iddiner = 1;
$pdo= new Pdo_amis();
$listeparticipants=$pdo->pdo_get_partdiner($iddiner);
?>

<page>
   <h1 style="align-text:center">Tableau des dîners</h1>  	   
		   <table id = "confirm" border=1>
		   
		    <tr>
            	<th>Nom</th>
            	<th>Prénom</th>
            	<th>Nombre d'invités</th>
            	<th>Actions sur le dîner</th>
			</tr>

<?php
      foreach ($listeparticipants as $la){
			    ?>
      <tr id="row<?php echo $la['id'];?>">
            <td id="nom_amis<?php echo $la['id'];?>"><?php echo $la['NOM_AMIS'];?></td>
            <td id="prenom_amis<?php echo $la['id'];?>"><?php echo $la['PRENOM_AMIS'];?></td>
            <td id="nbpers_amis<?php echo $la['id'];?>"><?php echo $la['NOMBRE_DE_PERSONNES'];?></td>
            <td><input type='button' class="edit_button" id="edit_button<?php echo $row['id'];?>" value="Editer" onclick="edit_row('<?php echo $row['id'];?>');">
            <input type='button' class="save_button" id="save_button<?php echo $row['id'];?>" value="Sauvegarder" onclick="save_row('<?php echo $row['id'];?>');">
            <input type='button' class="delete_button" id="delete_button<?php echo $row['id'];?>" value="Supprimer" onclick="delete_row('<?php echo $row['id'];?>');"></td>
	</tr><?php
		  }?>

</table>
