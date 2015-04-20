<?php
	session_start();
	require('../commons/connection.php');
	if(isset($_SESSION['loggedin'])) { 
	if(isset($_POST['tvictimsubmit'])){

		$tvictimFirstName = $_POST['tvictimfirstname'];
		$tvictimLastName = $_POST['tvictimlastname'];
		$tvictimMobileNumber = $_POST['tvictimmobilenumber'];
		$tvictimPermanentAddress = $_POST['tvictimpermanentaddress'];
		$tvictimDistrict = $_POST['tvictimdistrict'];
		$tvictimCrimeDate = $_POST['tvictimcrimedate'];
		$tvictimCrimeTime = $_POST['tvictimcrimetime'];
		$tvictimCrimeDescription = $_POST['tvictimcrimedescription'];
		$tvictimCriminalName = $_POST['tvictimcriminalname'];
		$tvictimCriminalAddress = $_POST['tvictimcriminaladdress'];
		$tvictimCriminalContact = $_POST['tvictimcriminalcontact'];
		$tvictimUserId = $_SESSION['userid'];
		$result=$qgen->insert("tbl_tvictim","tvictim_firstname,tvictim_lastname,tvictim_mobilenumber,
			tvictim_permanentaddress,tvictim_district,tvictim_crimedate,tvictim_crimetime,tvictim_crimedescription,tvictim_criminalname,tvictim_criminaladdress,tvictim_criminalcontact,
			user_id",
			"'".$tvictimFirstName."','".$tvictimLastName."','".$tvictimMobileNumber."','".$tvictimPermanentAddress."',
			'".$tvictimDistrict."','".$tvictimCrimeDate."',
			'".$tvictimCrimeTime."','".$tvictimCrimeDescription."','".$tvictimCriminalName."','".$tvictimCriminalAddress."',
			'".$tvictimCriminalContact."','".$tvictimUserId."'");
		if($result){
			$tvictimmsg="Form Submitted Successfully. Please wait for the reponse. Thank You!";
			$_SESSION['tvictimmsg']=$tvictimmsg;
			header("Location:../tvictim.php");die;
		}
		else
		{
			$tvictimmsg="Form Can't be submitted.";
			$_SESSION['tvictimmsg']=$tvictimmsg;
			header("Location:../tvictim.php");die;
		}
		$db->closeConnection();
	}
}
 else
      {
        header('Location: ../404.php');die;
      }

?>