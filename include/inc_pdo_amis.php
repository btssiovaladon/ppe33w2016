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
	
	/***************************
	* Fonctions GET
	***************************/
	
	/**
	* Fonction qui récupère la liste de toutes les commissions
	*/
	public function pdo_get_nomcommission(){
		$req = "select commission.num_commission as num_commission, commission.nom_commission as nom_commission from commission";
		$rs = $this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	
	/***************************
	* Fonctions UPDATE
	***************************/
	
	/***************************
	* Fonctions DELETE
	***************************/
	
	public function pdo_get_paramExemple(){
		$req = "select * from parametre";
		$rs =$this->monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
}
?>