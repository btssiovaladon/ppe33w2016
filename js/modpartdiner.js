function edit_row(id)
{
 var nom=document.getElementById("nom_amis"+id).innerHTML;
 var prenom=document.getElementById("prenom_amis"+id).innerHTML;
 var nbpers=document.getElementById("nbpers_amis"+id).innerHTML;


 document.getElementById("nom_amis"+id).innerHTML="<input type='text' id='nom_text"+id+"' value='"+nom+"'>";
 document.getElementById("prenom_amis"+id).innerHTML="<input type='text' id='prenom_text"+id+"' value='"+prenom+"'>";
 document.getElementById("nbpers_amis"+id).innerHTML="<input type='text' id='nbpers_text"+id+"' value='"+nbpers+"'>";
	
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{
 var nom=document.getElementById("nom_text"+id).value;
 var prenom=document.getElementById("prenom_text"+id).value;
 var nbpers=document.getElementById("nbpers_text"+id).value;
	
 $.ajax
 ({
  type:'post',
  url:'../controleur/c_mangerdiner.php',
  data:{
   edit_row:'edit_row',
   row_id:id,
   nom_val:nom,
   prenom_val:prenom,
   nbpers_val:nbpers
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("nom_val"+id).innerHTML=nom;
    document.getElementById("prenom_val"+id).innerHTML=prenom;
    document.getElementById("nbpers_val"+id).innerHTML=nbpers;
    document.getElementById("edit_button"+id).style.display="block";
    document.getElementById("save_button"+id).style.display="none";
   }
  }
 });
}

function delete_row(id)
{
 $.ajax
 ({
  type:'post',
  url:'../controleur/c_mangerdiner.php',
  data:{
   delete_row:'delete_row',
   row_id:id,
  },
  success:function(response) {
   if(response=="success")
   {
    var row=document.getElementById("row"+id);
    row.parentNode.removeChild(row);
   }
  }
 });
}
}