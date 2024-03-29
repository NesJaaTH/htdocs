<?php
	$servername = "localhost";
	$username = "adminroot";
	$password = "12345678";
	$dbname = "databasesell";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		session_start();
		ob_start();
		if ($_SESSION['access_rights'] === "Admin" || $_SESSION['access_rights'] === "Staff"){
			$username_db = $_SESSION['user_name'];
		}else{
			session_destroy();
			header('location:http://localhost/indexshop.php');
		}
	} catch(PDOException $e){
		echo "Error" . $e->getMessage();

	}
?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <title>CarVilla</title>
		<link rel="shortcut icon" type="image/icon" href="/assets/logo/favicon.png"/>
        <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="/assets/css/linearicons.css">
		<link rel="stylesheet" href="/assets/css/flaticon.css">
        <link rel="stylesheet" href="/assets/css/animate.css">
        <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="/assets/css/bootsnav.css" >	
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/responsive.css">
        <link rel="stylesheet" href="/assets/css/config.css">
		<link rel="stylesheet" href="/assets/css/logoutbar.css">

    </head>
	
	<body>
	<div class="edit" id="edit" style="display: none;">
		<form action="/assets/php/update.php" method="post" class="signupcontainer"> 
			<label class="hertop">EDIT</label><br><br>
			<label for="ID">ID</label><br>
			<input class="textcss" type="text" id="ID" name="user_id" value="no" readonly><br>
			<label for="username">Username</label><br>
			<input class="textcss" type="text" id="username" name="username" value="no"><br>

			<label for="fname">F_name</label><br>
			<input class="textcss" type="text" id="fname" name="fname" value="no"><br>

			<label for="lname">L_name</label><br>
			<input class="textcss" type="text" id="lname" name="lname" value="no"><br>

			<label for="id_crad_Passport">id_crad_Passport</label><br>
			<input class="textcss" type="text" id="id_crad_Passport" name="id_crad_Passport" value="no"><br>

			<label for="car_license">car_license</label><br>
			<input class="textcss" type="text" id="car_license" name="car_license" value="no"><br>

			<label for="rentedcar">rentedcar</label><br>
			<input class="textcss" type="text" id="rentedcar" name="rentedcar" value="no"><br>

			<label for="start_Renting">start_Renting</label><br>
			<input class="textcss" type="text" id="start_Renting" name="start_Renting" value="no"><br>

			<label for="end_renting">end_renting</label><br>
			<input class="textcss" type="text" id="end_renting" name="end_renting" value="no"><br><br>

			<input class="buttoncss" type="submit" value="SAVE">
			<input class="buttoncss" type="button" value="CLOSE" onclick="closeed()"><br><br>
		</form> 
	</div>
		<section id="home" class="welcome-hero">
			<!-- top-area Start -->
			<div class="top-area" id="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
                    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                        <div class="container">

                            <!-- Start Header Navigation -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <a class="navbar-brand" href="index.html">carvilla<span></span></a>

                            </div><!--/.navbar-header-->
                            <!-- End Header Navigation -->

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                    <li class="scroll"><a style="cursor: pointer;" onclick="document.location='http://localhost/user/userindex.php'">home</a></li>
									<?php
										if ($_SESSION['access_rights'] === "Admin"){
											echo "<li class='scroll'><a style='cursor: pointer;' onclick='document.location=\"http://localhost/adminconfig/Admin.php\"'>Admin</a></li>";
											echo "<li class='scroll active'><a style='cursor: pointer;' onclick='document.location=\"http://localhost/adminconfig/config.php\"'>Member</a></li>";
										}elseif ($_SESSION['access_rights'] === "Staff"){
											echo "<li class='scroll active'><a style='cursor: pointer;' onclick='document.location=\"http://localhost/adminconfig/config.php\"'>Member</a></li>";
										}
									?>
									<li class="scroll"><a style="cursor: pointer;" onclick="document.location='http://localhost/adminconfig/carlist.php'">Car List</a></li>
									<div class="dropdown">
										<button id="myBtn" class="dropbtn"><?=$username_db?></button>
										<div id="myDropdown" class="dropdown-content">
											<a style="cursor: pointer;" onclick="document.location='http://localhost/assets/php/logout.php'"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
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
					<input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Serach....Name"><br>
                    <div id="searchresult"></div>
					<table class="table" id="table-all" style="display: block;">
                        <thead class="thead">
							<?php
								$sql = "SELECT * FROM customer;";
								$query = $conn->prepare($sql);
								$query->execute();
							?>
                            <tr>
								<th scope="col" class="th-css">ID</th>
								<th scope="col" class="th-css">name</th>
								<th scope="col" class="th-css">username</th>
								<th scope="col" class="th-css">ID CRAD and PASSPORT</th>
								<th scope="col" class="th-css">CAR LICENSE</th>
								<th scope="col" class="th-css">RENTEDCAR</th>
								<th scope="col" class="th-css">START RENTING</th>
								<th scope="col" class="th-css">END RENTING</th>
								<th scope="col" class="th-css">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
							<?php 
								foreach ($query as $row) { ?>
										
								<tr>
									<td scope="row"><?=$row['user_id'] ?></td>
									<td scope="row"><?=$row['f_name'] ?> <?=$row['l_name']?></td>
									<td scope="row"><?=$row['username'] ?></td>
									<td scope="row"><?=$row['id_cradandpassport'] ?></td>
									<td scope="row"><?=$row['car_license'] ?></td>
									<td scope="row"><?=$row['rentedcar'] ?></td>
									<td scope="row"><?=$row['start_renting'] ?></td>
									<td scope="row"><?=$row['end_renting'] ?></td>
									<td scope="row" class="id-<?=$row['user_id']?>"><i class="fa-regular fa-pen-to-square" style="cursor: pointer;" onclick="onedit('<?=$row['user_id']?>','<?=$row['f_name'] ?>','<?=$row['l_name']?>','<?=$row['username'] ?>','<?=$row['id_cradandpassport'] ?>','<?=$row['car_license'] ?>','<?=$row['rentedcar'] ?>','<?=$row['start_renting'] ?>','<?=$row['end_renting'] ?>')"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-trash" style="cursor: pointer;" onclick="deletedata('<?=$row['user_id']?>')"></i></td>
								</tr>
							<?php } ?>

                        </tbody>
                    </table>
                </div>
			</div>
		</section>
		<section id="blog" class="blog"></section>
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
			
        </footer>
        <script>
			function onedit(id,fname,lname,username,id_crad,carl,rentedcar,sr,er,smp){
				document.getElementById("edit").style.display = "block";
				document.getElementById("ID").value = id;
				document.getElementById("username").value = username;
				document.getElementById("fname").value = fname;
				document.getElementById("lname").value = lname;
				document.getElementById("id_crad_Passport").value = id_crad;
				document.getElementById("car_license").value = carl;
				document.getElementById("rentedcar").value = rentedcar;
				document.getElementById("start_Renting").value = sr;
				document.getElementById("end_renting").value = er;
			}
			function closeed(){
				document.getElementById("edit").style.display = "none";
			}
			function deletedata(user_id){
				Swal.fire({
						title: "คุณต้องการลบข้อใช่หรือไม่?",
						text: "ข้อมูลที่คุณลบจะไม่สามารถนำกลับมาได้!",
						icon: "warning",
						showCancelButton: true,
						confirmButtonColor: "#3085d6",
						cancelButtonColor: "#d33",
						confirmButtonText: "Yes, delete it!"
					}).then((result) => {
					if (result.isConfirmed) {
						Swal.fire({
							title: "Deleted!",
							text: "Your file has been deleted.",
							icon: "success",
							showConfirmButton: false,
						});
						setInterval(() => {
							window.location.assign("http://localhost/assets/php/deletedata.php?page=" + user_id);
						}, 1000);
					}
				});
			}
		</script>
		<script src="/assets/js/jquery.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
		<script src="/assets/js/bootsnav.js"></script>
        <script src="/assets/js/owl.carousel.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<script src="https://kit.fontawesome.com/e35da9db05.js" crossorigin="anonymous"></script>

		<!--Custom JS-->
		<script src="/assets/js/custom.js"></script>
		<script src="/assets/js/logout.js"></script>
		
		
        
    </body>
	
</html>