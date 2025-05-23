<?php
session_start();
include 'helpers/authenticated.php';
?>

<?php
$conn = new mysqli('localhost', 'root', '', 'food_order');
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found.");
}
?>

<?php
include 'database/database.php';

$cart_count = 0;

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT id FROM carts WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_result = $stmt->get_result();

    if ($cart_row = $cart_result->fetch_assoc()) {
        $cart_id = $cart_row['id'];
        $stmt_items = $conn->prepare("SELECT SUM(quantity) AS total_items FROM cart_items WHERE cart_id = ?");
        $stmt_items->bind_param("i", $cart_id);
        $stmt_items->execute();
        $items_result = $stmt_items->get_result();

        if ($items_row = $items_result->fetch_assoc()) {
            $cart_count = (int)$items_row['total_items'];
        }
    }
}
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
        <!--Header Top-->
        <div class="header-top" style="background-color:#f2e39c; color:black">
            <div class="auto-container clearfix">
                <div class="top-left">
                    <!-- Info List -->
                    <ul class="info-list">
                    </ul>
                </div>
                <div class="top-right clearfix">

                    <!--Social Box-->
                    <ul class="social-box">
							<?php if (isset($_SESSION['username'], $_SESSION['login_time'])): 
								// Calculate how long they've been logged in
								$elapsed = time() - $_SESSION['login_time'];
								$minutes = floor($elapsed / 60);
								$seconds = $elapsed % 60;
							?>
								<li style="color:black; padding-left:1em;">
								Logged in as <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
								(<?php echo $minutes; ?>m <?php echo $seconds; ?>s)
								</li>
							<?php endif; ?>
						</ul>
                    <div class="option-list">
                        <!-- Cart Button -->
                        <div class="cart-btn">
							<a href="shoping-cart.php" class="icon flaticon-shopping-cart" style="color: black"><span class="total-cart" style="background-color: #a40301;color:white">
    <?= $cart_count ?>
