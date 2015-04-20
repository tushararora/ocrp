<?php
	class QGen{
		private $db;
		
		public function __construct($db){
			$this->db=$db;
		}
		public function select($collist,$table,$condition=NULL,$orderby=NULL,$order="Asc",$limit=NULL){
			$sql="select $collist from $table";
			if(isset($condition))
				$sql.=" where $condition";
			if(isset($orderby))
				$sql.=" order by $orderby $order";
			if(isset($limit)){
				$sql.=" limit $limit";
			}
			//echo $sql; die;
			$result=$this->db->query($sql);
			return $result;
		}
		public function selectOrder($collist,$table,$orderby=NULL,$order="Asc"){
			$sql="select $collist from $table";

			if(isset($orderby))
				$sql.=" order by $orderby $order";
			//echo $sql; die;
			$result=$this->db->query($sql);
			return $result;
		}
		public function insert($table,$collist,$vallist,$isClose=true){
				$sql="insert into $table ($collist) values($vallist)";
			// echo $sql;die;
				if($this->db->query($sql,$isClose)) 
					return true;
				return false;				
			}
		public function update($table,$colvallist,$condition=NULL){
				$sql="update $table set $colvallist";
				if(isset($condition)){
					$sql.=" where $condition";
				}
				//echo $sql;die;
				if($this->db->query($sql))
					return true;
				return false;
		}
		public function delete($table,$condition=NULL){
			$sql="delete from $table";
			
			if(isset($condition)){
				$sql.=" where $condition";
			}
			//echo $sql;
			if($this->db->query($sql))
					return true;
				return false;
		}
	}
?>