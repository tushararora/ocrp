<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	require('../../commons/connection.php');
	$result=$qgen->delete("tbl_victim","victim_id='".$_GET['id']."'");
	if($result){
		$_SESSION['victimmsg']="Report deleted successfully";
	}
	else{
		$_SESSION['victimmsg']="Report can't be deleted";
	}
	$db->closeConnection();
	header("Location:../victim-manager.php");
}
else
{
    header('Location: ../index.php');
}
?>