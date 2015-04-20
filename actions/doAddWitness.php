<?php
	session_start();
	require('../commons/connection.php');
	if(isset($_SESSION['loggedin'])) {
	if(isset($_POST['witnesssubmit'])){

		$witnessFirstName = $_POST['witnessfirstname'];
		$witnessLastName = $_POST['witnesslastname'];
		$witnessMobileNumber = $_POST['witnessmobilenumber'];
		$witnessPermanentAddress = $_POST['witnesspermanentaddress'];
		$witnessDistrict = $_POST['witnessdistrict'];
		$witnessCrimeLocation = $_POST['witnesscrimelocation'];
		$witnessCrimeDistrict = $_POST['witnesscrimedistrict'];
		$witnessCrimeDate = $_POST['witnesscrimedate'];
		$witnessCrimeTime = $_POST['witnesscrimetime'];
		$witnessCrimeDescription = $_POST['witnesscrimedescription'];
		$witnessVictimName = $_POST['witnessvictimname'];
		$witnessVictimAddress = $_POST['witnessvictimaddress'];
		$witnessVictimContact = $_POST['witnessvictimcontact'];
		$witnessCriminalName = $_POST['witnesscriminalname'];
		$witnessCriminalAddress = $_POST['witnesscriminaladdress'];
		$witnessCriminalContact = $_POST['witnesscriminalcontact'];
		$witnessUserId = $_SESSION['userid'];
		$result=$qgen->insert("tbl_witness","witness_firstname,witness_lastname,witness_mobilenumber,
			witness_permanentaddress,witness_district,witness_crimelocation,witness_crimedistrict,
			witness_crimedate,witness_crimetime,witness_crimedescription,witness_criminalname,
			witness_victimname,witness_victimaddress,witness_victimcontact,
			witness_criminaladdress,witness_criminalcontact,user_id",
			"'".$witnessFirstName."','".$witnessLastName."','".$witnessMobileNumber."','".$witnessPermanentAddress."',
			'".$witnessDistrict."','".$witnessCrimeLocation."','".$witnessCrimeDistrict."','".$witnessCrimeDate."',
			'".$witnessCrimeTime."','".$witnessCrimeDescription."','".$witnessVictimName."',
			'".$witnessVictimAddress."','".$witnessVictimContact."',
			'".$witnessCriminalName."','".$witnessCriminalAddress."','".$witnessCriminalContact."',
			'".$witnessUserId."'");	
		if($result){
			$witnessmsg="Form Submitted Successfully. Please wait for the reponse. Thank You!";
			$_SESSION['witnessmsg']=$witnessmsg;
			header("Location:../witness.php");die;
		}
		else
		{
			$witnessmsg="Form Can't be submitted.";
			$_SESSION['witnessmsg']=$witnessmsg;
			header("Location:../witness.php");die;
		}
		$db->closeConnection();
		}
	}
	else
     {
        header('Location: ../404.php');die;
     }

?>