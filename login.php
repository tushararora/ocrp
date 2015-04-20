<?php
  session_start();
  require('commons/connection.php');
  if(isset($_POST['sub'])){
    $username=$db->escapeString($_POST['username']);
    $password=$db->escapeString($_POST['password']);
    $result=$qgen->select("*","userlogin","user_email='".$username."' and user_password='".$password."'");
    if($db->countRows($result)==1){
      while($arr=$db->fetchAssoc($result)){
          $_SESSION['userid'] = $arr['user_id'];
      }
      $_SESSION['loggedin']=1;
      $_SESSION['validlogin']="success";
      header('Location: index.php');
    }
    else{
      $msg="Invalid Username or Password";
      $_SESSION['validlogin']="failure";
      $_SESSION['msg']=$msg;
      header("Location:index.php");
    }
    
    $db->closeConnection();
  }
  header('Location: index.php');

?>