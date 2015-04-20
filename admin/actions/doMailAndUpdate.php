<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	require('../../commons/connection.php');
	if(isset($_POST['victimsubmit'])){
		$victimId = $_POST['victimid'];
		$userEmail = $_POST['useremail'];
		$victimReportStatus = $_POST['victimreportstatus'];
		$message = $_POST['message'];
		$from = "tushararora.cs@gmail.com";
		$result=$qgen->update("tbl_victim","victim_reportstatus='".$victimReportStatus."'","victim_id='".$victimId."'");

		$to = $userEmail;
		$subject = "Crime Report Status(Victim)";
		$message = "Your report has been viewed and its current status is ".$victimReportStatus.$message;
		$headers  = "MIME-Version: 1.0\r\n";
    	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
    	$headers .= "From: <".$from. ">" ;
    	mail($to, $subject, $message, $headers);

    	if($result){
			$_SESSION['victimmsg']="Status updated successfully";
		}
		else{
			$_SESSION['victimmsg']="Status can't be updated";
		}
	}
	header("Location:../victim-manager.php");
}
else
{
    header('Location: ../index.php');
}
?>