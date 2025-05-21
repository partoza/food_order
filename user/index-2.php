<?php
session_start();
include 'helpers/authenticated.php';
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

							<li><a href="mailto:info@abc.co.in" style="color: black"><span
										class="icon far fa-envelope"></span>
									info@abc.co.in</a></li>
							

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
							<li><a href="#" style="color: black"><span class="fa fa-user-alt"></span></a></li>
						</ul>
						<div class="option-list">
							<!-- Cart Button -->
							<div class="cart-btn">
								<a href="shoping-cart.php" class="icon flaticon-shopping-cart"
									style="color: black"><span class="total-cart"
										style="background-color: #a40301;color:white">3</span></a>
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
									<!-- Toggle Button -->
									<button class="navbar-toggler" type="button" data-toggle="collapse"
										data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
										aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon flaticon-menu"></span>
									</button>
								</div>

								<div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
									<ul class="navigation clearfix">
										<li class="current"><a href="#">Home</a></li>
										<li><a href="gallery.php">Gallery</a></li>
										<li><a href="profile.php">Profile</a></li>
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
									<li class="current"><a href="#">Home</a></li>
									<li><a href="gallery.php">Gallery</a></li>
									<li><a href="profile.php">Profile</a></li>
									<li><a href="profile.php">Logout</a></li>
								</ul>
							</div>
						</nav><!-- Main Menu End-->
					</div>

				</div>
			</div>
			<!--End Sticky Header-->

		</header>
		<!-- End Main Header -->

		<!--================Slider Area =================-->
		<section class="main_slider_area slider_bg">
			<div id="main_slider" class="rev_slider" data-version="5.3.1.6">
				<ul>
					<li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
						data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
						data-thumb="assets/images/main-slider/slider-item-1.png" data-rotate="0"
						data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
						data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
						data-param10="" data-description="">
						<!-- MAIN IMAGE -->

						<!-- LAYER NR. 1 -->
						<div class="slider_text_box">

							<div class="tp-caption tp-resizeme sm_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['165','165','165','195','195']"
								data-fontsize="['30','30','30','25','25']" data-lineheight="['89','89','89','50','45']"
								data-width="['670','670','670','400','320']" data-height="none" data-whitespace="normal"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">Hot Stuff</div>

							<div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['230','230','230','240','240']"
								data-fontsize="['72','72','72','40','35']" data-lineheight="['89','89','89','50','45']"
								data-width="['670','670','670','400','320']" data-height="none" data-whitespace="normal"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">Maxican Burger ...</div>
							<div class="tp-caption tp-resizeme middle_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['310','310','310','295','290']"
								data-fontsize="['30','30','30','25','25']" data-lineheight="['89','89','89','50','35']"
								data-width="['670','670','670','600','600','400']" data-height="none"
								data-whitespace="normal" data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">with bacon, tasty ham, pineapple and
								onion</div>

							<div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['390','390','390','355','345','370']"
								data-fontsize="['20','20','20','20','20','20']" data-lineheight="['28','28','28','28']"
								data-width="['600','600','600','550','400','400']" data-height="none"
								data-whitespace="normal" data-type="text" data-responsive_offset="on"
								data-transform_idle="o:1;"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia
								consequuntur magni dolores eos.
							</div>

							<div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['480','480','480','440','455','475']"
								data-fontsize="['14','14','14','14']" data-lineheight="['46','46','46','46']"
								data-width="['670','670','670','550','400']" data-height="none" data-whitespace="nowrap"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
								<a class="view_all_btn" href="#">Order Now</a>
							</div>
							<div class="tp-caption   tp-resizeme" data-x="['right','right','right','left','15','15']"
								data-hoffset="['-145','-145','0','0']" data-y="['top','top','top','top']"
								data-voffset="['115','115','170','50','50']" data-width="none" data-height="none"
								data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
								data-frames='[{"from":"x:-50px;rY:20deg;sX:0.8;sY:0.8;opacity:0;","speed":3000,"to":"o:1;","delay":2250,"ease":"Power4.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
								data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]" style="z-index: -1;border-width:0px;cursor:pointer;"><img
									src="assets/images/main-slider/slider-item-1.png" alt=""
									data-ww="['591px','500px','400px','200px','200px']"
									data-hh="['447px','400px','310px','150px','150px']" data-no-retina />
							</div>
						</div>
					</li>
					<li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
						data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
						data-thumb="assets/images/main-slider/slider-item-2.png" data-rotate="0"
						data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
						data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
						data-param10="" data-description="">
						<!-- MAIN IMAGE -->

						<!-- LAYER NR. 1 -->
						<div class="slider_text_box">
							<div class="tp-caption tp-resizeme sm_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['165','165','165','195','195']"
								data-fontsize="['30','30','30','25','25']" data-lineheight="['89','89','89','50','45']"
								data-width="['670','670','670','400','320']" data-height="none" data-whitespace="normal"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">Happy hour</div>

							<div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['230','230','230','240','240']"
								data-fontsize="['72','72','72','40','35']" data-lineheight="['89','89','89','50','45']"
								data-width="['670','670','670','400','320']" data-height="none" data-whitespace="normal"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">Pizza with cheese ...</div>
							<div class="tp-caption tp-resizeme middle_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['310','310','310','295','290']"
								data-fontsize="['30','30','30','25','25']" data-lineheight="['89','89','89','50','35']"
								data-width="['670','670','670','600','600','400']" data-height="none"
								data-whitespace="normal" data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">with bacon, tasty ham, pineapple and
								onion</div>

							<div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['390','390','390','355','345','370']"
								data-fontsize="['20','20','20','20','20','20']" data-lineheight="['28','28','28','28']"
								data-width="['600','600','600','550','400','400']" data-height="none"
								data-whitespace="normal" data-type="text" data-responsive_offset="on"
								data-transform_idle="o:1;"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia
								consequuntur magni dolores eos.
							</div>

							<div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['480','480','480','440','455','475']"
								data-fontsize="['14','14','14','14']" data-lineheight="['46','46','46','46']"
								data-width="['670','670','670','550','400']" data-height="none" data-whitespace="nowrap"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
								<a class="view_all_btn" href="#">Order Now</a>
							</div>
							<div class="tp-caption   tp-resizeme" data-x="['right','right','right','left','15','15']"
								data-hoffset="['-170','-170','0','0']" data-y="['bottom','center','center','top']"
								data-voffset="['0','0','0','50','50']" data-width="none" data-height="none"
								data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
								data-frames='[{"from":"x:-50px;rY:20deg;sX:0.8;sY:0.8;opacity:0;","speed":3000,"to":"o:1;","delay":2250,"ease":"Power4.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
								data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]" style="z-index: -1;border-width:0px;cursor:pointer;"><img
									src="assets/images/main-slider/slider-item-2.png" alt=""
									data-ww="['723px','500px','400px','200px','200px']"
									data-hh="['626px','440px','340px','160px','160px']" data-no-retina />
							</div>

						</div>
					</li>
					<li data-index="rs-1589" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
						data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
						data-thumb="assets/images/main-slider/slider-item-3.png" data-rotate="0"
						data-saveperformance="off" data-title="Creative" data-param1="01" data-param2="" data-param3=""
						data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
						data-param10="" data-description="">
						<!-- MAIN IMAGE -->

						<!-- LAYER NR. 1 -->
						<div class="slider_text_box">
							<div class="tp-caption tp-resizeme sm_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['165','165','165','195','195']"
								data-fontsize="['30','30','30','25','25']" data-lineheight="['89','89','89','50','45']"
								data-width="['670','670','670','400','320']" data-height="none" data-whitespace="normal"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">Happy hour</div>

							<div class="tp-caption tp-resizeme first_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['230','230','230','240','240']"
								data-fontsize="['72','72','72','40','35']" data-lineheight="['89','89','89','50','45']"
								data-width="['670','670','670','400','320']" data-height="none" data-whitespace="normal"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">Non Veg Burger...</div>
							<div class="tp-caption tp-resizeme middle_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['310','310','310','295','290']"
								data-fontsize="['30','30','30','25','25']" data-lineheight="['89','89','89','50','35']"
								data-width="['670','670','670','600','600','400']" data-height="none"
								data-whitespace="normal" data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
								data-textAlign="['left','left','left','left']">with bacon, tasty ham, pineapple and
								onion</div>

							<div class="tp-caption tp-resizeme secand_text" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['390','390','390','355','345','370']"
								data-fontsize="['20','20','20','20','20','20']" data-lineheight="['28','28','28','28']"
								data-width="['600','600','600','550','400','400']" data-height="none"
								data-whitespace="normal" data-type="text" data-responsive_offset="on"
								data-transform_idle="o:1;"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit quia
								consequuntur magni dolores eos.
							</div>

							<div class="tp-caption tp-resizeme slider_button" data-x="['left','left','left','15','15']"
								data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']"
								data-voffset="['480','480','480','440','455','475']"
								data-fontsize="['14','14','14','14']" data-lineheight="['46','46','46','46']"
								data-width="['670','670','670','550','400']" data-height="none" data-whitespace="nowrap"
								data-type="text" data-responsive_offset="on"
								data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
								<a class="view_all_btn" href="#">Order Now</a>
							</div>
							<div class="tp-caption   tp-resizeme" data-x="['right','right','right','left','15','15']"
								data-hoffset="['-145','-145','0','0']" data-y="['top','top','top','top']"
								data-voffset="['105','105','240','50','50']" data-width="none" data-height="none"
								data-whitespace="nowrap" data-type="image" data-responsive_offset="on"
								data-frames='[{"from":"x:-50px;rY:20deg;sX:0.8;sY:0.8;opacity:0;","speed":3000,"to":"o:1;","delay":2250,"ease":"Power4.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"}]'
								data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]"
								data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]"
								data-paddingleft="[0,0,0,0]" style="z-index: -1;border-width:0px;cursor:pointer;"><img
									src="assets/images/main-slider/slider-item-3.png" alt=""
									data-ww="['628px','500px','400px','200px','200px']"
									data-hh="['539px','400px','330px','175px','175px']" data-no-retina />
							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>
		<!--================End Slider Area =================-->

		<!-- Spicy Section -->

		<!-- End Spicy Section -->

		<!-- Products Section -->
		<section class="products-section">
			<div class="auto-container">

				<!-- Sec Title -->
				<div class="sec-title centered">
					<h2>Our Products</h2>
				</div>

				<!-- MixitUp Galery -->
				<div class="mixitup-gallery">

					<!--Filter-->
					<div class="filters clearfix">
						<ul class="filter-tabs filter-btns clearfix">
							<li class="active filter" data-role="button" data-filter="all">All</li>
							<li class="filter" data-role="button" data-filter=".pizza">Pizza</li>
							<li class="filter" data-role="button" data-filter=".burgers">Burgers</li>
							<li class="filter" data-role="button" data-filter=".fries">Fries</li>
							<li class="filter" data-role="button" data-filter=".beverages">Beverages</li>
						</ul>
					</div>

					<div class="filter-list row clearfix">

						<!-- Pizza + Beverages -->
						<div class="product-block all burgers col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/4.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Chicken Burger</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Salad + Pizza + Burgers + Fries -->
						<div class="product-block all beverages col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/5.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Soft Drink</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Salad + Wraps + Pizza + Fries -->
						<div class="product-block all pizza col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/6.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Pizza 2</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Pizza + Wraps + Burgers + Beverages + Salad -->
						<div class="product-block all burgers col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/1.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Burger 2</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Beverages + Wraps -->
						<div class="product-block all pizza wraps col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/2.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Pizza 1</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Salad + Fest + Burgers + Beverages -->
						<div class="product-block all burgers col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/1.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Burger 1</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

						<!-- Burgers -->
						<div class="product-block all fries col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<figure class="image-box">
									<img src="assets/images/resource/products/3.jpg" alt="">
								</figure>
								<div class="lower-content">
									<h4><a href="shop-single.php">Fries</a></h4>
									<div class="text">Our flavors & ingredients to build our local burgers.</div>
									<div class="price">$17.00</div>
									<div class="lower-box">
										<a href="shop-single.php" class="theme-btn btn-style-five"><span
												class="txt">Order Now</span></a>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
		<!-- End Products Section -->



		<!-- Delivery Section -->
		<section class="delivery-section">
			<div class="auto-container">
				<div class="row clearfix">

					<!-- Image Column -->
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column wow slideInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="image">
								<img src="assets/images/resource/pizzaboy.png" alt="" />
							</div>
						</div>
					</div>

					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="title">We Guaranttee</div>
							<h1>30 Minute Delivery</h1>
							<div class="text">
								<p>If you’re having a meeting, working late at night and need an extra push.</p>
								<p>Let us know and we will be there</p>
							</div>
							<a href="shop-single.php" class="theme-btn btn-style-three"><span class="txt">Order
									Now</span></a>
						</div>
					</div>

				</div>



			</div>
		</section>
		<!-- Delivery Section -->



		<!-- Services Section -->
		<section class="services-section">
			<!-- Side Image -->

			<div class="auto-container">
				<div class="row clearfix">

					<!-- Service Block -->
					<div class="service-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon-box">
								<img src="assets/images/resource/service-1.png" alt="" />
							</div>
							<h6>Free shipping on <br> first order</h6>
							<div class="text">Sign up for updates and <br> get free shipping</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon-box">
								<img src="assets/images/resource/service-2.png" alt="" />
							</div>
							<h6>Best Taste <br> Guaranttee</h6>
							<div class="text">We use best ingredients to <br> cook the taste food.</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon-box">
								<img src="assets/images/resource/service-3.png" alt="" />
							</div>
							<h6>Variety of <br> Dishes</h6>
							<div class="text">We give variety of dishes, <br> deserts, and drinks</div>
						</div>
					</div>

					<!-- Service Block -->
					<div class="service-block col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="icon-box">
								<img src="assets/images/resource/service-4.png" alt="" />
							</div>
							<h6>25 Minites <br> Delivery</h6>
							<div class="text">We deliver your food at <br> your dooe that you order</div>
						</div>
					</div>

				</div>
			</div>

			<!-- Newsletter Section -->
			<div class="newsletter-section">
				<div class="auto-container">
					<div class="inner-container">

						<div class="row clearfix">

							<!-- Title Column -->
							<div class="title-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<h2>Subscribe to newsletter</h2>
									<div class="text">Get weekly offer and discounts</div>
								</div>
							</div>

							<!-- Form Column -->
							<div class="form-column col-lg-6 col-md-12 col-sm-12">
								<div class="inner-column">
									<!--Emailed Form-->
									<div class="emailed-form">
										<form method="post" action="http://designarc.biz/demos/wengdo/contact.php">
											<div class="form-group">
												<input type="email" name="email" value=""
													placeholder="Enter your email address" required>
												<button type="submit" class="theme-btn">Subscribe</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
			<!-- End Newsletter Section -->

		</section>
		<!-- End Services Section -->

		<!-- Gallery Section -->
		<section class="gallery-section">
			<div class="outer-section">

				<div class="gallery-carousel owl-carousel owl-theme">

					<!-- Gallery Block -->
					<div class="gallery-block">
						<div class="inner-box">
							<figure class="image-box">
								<img src="assets/images/gallery/1.jpg" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="assets/images/gallery/1.jpg" data-fancybox="gallery-1"
												data-caption="" class="link"><span
													class="icon flaticon-expand"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>

					<!-- Gallery Block -->
					<div class="gallery-block">
						<div class="inner-box">
							<figure class="image-box">
								<img src="assets/images/gallery/2.jpg" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="assets/images/gallery/2.jpg" data-fancybox="gallery-1"
												data-caption="" class="link"><span
													class="icon flaticon-expand"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>

					<!-- Gallery Block -->
					<div class="gallery-block">
						<div class="inner-box">
							<figure class="image-box">
								<img src="assets/images/gallery/3.jpg" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="assets/images/gallery/3.jpg" data-fancybox="gallery-1"
												data-caption="" class="link"><span
													class="icon flaticon-expand"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>

					<!-- Gallery Block -->
					<div class="gallery-block">
						<div class="inner-box">
							<figure class="image-box">
								<img src="assets/images/gallery/4.jpg" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="assets/images/gallery/4.jpg" data-fancybox="gallery-1"
												data-caption="" class="link"><span
													class="icon flaticon-expand"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>

					<!-- Gallery Block -->
					<div class="gallery-block">
						<div class="inner-box">
							<figure class="image-box">
								<img src="assets/images/gallery/5.jpg" alt="">
								<!-- Overlay Box -->
								<div class="overlay-box">
									<div class="overlay-inner">
										<div class="content">
											<a href="assets/images/gallery/5.jpg" data-fancybox="gallery-1"
												data-caption="" class="link"><span
													class="icon flaticon-expand"></span></a>
										</div>
									</div>
								</div>
							</figure>
						</div>
					</div>

				</div>

			</div>
		</section>
		<!-- End Gallery Section -->

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

	<!--Search Popup-->
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

	<!-- Rev slider js -->
	<script src="assets/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
	<script src="assets/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
	<script src="assets/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
	<script src="assets/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
	<script src="assets/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
	<script src="assets/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
	<script src="assets/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
	<script src="assets/js/jquery.fancybox.js"></script>
	<script src="assets/js/owl.js"></script>
	<script src="assets/js/wow.js"></script>
	<script src="assets/js/mixitup.js"></script>
	<script src="assets/js/appear.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/mixitup@3/dist/mixitup.min.js"></script>
	<script>
		var mixer = mixitup('.filter-list');
	</script>

</body>

</html>