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
public function pdo_get_amis(){
		$req = "select num_amis, nom_amis, prenom_amis, telephonefixe_amis, telephoneportable_amis, email_amis, numadresse_amis, adresserue_amis, adresseville_amis, dateentree_amis, num_amis_1, num_amis_2, num_commission, num_commission_1 from amis";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}
		public function pdo_get_action(){
		$req = "select num_action, num_amis, num_commission, nom_action, duree_action, datedebut_action, fondscollectes_action from action";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}


	public function pdo_get_commission(){
		$req = "select num_commission, nom_commission from commission";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetchAll();
		return $ligne;
	}
 
 public function pdo_add_action($nom_action,$num_amis,$num_commission,$duree_action,$datedebut_action){
		$sql="INSERT INTO 'action'('NOM_ACTION','NUM_AMIS','NUM_COMMISSION','DUREE_ACTION','DATEDEBUT_ACTION')
		VALUES('$nom_action','$num_amis','$num_commission','$duree_action','$datedebut_action')";
		$req =$pdo->prepare($sql_ajout_action);
		// cette méthode te retourne true/false si ça a réussi/échoué
		$result = $req->execute($tab);
		// Du coup, on peux tester sur le retour et afficher l'erreur en cas de soucis
		if (!$result){
		// ça t'affiche juste un code. C'est suffisant en prod pour que l'utilisateur te fasse un retour
		echo "Une erreur est survenue : " . $req->errorCode();
		}
	}
}