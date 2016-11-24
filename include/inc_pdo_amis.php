<?php
class Pdo_amis{
      	private $serveur='mysql:host=localhost';
      	private $bdd='dbname=ppeamis';   		
      	private $user='root' ;    	
      	private  $mdp='' ;
		private  $monPdo;
		
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
    
    public function pdo_get_commission(){
		$req = "select num_commission, nom_commission from commission";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}
	
	public function pdo_get_action_mehdi_dylan_louis_pastouche($req){
		$rs = $this->monPdo->query($req);
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
    
////////////////////////////
/*    FONCTION delete        */
////////////////////////////

}
?>