<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	require('../../commons/connection.php');
	$result=$qgen->delete("tbl_tvictim","tvictim_id='".$_GET['id']."'");
	if($result){
		$_SESSION['tvictimmsg']="Report deleted successfully";
	}
	else{
		$_SESSION['tvictimmsg']="Report can't be deleted";
	}
	$db->closeConnection();
	header("Location:../tvictim-manager.php");
}
else
{
    header('Location: ../index.php');
}
?>