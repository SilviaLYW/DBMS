<?php
session_start();
?>

<!DOCTYPE html>							
<html lang="en">
<head>
<title>Friyay - Products</title>
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
	<div style="text-align:center;width:700px;margin:0px auto; top:150px; margin-bottom:200px; overflow:auto; font-family:Microsoft JhengHei;">
			<?php
				$con = new mysqli("localhost", "root", "", "friyay");

					if ($con->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}					

				$result = $con->query("SELECT * FROM product");
				echo "<table class='table' style='color:#444444;' border='1'>
				<tr>
				<th width='100' bgcolor='#FFDAB9'>商品名稱</th>
				<th width='80' bgcolor='#FFDAB9'>價格</th>
				<th width='150' bgcolor='#FFDAB9'>商品圖</th>";
				if (@$_SESSION['login'] === true)
				{
					echo "<th width='30' bgcolor='#FFDAB9'>新增</th> </tr>";
				}
				else
					echo "</tr>";
				
				while($row = mysqli_fetch_array($result))
				{
					?>
					  <?php 
					  echo "<tr>";
					  echo "<td style=\"vertical-align:middle;\">" . $row['pName'] . "</td>";
					  echo "<td style=\"vertical-align:middle;\">" . $row['pPrice'] . "</td>";
					  echo "<td style=\"vertical-align:middle;\"> <img src=\"" . $row['pImage'] . "\" width=\"200\"></td>";
						
						if (@$_SESSION['login'] === true)
						{
							?>
							<td style="vertical-align:middle;" ><button class="btn btn-mini" style="border:3px gray double;background-color:white;" type="submit" formmethod="get" onclick="location.href='get.php?pID=<?=$row['pID']?>&pName=<?=$row['pName']?>&pPrice=<?=$row['pPrice']?>&pNum=1'" >+</button></td>
				 		<?php
						}
						else
							echo "</tr>";
				}

				$con->close();
			?>
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