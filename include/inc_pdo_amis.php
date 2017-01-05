<?php
class Pdo_amis{
      	private $serveur='mysql:host=localhost';
      	private $bdd='dbname=ppeamis';
      	private $user='root' ;
      	private $mdp='' ;
		private $monPdo;

/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */
	function __construct(){
    	$this->monPdo = new PDO($this->serveur.";".$this->bdd,$this->user,$this->mdp);
		$this->monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		$this->monPdo = null;
	}


    /** autocomplétion **/

	function prepare_listeauto($input){

		$connex = $this->monPdo;
		$voiramis = "SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";

		$res_amis = $connex->prepare($voiramis);
		$res_amis->execute();

			while($row_amis = $res_amis->fetch(PDO::FETCH_OBJ)) {
				$nom = $row_amis->NOM_AMIS;
				$prenom = $row_amis->PRENOM_AMIS;
				$liste_amis[] = $nom." ".$prenom;
			}

			$res_amis->closeCursor();
			?>
			<script>

				var listeamis = <?php echo json_encode($liste_amis); ?>;
				$(<?php echo "'#".$input."'"; ?>).autocomplete({
					source : listeamis,
					autofocus:true
				});
			</script>
			<?php
		}


////////////////////////////
/*    FONCTION get       */
////////////////////////////


	public function pdo_get_amis_action(){ //$action
		$req = "select * FROM amis INNER JOIN participer on amis.NUM_AMIS = participer.NUM_AMIS where participer.NUM_ACTION = 2 ";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}

	public function pdo_get_action(){
		$req = "select num_action, num_amis, num_commission, nom_action, duree_action, datedebut_action, fondscollectes_action from action";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute();
		$ligne = $rs->fetchAll();
		return $ligne;
	}


    public function pdo_get_amis(){
		$req = "select num_amis, nom_amis, prenom_amis, telephonefixe_amis, telephoneportable_amis, email_amis, numadresse_amis, adresserue_amis, adresseville_amis, dateentree_amis, num_amis_1, num_amis_2, num_commission, num_commission_1 from amis";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute();
		$ligne = $rs->fetchAll();
		return $ligne;
	}

    public function pdo_get_amis_one($num_amis){
        $req = "select nom_amis, prenom_amis, telephonefixe_amis, telephoneportable_amis, email_amis, numadresse_amis, adresserue_amis, adresseville_amis, dateentree_amis, num_amis_1, num_amis_2, num_commission, num_commission_1 from amis WHERE num_amis = ".$num_amis;
        $rs =$this->monPdo->query($req);
        $ligne = $rs->fetchAll();
        return $ligne;
    }


	/**
	* Fonction qui récupère la liste de toutes les commissions
	*/
	public function pdo_get_commission(){
		$req = "select num_commission, nom_commission from commission";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute();
		$ligne = $rs->fetchAll();
		return $ligne;
	}
    
	/**
	* Fonction qui récupère la liste de toutes les fonctions
	*/
	public function pdo_get_fonction() {
		$req = "select num_fonction, num_amis, nom_fonction from fonction";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	 }


    public function pdo_get_actionSelect($numAction){
		$req = "select num_action, num_amis, num_commission, nom_action, duree_action, datedebut_action, fondscollectes_action from action
               where num_action = '$numAction'";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute();
		$ligne = $rs->fetch();
		return $ligne;
	 }

    public function pdo_get_participation($action){
        $liste = array();

        $req = "SELECT num_amis FROM participer WHERE num_action = ".$action;
        $rs = $this->monPdo->query($req);
        while($ligne = $rs->fetch())
        {
          array_push($liste,$ligne);
        }
        return $liste;
    }

    public function pdo_get_name_amis($num_amis){
        $req = "SELECT nom_amis, prenom_amis FROM amis WHERE num_amis=".$num_amis;
        $rs = $this->monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }

    public function pdo_get_leader_action($action){
        $req = "SELECT num_amis FROM action WHERE num_action=".$action;
        $rs = $this->monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }

    public function pdo_check_existence_ami_action($num_amis,$action){
        $req = " SELECT COUNT(num_amis) AS nbOccurence FROM participer WHERE num_amis = ".$num_amis." AND num_action = ".$action;
        $rs = $this->monPdo->query($req);
        $ligne = $rs->fetch();
        return $ligne;
    }
    
    public function pdo_get_cotisation(){
		$req = "select MONTANT_COTISATION from parametre";

		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

	public function rechercheDiner(){
		$req="SELECT * From diner";
		$rat=$this->monPdo->query($req);
		$ligne=$rat->fetchAll();
		return $ligne;
	}

    
//////////////////////////// 
/*    FONCTION insert       */
////////////////////////////


    public function pdo_add_amis_action($numAmis,$numAction){
        $req = "INSERT INTO participer VALUES(".$numAmis.",".$numAction.")";
        $rs = $this->monPdo->query($req);
    }
	
	/*public function pdo_add_action($nom_action,$num_amis,$num_commission,$duree_action,$datedebut_action){
		$sql="INSERT INTO 'action'('NOM_ACTION','NUM_AMIS','NUM_COMMISSION','DUREE_ACTION','DATEDEBUT_ACTION')
		VALUES('$nom_action','$num_amis','$num_commission','$duree_action','$datedebut_action')";
		//$req =$pdo->prepare($sql_ajout_action);
		$req =$pdo->prepare($sql);
		// cette méthode te retourne true/false si ça a réussi/échoué
		//$result = $req->execute($tab);
		// Du coup, on peux tester sur le retour et afficher l'erreur en cas de soucis
		if (!$result){
		// ça t'affiche juste un code. C'est suffisant en prod pour que l'utilisateur te fasse un retour
		echo "Une erreur est survenue : " . $req->errorCode();
		}
	} */
    
    public function ajouterNewDiner($lieu,$date,$prix){
        $AjoutDiner="INSERT INTO diner(NUM_DINER,LIEU_DINER,DATE_DINER, PRIXDINER_DINER) VALUES (?,?,?,?)";
	    $AjoutDiner = $this->monPdo->prepare($AjoutDiner);

        if(isset($_POST)){	
            $AjoutDiner -> bindvalue(2,$lieu['LIEU_DINER']);
            $AjoutDiner -> bindvalue(3,$date['DATE_DINER']);
            $AjoutDiner -> bindvalue(4,$prix['PRIXDINER_DINER']);
            $AjoutDiner->execute();
        }
	}

    
////////////////////////////
/*    FONCTION update        */
////////////////////////////


    public function pdo_maj_action($numAction, $numAmis, $numCommission, $nomAction, $dureeAction, $datedebAction, $fondscollectesAction){
		$req = "update action set num_amis = '$numAmis', num_commission = '$numCommission', nom_action = '$nomAction', duree_action = '$dureeAction', datedebut_action = '$datedebAction', fondscollectes_action = '$fondscollectesAction'
        where num_action = '$numAction'";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute();
	}

    public function modif_cotisation($montant){
		$req = "UPDATE  ppeamis.parametre SET  MONTANT_COTISATION ='$montant'";
		$this -> monPdo->exec($req);

	}
    
////////////////////////////
/*    FONCTION delete        */
////////////////////////////


    public function pdo_sup_action($numAction){
		$req = "delete from action where num_action = '$numAction'";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute();
	}
	
	public function pdo_sup_participant($Num_Amis, $Num_Action){
		$req = "delete from participer where NUM_AMIS =? and NUM_ACTION =?";
		
		$req =$this->monPdo->prepare($req);
		
		$param[0] = $Num_Amis;
		$param[1] = $Num_Action;
		print_r($param);
		$req->execute($param);
	}

}
?>
