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
		$req = "select * from action";
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
