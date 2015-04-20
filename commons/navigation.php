 <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #022F5A">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color: white">Report a Crime!</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#" style="color: white">About</a>
                    </li>
                    <li>
                        <a href="#" style="color: white">Services</a>
                    </li>
                    <li>
                        <a href="#" style="color: white">Contact</a>
                    </li>
      
                    <li>
                        <a href="#" style="color: white">Blog</a>
                    </li>
                    <li>
                        <a href="#" style="color: white">FAQ</a>
                        
                    </li>
                    <li>
                       <?php if(isset($_SESSION['loggedin'])){
                       ?>
                       <a href="logout.php" class="btn btn-primary btn-lg" style="padding: 5px;border-radius: 2px;box-sizing: content-box;margin-top: 7px" onclick="alert('You have successfully been logged out')"><?php echo "Logout"; ?></a>
                       <?php } else {?>
                
                       <a href="#"class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="padding: 5px;border-radius: 2px;box-sizing: content-box;margin-top: 7px" >
                       <?php echo "Login / Register"; ?></a>
                       <?php } ?>
                        <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                        <form class="form-horizontal" method="post" action="login.php">
                                           <?php
                                                if(isset($_SESSION['msg'])){
                                                    echo "<span style='font-family: Arial'>".$_SESSION['msg']."</span>";
                                                    unset($_SESSION['msg']);
                                                }
                                            ?>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="username" required>
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="inputPassword3"  pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*.{5,}$" placeholder="Password" name="password" required>
                                            </div>
                                          </div>
                                          
                                          <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <input type="submit" id="loginbutton" class="btn btn-primary" name="sub" value="Sign In">
                                            </div>
                                          </div>
                                        </form>
                                        <!-- Registration form -->
                                        <form class="form-horizontal" method="post" action="register.php">
                                            <?php
                                                if(isset($_SESSION['registermsg'])){
                                                    echo "<span style='font-family: Arial'>".$_SESSION['registermsg']."</span>";
                                                    unset($_SESSION['registermsg']);
                                                }
                                            ?>
                                          <div class="row" style="text-align: center; background-color: green; display: block; margin: 20px auto; line-height:2em; border-radius: 3px; color: #fff">Not a User? Register Now
                                          </div>
                                          <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                              <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="username" required>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="pass1" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*.{5,}$" title="Minimum(1 Uppercase, 1 Lowercase, 1 Number), Minimum length is 5"placeholder="Password" name="password" required>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label for="inputConfirmPassword3" class="col-sm-2 control-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="pass2" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*.{5,}$" onkeyup="checkPass(); return false;" placeholder="Confirm Password" name="confirmpassword" required>
                                              <span id="confirmMessage" class="confirmMessage"></span>
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <input type="submit" id="registerbutton" class="btn btn-danger" name="registersubmit" value="Register">
                                            </div>
                                          </div>
                                      </form>
                                  </div>
                                  </hr>
                                  <div class="modal-footer">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </form>
                                  </div>

                                </div>
                              </div>
                            </div>
                        </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    