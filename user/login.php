<?php
session_start();
include 'database/database.php';
include 'helpers/not_authenticated.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Food Order</title>
    <!-- Stylesheets -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <link href="assets/vendors/flat-icon/flaticon.css" rel="stylesheet">


    <!-- Rev slider css -->
    <link href="assets/vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="assets/vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="assets/vendors/revolution/css/navigation.css" rel="stylesheet">

    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <link rel="shortcut icon" href="assets/images/logo-02.png" type="image/x-icon">
    <link rel="icon" href="assets/images/logo-02.png" type="image/x-icon">

    <link
            href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&amp;family=Open+Sans:wght@400;600;700;800&amp;family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,700&amp;family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

<div class="page-wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <header class="main-header">
    
        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container">
                <div class="auto-container clearfix">
                    <!--Info-->
                    <div class="logo-outer">
                        <div class="logo" style="margin-top: -20px;"><img src="assets/images/logo-02.png" alt=""
                                                                                                 title=""></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="navbar-header">
                                <!-- Togg le Button -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon flaticon-menu"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">

                                    <li class="current dropdown"><a href="#">User</a>
                                        <ul>
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="registration.php">Register</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box">
                            <div class="order">
                                Order Now
                                <span><a href="tel:1800-123-4567">1800 123 4567</a></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                   <img src="assets/images/logo-02.png" alt=""
                                                                       title="" height="90" width="90" style="margin-top: -10px;">
                </div>

                <!--Right Col-->
                <div class="right-col pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                            <ul class="navigation clearfix">
                                <li class="current dropdown"><a href="#">User</a>
                                    <ul>
                                        <li><a href="shops.php">Login</a></li>
                                        <li><a href="shop-single.php">Register</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>

            </div>
        </div>
        <!--End Sticky Header-->

    </header>
    <!-- End Main Header -->
        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
            <div class="auto-container">
                <h1>Login</h1>
            </div>
        </section>
        <!-- End Page Title -->

        <!-- Checkout Page -->
        <div class="checkout-page">
            <div class="auto-container">

                <!--Default Links-->


                <!--Billing Details-->
                <div class="billing-details">
                    <div class="shop-form">
                        
                        <form method="post" action="handlers/login_handler.php">
                            <div class="row clearfix">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6 col-md-12 col-sm-12" style="border-style: solid; border-width: 1px; border-radius:5px;border-color: #c62904; padding:20px;">

                                    <div class="sec-title">
                                        <h2>Login Page</h2>
                                    </div>
                                    <div class="billing-inner">
                                        <div class="row clearfix">
                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Username</div>
                                                <input type="text" name="username" value=""
                                                    placeholder="User Name">
                                            </div>

                                            <!--Form Group-->
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                                <div class="field-label">Password</div>
                                                <input type="password" name="password" value=""
                                                       placeholder="Password">
                                            </div>

                                            <?php if (! empty($_SESSION['login_errors'])): ?>
                                            <div class="form-group col-md-12 col-sm-12 col-xs-12 text-danger">
                                                <?= htmlspecialchars($_SESSION['login_errors']) ?>
                                            </div>
                                            <?php unset($_SESSION['login_errors']); ?>
                                            <?php endif; ?>


                                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                                <button type="submit" class="theme-btn btn-style-five"><span
                                                        class="txt">Login</span></button>
                                            </div>

                                        </div>
                                    </div>
                                    <ul>
                                        <li>New User? <a href="registration.php">Click here to
                                            Register</a></li>
                                    </ul>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
                <!--End Billing Details-->
            </div>
        </div>

        <!--Main Footer-->
        <footer class="main-footer" style="background-image: url(assets/images/background/4.png)">
			<div class="auto-container">

				<!-- Widgets Section -->
				<div class="widgets-section">
					<div class="row clearfix">

						<!-- Footer Column -->
						<div class="footer-column col-lg-3 col-md-6 col-sm-12">
							<!-- Info Widget -->
							<div class="footer-widget info-widget">
								<h4>Contact Info</h4>
								<a class="number" href="tel:1800-123-4567">(1800) 123 4567</a>
								<ul class="email-list">
									<li><a href="mailto:contact@abc.co.in">contact@abc.co.in</a></li>
									<li><a href="mailto:contact@abc.co.in">contact@abc.co.in</a></li>
								</ul>
							</div>
						</div>

						<!-- Footer Column -->
						<div class="footer-column col-lg-6 col-md-12 col-sm-12">
							<!-- Logo Widget -->
							<div class="footer-widget logo-widget">
								<div class="logo">
									<img src="assets/images/logo-02.png" alt="" style="margin-top: -20px;" />
								</div>
								<div class="text">Food Plaza <br> 336, abc Street,<br> Rajkot, 360004
								</div>
							</div>
						</div>

						<!-- Footer Column -->
						<div class="footer-column col-lg-3 col-md-6 col-sm-12">
							<!-- Info Widget -->
							<div class="footer-widget timing-widget">
								<h4>Opening Hour</h4>
								<ul class="timing-list">
									<li>Tuesday- Saturday <span>10 AM – 9 PM</span></li>
									<li>Sunday <span>Off</span></li>
								</ul>
							</div>
						</div>

					</div>
				</div>

				<!-- Footer Bottom -->


			</div>

			<div class="footer-bottom text-center" style="background-color: #eec300; color:black">
				<div class="clearfix text-center">
					<div class="text-center">
						<div class="copyright text-center" style="color:black">&copy; Copyright 2020. All right
							reserved.</div>
					</div>
				</div>
			</div>


		</footer>

    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    <!-- Search Popup -->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="http://designarc.biz/demos/wengdo/index.php">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value=""
                                placeholder="Search Here" required>
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>

                <br>
                <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="#">Cake</a></li>
                    <li><a href="#">Chocolate</a></li>
                    <li><a href="#">Strawberry</a></li>
                    <li><a href="#">Vanila</a></li>
                    <li><a href="#">Mango Icecream</a></li>
                </ul>

            </div>

        </div>
    </div>

    <!--Scroll to top-->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/parallax.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.fancybox.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/jquery.bootstrap-touchspin.js"></script>
    <script src="assets/js/appear.js"></script>
    <script src="assets/js/script.js"></script>

</body>


<!-- Mirrored from designarc.biz/demos/wengdo/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 09:11:12 GMT -->
</html>