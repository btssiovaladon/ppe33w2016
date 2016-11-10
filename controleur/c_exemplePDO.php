<?php

include "../include/inc_pdo_amis.php";

$pdo= new Pdo_amis();

$ligne = $pdo->pdo_get_paramExemple();

print_r($ligne);

?>