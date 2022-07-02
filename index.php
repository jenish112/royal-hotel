<?php include("includes/header.php"); ?>
<!--================Header Area =================-->
<?php include("includes/navigation.php"); ?>
<!--================Header Area =================-->

<!--================Banner Area =================-->
<section class="banner_area">
    <div class="booking_table d_flex align-items-center">
        <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
            <div class="banner_content text-center">
                <h6>Away from monotonous life</h6>
                <h2>DREAM, DRVIE, DISCOVER & DELIGHT</h2>
                <p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference in price. You may see some for as low as $.17 each.</p>
                <a href="available-rooms.php" class="btn theme_btn button_hover">Check Rooms</a>
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            </div>
        </div>
    </div>
</section>
<!--================Banner Area =================-->

<!--================ Accomodation Area  =================-->
<section class="accomodation_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Hotel Accomodation</h2>
            <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, </p>
        </div>
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
                            <a href="#">
                                <h4 class="sec_h4"><?php echo $room['title']; ?></h4>
                            </a>
                            <h5> <i class="fa fa-inr"></i><?php echo $room['price']; ?><small>/night</small></h5>
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
<!--================ Accomodation Area  =================-->

<!--================ Facilities Area  =================-->
<section class="facilities_area section_gap">
    <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
    </div>
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_w">Royal Facilities</h2>
            <p>Who are in extremely love with eco friendly system.</p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-dinner"></i>Restaurant</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-bicycle"></i>Sports CLub</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-shirt"></i>Swimming Pool</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-car"></i>Rent a Car</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-construction"></i>Gymnesium</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="facilities_item">
                    <h4 class="sec_h4"><i class="lnr lnr-coffee-cup"></i>Bar</h4>
                    <p>Usage of the Internet is becoming more common due to rapid advancement of technology and power.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Facilities Area  =================-->

<!--================ About History Area  =================-->
<section class="about_history_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d_flex align-items-center">
                <div class="about_content ">
                    <h2 class="title title_color">About Us</h2>
                    <p>Our aim is to provide the best in both food and service. We trust you will enjoy our hospitality, to the level that we would welcome any suggestions or comments that you may have in order to complete your satisfaction.
                        Hotel Repose offers comfortable living spaces comprising of 72 well-equipped rooms ranging from deluxe to one-bedroom apartments.</p>
                    <!-- <a href="#" class="button_hover theme_btn_two">Request Custom Price</a> -->
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid rounded" src="image/about_bg.jpg" alt="img">
            </div>
        </div>
    </div>
</section>
<!--================ About History Area  =================-->

<!--================ Testimonial Area  =================-->
<section class="testimonial_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">Testimonial from our Clients</h2>
            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
        </div>
        <div class="testimonial_slider owl-carousel">
            <div class="media testimonial_item">
                <img class="rounded-circle" src="image/testtimonial-1.jpg" alt="" style="width: 100px !important;">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="media testimonial_item">
                <img class="rounded-circle" src="image/testtimonial-1.jpg" alt="" style="width: 100px !important;">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="media testimonial_item">
                <img class="rounded-circle" src="image/testtimonial-1.jpg" alt="" style="width: 100px !important;">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="media testimonial_item">
                <img class="rounded-circle" src="image/testtimonial-1.jpg" alt="" style="width: 100px !important;">
                <div class="media-body">
                    <p>As conscious traveling Paupers we must always be concerned about our dear Mother Earth. If you think about it, you travel across her face, and She is the </p>
                    <a href="#">
                        <h4 class="sec_h4">Fanny Spencer</h4>
                    </a>
                    <div class="star">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-half-o"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Testimonial Area  =================-->

<!--================ Latest Blog Area  =================-->
<section class="latest_blog_area section_gap">
    <div class="container">
        <div class="section_title text-center">
            <h2 class="title_color">latest posts from blog</h2>
            <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall from </p>
        </div>
        <div class="row mb_30">
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/blog/blog-1.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Low Cost Advertising</h4>
                        </a>
                        <p>Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/blog/blog-2.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">Creative Outdoor Ads</h4>
                        </a>
                        <p>Self-doubt and fear interfere with our ability to achieve or set goals. Self-doubt and fear are</p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-recent-blog-post">
                    <div class="thumb">
                        <img class="img-fluid" src="image/blog/blog-3.jpg" alt="post">
                    </div>
                    <div class="details">
                        <div class="tags">
                            <a href="#" class="button_hover tag_btn">Travel</a>
                            <a href="#" class="button_hover tag_btn">Life Style</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">It S Classified How To Utilize Free</h4>
                        </a>
                        <p>Why do you want to motivate yourself? Actually, just answering that question fully can </p>
                        <h6 class="date title_color">31st January,2018</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ Recent Area  =================-->

<?php include("includes/footer.php"); ?>