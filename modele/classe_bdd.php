<?php 
if(!class_exists("BDD")){
	
	class BDD 
	{
		// information sur la base de données
		private $hostname = "localhost";				private $username = "admin";		private $password = "toor";		private $databaseName = "ailipse";
		//variable tampon 
		private $connect;
		
		public function __construct()
		{
		}
		public function OpenBDD() // ouvre la base de données et renvoi un objet utilisable 
		{
			$this->connect = new mysqli($this->hostname, $this->username, $this->password, $this->databaseName);
			return $this->connect;
		}
		public function CloseBDD($test)		// fermeture avec un objet donné
		{
			$test->close();
		}
		public function CloseBD()		// femeture avec un objet donné
		{
			$this->connect->close();
		}
		
	}
}
?>