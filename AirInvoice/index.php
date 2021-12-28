<?php

include '../config.php';
include('../session.php');


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Invoice</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
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
				<a href="index.php" class="logo">
					<img src="../logo.png" alt="Logo">
				</a>
				<a href="index.php" class="logo logo-small">
					<img src="../assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->

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
						<span class="user-img"><img class="rounded-circle" src="assets/img/profile.jpg" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profile.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<!-- #Username -->
								<h6>Admin</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="">My Profile</a>
						<a class="dropdown-item" href="">Settings</a>
						<a class="dropdown-item" href="logout.php">Logout</a>
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
							<h3 class="page-title">Air Ticket Invoice</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Air Ticket</li>
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
									<div class="text-right">
										<a href="Issue.php" class="btn btn-primary"> Create +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Issue Date</th>
													<th>Type </th>
													<th>Amount</th>
													<th>Vendor Cost</th>
													<th>Profit</th>
													<th>Client Name</th>
													<th>Action</th>
													<th> </th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT
														invoice.invNo,
														invoice.createdtime,
														invoice.type,
														SUM(airticket.vPrice1 + airticket.vPrice2 + airticket.vPrice3 + airticket.vPrice4 + airticket.vPrice1) As vCost,
														invoice.pax,
														invoice.clientName,
														SUM(
															airticket.cost1 + airticket.cost2 + airticket.cost3 + airticket.cost4 + airticket.cost5
														) AS Amount

														FROM invoice
														INNER JOIN airticket ON invoice.invNo = airticket.invNo
														Group By createdtime DESC";

												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$INV = $row["invNo"];
													$Profit = $row['Amount'] -  $row['vCost'];

													$start = date("2021-12-26 4:31:09");
													$end = date("Y-m-d H:i:s");
													$timediff = date("H",strtotime($start) - strtotime($end)); 
													$totaltime = ($end - $start); 
													$hours = intval($totaltime / 3600);

													echo "<tr>
																<td>".$row["createdtime"]. "</td> 
														 		<td>".$row["Amount"]."</td>
																 <td>".$timediff."</td>
														 		<td>".$row["vCost"]."</td>
																<td>".$Profit."</td>
																<td>".$row["clientName"]."</td>
																<td><a href='Isuee.php?INV=$INV' class='btn btn-primary'> View </a>
																<a href='ReIssue.php?INV=$INV' class='btn btn-primary'> Reissue </a>
																<a href='Void.php?INV=$INV' class='btn btn-primary'> Refund </a> ";

													if($hours < 24){
															echo "<a href='Void.php?INV=$INV' class='btn btn-primary'> Void </a><td></tr>";
													}
																 											
												  }
												}
												?>
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