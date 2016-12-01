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

	public function pdo_get_action_mehdi_dylan_louis_pastouche($req){
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}

  public function pdo_get_participation($action)
  {
    $liste = array();

    $req = "SELECT num_amis FROM participer WHERE num_action = ".$action;
    $rs = $this->monPdo->query($req);
    while($ligne = $rs->fetch())
    {
      array_push($liste,$ligne);
    }
		return $liste;
  }

  public function pdo_get_name_amis($num_amis)
  {
    $req = "SELECT nom_amis, prenom_amis FROM amis WHERE num_amis=".$num_amis;
    $rs = $this->monPdo->query($req);
    $ligne = $rs->fetch();
    return $ligne;
  }

  public function pdo_get_leader_action($action)
  {
    $req = "SELECT num_amis FROM action WHERE num_action=".$action;
    $rs = $this->monPdo->query($req);
    $ligne = $rs->fetch();
    return $ligne;
  }



////////////////////////////
/*    FONCTION insert       */
////////////////////////////

  public function pdo_add_amis_action($numAmis,$numAction)
  {
    $req = "INSERT INTO participer VALUES(".$numAmis.",".$numAction.")";
    $rs = $this->monPdo->query($req);
  }
////////////////////////////
/*    FONCTION update        */
////////////////////////////

////////////////////////////
/*    FONCTION delete        */
////////////////////////////

}
?>
