<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">

/*.BOX {
	top: 50%;
	position:absolute;
*/
/*
.container {
	top: 90%;
	position:absolute;
}
*/
</style>
<title>Friyay - Register</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
								<div class="hamburger"><i class=""fa fa-bars aria-hidden="true"></i></div>
							</div>
							<div><ul><a href="login.php"><i class="fa fa-user-circle-o" style="font-size:24px"></i>&nbsp;Login</a></ul><span></span></div>

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

	<?php
		$con = new mysqli("localhost", "root", "", "friyay");
		if ($con->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

	$rsql = "SELECT * FROM account";
	$result = $con->query($rsql);
	$msg = '';
	if (isset($_POST['register']) && !empty($_POST['account']) && !empty($_POST['password']) 
		&& !empty($_POST['name']) && !empty($_POST['phone']) && !empty($_POST['address']) ) {
		
		$account = $_POST['account'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$address= $_POST['address'];

		$duplicate = false; // 檢查帳號是否重複
		while($row = $result->fetch_assoc()){ // 一直撈
			if($account == $row["account"]){
				$duplicate = true;
			}
		}
		if(!$duplicate){
			$wsql = "INSERT INTO account (account, password, cName, cPhone, cAddress) 
						VALUES ('$account','$password','$name','$phone','$address')";

				if($con->query($wsql) === true){

					$msg = "Hi $name, 您已成功加入會員, 請重新登入!";?>
	            	<script language="javascript"> alert('<?=$msg?>');</script>
	            	<script language="javascript">location.href="login.php";</script>
	          <?php 
	          	}
				
		}
		else
			$msg = "帳號已存在！";
	}

		$con->close();
	?>
	<div class="BOX">
	      <div class = "container form-signin">

	      </div> <!-- /container -->
	 
    </div>

      <div class = "container" style="width:700px;margin:0px auto; top:50px; margin-bottom:200px; font-family:Microsoft JhengHei;">
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <br><br><br><br><br></br></br>
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" required="required"
               name = "account" placeholder="account"></br>
            <input type = "text" class = "form-control" required="required"
               name = "password" placeholder="password"></br>
             <input type = "text" class = "form-control" required="required"
               name = "name" placeholder="name"></br>
              <input type = "text" class = "form-control" required="required"
               name = "phone" placeholder="phone"></br>
               <input type = "text" class = "form-control" required="required"
               name = "address" placeholder="address"></br>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "register" >Register</button>
         </form>
      </div>   

   </body>
   
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
<script src="js/custom.js"></script>
</body>
</html>