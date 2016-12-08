<?php

include("./include/inc_entete.php");
?>
<!-- corps du texte -->
<form method="POST" action="index.php?controleur=c_exempleEntetePied&action=afficher">
	<input type="text" name="nom" value="" hint="nom"/> 
	<input type="submit" name="valider" value="valider"/> 
</form>
 
<?php
include("./include/inc_pied.php");

?>