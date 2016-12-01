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
	}

    
    public function pdo_get_actionSelect($numAction){
		$req = "select num_action, nom_action, duree_action, datedebut_action, fondscollectes_action from action
               where num_action = '$numAction'";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	
	
    public function pdo_get_amisAction($numAmis){
		$req = "select num_amis, nom_amis, prenom_amis from amis
                where num_amis = '$numAmis'";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetch();
        $amisAction = $ligne['nom_amis'].' '.$ligne['prenom_amis'];
		return $amisAction;
	}
    
    public function pdo_get_commissionAction($numCommission){
		$req = "select * from commission
                where num_commission = '$numCommission'";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetch();
        $commissionAction = $ligne['nom_commission'];
		return $commissionAction;
	}
	  
    
////////////////////////////
/*    FONCTION insert       */
////////////////////////////
        
    
////////////////////////////
/*    FONCTION update        */
////////////////////////////
    
    public function pdo_maj_action($numAction, $numAmis, $numCommission, $nomAction, $dureeAction, $datedebAction, $fondscollectesAction){
		$req = "update action set num_amis = '$numAmis', num_commission = '$numCommission', nom_action = '$nomAction', duree_action = '$dureeAction', datedebut_action = '$datedebAction', fondscollectes_action = '$fondscollectesAction'
        where num_action = '$numAction'";
		$this->monPdo->exec($req);
	}
    
////////////////////////////
/*    FONCTION delete        */
////////////////////////////

    
    public function pdo_sup_action($numAction){
		$req = "delete from action where num_action = '$numAction'";
		$this->monPdo->exec($req);
	}
    
}
?>