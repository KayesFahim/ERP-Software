<?php

include '../config.php';
include('../session.php');

$bank = "SELECT SUM(credit - debit) as amount from bank";
$mobilebanking = "SELECT SUM(cashIn - cashOut) as amount from mobile_banking GROUP By mb_number";
$ssl = "SELECT * FROM `ssl_commerce`";
$cash = "SELECT SUM(cashIn - cashOut) as amount from cash";




$result = $conn->query($bank);
$result1 = $conn->query($mobilebanking);
$result2 = $conn->query($ssl);
$result3 = $conn->query($cash);


$Bank_Amount; $MobileBanking_Amount; $SSL_Amount; $Cash;

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$Bank_Amount = $row["amount"];

	}
}

// Mobile banking

if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()) {

	$MobileBanking_Amount = $row["amount"];
		
	}
}

//Portal Balanced

if ($result2->num_rows > 0) {
	while($row = $result2->fetch_assoc()) {
		$SSL_Amount = $row["amount"];



	}
}

//Cash Balanced

if ($result3->num_rows > 0) {
	while($row = $result3->fetch_assoc()) {
		$Cash = $row["amount"];



	}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Cash And Cash Equivalent</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<!-- Datatables CSS -->
	<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
	
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">
			
			<!-- Logo -->
			<div class="header-left">
				<a href="../index.php" class="logo">
					<img src="../logo.png" alt="Logo">
				</a>
				<a href="../index.php" class="logo logo-small">
					<!-- <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->
					<h4>YOUR LOGO</h4>
				</a>
			</div>
			<!-- /Logo -->

			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->

			<!-- Header Right Menu -->
			<ul class="nav user-menu">

				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fe fe-bell"></i> <span class="badge badge-pill">1</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profile.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Ashik </span> Schedule <span class="noti-title">Her appointment</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>

							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#"> View all Notifications</a>
						</div>
					</div>
				</li>
				<!-- /Notifications -->

				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="../assets/img/profile.jpg" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="../assets/img/profile.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<!-- #Username -->
								<h6> <?php echo $login_session; ?> </h6>
                                <p class="text-muted mb-0"><?php echo $userRole; ?></p>
							</div>
						</div>
						<a class="dropdown-item" href="">My Profile</a>
						<a class="dropdown-item" href="">Settings</a>
						<a class="dropdown-item" href="../logout.php">> Logout</a>
					</div>
				</li>
				<!-- /User Menu -->
			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

		
        <!-- Sidebar -->

		<?php
        	include '../sidebar.php';
        ?>	
			<!--- Sidebar --->
		

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Cash Equivalent</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">cash And cash Equivalent</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Contant -->
				
					<div class="col-md-12">
						
					</div>
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Cash Details</h4>									
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Item No: </th>
													<th>Account Type</th>
													<th>Amount</th>
													<th>Action</th>
													<th></th>
												</tr>
											</thead>
											<tbody>

												<tr>
												<td>01</td>
												<td>Bank</td> 
												<td><?php echo $Bank_Amount ?></td>												
												<td><a href='Bank.php' class='btn btn-primary'> View </a><td>
												</tr>
												<tr><td>02</td>
												<td>Mobile Banking</td> 
												<td><?php echo $MobileBanking_Amount ?></td>
												<td><a href='MobileBanking.php' class='btn btn-primary'> View </a><td>
												</tr>
												<tr>
												
												<td>03</td>
												<td>SSL Commerce</td>
												<td><?php echo $SSL_Amount ?></td>
												<td><a href='SSLCommerce.php' class='btn btn-primary'> View </a><td>
												</tr>
												<tr>
												<td>04</td>
												<td>Hand Cash</td>
												<td><?php echo $Cash ?></td>
												<td><a href='HandCash.php' class='btn btn-primary'> View </a><td>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<div class="col-md-3">						
					</div>
				</div>
				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			<!-- jQuery -->
			<script src="../assets/js/jquery-3.2.1.min.js"></script>
			<!-- Bootstrap Core JS -->
			<script src="../assets/js/popper.min.js"></script>
			<script src="../assets/js/bootstrap.min.js"></script>
			<!-- Slimscroll JS -->
			<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
			<!-- Datatables JS -->
			<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="../assets/plugins/datatables/datatables.min.js"></script>
			<!-- Custom JS -->
			<script  src="../assets/js/script.js"></script>
		</body>
		</html>