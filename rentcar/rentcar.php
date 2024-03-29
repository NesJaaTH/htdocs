<?php
    include "/xampp/htdocs/assets/php/connect.php";
	session_start();
	ob_start();
    if ($_SESSION['access_rights'] === "Member" || $_SESSION['access_rights'] === "Staff" || $_SESSION['access_rights'] === "Admin"){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		$username = $_SESSION['user_name'];
    }else{
        header('location:http://localhost/indexshop.php');
    }
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <!-- title of site -->
        <title>CarVilla</title>
        <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="/assets/logo/favicon.png"/>
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="/assets/css/linearicons.css">

        <!--flaticon.css-->
		<link rel="stylesheet" href="/assets/css/flaticon.css">

		<!--animate.css-->
        <link rel="stylesheet" href="/assets/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link rel="stylesheet" href="/assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="/assets/css/style.css">
		<link rel="stylesheet" href="/assets/css/logoutbar.css">
        <!--responsive.css-->
        <link rel="stylesheet" href="/assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	
		<!--welcome-hero start -->
		<section id="home" class="welcome-hero">

			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
					<nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

						<div class="container">

							<!-- Start Header Navigation -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
									<i class="fa fa-bars"></i>
								</button>
								<a class="navbar-brand" style="cursor: pointer;" onclick="document.location='http://localhost/indexshop.php'">carvilla<span></span></a>

							</div><!--/.navbar-header-->
							<!-- End Header Navigation -->

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
								<ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
									<li class=" scroll active"><a style="cursor: pointer;" onclick="document.location='http://localhost/indexshop.php'">home</a></li>
									<li class="scroll"><a href="#contact">contact</a></li>
									<div class="dropdown">
										<button id="myBtn" class="dropbtn"><?=$username?></button>
										<div id="myDropdown" class="dropdown-content">
										<?php
												if ($_SESSION['access_rights'] === "Member"){
													echo "<a id='logoutuser' style='cursor: pointer;'><i class='fa-solid fa-right-from-bracket'></i> LOGOUT</a>";
												} elseif ($_SESSION['access_rights'] === "Admin" || $_SESSION['access_rights'] === "Staff"){
													echo "<a id='adminsetting' style='cursor: pointer;'><i class='fa-solid fa-gear'></i> Admin setting</a>";
													echo "<a id='logoutuser' style='cursor: pointer;'><i class='fa-solid fa-right-from-bracket'></i> LOGOUT</a>";
													

												}else{
													echo "<a id='logoutuser' style='cursor: pointer;'><i class='fa-solid fa-right-from-bracket'></i> LOGOUT</a>";
												}
											?>
										</div>
									</div>
								</ul><!--/.nav -->
							</div><!-- /.navbar-collapse -->
						</div><!--/.container-->
					</nav><!--/nav-->
					<!-- End Navigation -->
				</div><!--/.header-area-->
				<div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

			<div class="container">
				<div class="welcome-hero-txt">

				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="model-search-content">
							<div class="row" id="search-by-price">
								<div class="col-md-offset-1 col-md-2 col-sm-12">
									<form action="" id="buying" style="display: block;">
										<div class="single-model-search">
											<h2>Car Brand</h2>
											<div class="model-select-icon">
												<select class="form-control" id="brand">
													<?php
														$sql = "SELECT DISTINCT car_brand FROM car_models";
														$query = mysqli_query($conn, $sql);
														while ($row = mysqli_fetch_assoc($query)){
															echo "<option value='". $row['car_brand'] ."-". $_SESSION['db_id'] ."-".$_SESSION['access_rights']."'>". $row['car_brand']. "</option>";
														}
													?>
												</select><!-- /.select-->
											</div><!-- /.model-select-icon -->
										</div>
										<div class="single-model-search">
											<h2>Car Registration</h2>
											<div class="model-select-icon">
												<select class="form-control" id ="registration" name="registration">
													<option value="NULL" id="registration">NULL</option>
												</select><!-- /.select-->
											</div><!-- /.model-select-icon -->
										</div>
									</div>
								</form>

								<form action="" id="buying" style="display: block;">
									<div class="col-md-offset-1 col-md-2 col-sm-12">
										<div class="single-model-search">
											<h2>body Style</h2>
											<div class="model-select-icon">
												<select class="form-control" id="bodystyle">
													<option value="NULL" id="registration">NULL</option>
												</select><!-- /.select-->
											</div><!-- /.model-select-icon -->
										</div>
										<div class="single-model-search">
											<h2>Select Color</h2>
											<div class="model-select-icon">
												<select class="form-control" id="color">
													<option value="NULL" id="registration">NULL</option>
												</select><!-- /.select-->
											</div><!-- /.model-select-icon -->
										</div>
									</div>
								</form>

								<form action="" id="buying" style="display: block;">
									<div class="col-md-offset-1 col-md-2 col-sm-12">
										<div class="single-model-search">
											<h2>Select Model</h2>
											<div class="model-select-icon">
												<select class="form-control" id="model">
													<option value="NULL" id="registration">NULL</option>
												</select><!-- /.select-->
											</div><!-- /.model-select-icon -->
										</div>
										<div class="single-model-search">
											<h2>Pirce</h2>
											<div class="model-select-icon">
												<select class="form-control" id="pirce">
													<option value="NULL" id="registration">NULL</option>
												</select><!-- /.select-->
											</div><!-- /.model-select-icon -->
										</div>
								</form>
									
								</div>
								<div class="col-md-2 col-sm-12">
									<div class="single-model-search text-center">
										<button class="welcome-btn model-search-btn" id="submit-conbuying">
											search
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section><!--/.welcome-hero-->
		<div class="clearfix"></div>
		<section id="service" class="service-ren">
			<div class="container">
				<div class="service-content">
					<div class="row"id="service-content">
					</div>
				</div>
			</div><!--/.container-->

		</section><!--/.service-->
		<!--service end-->
	
		<!--brand end -->

		<!--blog start -->
		<section id="blog" class="blog"></section><!--/.blog-->
		<!--blog end -->

		<!--contact start-->
		<footer id="contact"  class="contact">
			<div class="container">
				<div class="footer-top">
					<div class="row">
						<div class="col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<div class="footer-logo">
									<a href="index.html">carvilla</a>
								</div>
								<p>
									Ased do eiusm tempor incidi ut labore et dolore magnaian aliqua. Ut enim ad minim veniam.
								</p>
								<div class="footer-contact">
									<p>info@themesine.com</p>
									<p>+1 (885) 2563154554</p>
								</div>
							</div>
						</div>
						<div class="col-md-2 col-sm-6">
							<div class="single-footer-widget">
								<h2>about devloon</h2>
								<ul>
									<li><a href="#">about us</a></li>
									<li><a href="#">career</a></li>
									<li><a href="#">terms <span> of service</span></a></li>
									<li><a href="#">privacy policy</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 col-xs-12">
							<div class="single-footer-widget">
								<h2>top brands</h2>
								<div class="row">
									<div class="col-md-7 col-xs-6">
										<ul>
											<li><a href="#">BMW</a></li>
											<li><a href="#">lamborghini</a></li>
											<li><a href="#">camaro</a></li>
											<li><a href="#">audi</a></li>
											<li><a href="#">infiniti</a></li>
											<li><a href="#">nissan</a></li>
										</ul>
									</div>
									<div class="col-md-5 col-xs-6">
										<ul>
											<li><a href="#">ferrari</a></li>
											<li><a href="#">porsche</a></li>
											<li><a href="#">land rover</a></li>
											<li><a href="#">aston martin</a></li>
											<li><a href="#">mersedes</a></li>
											<li><a href="#">opel</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-offset-1 col-md-3 col-sm-6">
							<div class="single-footer-widget">
								<h2>news letter</h2>
								<div class="footer-newsletter">
									<p>
										Subscribe to get latest news  update and informations
									</p>
								</div>
								<div class="hm-foot-email">
									<div class="foot-email-box">
										<input type="text" class="form-control" placeholder="Add Email">
									</div><!--/.foot-email-box-->
									<div class="foot-email-subscribe">
										<span><i class="fa fa-arrow-right"></i></span>
									</div><!--/.foot-email-icon-->
								</div><!--/.hm-foot-email-->
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="row">
						<div class="col-sm-6">
							<p>
								&copy; copyright.designed and developed by <a href="https://www.themesine.com/">themesine</a>.
							</p><!--/p-->
						</div>
						<div class="col-sm-6">
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>	
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-linkedin"></i></a>
								<a href="#"><i class="fa fa-pinterest-p"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>	
							</div>
						</div>
					</div>
				</div><!--/.footer-copyright-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>
				
			</div><!--/.scroll-Top-->
			
        </footer><!--/.contact-->
		<!--contact end-->


		
		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="/assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="/assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="/assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="/assets/js/owl.carousel.min.js"></script>

		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<script src="https://kit.fontawesome.com/e35da9db05.js" crossorigin="anonymous"></script>

        <!--Custom JS-->
        <script src="/assets/js/custom.js"></script>
		<script src="/assets/js/logout.js"></script>
		<script src="/assets/js/butt.js"></script>
		<script src="/assets/js/buy.js"></script>
    </body>
	
</html>