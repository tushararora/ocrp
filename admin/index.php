<!DOCTYPE html>
<?php
	session_start();
?>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
         <?php if(!isset($_SESSION['loggedin']))
        { ?>
            <link rel="stylesheet" type="text/css" href="css/demo.css" />
            <link rel="stylesheet" type="text/css" href="css/style3.css" />
		    <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <?php } ?>
	<script>
			var form = document.getElementById("formlogin");
			form.onsubmit = function(){
				form.reset();
			};
			var form = document.getElementById("formsignup");
			form.onsubmit = function(){
			form.reset();
			};
	</script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <?php if(isset($_SESSION['loggedin']))
        { ?>
             <div id="wrapper">

                    <?php require('../commons/adminnavigation.php'); ?>

                            <div id="page-wrapper">

                                <div class="container-fluid">

                                    <!-- Page Heading -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h1 class="page-header">
                                                Dashboard
                                            </h1>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <h3>Victim</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="victim-manager.php">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Read complaints</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-green">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <h3>Witness</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="witness-manager.php">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Read Complaints</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-yellow">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <h3>Threatened Victim</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="tvictim-manager.php">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Read Complaints</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6">
                                            <div class="panel panel-red">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-xs-12 text-right">
                                                            <h3>Update Blog</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="#">
                                                    <div class="panel-footer">
                                                        <span class="pull-left">Go</span>
                                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- /#page-wrapper -->

                        </div>
                        <!-- /#wrapper -->
        
        <?php } 
        else 
        { 
        
            echo "<header>";
            echo  "</header>";
            echo "<div class='container'>";
        ?>
        <section>               
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper" style="margin-left: 150px">
                        <div id="login" class="animate form">
                            <form  id="formlogin" action="login.php" method="post" autocomplete="off"> 
                                <h1>Log in</h1> 
                                <p> 
                                        <?php

                                            if(isset($_SESSION['msg'])){
                                            echo "<span style='font-family: Arial'>".$_SESSION['msg']."</span></br>";
                                            unset($_SESSION['msg']);
                                            }
                                            if(isset($_SESSION['msg2'])){
                                            echo "<span style='font-family: Arial'>".$_SESSION['msg2']."</span></br>";
                                            unset($_SESSION['msg2']);
                                            }
                                        ?>
                                    <label for="username" class="uname" data-icon="u" > Your username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                <p class="login button"> 
                                    <input type="submit" value="Login" name="sub"/> 
                                </p>
                                <p class="change_link">
                                    <a href="#toregister" class="to_register">Change Password</a>
                                </p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  id="formsignup" action="adminlogin.php" method="post" autocomplete="off"> 
                                <h1>Change Password</h1> 
                                <p> 
                                    <?php

                                            if(isset($_SESSION['msg1'])){
                                            echo "<span style='font-family: Arial'>".$_SESSION['msg1']."</span></br>";
                                            unset($_SESSION['msg1']);
                                        }
                                        ?>
                                    <label for="usernamecp" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamecp" name="usernamecp" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <p> 
                                    <label for="currentpassword" class="youmail" data-icon="e" > Your current password</label>
                                    <input id="emailsignup" name="currentpassword" required="required" type="password" placeholder="eg. X8df!90EO"/> 
                                </p>
                                <p> 
                                    <label for="passwordcp" class="youpasswd" data-icon="p">Your new password </label>
                                    <input id="passwordcp" name="passwordcp" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>
                               <!-- <p> 
                                        <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Please confirm your password </label>
                                        <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                             </p>
                                -->
                                <p class="signin button"> 
                    
                                    <input type="submit" value="Confirm" name="cpsub"/> 
                                </p>
                                <p class="change_link">  
                                    Already a member ?
                                    <a href="#tologin" class="to_register"> Go and log in </a>
                                </p>
                            </form>
                        </div>
                        
                    </div>
                </div>  
            </section>
        <?php
            echo "</div>";
        } 
        ?>

        <!-- jQuery -->
        <script src="js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="js/plugins/morris/raphael.min.js"></script>
        <script src="js/plugins/morris/morris.min.js"></script>
        <script src="js/plugins/morris/morris-data.js"></script>
    
    </body>
</html>