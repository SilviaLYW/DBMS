<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Friyay - Contact</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header">
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo"><a>FRIYAY.</a></div>
							<nav class="main_nav">
								<ul>
									<li><a href="index.php">Home</a></li>
										
									<li><a href="products.php">Products</a></li>
									<li><a href="contact.php">Contact </a></li>
								</ul>
							</nav>

							<div class="header_extra ml-auto">
								<div class="shopping_cart">
									<a href="cart.php">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;" xml:space="preserve">
											<g>
												<path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
											</g>
										</svg>
										<div>Cart<span></span></div>
									</a>
								</div>
								<div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
							</div>

							<?php 
							if(@!$_SESSION['login']){ ?>
							<li class="hassubs" ><a href="login.php"><i class="fa fa-user-circle-o" style="font-size:24px"></i>&nbsp;Login</a></li>
							<?php 
							}
							else{ ?>
								<li class="hassubs" style="color:#444444;">
									<a><i class="fa fa-user-circle-o" style="font-size:24px;"></i>&nbsp;
										Hi, <?php echo $_SESSION['name']; ?></a>
									<ul>
										<li><a href="member.php">會員管理</a></li> 
										<li><a href="logout.php">登出</a></li>
									</ul>
								</li>
							<?php 
							} ?>

						</div>
					</div>
				</div>
			</div>
		</div>
		
	</header>

	<!-- Menu -->

	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">
							
				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<li class="page_menu_item menu_mm"><a href="index.php">Home<i class="fa fa-angle-down"></i></a></li>
					</li>
					<li class="page_menu_item menu_mm"><a href="products.php">Products<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="cart.php">Cart<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="contact.php">Contact<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/contact.png)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->
	
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						<div class="section_title">Leave a message to us </div>
						<div class="section_subtitle">If you have any suggestion.</div>
						<div class="contact_form_container">
							<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            				?>" method = "post" id="contact_form" class="contact_form">
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="contact_name">Name*</label>
										<input type="text" id="contact_name" class="contact_input" required="required" value="<?=@$_SESSION['name'];?>" name = "name"> 
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Subject</label>
									<input type="text" id="contact_company" class="contact_input" name = "subject">
								</div>
								<div>
									<label for="contact_textarea">Message*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required" name="message"></textarea>
								</div>
								<button class="button contact_button" type = "submi654t" name="send"><span>Send Message</span></button>
							</form>
						</div>
					</div>
				</div>

					<?php
							$con = new mysqli("localhost", "root", "", "friyay");
							if ($con->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							$cID = $_SESSION['cID'];

							if (isset($_POST['send']) && !empty($_POST['name']) 
		               		&& !empty($_POST['message'])) {
								$name = $_POST['name'];
								$subect = $_POST['subject'];
								$message = $_POST['message'];					
								$sql = "INSERT INTO message (cID,cName, subject, message) VALUES ('$cID','$name','$subect','$message')";
								if($con->query($sql) === true)
								{
									?>
									<script language="javascript">
									alert('我們已收到您的留言，謝謝！');
									</script>
								<?php }
							}
							$con->close();
						?>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<div class="contact_info_title">Contact us</div>
							<ul>
								<li>Phone: <span>03 5205555</span></li>
								<li>Email: <span>friyay@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Workshop</div>
							<ul>
								<li>Address: <span>Friyay Road, Zhongli District, Taoyuan City</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

	<!-- Footer -->
	
	<div class="footer_overlay"></div>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(images/gray.png)"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
						<div class="footer_logo"><a href="#">FRIYAY.</a></div>
						<div class="copyright ml-auto mr-auto"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
						<div class="footer_social ml-lg-auto">
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/contact.js"></script>
</body>
</html>