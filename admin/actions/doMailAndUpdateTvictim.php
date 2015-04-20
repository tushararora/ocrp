<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	require('../../commons/connection.php');
	if(isset($_POST['tvictimsubmit'])){
		$tvictimId = $_POST['tvictimid'];
		$userEmail = $_POST['useremail'];
		$tvictimReportStatus = $_POST['tvictimreportstatus'];
		$message = $_POST['message'];
		$from = "tushararora.cs@gmail.com";
		$result=$qgen->update("tbl_tvictim","tvictim_reportstatus='".$tvictimReportStatus."'","tvictim_id='".$tvictimId."'");

		$to = $userEmail;
		$subject = "Crime Report Status(Threatened Victim)";
		$message = "Your report has been viewed and its current status is ".$tvictimReportStatus.$message;
		$headers  = "MIME-Version: 1.0\r\n";
    	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
    	$headers .= "From: <".$from. ">" ;
    	mail($to, $subject, $message, $headers);

    	if($result){
			$_SESSION['tvictimmsg']="Status updated successfully";
		}
		else{
			$_SESSION['tvictimmsg']="Status can't be updated";
		}
	}
	header("Location:../tvictim-manager.php");
}
else
{
    header('Location: ../index.php');
}
?>