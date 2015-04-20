<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	require('../../commons/connection.php');
	$result=$qgen->delete("tbl_witness","witness_id='".$_GET['id']."'");
	if($result){
		$_SESSION['witnessmsg']="Report deleted successfully";
	}
	else{
		$_SESSION['witnessmsg']="Report can't be deleted";
	}
	$db->closeConnection();
	header("Location:../witness-manager.php");
}
else
{
    header('Location: ../index.php');
}
?>