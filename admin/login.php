<?php
	session_start();
	require('../commons/connection.php');
	if(isset($_POST['sub'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$result=$qgen->select("*","adminlogin","admin_username='".$username."' and admin_password='".$password."'");
		if($db->countRows($result)==1){
			$_SESSION['loggedin'] = 1;
			header("Location:index.php");die;
		}
		else{
		$msg="Invalid Username or Password";
		$_SESSION['msg']=$msg;
		header("Location:index.php");die;
		}
	$db->closeConnection();
	}
	if(isset($_POST['cpsub'])){
		$usernamecp=$db->escapeString($_POST['usernamecp']);
		$currentpassword=$db->escapeString($_POST['currentpassword']);
		$passwordcp=$db->escapeString($_POST['passwordcp']);
		$result=$qgen->select("*","adminlogin","username='".$usernamecp."' and password='".$currentpassword."'");
		if($db->countRows($result)==1)
		{
			$arr=$db->fetchAssoc($result);
			if($_POST['currentpassword']==$arr['password'])
			{
				$resultupdate=$qgen->update("adminlogin","password='".$passwordcp."'","username='".$usernamecp."'");
				if($resultupdate)
				{
					$_SESSION['msg2']="Password changed successfully";
					header("Location:index.php");die;
				}
				else
				{
					$_SESSION['msg2']="Password can't be changed";
					header("Location:index.php#toregister");die;
				}
			}
				
		}
		else
		{
				$_SESSION['msg1']="Username and Password combination is wrong";
				header("Location:index.php#toregister");die;
		}
		$db->closeConnection();
	}
	header('Location: index.php');
	//"username='"." ='"."' and password='"." ='"."'"
	//username=' ='' and password=' =''

?>