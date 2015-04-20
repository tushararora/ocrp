<?php
session_start();
if(isset($_SESSION['loggedin']))
{
	require('../../commons/connection.php');
	if(isset($_POST['witnesssubmit'])){
		$witnessId = $_POST['witnessid'];
		$userEmail = $_POST['useremail'];
		$witnessReportStatus = $_POST['witnessreportstatus'];
		$message = $_POST['message'];
		$from = "tushararora.cs@gmail.com";
		$result=$qgen->update("tbl_witness","witness_reportstatus='".$witnessReportStatus."'","witness_id='".$witnessId."'");

		$to = $userEmail;
		$subject = "Crime Report Status(Witness)";
		$message = "Your report has been viewed and its current status is ".$witnessReportStatus.$message;
		$headers  = "MIME-Version: 1.0\r\n";
    	$headers .= "Content-type: text/html; charset=UTF-8\r\n";
    	$headers .= "From: <".$from. ">" ;
    	mail($to, $subject, $message, $headers);

    	if($result){
			$_SESSION['witnessmsg']="Status updated successfully";
		}
		else{
			$_SESSION['witnessmsg']="Status can't be updated";
		}
	}
	header("Location:../witness-manager.php");
}
else
{
    header('Location: ../index.php');
}
?>