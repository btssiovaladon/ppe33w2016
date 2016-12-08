<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">

function js_choix_action(action){
	$.ajax({
		url:"index.php?controleur=c_action&action=a_choix_action",
		type:"POST",
		data:"num_action="+action,
		success:function(reponse){
	
			$('#tableau_action').html(reponse);
		
		//success:function(reponse){
		//	$('#tableau_action').html(reponse);
			
			//var tableau_action=document.getElementById("tableau_action");
			//tableau_action.InnerHTML=reponse;
		},
		error:function(){
			
		alert("error");
		}
	});
}

</script>


<?php
echo 'Recherche une activité ';

 echo '<FORM>
 <SELECT name="activite" size="1" onchange="javascript:js_choix_action(this.value)">';
 foreach($listeAction as $ligne){
	 echo '<OPTION value="'.$ligne['num_action'].'">'.$ligne['nom_action']."</OPTION>";
}
echo '</SELECT>
  </FORM>';
  
?>
<div id="tableau_action"></div>