</span></a>
						</div>
                        <!-- Search Btn -->

                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="inner-container">
                <div class="auto-container clearfix">
                    <!--Info-->
                    <div class="logo-outer">
                        <div class="logo" style="margin-top: -20px;"><a href="index-2.php"><img src="assets/images/logo-02.png" alt=""
                                                                                                 title=""></a></div>
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
                                    <li class="current"><a href="index-2.php">Home</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="shoping-cart.php">Cart</a></li>
                                    <li><a href="handlers/logout_handler.php">Logout</a></li>
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
                        <a href="index-2.php" class="img-responsive"><img src="assets/images/logo-02.png" alt=""
                                title="" height="90" width="90" style="margin-top: -10px;"></a>
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
                                    <li class="current"><a href="index-2.php">Home</a></li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="shoping-cart.php">Cart</a></li>
                                    <li><a href="handlers/logout_handler.php">Logout</a></li>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                    </div>

                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!-- End Main Header -->
        <!-- End Main Header -->
        <!-- End Main Header -->

        <!-- Page Title -->
        <section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
            <div class="auto-container">
                <h1>Product Details</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="index-2.php">Home</a></li>
                    <li>Product Details</li>
                </ul>
            </div>
        </section>
        <!-- End Page Title -->

        <!--Shop Single Section-->
        <section class="shop-single-section">
            <div class="auto-container">

                <div class="shop-single">
                    <div class="product-details">
                        <?php if (isset($_SESSION['cart_success'])): ?>
                            <div class="alert alert-success"><?= $_SESSION['cart_success'] ?></div>
                            <?php unset($_SESSION['cart_success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['cart_error'])): ?>
                            <div class="alert alert-danger"><?= $_SESSION['cart_error'] ?></div>
                            <?php unset($_SESSION['cart_error']); ?>
                        <?php endif; ?>
                    <form action="handlers/add_to_cart_handler.php" method="POST">
                        <!--Basic Details-->
                        <div class="basic-details">
                            <div class="row clearfix">
                                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                    <figure class="image-box">
                                        <a href="<?= htmlspecialchars($product['image_path']) ?>" class="lightbox-image" title="<?= htmlspecialchars($product['name']) ?>">
                                            <img src="<?= htmlspecialchars($product['image_path']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                        </a>
                                    </figure>
                                </div>
                                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-column">
                                        <h2><?= htmlspecialchars($product['name']) ?></h2>
                                        <div class="text"><?= nl2br(htmlspecialchars($product['description'])) ?></div>
                                        <div class="price">Price : <span>$<?= number_format($product['price'], 2) ?></span></div>

                                        <div class="other-options clearfix">
                                            <div class="item-quantity">
                                                <label class="field-label" for="quantity">Quantity:</label>
                                                <input id="quantity" class="quantity-spinner" type="number" name="quantity" value="1" min="1" required>
                                            </div>
                                            <!-- Hidden inputs to send product ID -->
                                            <input type="hidden" name="product_id" value="<?= (int)$product['id'] ?>">
                                            <button type="submit" class="theme-btn btn-style-five">
                                                <span class="txt">Add to cart</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Basic Details-->
                    </form>
                    

                        <!--Product Info Tabs-->
                        <div class="product-info-tabs">
                            <!--Product Tabs-->
                            <div class="prod-tabs tabs-box">

                                <!--Tab Btns-->
                                <ul class="tab-btns tab-buttons clearfix">
                                    <li data-tab="#prod-details" class="tab-btn active-btn">Descripton</li>
                                    <li data-tab="#prod-spec" class="tab-btn">Specification</li>
                                    <li data-tab="#prod-reviews" class="tab-btn">Review (2)</li>
                                </ul>

                                <!--Tabs Container-->
                                <div class="tabs-content">

                                    <!--Tab / Active Tab-->
                                    <div class="tab active-tab" id="prod-details">
                                        <div class="content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                                deserunt mollit anim id est laborum consectetur adipiscing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                                ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
                                                sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                                mollit anim id est laborum</p>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="prod-spec">
                                        <div class="content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                                velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab" id="prod-reviews">
                                        <h2 class="title">2 Reviews For win Your Friends</h2>
                                        <!--Reviews Container-->
                                        <div class="comments-area">
                                            <!--Comment Box-->
                                            <div class="comment-box">
                                                <div class="comment">
                                                    <div class="author-thumb"><img
                                                            src="assets/images/resource/author-1.jpg" alt=""></div>
                                                    <div class="comment-inner">
                                                        <div class="comment-info clearfix">Steven Rich – Sep 17, 2016:
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star light"></span>
                                                        </div>
                                                        <div class="text">How all this mistaken idea of denouncing
                                                            pleasure and praising pain was born and I will give you a
                                                            complete account of the system, and expound the actual
                                                            teachings.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--Comment Box-->
                                            <div class="comment-box reply-comment">
                                                <div class="comment">
                                                    <div class="author-thumb"><img
                                                            src="assets/images/resource/author-2.jpg" alt=""></div>
                                                    <div class="comment-inner">
                                                        <div class="comment-info clearfix">William Cobus – Aug 21, 2016:
                                                        </div>
                                                        <div class="rating">
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star-half-empty"></span>
                                                        </div>
                                                        <div class="text">There anyone who loves or pursues or desires
                                                            to obtain pain itself, because it is pain sed, because
                                                            occasionally circumstances occur some great pleasure.</div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!-- Comment Form -->
                                        <div class="shop-comment-form">
                                            <h2>Add Your Review</h2>
                                            <div class="rating-box">
                                                <div class="text"> Your Rating:</div>
                                                <div class="rating">
                                                    <a href="#"><span class="fa fa-star"></span></a>
                                                </div>
                                                <div class="rating">
                                                    <a href="#"><span class="fa fa-star"></span><span
                                                            class="fa fa-star"></span></a>
                                                    <a href="#"></a>
                                                </div>
                                                <div class="rating">
                                                    <a href="#"><span class="fa fa-star"></span><span
                                                            class="fa fa-star"></span><span
                                                            class="fa fa-star"></span></a>
                                                </div>
                                                <div class="rating">
                                                    <a href="#"><span class="fa fa-star"></span><span
                                                            class="fa fa-star"></span><span
                                                            class="fa fa-star"></span><span
                                                            class="fa fa-star"></span></a>
                                                </div>
                                                <div class="rating">
                                                    <a href="#"><span class="fa fa-star"></span><span
                                                            class="fa fa-star"></span><span
                                                            class="fa fa-star"></span><span
                                                            class="fa fa-star"></span><span
                                                            class="fa fa-star"></span></a>
                                                </div>
                                            </div>
                                            <form method="post" action="http://designarc.biz/demos/wengdo/contact.php">
                                                <div class="row clearfix">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                        <label>First Name *</label>
                                                        <input type="text" name="username" placeholder="" required>
                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                        <label>Last Name*</label>
                                                        <input type="email" name="email" placeholder="" required>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                        <label>Email*</label>
                                                        <input type="text" name="number" placeholder="" required>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                        <label>Your Comments*</label>
                                                        <textarea name="message" placeholder=""></textarea>
                                                    </div>

                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
                                                        <button class="theme-btn btn-style-five" type="submit"
                                                            name="submit-form"><span class="txt">Submit
                                                                now</span></button>
                                                    </div>

                                                </div>
                                            </form>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <!--End Product Info Tabs-->

                    </div>
                </div>

            </div>
        </section>
        <!--End Shop Single Section-->

        <!-- Similar Products Section -->
        <section class="similar-products-section">
            <div class="auto-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <h2>Similar Products</h2>
                </div>
                <div class="row clearfix">

                    <!-- Products Block -->
                    <div class="product-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/products/1.jpg" alt="">
                            </figure>
                            <div class="lower-content">
                                <h4><a href="shop-single.php">Chicken Burger</a></h4>
                                <div class="text">Our flavors & ingredients to build our local burgers.</div>
                                <div class="price">$17.00</div>
                                <div class="lower-box">
                                    <a href="shop-single.php" class="theme-btn btn-style-five"><span class="txt">Order
                                            Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Block -->
                    <div class="product-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/products/2.jpg" alt="">
                            </figure>
                            <div class="lower-content">
                                <h4><a href="shop-single.php">Classic Smash</a></h4>
                                <div class="text">Our flavors & ingredients to build our local burgers.</div>
                                <div class="price">$17.00</div>
                                <div class="lower-box">
                                    <a href="shop-single.php" class="theme-btn btn-style-five"><span class="txt">Order
                                            Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Block -->
                    <div class="product-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/products/1.jpg" alt="">
                            </figure>
                            <div class="lower-content">
                                <h4><a href="shop-single.php">Classic Smash</a></h4>
                                <div class="text">Our flavors & ingredients to build our local burgers.</div>
                                <div class="price">$17.00</div>
                                <div class="lower-box">
                                    <a href="shop-single.php" class="theme-btn btn-style-five"><span class="txt">Order
                                            Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Products Block -->
                    <div class="product-block col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box">
                                <img src="assets/images/resource/products/3.jpg" alt="">
                            </figure>
                            <div class="lower-content">
                                <h4><a href="shop-single.php">Classic Smash</a></h4>
                                <div class="text">Our flavors & ingredients to build our local burgers.</div>
                                <div class="price">$17.00</div>
                                <div class="lower-box">
                                    <a href="shop-single.php" class="theme-btn btn-style-five"><span class="txt">Order
                                            Now</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- End Similar Products Section -->

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
                                    <a href="index-2.php"><img src="assets/images/logo-02.png" alt=""
                                            style="margin-top: -20px;" /></a>
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


<!-- Mirrored from designarc.biz/demos/wengdo/shop-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 09:10:25 GMT -->

</html>