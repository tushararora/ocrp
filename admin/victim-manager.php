<?php
    session_start();
    require('../commons/connection.php');
?>
<!DOCTYPE html>
<html>
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
			}
			var form = document.getElementById("formsignup");
			form.onsubmit = function(){
			form.reset();
			}
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

       <div id="wrapper">
            <?php if(isset($_SESSION['loggedin'])) { 
                require('../commons/adminnavigation.php'); ?>

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
                           
                            <?php
                                if(isset($_SESSION['victimmsg'])){
                                    echo "<br/><p style='font-family: Arial; font-size:1.2em'>".$_SESSION['victimmsg']."(Please reload to remove this message)"."</p>";
                                    unset($_SESSION['victimmsg']);
                                }
                            ?>         
                            <?php 
                                if(isset($_GET['do'])){
                                    switch($_GET['do']){
                                        case 'read':
                                            require('includes/read-victim-report.php');
                                            break;
                                    }
                                }
                                else
                                {
                                    require('includes/view-all-victim.php');
                                }
                            ?>

                            </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- /#page-wrapper -->

                </div>
                <!-- /#wrapper -->
        <!-- jQuery -->
        <script src="../js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../js/plugins/morris/raphael.min.js"></script>
        <script src="../js/plugins/morris/morris.min.js"></script>
        <script src="../js/plugins/morris/morris-data.js"></script>
         <?php }
            else
            {
                header('Location: index.php');die;
            }
        ?>
    </body>
    </html>