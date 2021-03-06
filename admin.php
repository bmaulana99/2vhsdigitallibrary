<?php 
session_start();
if (empty($_SESSION['user'])) {
	header('location : adminlogin.php');

}else{
$admin = $_SESSION['user'];


 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="assets/css/Vendor/Bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/font-awesome.min.css" rel="stylesheet "type="text/css" />
		<link href="assets/css/Vendor/Bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/Vendor/pushmenu/default.css" rel="stylesheet" type="text/css"  />
		<link href="assets/css/Vendor/pushmenu/component.css" rel="stylesheet" type="text/css"  />
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
		<link href="assets/css/admin.css" rel="stylesheet" type="text/css">
		<script src="assets/js/vendor/pushmenu/modernizr.custom.js"></script>
		<title>2 VHS DIGLIB - ADMIN</title>
	</head>
	<body class="cbp-spmenu-push">
		 <!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					 
					<img class="logo" src="assets/images/logo1.png" />
					<a class="navbar-brand" style="	font-weight: bold;font-size: 28px;margin-top: 5px;" href="#">2 VHS</a>
					<a class="navbar-brand" style="font-size: 12px; margin-top: 28px;margin-left: -135px;font-style: italic;color: #35B766;font-weight: 700;" href="#">DIGITAL LIBRARY</a>
					<div id="toggle-hide">
						<i class="fa fa-bars" id="showLeft"></i>
					</div>
				</div>
				<div id="menu" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="admin.php">Dashboard</a></li>
						<li><a href="managemember.html">Manage Member</a></li>
						<li><a href="managemember.html">Manage Book's</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Transaksi<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="managebook.html.html">Peminjaman</a></li>
								<li><a href="managebook.html.html">Pengembalian</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Report<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="managebook.html.html">Member</a></li>
								<li><a href="managebook.html.html">Book's</a></li>
								<li><a href="managebook.html.html">Magazine's</a></li>
								<li><a href="managebook.html.html">Journal</a></li>
								<li><a href="managebook.html.html">Data Peminjaman</a></li>
								<li><a href="managebook.html.html">Data Pengembalian</a></li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="assets/images/avatar1_small.jpg">
                            </span>
                            <span class="username">Hello ! <?php echo $admin ?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li class="eborder-top">
                                <a href="#">My Profile</a>
                            </li>
                            <li>
                                <a href="#">Setting</a>
                            </li>
                            <li>
                                <a href="#">Total Visitor</a>
                            </li> 
                            <li>
                                <a href="act/act_logout.php">Log Out</a>
                            </li>
                        </ul>
                    </li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		<!--end fixed navbar  -->
		<!-- Push slider menu -->
		<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
			<a href="#">HOME</a>
			<a href="#">GALLERY</a>
			<a href="#">ABOUT</a>
			<a href="#">CONTACT</a>
		</nav>
		<!--End push menu  -->
		<div id="main">
			<div class="row">
				<div class="col-lg-12">
					<div class="action-btn">
						<button type="button" class="btn btn-primary">MEMBER</button>	
					</div>
				</div>
				<h1 class="center">Data Member</h1>
			</div>
			

			<?php 
			require 'config/database.php';

			$pdo = Con::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "SELECT * FROM tb_user";
			$q = $pdo->prepare($sql);
			$data = $q->fetch(PDO::FETCH_ASSOC);
			Con::disconnect();
			?>





			<table class="table table-striped">
				<thead>
					<tr class="head">
						<th>User ID</th>
						<th>Username</th>
						<th>Full Name</th>
						<th>Gender</th>
						<th>Born</th>
						<th>Address</th>
						<th>Email</th>
						<th>Class</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php $data['id_user']; ?> </td>	
						<td><?php $data['username']; ?> </td>									
						<td><?php $data['first_name'].' '.$data['last_name'] ; ?></td>
						<td><?php $data['gender']; ?></td>
						<td><?php $data['born']; ?></td>
						<td><?php $data['address']; ?></td>
						<td><?php $data['email']; ?></td>
						<td><?php $data['class']; ?></td>
						
					</tr>
				</tbody>
			</table>



				<h1 class="center">Data Book's</h1>
			<table class="table table-striped">
				<thead>
					<tr class="head">
						<th>Book ID</th>
						<th>Type</th>
						<th>Tittle Book</th>
						<th>Genre</th>
						<th>Creator</th>
						<th>Publisher</th>
						<th>Name of Borrow</th>
						<th>Date of Borrow</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>	
					</tr>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>	
					<tr>
					<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>	
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>
					<tr>
						<td>280730</td>										
						<td>Book</td>
						<td>Diamond In The Sky</td>
						<td>Romance</td>
						<td>bill</td>
						<td>Big Boos</td>
						<td>Big Boos</td>
						<td>17-12-2015</td>
					</tr>
				</tbody>
			</table>
			
		</div>
		
		<footer>
			<p class="text-muted">Created by<a href="#" class="madewithlove"> Billy Maulana, Aris Purnomo, M. Zalaludin Akbar, Habib Ali F. </a> Copyright © 2015</p>
		</footer>
		<!-- Javascript Push Menu -->
		<script src="assets/js/vendor/pushmenu/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				menuRight = document.getElementById( 'cbp-spmenu-s2' ),
				menuTop = document.getElementById( 'cbp-spmenu-s3' ),
				menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
				showLeft = document.getElementById( 'showLeft' ),
				showRight = document.getElementById( 'showRight' ),
				showTop = document.getElementById( 'showTop' ),
				showBottom = document.getElementById( 'showBottom' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				showRightPush = document.getElementById( 'showRightPush' ),
				body = document.body;

			showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeft' );
			};
			showRight.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );
				disableOther( 'showRight' );
			};
			showTop.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuTop, 'cbp-spmenu-open' );
				disableOther( 'showTop' );
			};
			showBottom.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuBottom, 'cbp-spmenu-open' );
				disableOther( 'showBottom' );
			};
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			showRightPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toleft' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );
				disableOther( 'showRightPush' );
			};

			function disableOther( button ) {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
				if( button !== 'showRight' ) {
					classie.toggle( showRight, 'disabled' );
				}
				if( button !== 'showTop' ) {
					classie.toggle( showTop, 'disabled' );
				}
				if( button !== 'showBottom' ) {
					classie.toggle( showBottom, 'disabled' );
				}
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
				if( button !== 'showRightPush' ) {
					classie.toggle( showRightPush, 'disabled' );
				}
			}
		</script>
	</body>
	<script src="assets/js/vendor/Jquery/jquery.min.js"></script>
	<script src="assets/js/vendor/Bootstrap/bootstrap.min.js"></script>
</html>




<?php } ?>