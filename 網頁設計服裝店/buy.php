<?php
session_start();
?>
<!DOCTYPE html>

<?php
if(@!$_SESSION['login']){ ?>
	<script language="javascript">alert('請先登入會員!');</script>
	<script language="javascript">location.href="login.php"</script>
<?php
}
/*if(@count($row['pName'])<=1){ ?>
	<script language="javascript">alert('購物車內無商品!');</script>
	<script language="javascript">location.href="products.php"</script>*/
?>
							
<html lang="en">
<head>
<title>Friyay - Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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
							ob_start();
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
	<div style="text-align:center;width:700px;margin:0px auto; top:150px; margin-bottom:200px; overflow:auto; font-family:Microsoft JhengHei; ">
			<?php
				$con = new mysqli("localhost", "root", "fan0616", "friyay");

					if ($con->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}
				

				$cID = $_SESSION['cID'];
				
				if (@$_POST['action'] == 'back') {
					
					echo "<script>alert('感謝購買')</script>";
					
                    header("Location: index.php");
				}
				
			?>
		
			<form action="buy.php" method="post">
			<h2 class="text-center">您所訂購的清單</h2>
			<?php
				$con = new mysqli("localhost", "root", "", "friyay");

					if ($con->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

				$cID = $_SESSION['cID'];
				$result = $con->query("SELECT pName, pPrice, pNum FROM cart WHERE cID=$cID");

				echo "<table class='table' style='color:#444444' border='1'>
				<tr>
				<th width='200' bgcolor='#FFDAB9'>商品名稱</th>
				<th width='150' bgcolor='#FFDAB9'>價格</th>
				<th width='150' bgcolor='#FFDAB9'>數量</th>
				</tr>";

				while($row = mysqli_fetch_array($result))
				{
				  echo "<tr>";
				  echo "<td>" . $row['pName'] . "</td>";
				  echo "<td>" . $row['pPrice'] . "</td>";
				  echo "<td>" . $row['pNum'] . "</td>";
				  ?>
				  <?php
				  echo "</tr>";
				}
				
				echo "<tr>";
				?>
	
				<?php
				echo "</tr>";
				echo "</table>";
				$con->close();
				ob_end_flush();
			?>
			<button class="btn btn-mini"  type="submit" name ="action" formmethod="post" value="back">返回首頁</button>
			</form> 
	</div>

			

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
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/categories.js"></script>
</body>
</html>