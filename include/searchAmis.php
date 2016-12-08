<?php
$monPdo = new PDO("mysql:host=localhost;dbname=ppeamis",'root','');
$monPdo->query("SET CHARACTER SET utf8");

$term = $_GET['term'];
  $requete = "SELECT num_amis, NOM_AMIS, prenom_amis FROM amis WHERE NOM_AMIS LIKE '".$term."%' OR prenom_amis LIKE '".$term."%'"; // j'effectue ma requête SQL grâce au mot-clé LIKE

$rs = $monPdo->query($requete);

$array = array(); // on créé le tableau

while($ligne = $rs->fetch()) // on effectue une boucle pour obtenir les données
{
    array_push($array,$ligne['num_amis']." ".$ligne['NOM_AMIS']." ".$ligne['prenom_amis']); // et on ajoute celles-ci à notre tableau
}
echo json_encode($array); // il n'y a plus qu'à convertir en JSON
?>
