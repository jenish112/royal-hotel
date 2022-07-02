<?php include("includes/header.php"); ?>

        <?php include("includes/navigation.php"); ?>
        
        <!--================Breadcrumb Area =================-->
        <section class="breadcrumb_area pb-1">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Dashboard</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </section>
        <!--================Breadcrumb Area =================-->
        
        <!--================Contact Area =================-->
        <section class="contact_area section_gap" style="padding-top:60px;padding-bottom:60px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php include("includes/sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card p-3">
                            <h4>Your <span class="text-gold">Profile</span></h4>
                            <div>
                                <form action="" method="POST">
                                    <?php

                                        if (isset($_POST['updatebtn'])) {
                                            
                                            // Lets get data from form inputs

                                            $name = $_POST['name'];
                                            $phone = $_POST['phone'];
                                            $password = $_POST['password'];

                                            // Escape data from SQL Injection

                                            $name = mysqli_real_escape_string($connection, $_POST['name']);
                                            $phone = mysqli_real_escape_string($connection, $_POST['phone']);
                                            $password = mysqli_real_escape_string($connection, $_POST['password']);

                                            if (strlen($phone) < 10 || strlen($phone) > 12) {
                                                
                                                ?>

                                                    <div class="alert alert-danger">
                                                        <strong>Alert! </strong> Please Enter a valid phone number.
                                                    </div>

                                                    <?php

                                            } else {

                                                $userid = $_SESSION['id'];

                                                // Update user profile
                                                $update = mysqli_query($connection, "
                                                    UPDATE users 
                                                        SET 
                                                            name = '$name', 
                                                            phone = '$phone', 
                                                            password = '$password' 
                                                            WHERE id = '$userid'
                                                    ");

                                                if ($update) {
                                                    
                                                    echo '
                                                        <div class="alert alert-success">
                                                            <strong>Alert! </strong> Profile Updated Successfully!
                                                        </div>
                                                    ';
                                                    // Write whatever your message is
                                                } else {

                                                    echo '
                                                        <div class="alert alert-danger">
                                                            <strong>Alert! </strong> Something Went Wrong. Please try again!
                                                        </div>
                                                    ';

                                                }

                                            }

                                        }   

                                    ?>
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?php echo (isset($user['name']))? $user['name'] : ''; ?>" placeholder="Your Name" class="form-control form-control-lg" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="<?php echo (isset($user['email']))? $user['email'] : ''; ?>" placeholder="Your Email" class="form-control form-control-lg" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="number" name="phone" value="<?php echo (isset($user['phone']))? $user['phone'] : ''; ?>" placeholder="Your Phone" class="form-control form-control-lg" required="">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" value="<?php echo (isset($user['password']))? $user['password'] : ''; ?>" placeholder="Your Password" class="form-control form-control-lg" required="">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" name="updatebtn" value="Update Profile" class="btn btn-warning btn-block btn-lg text-white">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Contact Area =================-->
        <?php include("includes/footer.php"); ?>