<?php
	class Config{
		private $hostname;
		private $username;
		private $password;
		private $database;
		
		public function __construct($hostname,$username,$password,$database){
			$this->hostname=$hostname;
			$this->username=$username;
			$this->password=$password;
			$this->database=$database;
		}
		
		public function getHostName(){
			return $this->hostname;
		}
		public function getUserName(){
			return $this->username;
		}
		public function getPassword(){
			return $this->password;
		}
		public function getDatabase(){
			return $this->database;
		}
	}
?>