<?php 
if(!class_exists("Bdd")){
	
	class Bdd
	{
		// information sur la base de données
		private $_hostname = "ailipset921.mysql.db";				private $_username = "ailipset921";		private $_password = "B0urdelle";		private $_databaseName = "ailipset921";
		//variable tampon 
		private $_connect;
		
		public function __construct()
		{
		}
		public function openBDD() // ouvre la base de données et renvoi un objet utilisable 
		{
			$this->_connect = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_databaseName);
			return $this->_connect;
		}
		public function closeBDD()		// femeture avec un objet donné
		{
			$this->_connect->close();
		}	}}
?>