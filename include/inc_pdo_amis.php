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