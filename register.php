<?php
require("conn.php");
function getAge($date)
{
    $dobe = new DateTime(($date));
    $now = new DateTime();
    $diffe = $now->diff($dobe);
    $age = $diffe->y;
    return $age;
}
?>
<?php include("includes/header.php"); ?>

<?php include("includes/navigation.php"); ?>

<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area pb-1">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
        <div class="page-cover text-center">
            <h2 class="page-cover-tittle">Register</h2>
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Register</li>
            </ol>
        </div>
    </div>
</section>
<!--================Breadcrumb Area =================-->

<!--================Contact Area =================-->
<section class="contact_area section_gap">
    <div class="container">
        <div class="row">
            <div class="form-center col-lg-8 col-md-6 mb-2">
                <form action="" method="POST">
                    <?php

                    if (isset($_POST['registerbtn'])) {

                        // Lets get data from form inputs

                        $fname = $_POST['fname'];
                        $lname = $_POST['lname'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        $pincode = $_POST['pincode'];
                        $dob = $_POST['dob'];
                        $password_1 = $_POST['password_1'];
                        $password_2 = $_POST['password_2'];

                        // Escape data from SQL Injection

                        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                        $email = mysqli_real_escape_string($conn, $_POST['email']);
                        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
                        $address = mysqli_real_escape_string($conn, $_POST['address']);
                        $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
                        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
                        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
                        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
                        // validate data

                        if (empty($fname)) {
                            $errors[] = " First Name is required";
                        }
                        if (empty($lname)) {
                            $errors[] = "Last Name is required";
                        }
                        if (empty($email)) {
                            $errors[] = "Email is required";
                        }
                        if (empty($phone)) {
                            $errors[] = "Phone is required";
                        }
                        if (empty($address)) {
                            $errors[] = "Adress is required";
                        }
                        if (empty($pincode)) {
                            $errors[] = "Pincode is required";
                        }
                        if (empty($dob)) {
                            $errors[] = "Date Of Birth is required";
                        }
                        if (empty($password_1)) {
                            $errors[] = "Password is required";
                        }
                        if (empty($password_2)) {
                            $errors[] = "Confirm Password is required";
                        }
                        if (!preg_match("/^[a-zA-Z']*$/", $fname)) {
                            $errors[] = "ONLY ALPHABETS ARE ALLOWED IN NAME!";
                        }
                        if (!preg_match("/^[a-zA-Z']*$/", $lname)) {
                            $errors[] = "ONLY ALPHABETS ARE ALLOWED IN NAME!";
                        }
                        if (strlen($phone) != 10) {
                            $errors[] = "PLEASE ENTER VALID PHONE NUMBER!";
                        }
                        if (strlen($pincode) != 6) {
                            $errors[] = "PLEASE ENTER VALID PINCODE NUMBER!";
                        }
                        if (getAge($dob) < 18) {
                            $errors[] = "ONLY 18+ YEARS OLD CAN USE THIS SERVICES!";
                        }
                        if ([$password_1] != [$password_2]) {
                            $errors[] = "PASSWORDS ARE NOT MATCH!";
                        }
                        if (strlen($password_1) < 8) {
                            $errors[] = "PASSWORD MUST BE ATLEAST 8 CHARACTERS";
                        }
                        if (strlen($password_1) > 15) {
                            $errors[] = "PASSWORD CANNOT BE GREATER THEN 15 CHARACTERS";
                        }
                        $check = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
                        if (mysqli_num_rows($check)) {
                            $errors[] =    "Account with this email already exists. try another!";
                        }
                        if (!empty($errors)) {
                            foreach ($errors as $error) {
                    ?>
                                <div class="alert alert-danger mt-5">
                                    <?php echo $error; ?>
                                </div>

                    <?php
                            }
                        } else {
                            $sql = mysqli_query($conn, "INSERT INTO `user`(`fname`, `lname`, `email`, `phone`, `address`, `pincode`, `dob`, `password`) VALUES ('$fname','$lname','$email','$phone','$address','$pincode','$dob','$password_1')");
                            if ($sql) {
                                echo '<div class="alert alert-success">YOU ARE REGISTER SUCCESSFULLY! PLEASE LOGIN FROM <a href="login.php" class="text-secondary text-decoration-none"><strong>LOGIN PAGE</strong></a></div>';
                            } else {
                                echo '<div class="alert alert-danger">Something Went Wrong. Please try again!</div>';
                            }
                        }
                    }

                    ?>
                    <div class="modal-body">
                        <h5 class="mb-4 text-center fw-bold h-font">Register Here</h5>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">First Name:</label>
                                    <input type="text" name="fname" value="<?php echo (isset($_POST['fname'])) ? $_POST['fname'] : ''; ?>" placeholder="First Name" class="form-control  shadown-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Last Name:</label>
                                    <input type="text" name="lname" value="<?php echo (isset($_POST['lname'])) ? $_POST['lname'] : ''; ?>" placeholder="Last Name" class="form-control shadown-none">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="email" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" placeholder="Email" class="form-control shadown-none ">
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone Number:</label>
                                    <input type="number" name="phone" value="<?php echo (isset($_POST['phone'])) ? $_POST['phone'] : ''; ?>" placeholder="Phone Number" class="form-control shadown-none">
                                </div>
                                <div class="col-md-12 ps-0 mb-3">
                                    <label class="form-label">Address:</label>
                                    <textarea class="form-control shawdow-none" name="address" value="<?php echo (isset($_POST['address'])) ? $_POST['address'] : ''; ?>" placeholder="Address" rows="1"></textarea>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Pincode:</label>
                                    <input type="number" name="pincode" value="<?php echo (isset($_POST['pincode'])) ? $_POST['pincode'] : ''; ?>" placeholder="Pincode" class="form-control shadown-none">
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Date Of Birth:</label>
                                    <input type="date" name="dob" value="<?php echo (isset($_POST['dob'])) ? $_POST['dob'] : ''; ?>" placeholder="Date of Birth" class="form-control shadown-none">
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password:</label>
                                    <input type="password" id="password_1" name="password_1" value="<?php echo (isset($_POST['password_1'])) ? $_POST['password_1'] : ''; ?>" placeholder="ATLEAST 8 CHARACTERS" class="form-control shadown-none">
                                    <span id="message" style="color: red;"></span><br>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm Password:</label>
                                    <input type="password" name="password_2" value="<?php echo (isset($_POST['password_2'])) ? $_POST['password_2'] : ''; ?>" placeholder="Confirm Password" class="form-control shadown-none">
                                </div>
                                <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                                    Note: Your details must match with your ID (Adhaar card, passport, driving licence,
                                    etc...).
                                    That will be required during chaeck-in.
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="registerbtn" class="btn btn-warning btn-block btn-lg text-white">
                                <a href="login.php" class="float-left mt-3 text-dark">Already have an Account?</a><br>
                            </div>
                        </div>
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