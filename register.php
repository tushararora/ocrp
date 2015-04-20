<?php
  session_start();
  require('commons/connection.php');
  if(isset($_POST['registersubmit'])){
    $username=$db->escapeString($_POST['username']);
    $password=$db->escapeString($_POST['password']);
    $confirmpassword = $db->escapeString($_POST['confirmassword']);
    $selectresult=$qgen->select("*","userlogin","user_email='".$username."'");
    if($password!=$confirmpassword)
    {

      $_SESSION['registermsg'] = "The passwords do not match!";
      $_SESSION['validregister']="failure";
      header('Location: index.php');
    }
    if($db->countRows($selectresult)==1)
    {
      $_SESSION['registermsg'] = "A user with this Email Id already exists!";
      $_SESSION['validregister']="failure";
      header('Location: index.php');
    }
    else{
          $insertresult=$qgen->insert("userlogin","user_email,user_password","'".$username."','".$password."'");
          if($insertresult){
            $msg = "Registration Successful. Please Log In to Continue";
            $_SESSION['registermsg'] = $msg;
            $_SESSION['validregister']="success";
            header("Location:index.php");
          }
          else{
            $msg="Invalid Username or Password";
            $_SESSION['validregister']="failure";
            $_SESSION['registermsg']=$msg;
            header("Location:index.php");
          }
      }
    
    $db->closeConnection();
  }
  header('Location: index.php');

?>