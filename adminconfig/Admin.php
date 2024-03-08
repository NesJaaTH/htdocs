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
		if ($_SESSION['access_rights'] === "Admin"){
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

			<label for="fname">First name</label><br>
			<input class="textcss" type="text" id="fname" name="fname" value="no"><br>

			<label for="lname">Last name</label><br>
			<input class="textcss" type="text" id="lname" name="lname" value="no"><br>

			<label for="id_card">ID Card</label><br>
			<input class="textcss" type="text" id="id_card" name="id_card" value="no"><br>

			<label for="salay">Salay</label><br>
			<input class="textcss" type="text" id="salay" name="salay" value="no"><br>

			<label for="age">Age</label><br>
			<input class="textcss" type="text" id="age" name="age" value="no"><br><br>

			<label for="ar">Access Rights</label><br>
			<input class="textcss" type="text" id="ar" name="ar" value="no"><br><br>


			<input class="buttoncss" type="submit" value="SAVE">
			<input class="buttoncss" type="button" value="CLOSE" onclick="closeed()"><br><br>
		</form> 
	</div>
	<div class="adddate" id="adddate" style="display: none;">
		<form action="/assets/php/adddataadmin.php" method="post" class="adddate-css"> 
			<label class="hertop">Add Data Admin user</label><br><br>
			<label for="f_name">First name</label><br>
			<input class="textcss" type="text" id="f_name" name="f_name" value=""><br>

			<label for="l_name">Last name</label><br>
			<input class="textcss" type="text" id="l_name" name="l_name" value=""><br>

			<label for="password_user">Password</label><br>
			<input class="textcss" type="password" id="password_user" name="password_user"><br>


			<label for="id_card">ID Card</label><br>
			<input class="textcss" type="text" id="id_card" name="id_card" value=""><br>

			<label for="salay">Salay</label><br>
			<input class="textcss" type="text" id="salay" name="salay" value=""><br>

			<label for="age">Age</label><br>
			<input class="textcss" type="text" id="age" name="age" value=""><br>

			<label for="ar">Access Rights</label><br>
			<input class="textcss" type="text" id="ar" name="ar" value=""><br><br>

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
                                    <li class="scroll active"><a style="cursor: pointer;" onclick="document.location='http://localhost/adminconfig/config.php'">ADMIN</a></li>
									<li class='scroll'><a style='cursor: pointer;' onclick='document.location="http://localhost/adminconfig/config.php"'>Member</a></li>
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
					<input type="text" class="form-control" id="live_search_admin" autocomplete="off" placeholder="Serach....Name"><br>
                    <div id="searchresultadmin"></div>
					<table class="table" id="table-admin">
                        <thead class="thead">
							<?php
								$sql = "SELECT * FROM employee;";
								$query = $conn->prepare($sql);
								$query->execute();
							?>
                            <tr>
								<th scope="col" class="th-css">ID</th>
								<th scope="col" class="th-css">Name</th>
								<th scope="col" class="th-css">ID Crad</th>
								<th scope="col" class="th-css">Salary</th>
								<th scope="col" class="th-css">Age</th>
								<th scope="col" class="th-css">Access Rights</th>
								<th scope="col" class="th-css">Action</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
							<?php 
								foreach ($query as $row) { 
								if ($row['access_rights'] == 'A'){
									$access = "Admin";
								}elseif ($row['access_rights'] == 'S'){
									$access = "Staff";
								}
								?>
										
								<tr>
									<td scope="row"><?=$row['employee_id'] ?></td>
									<td scope="row"><?=$row['f_name'] ?> <?=$row['l_name']?></td>
									<td scope="row"><?=$row['ID_card'] ?></td>
									<td scope="row"><?=$row['salary'] ?></td>
									<td scope="row"><?=$row['age'] ?></td>
									<td scope="row"><?=$access ?></td>
									<td scope="row" class="id-<?=$row['employee_id']?>"><i class="fa-regular fa-pen-to-square" style="cursor: pointer;" onclick="onedit('<?=$row['employee_id']?>','<?=$row['f_name'] ?>','<?=$row['l_name']?>','<?=$row['ID_card'] ?>','<?=$row['salary'] ?>','<?=$row['age'] ?>','<?=$row['access_rights'] ?>')"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-trash" style="cursor: pointer;" onclick="deletedata('<?=$row['employee_id']?>')"></i></td>
								</tr>
							<?php } ?>
								<tr>
									<td scope="row"></td>
									<td scope="row"></td>
									<td scope="row"></td>
									<td scope="row"></td>
									<td scope="row"></td>
									<td scope="row"></td>
                                    <td scope="row"><i class="fa-solid fa-plus" style="cursor: pointer;" onclick="adddate()"></i></td>
                                </tr>

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
			function onedit(id,fname,lname,idcard,sa,age,ar){
				if (ar == "A") {
					ar = "Admin";
				}else if(ar == "S"){
					ar = "Staff";
				}
				document.getElementById("edit").style.display = "block";
				document.getElementById("ID").value = id;
				document.getElementById("fname").value = fname;
				document.getElementById("lname").value = lname;
				document.getElementById("id_card").value = idcard;
				document.getElementById("salay").value = sa;
				document.getElementById("age").value = age;
				document.getElementById("ar").value = ar;
			}
			function closeed(){
				document.getElementById("edit").style.display = "none";
				document.getElementById("adddate").style.display = "none";
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
							window.location.assign("http://localhost/assets/php/deletedataadmin.php?page=" + user_id);
						}, 1000);
					}
				});
			}
			function adddate(){
                document.getElementById("adddate").style.display = "block";
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