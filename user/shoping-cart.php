<?php
session_start();
include 'helpers/authenticated.php';
include 'database/database.php';
$user_id = $_SESSION['user_id'] ?? null;
if (!$user_id) {
    header("Location: login.php");
    exit;
}

$cartQuery = $conn->prepare("SELECT id FROM carts WHERE user_id = ?");
$cartQuery->bind_param("i", $user_id);
$cartQuery->execute();
$cartResult = $cartQuery->get_result();
$cart = $cartResult->fetch_assoc();

$items = [];
$total = 0;

if ($cart) {
    $cart_id = $cart['id'];
    $stmt = $conn->prepare("
        SELECT ci.id as cart_item_id, p.id as product_id, p.name, p.price, p.image_path, ci.quantity
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.cart_id = ?
    ");
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $items = $stmt->get_result();
}
?>

<?php
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
							<div class="logo" style="margin-top: -20px;"><a href="index-2.php"><img
										src="assets/images/logo-02.png" alt="" title=""></a></div>
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
										<li><a href="index-2.php">Home</a></li>
										<li><a href="gallery.php">Gallery</a></li>
										<li class="current"><a href="shoping-cart.php">Cart</a></li>
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
									<li><a href="index-2.php">Home</a></li>
									<li><a href="gallery.php">Gallery</a></li>
									<li class="current"><a href="shoping-cart.php">Cart</a></li>
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

		<!-- Page Title -->
		<section class="page-title" style="background-image: url(assets/images/background/11.jpg)">
			<div class="auto-container">
				<h1>Shoping Cart</h1>
				<ul class="bread-crumb clearfix">
					<li><a href="index-2.php">Home</a></li>
					<li>Cart</li>
				</ul>
			</div>
		</section>
		<!-- End Page Title -->

		<!--Cart Section-->
		<section class="cart-section">
			<div class="auto-container">
				<!--Cart Outer-->
				<div class="cart-outer">
					<?php if (isset($_SESSION['order_error'])): ?>
						<div class="alert alert-danger"><?= $_SESSION['order_error'] ?></div>
						<?php unset($_SESSION['order_error']); ?>
					<?php endif; ?>
					<form action="handlers/place_order_handler.php" method="POST">
						<div class="table-outer">
							<table class="cart-table">
								<thead class="cart-header">
									<tr>
										<th>Preview</th>
										<th class="prod-column">Product</th>
										<th class="price">Price</th>
										<th>Quantity</th>
										<th>Total</th>
										<th>&nbsp;</th>
									</tr>
								</thead>

								<tbody>
									<?php if ($items && $items->num_rows > 0): ?>
										<?php $grandTotal = 0; ?>
										<?php while ($item = $items->fetch_assoc()): ?>
											<?php
												$subTotal = $item['price'] * $item['quantity'];
												$grandTotal += $subTotal;
												$cartItemId = $item['cart_item_id'];
											?>
											<tr>
												<td class="prod-column">
													<div class="column-box">
														<figure class="prod-thumb">
															<a href="#"><img src="<?= htmlspecialchars($item['image_path']) ?>" alt=""></a>
														</figure>
													</div>
												</td>
												<td><h4 class="prod-title"><?= htmlspecialchars($item['name']) ?></h4></td>
												<td class="sub-total">$<?= number_format($item['price'], 2) ?></td>
												<td class="qty">
													<div class="item-quantity">
														<input class="quantity-spinner" type="number" value="<?= $item['quantity'] ?>" name="quantities[<?= $cartItemId ?>]" min="1">
													</div>
												</td>
												<td class="price">$<?= number_format($subTotal, 2) ?></td>
												<td><a href="handlers/remove_from_cart.php?id=<?= $cartItemId ?>" class="remove-btn"><span class="fa fa-times"></span></a></td>

												<!-- Hidden inputs to pass product info -->
												<input type="hidden" name="product_ids[<?= $cartItemId ?>]" value="<?= $item['product_id'] ?>">
												<input type="hidden" name="prices[<?= $cartItemId ?>]" value="<?= $item['price'] ?>">
											</tr>
										<?php endwhile; ?>
									<?php else: ?>
										<tr><td colspan="6">Your cart is empty.</td></tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>

						<div class="row clearfix">
							<div class="column col-lg-7 col-md-12 col-sm-12"></div>
							<div class="column pull-right col-lg-5 col-md-12 col-sm-12">
								<!--Totals Table-->
								<ul class="totals-table">
									<li><h3>Cart Totals</h3></li>
									<li class="clearfix"><span class="col">Sub Total</span><span class="col">$<?= number_format($grandTotal ?? 0, 2) ?></span></li>
									<li class="clearfix total"><span class="col">Total</span><span class="col price">$<?= number_format($grandTotal ?? 0, 2) ?></span></li>
									<li class="text-right">
										<button type="submit" class="theme-btn btn-style-five proceed-btn">
											<span class="txt">Place Order</span>
										</button>
									</li>
								</ul>
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!--End Cart Section-->

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


<!-- Mirrored from designarc.biz/demos/wengdo/shoping-cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 27 Dec 2021 09:11:12 GMT -->

</html>