<?php
/** 
 * Classe d'accés aux données. 
 
 * Utilise les services de la classe PDO
 * pour l'application AMIS
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO 
 * $monPdoAmis qui contiendra l'unique instance de la classe
 
 * @package default
 * @author BTS SIO
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */

class PdoAmis{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=ppeamis';   		
      	private static $user='root' ;    		
      	private static $mdp='' ;	
		private static $monPdo;
		private static $monPdoAmis=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */				
	private function __construct(){
    	PdoAmis::$monPdo = new PDO(PdoAmis::$serveur.';'.PdoAmis::$bdd, PdoAmis::$user, PdoAmis::$mdp); 
		PdoAmis::$monPdo->query("SET CHARACTER SET utf8");
	}
	public function _destruct(){
		PdoAmis::$monPdo = null;
	}
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoAmis::getPdoAmis();
 
 * @return l'unique objet de la classe PdoAmis
 */
	public  static function getPdoAmis(){
		if(PdoAmis::$monPdoAmis==null){
			PdoAmis::$monPdoAmis= new PdoAmis();
		}
		return PdoAmis::$monPdoAmis;  
	}
	
	/***************************
	* Fonctions GET
	***************************/
	
	/**
	* Fonction qui récupère la liste de toutes les commissions
	*/
	public function pdo_get_nomcommission(){
		$req = "select commission.num_commission as num_commission, commission.nom_commission as nom_commission from commission";
		$rs = PdoGsb::$monPdo->query($req);
		$ligne = $rs->fetch();
		return $ligne;
	}
	
	/***************************
	* Fonctions UPDATE
	***************************/
	
	/***************************
	* Fonctions DELETE
	***************************/
	
	


}

?>