<?php include("includes/header.php"); ?>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"
        <?php include("includes/navigation.php"); ?>
        
        <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Available Rooms</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Available Rooms</li>
                    </ol>
                </div>
            </div>
        </section>
        
        <section class="accomodation_area section_gap">
            <div class="container">

                    <?php

                        if (isset($_SESSION['message'])) {
                            ?>  
                            <div class="row">
                                <div class="col-md-6 offset-3">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            </div>
                            <?php
                            unset($_SESSION['message']);
                        }



                    ?>

                <div class="row mb_30">

                    <?php
                        $getRooms = mysqli_query($connection, "SELECT * FROM rooms");
                        if (mysqli_num_rows($getRooms) > 0) {
                            while ($room = mysqli_fetch_array($getRooms)) {
                            
                            ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="accomodation_item text-center">
                                    <div class="hotel_img">
                                        <img src="image/<?php echo $room['picture']; ?>" alt="" style="width: 263px;height: 270px;">
                                        <a href="available-rooms.php?book=<?php echo $room['id']; ?>&title=<?php echo $room['title']; ?>" class="btn theme_btn button_hover">Book Now</a>
                                    </div>
                                    <a href="#"><h4 class="sec_h4"><?php echo $room['title']; ?></h4></a>
                                    <h5><i class="fa fa-inr"></i><?php echo $room['price']; ?><small>/night</small></h5>
                                </div>
                            </div>
                            <?php
                            }
                        } else {
                            echo "<div class='col-md-12 text-center'><h4>No Rooms Available.</h4></div>";
                        }
                    ?>
                            
                </div>
            </div>
        </section>
        
<?php

            // echo $today = date("Y-m-d");
    if (isset($_GET['book']) AND isset($_GET['title'])) {
        
        if (isset($_SESSION['id'])) {
            
            $userid = $_SESSION['id'];

            $roomid = $_GET['book'];

            $title = $_GET['title'];
            $today = date("Y-m-d");
            $check_rebooking = mysqli_query($connection, "SELECT * FROM bookings WHERE room_id = '$roomid' AND booking_date = '$today'");

            if (mysqli_num_rows($check_rebooking) > 0) {

                $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Someone has booked this Room for Today!</div>";
                header("Location: available-rooms.php");

            } else {

                $book = mysqli_query($connection, "

                    INSERT 
                        INTO 
                            bookings
                                (
                                    user_id, 
                                    room_id, 
                                    title, 
                                    booking_date
                                )
                            VALUES
                                (
                                '$userid', 
                                '$roomid', 
                                '$title', 
                                now()
                                )

                    ");

                $_SESSION['message'] = "<div class='alert alert-success'><strong> Alert! </strong> Room has been Booked Successfully!</div>";
                header("Location: available-rooms.php");
 
            }

        } else {
            $_SESSION['message'] = "<div class='alert alert-danger'><strong> Alert! </strong> Please Login to Book Room!</div>";
            header("Location: available-rooms.php");
        }

    }





?>

<?php include("includes/footer.php"); ?>