<?php

include '../config.php';



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Employees</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<!-- Datatables CSS -->
	<link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
	
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">
			
			<!-- Logo -->
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="logo.png" alt="Logo">
				</a>
				<a href="index.php" class="logo logo-small">
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
						<a class="dropdown-item" href="login.php">Logout</a>
					</div>
				</li>
				<!-- /User Menu -->
			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

		 <!-- Sidebar -->
		 <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li>
                            <a href="dashboard.php"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="salesQuotation.php"><i class="fe fe-layout"></i> <span>Sales Quotation</span></a>
                        </li>
                        <li>
                            <a href="invoice.php"><i class="fe fe-layout"></i> <span>Invoice</span></a>
                        </li>
                        <li>
                            <a href="Bill.php"><i class="fe fe-layout"></i> <span>Bill</span></a>
                        </li>
                        <li>
                            <a href="expense.php"><i class="fe fe-layout"></i> <span>Expense</span></a>
                        </li>
						<li>
							<a data-toggle="dropdown"><i class="fe fe-layout"></i> <span>Accounting</span></a>
								<ul>
									<li><a href="CashEquivalent.php"><i class="fe fe-layout"></i> <span>Cash And Cash</span></a></li>
									<li><a href="access.php"><i class="fe fe-layout"></i> <span>Acces control</span></a> </li>
									<li><a href="#"><i class="fe fe-layout"></i> Portal</a></li>
								</ul>
						</li>
                        <li>
                            <a href="moneyReceipt.php"><i class="fe fe-layout"></i> <span>Money Receipt</span></a>
                        </li>

                        <li>
                            <a href="payment.php"><i class="fe fe-layout"></i> <span>Payment</span></a>
                        </li>
                        <li>
                            <a href="transfer.php"><i class="fe fe-layout"></i> <span>Transfer</span></a>
                        </li>
                        <li>
                            <a href="project.php"><i class="fe fe-layout"></i> <span>Project</span></a>
                        </li>
                        <li>
                            <a href="employees.php"><i class="fe fe-layout"></i> <span>Employees</span></a>
                        </li>
                        <li>
                            <a href="Report.php"><i class="fe fe-layout"></i> <span>Report</span></a>
                        </li>

                        <li>
                            <a href="refund.php"><i class="fe fe-layout"></i> <span>Refund</span></a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

		

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Bank Details</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Bank Details</li>
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
									<h4 class="card-title">Bank Details</h4>
									<div class="text-right">
										<a href="AddNewBank.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Bank Name</th>
													<th>Account No</th>
													<th>Branch</th>
													<th>Amount</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$sql = "SELECT DISTINCT id, bankId, bankname,bankaccno, branchname, SUM(credit-debit) as Amount FROM bank GROUP BY bankname";
												$result = $conn->query($sql);
												$i=0;
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													  $bankgetID = $row["bankId"];												  													 
													echo "<tr><td>".$row["bankname"]."</td> 
														 		<td>".$row["bankaccno"]."</td>
																<td>".$row["branchname"]."</td>
														 		<td>".$row["Amount"]."</td>
																<td><a href='BankCredit.php?getBankId=$bankgetID' class='btn btn-success'> Credit </a>
																<a href='BankDebit.php?getBankId=$bankgetID' class='btn btn-danger'> Debit </a><td>
																 </tr>";   											
												  }
												} else {
  												echo "0 results";
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
			<!-- /Main Wrapper -->
			<!-- jQuery -->
			<script src="assets/js/jquery-3.2.1.min.js"></script>
			<!-- Bootstrap Core JS -->
			<script src="assets/js/popper.min.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<!-- Slimscroll JS -->
			<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
			<!-- Datatables JS -->
			<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="assets/plugins/datatables/datatables.min.js"></script>
			<!-- Custom JS -->
			<script  src="assets/js/script.js"></script>
		</body>
		</html>