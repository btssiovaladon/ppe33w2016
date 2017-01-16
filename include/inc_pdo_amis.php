<?php

	include_once("include/inc_fonction.php");
	
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

/* autocompletion d'une liste d'amis,
	   Param $input = input cible de l'autocompletion */
	function prepare_listeautoAmis($input){
		
		$connex =$this->monPdo;
		$voiramis="SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";
		
		$res_amis=$connex -> prepare($voiramis);
		$res_amis->execute();
		
		while ($row_amis=$res_amis->fetch(PDO::FETCH_OBJ)) {
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
	
	
	function prepare_listeautoComm($input){
		
		$connex =$this->monPdo;
		$voircomis="SELECT NOM_COMMISSION FROM COMMISSION";
		
		$res_comm=$connex -> prepare($voircomis);
		$res_comm->execute();
		
		while ($row_comm=$res_comm->fetch(PDO::FETCH_OBJ)) {
			$nom = $row_comm->NOM_COMMISSION;
			$liste_comm[] = $nom;

		}
		
		$res_comm->closeCursor();
		
		
		
		?>
		<script>	

			var listecomm = <?php echo json_encode($liste_comm); ?>;
			$(<?php echo "'#".$input."'"; ?>).autocomplete({
				source : listecomm,
				autofocus:true
			});
		</script>
		<?php 
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



	public function pdo_get_action(){
		$req = "select num_action, num_amis, num_commission, nom_action, duree_action, datedebut_action, fondscollectes_action from action";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}


	public function pdo_get_amis(){
		$req = "select num_amis, nom_amis, prenom_amis, telephonefixe_amis, telephoneportable_amis, email_amis, numadresse_amis, adresserue_amis, adresseville_amis, dateentree_amis, num_amis_1, num_amis_2, num_commission, num_commission_1 from amis";
		$rs =$this->monPdo->query($req);
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

		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}



		/**
		* Fonction qui récupère la liste de toutes les commissions
		*/
		public function pdo_get_commission(){
			$req = "select num_commission, nom_commission from commission";
			$rs = $this->monPdo->query($req);
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
			$rs =$this->monPdo->query($req);
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

			public function pdo_get_partdiner($id){
		$req = "SELECT NOM_AMIS,PRENOM_AMIS,NOMBRE_DE_PERSONNES,d.NUM_DINER
		        FROM manger m INNER JOIN diner d ON m.NUM_DINER=d.NUM_DINER INNER JOIN amis a ON m.NUM_AMIS=a.NUM_AMIS
		       	WHERE m.NUM_DINER = '$id'";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}

	////////////////////////////
		/*    FONCTION insert       */
	////////////////////////////


		public function ajouterNewDiner($lieu,$date,$prix){

			$AjoutDiner="INSERT INTO diner(LIEU_DINER,DATE_DINER,PRIXDINER_DINER) VALUES (?,?,?)";
			$resAjoutDiner=$this->monPdo->prepare($AjoutDiner);


				$date=dateFrancaisVersAnglais($date);
				
				$resAjoutDiner ->bindValue(1,$lieu);
				$resAjoutDiner ->bindValue(2,$date);
				$resAjoutDiner ->bindValue(3,$prix);
				$resAjoutDiner->execute();
			

		}   
	//////////////////////////// 
		/*    FONCTION insert       */
	////////////////////////////

		public function pdo_add_amis_action($numAmis,$numAction){
			$req ="INSERT INTO participer VALUES(".$numAmis.",".$numAction.")";
			$rs = $this->monPdo->query($req); }


    
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
               where num_action = :numAction";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute(array('numAction' => $numAction));
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
    
    function chercherNumAmis($nom, $prenom){
		$connex = $this->monPdo;
		
		$req="SELECT NUM_AMIS FROM AMIS WHERE PRENOM_AMIS = :param1 AND NOM_AMIS = :param2";
		$res=$connex -> prepare($req);
			$res->execute(array(
			'param1'=>$prenom,
			'param2'=>$nom));
		
		$num = 0;
		
		while ($row=$res->fetch(PDO::FETCH_OBJ)) {
			$num = $row->NUM_AMIS;
		}
		
		return $num;
	}
    
    function selectAmis(){
		$connex =$this->monPdo;
		$voiramis="SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";
		
		$res_amis=$connex -> prepare($voiramis);
		$res_amis->execute();
		
		while ($row_amis=$res_amis->fetch(PDO::FETCH_OBJ)) {
			$nom = $row_amis->NOM_AMIS;
			$prenom = $row_amis->PRENOM_AMIS;
			$liste_amis[] = $nom." ".$prenom;
		}
		
		$res_amis->closeCursor();
		
		return $liste_amis;
	}
	
	function selectCommission(){
		$connex =$this->monPdo;
		$voircomis="SELECT NOM_COMMISSION FROM COMMISSION";
		
		$res_comm=$connex -> prepare($voircomis);
		$res_comm->execute();
		
		while ($row_comm=$res_comm->fetch(PDO::FETCH_OBJ)) {
			$nom = $row_comm->NOM_COMMISSION;
			$liste_comm[] = $nom;
		}
		
		$res_comm->closeCursor();
		
		return $liste_comm;
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
    
    function ajouteAmis($liste){
		$connex = $this->monPdo;
		
		$parrain1 = explode(" ",$liste[9]);
		$parrain2 = explode(" ",$liste[10]);
		
		$num_parrain1 = $this ->chercherNumAmis($parrain1[0],$parrain1[1]);
		$num_parrain2 = $this ->chercherNumAmis($parrain2[0],$parrain2[1]);
		
		$ajoutamis="INSERT INTO AMIS (NOM_AMIS, PRENOM_AMIS, TELEPHONEFIXE_AMIS, TELEPHONEPORTABLE_AMIS, EMAIL_AMIS, NUMADRESSE_AMIS, ADRESSERUE_AMIS, ADRESSEVILLE_AMIS, DATEENTREE_AMIS, NUM_AMIS_1, NUM_AMIS_2, NUM_COMMISSION, NUM_COMMISSION_1) VALUES(:param1,:param2,:param3,:param4,:param5,:param6,:param7,:param8,:param9,:param10,:param11,:param12,:param13)";
		$res=$connex -> prepare($ajoutamis);
		$res->execute(array(
		'param1'=>$liste[0],
		'param2'=>$liste[1],
		'param3'=>$liste[2],
		'param4'=>$liste[3],
		'param5'=>$liste[4],
		'param6'=>$liste[5],
		'param7'=>$liste[6],
		'param8'=>$liste[7],
		'param9'=>$liste[8],
		'param10'=>$num_parrain1,
		'param11'=>$num_parrain2,
		'param12'=>$liste[11],
		'param13'=>$liste[12]));
			
			
		$res->closeCursor();
	}

    
////////////////////////////
/*    FONCTION update        */
////////////////////////////


    public function pdo_maj_action($numAction, $numAmis, $numCommission, $nomAction, $dureeAction, $datedebAction, $fondscollectesAction){
		$req = "update action set num_amis = :numAmis, num_commission = :numCommission, nom_action = :nomAction, duree_action = :dureeAction, datedebut_action = :datedebAction, fondscollectes_action = :fondscollectesAction
        where num_action = :numAction";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute(array(
            'numAmis' => $numAmis,
            'numCommission' => $numCommission,
            'nomAction' => $nomAction,
            'dureeAction' => $dureeAction,
            'datedebAction' => $datedebAction,
            'fondscollectesAction' => $fondscollectesAction,
            'numAction' => $numAction));
	}


	////////////////////////////
			/*    FONCTION update        */
	////////////////////////////


			public function modif_partdiner($id,$nbpers){
				$req = "UPDATE manger SET nbpers='$nbpers' where num_diner='$id'";
				$this -> monPdo->exec($req);

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
					$this->monPdo->exec($req);
				}

			}

	}
    
////////////////////////////
/*    FONCTION delete        */
////////////////////////////

	public function pdo_sup_partdiner($id){
		$req = "delete from manger where num_diner= :id";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute(array('id' => $id));
	}

    public function pdo_sup_action($numAction){
		$req = "delete from action where num_action = :numAction";
		$rs = $this->monPdo->prepare($req);
        $rs -> execute(array('numAction' => $numAction));
	}
	
	public function pdo_sup_participant($Num_Amis, $Num_Action){
		$req = "delete from participer where NUM_AMIS =? and NUM_ACTION =?";
		
		$req =$this->monPdo->prepare($req);
		
		$param[0] = $Num_Amis;
		$param[1] = $Num_Action;
		print_r($param);
		$req->execute($param);
	}
	
	
	function chercherNumAmis($nom, $prenom){
		$connex = $this->monPdo;
		
		$req="SELECT NUM_AMIS FROM AMIS WHERE PRENOM_AMIS = :param1 AND NOM_AMIS = :param2";
		$res=$connex -> prepare($req);
			$res->execute(array(
			'param1'=>$prenom,
			'param2'=>$nom));
		
		$num = 0;
		
		while ($row=$res->fetch(PDO::FETCH_OBJ)) {
			$num = $row->NUM_AMIS;
		}
		
		return $num;
	}
	
	function ajouteAmis($liste){
		$connex = $this->monPdo;
		
		$parrain1 = explode(" ",$liste[9]);
		$parrain2 = explode(" ",$liste[10]);
		
		$num_parrain1 = $this ->chercherNumAmis($parrain1[0],$parrain1[1]);
		$num_parrain2 = $this ->chercherNumAmis($parrain2[0],$parrain2[1]);
		
		$ajoutamis="INSERT INTO AMIS (NOM_AMIS, PRENOM_AMIS, TELEPHONEFIXE_AMIS, TELEPHONEPORTABLE_AMIS, EMAIL_AMIS, NUMADRESSE_AMIS, ADRESSERUE_AMIS, ADRESSEVILLE_AMIS, DATEENTREE_AMIS, NUM_AMIS_1, NUM_AMIS_2, NUM_COMMISSION, NUM_COMMISSION_1) VALUES(:param1,:param2,:param3,:param4,:param5,:param6,:param7,:param8,:param9,:param10,:param11,:param12,:param13)";
		$res=$connex -> prepare($ajoutamis);
		$res->execute(array(
		'param1'=>$liste[0],
		'param2'=>$liste[1],
		'param3'=>$liste[2],
		'param4'=>$liste[3],
		'param5'=>$liste[4],
		'param6'=>$liste[5],
		'param7'=>$liste[6],
		'param8'=>$liste[7],
		'param9'=>$liste[8],
		'param10'=>$num_parrain1,
		'param11'=>$num_parrain2,
		'param12'=>$liste[11],
		'param13'=>$liste[12]));
			
			
		$res->closeCursor();
	}
	
	
	function selectAmis(){
		$connex =$this->monPdo;
		$voiramis="SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";
		
		$res_amis=$connex -> prepare($voiramis);
		$res_amis->execute();
		
		$liste_amis = array();
		
		while ($row_amis=$res_amis->fetch(PDO::FETCH_OBJ)) {
			$nom = $row_amis->NOM_AMIS;
			$prenom = $row_amis->PRENOM_AMIS;
			$liste_amis[] = $nom." ".$prenom;
		}
		
		$res_amis->closeCursor();
		
		return $liste_amis;
	}
	
	function selectCommission(){
		$connex =$this->monPdo;
		$voircomis="SELECT NOM_COMMISSION FROM COMMISSION";
		
		$res_comm=$connex -> prepare($voircomis);
		$res_comm->execute();
		
		while ($row_comm=$res_comm->fetch(PDO::FETCH_OBJ)) {
			$nom = $row_comm->NOM_COMMISSION;
			$liste_comm[] = $nom;
		}
		
		$res_comm->closeCursor();
		
		return $liste_comm;
	}
	
	/* autocompletion d'une liste d'amis,
	   Param $input = input cible de l'autocompletion */
	function prepare_listeautoAmis($input){
		
		$connex =$this->monPdo;
		$voiramis="SELECT NOM_AMIS, PRENOM_AMIS FROM AMIS";
		
		$res_amis=$connex -> prepare($voiramis);
		$res_amis->execute();
		
		while ($row_amis=$res_amis->fetch(PDO::FETCH_OBJ)) {
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
	
	
	function prepare_listeautoComm($input){
		
		$connex =$this->monPdo;
		$voircomis="SELECT NOM_COMMISSION FROM COMMISSION";
		
		$res_comm=$connex -> prepare($voircomis);
		$res_comm->execute();
		
		while ($row_comm=$res_comm->fetch(PDO::FETCH_OBJ)) {
			$nom = $row_comm->NOM_COMMISSION;
			$liste_comm[] = $nom;
		}
		
		$res_comm->closeCursor();
		
		
		
		?>
		<script>	

			var listecomm = <?php echo json_encode($liste_comm); ?>;
			$(<?php echo "'#".$input."'"; ?>).autocomplete({
				source : listecomm,
				autofocus:true
			});
		</script>
		<?php 
	}
}

?>