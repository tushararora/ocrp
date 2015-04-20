<?php
	session_start();
	require('../commons/connection.php');
	if(isset($_SESSION['loggedin'])) { 
	if(isset($_POST['victimsubmit'])){

		$victimFirstName = $_POST['victimfirstname'];
		$victimLastName = $_POST['victimlastname'];
		$victimMobileNumber = $_POST['victimmobilenumber'];
		$victimPermanentAddress = $_POST['victimpermanentaddress'];
		$victimDistrict = $_POST['victimdistrict'];
		$victimCrimeLocation = $_POST['victimcrimelocation'];
		$victimCrimeDistrict = $_POST['victimcrimedistrict'];
		$victimCrimeDate = $_POST['victimcrimedate'];
		$victimCrimeTime = $_POST['victimcrimetime'];
		$victimCrimeDescription = $_POST['victimcrimedescription'];
		$victimCriminalName = $_POST['victimcriminalname'];
		$victimCriminalAddress = $_POST['victimcriminaladdress'];
		$victimCriminalContact = $_POST['victimcriminalcontact'];
		$victimUserId = $_SESSION['userid'];
		$result=$qgen->insert("tbl_victim","victim_firstname,victim_lastname,victim_mobilenumber,
			victim_permanentaddress,victim_district,victim_crimelocation,victim_crimedistrict,
			victim_crimedate,victim_crimetime,victim_crimedescription,victim_criminalname,
			victim_criminaladdress,victim_criminalmobilenumber,user_id",
			"'".$victimFirstName."','".$victimLastName."','".$victimMobileNumber."','".$victimPermanentAddress."',
			'".$victimDistrict."','".$victimCrimeLocation."','".$victimCrimeDistrict."','".$victimCrimeDate."',
			'".$victimCrimeTime."','".$victimCrimeDescription."','".$victimCriminalName."','".$victimCriminalAddress."',
			'".$victimCriminalContact."','".$victimUserId."'");
		if($result){
			$victimmsg="Form Submitted Successfully. Please wait for the reponse. Thank You!";
			$_SESSION['victimmsg']=$victimmsg;
			header("Location:../victim.php");die;
		}
		else
		{
			$victimmsg="Form Can't be submitted.";
			$_SESSION['victimmsg']=$victimmsg;
			header("Location:../victim.php");die;
		}
		$db->closeConnection();
	}
	}
	 else
	  {
	    header('Location: ../404.php');die;
	  }

?>