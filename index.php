<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript" src="./js/jquery.js"></script>
 <script type="text/javascript" src="./js/jquery-ui/jquery-ui.min.js"></script>
 <link href="./js/sweetalert-master/dist/sweetalert.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="./js/sweetalert-master/dist/sweetalert.min.js"></script>

<?php 
    //$estConnecte=new Pdo_amis();
    //if(!isset($_REQUEST['controleur']) || !$estConnecte){
    //    $_REQUEST['controleur'] = 'connexion';
    //}
?>

<?php 
    //include("controleurs/c_connexion.php");
    require_once("include/inc_fonctions.php");
    require_once("include/inc_pdo_amis.php");
    session_start();

    $pdo = new Pdo_amis();
    $controleur = $_REQUEST['controleur'];

    switch($controleur){
            
        case 'c_action' : {
            include("controleur/c_action.php");
            break;
        }
            
        case 'c_amis' : {
			include("controleur/c_amis.php");
			break;
		}

        case 'c_commission' : {
            include("controleur/c_commission.php");
             break;
        }
            
        case 'c_mangerdiner':{
            include("controleur/c_mangerdiner.php");
            break;
        }

        case'c_releve':{
            include ("controleur/c_releve_annuel.php");
            break;
        }

        case'c_enreg_cotisation':{
            include ("controleur/c_enreg_cotisation.php");
            break;	
        }

    }
/*// inclusion de l'entete.
include("./vue/v_entete.php");
// inclusion de la zone principale.
include("./vue/v_zone-principale.php");
// inclusion du footer.
include("./vue/v_pied.php");*/
?>

