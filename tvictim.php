<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Report a Crime!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">

<?php if(isset($_SESSION['validlogin'])&&$_SESSION['validlogin']=="failure") { ?> /* Your (php) way of checking that the form has been submitted */

            $(function() {                       // On DOM ready
                $('#myModal').modal('show');     // Show the modal
            });

<?php } ?>                                    /* /form has been submitted */

        </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <?php if(isset($_SESSION['loggedin'])) { ?>
    <?php
        require('commons/navigation.php');
    ?>
     <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Threatened Victim Form  </h1>
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a>
                    </li>
                    <li class="active">Tvictim</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-lg-12">
                <p> <a href="http://startbootstrap.com/template-categories/unstyled"></a>.</p>
            </div>
        </div>
        <!-- /.row -->

        <hr/>
        <div class="container">
            <form method="post" action="actions/doAddTvictim.php">
                  <div class="form-group">
                    <?php if(isset($_SESSION['tvictimmsg'])){
                      echo $_SESSION['tvictimmsg'];
                      unset($_SESSION['tvictimmsg']);
                    }?>
                  </div>
                  <div class="form-group">
                    <span class="reqspan">Important: * Are Required Fields!</span>
                  </div>
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <span class="reqspan">*</span>
                    <input name="tvictimfirstname" type="text" class="form-control" placeholder="Enter Your First Name" required>
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <span class="reqspan">*</span>
                    <input name="tvictimlastname" type="text" class="form-control" placeholder="Enter Your Last Name" required>
                  </div>
                  <div class="form-group">
                    <label for="mobilenumber">Mobile Number</label>
                    <span class="reqspan">*</span>
                    <input name="tvictimmobilenumber" type="number" class="form-control" placeholder="Enter Your Mobile Number(Leave Country Code)" required>
                  </div>
                  <div class="form-group">
                    <label for="permanentadddress">Permanent Address</label>
                    <span class="reqspan">*</span>
                    <textarea name="tvictimpermanentaddress" type="text" class="form-control" placeholder="Enter Your Permanent Address" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="districtname">District</label>
                    <span class="reqspan">*</span>
                    <input name="tvictimdistrict" type="text" class="form-control" placeholder="Enter District(Permanent Address)" required>
                  </div>
                   <div class="form-group">
                    <label for="crimedate">Date of Threat</label>
                    <span class="reqspan">*</span>
                    <input name="tvictimcrimedate" type="text" class="form-control" placeholder="Enter Date of Crime in format YYYY-MM-DD" required>
                  </div>
                  <div class="form-group">
                    
                    <span class="reqspan">*</span>
                    <label for="crimetime">Time of Threat</label>
                    <input name="tvictimcrimetime" type="text" class="form-control" placeholder="Enter Time of Crime" required>
                  </div>
                  <div class="form-group">
                    <label for="crimedescription">Offense Description</label>
                    <span class="reqspan">*</span>
                    <input name="tvictimcrimedescription" type="text" class="form-control" placeholder="Enter Crime Description" required>
                  </div>
                  <div class="form-group">
                    <label for="criminalinformation">Criminal Information</label>
                  </div>
                  <div class="form-group">
                    <label for="criminalname">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name of Criminal</label>
                    <input style="margin-left: 30px" name="tvictimcriminalname" type="text" class="form-control" placeholder="Enter Name of Criminal" >
                  </div>
                   <div class="form-group">
                    <label for="criminaladdress">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Address of Criminal</label>
                    <input style="margin-left: 30px" name="tvictimcriminaladdress" type="text" class="form-control" placeholder="Enter Address of Criminal">
                  </div>
                  <div class="form-group">
                    <label for="criminalcontact">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact Number of Criminal</label>
                    <input style="margin-left: 30px" name="tvictimcriminalcontact" type="number" class="form-control" placeholder="Enter Contact Number of Criminal">
                  </div>
                  <div class="form-group">
                    <input name="tvictimsubmit" type="submit" class="btn btn-default btn-primary" value="Submit"></input>
                  </div>
               </form>
        </div>
        
    </div>
    <!-- /.container -->
    <?php }
      else
      {
        header('Location: 404.php');die;
      }
    ?>
</body>