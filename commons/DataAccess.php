<?php
	class DataAccess{
		private $config;
		private $link;
		private $isConnect;
		
		public function __construct($config){
			$this->config=$config;
			$this->getConnection();
		}
		public function getConnection(){
			$this->link=@mysqli_connect($this->config->getHostname(),$this->config->getUsername(),$this->config->getPassword(),$this->config->getDatabase());
			if(!$this->link){
				  die("Connection Error: ".mysqli_connect_error());
			}
			else{
				$this->isConnect=true;
			}
		}
		public function closeConnection(){
			if($this->isConnect){
				mysqli_close($this->link);
				$this->isConnect=false;
			}
		}
		public function query($query,$isConnect=true){
			if(!$this->isConnect)
				$this->getConnection();
			$result=mysqli_query($this->link,$query);
			if($this->isConnect && $isConnect)
				$this->closeConnection();
			return $result;
		}
		
		public function getInsertId(){
			return mysqli_insert_id($this->link);
		}
		public function countRows($result){
			return mysqli_num_rows($result);
		}
		public function fetchAssoc($result){
			return mysqli_fetch_assoc($result);
		}
		public function fetchRow($result){
			return mysqli_fetch_row($result);
		}
		public function fetchArray($result){
			return mysqli_fetch_array($result);
		}
		public function escapeString($item){
			if(!$this->isConnect){
				$this->getConnection();
				$this->isConnect=true;
			}
			$item=mysqli_real_escape_string($this->link,$item);
			if($this->isConnect)
				$this->closeConnection();
			return $item;
		}
	}
?>