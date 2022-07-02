<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Login</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Login</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap">
            <div class="container">
                <div class="row">
        
                    <div class="col-md-4 offset-4 formDesign">
                        
                        <form action="" method="POST">
                            <?php

if (isset($_SESSION['id'])) {
    header("Location: dashboard.php");
}

                            // Check button is clicked
                            if (isset($_POST['loginbtn'])) {
                                
                                $email = mysqli_real_escape_string($connection, $_POST['email']);
                                $password = mysqli_real_escape_string($connection, $_POST['password']);


                                // check user match our database or not

                                $check = mysqli_query($connection, "SELECT * FROM user WHERE email = '$email'");

                                if (mysqli_num_rows($check) > 0) {
                                    
                                    // fetch data
                                    $user = mysqli_fetch_array($check);

                                    //check user entered password and db password

                                    if ($password == $user['password']) {
                                        // here both are true, we can let user to login now.
                                        // setting email in session global variable
                                        $_SESSION['id'] = $user['id'];

                                        // redirect to the destination here

                                        header("Location: dashboard.php");
                                        // lets check

                                    } else {
                                        echo "<div class='alert alert-danger'>Password is incorrect!</div>";
                                    }

                                } else {
                                    echo "<div class='alert alert-danger'>Email is incorrect!</div>";
                                }

                            }

                            ?>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Your Email" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" placeholder="Your Password" class="form-control form-control-lg" required="">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="loginbtn" value="Login" class="btn btn-warning btn-block btn-lg text-white">
                                <a href="register.php" class="float-right mt-3 text-dark">Don't have an Account?</a>
                                <a href="fpass.php" class="float-left mt-3 ms-3 text-dark">Forgot Password?</a>
                            </div>
                    
                        </form>

                    </div>

                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        
       
       <!--================Contact Success and Error message Area =================-->
        <div id="success" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Thank you</h2>
                        <p>Your message is successfully sent...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals error -->

        <div id="error" class="modal modal-message fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-close"></i>
                        </button>
                        <h2>Sorry !</h2>
                        <p> Something went wrong </p>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Contact Success and Error message Area =================-->
        
        
<?php include("includes/footer.php"); ?>