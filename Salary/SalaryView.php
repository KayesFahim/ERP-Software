<?php
include '../config.php';
include('../session.php');

$encryption = $_GET['empId'];
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$decryption_iv  = '1234567891011121';
$decryption_key  = "FlyFarInterNational";
$decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);


$sql = ""


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Salary Sheet</title>
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
				<a href="../index.php" class="logo">
					<img src="../logo.png" alt="Logo">
				</a>
				<a href="../index.php" class="logo logo-small">
					<img src="assets/img/logo-small.png" alt="Logo" width="30" height="30">
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
												<img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profile.jpg">
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
							<h3 class="page-title">Salary Sheet</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Salary</li>
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
									<h4 class="card-title">Salary Detail</h4>
									<div class="text-right">
										<a href="CreateSalary.php?empId=<?php echo $encryption; ?>" class="btn btn-primary"> Create Salary +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Issue Date</th>
													<th>Salary</th>
													<th>Late</th>
													<th>Absent</th>
                                                    <th>Lunch</th>
													<th>Advanced</th>
													<th>Missing</th>
													<th>LOS</th>
                                                    <th>Net Salary</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

                                                    $sql = "SELECT employee_salary.id, employee_salary.issueDate, emp_jobinfo.salary As Salary,
                                                            employee_salary.deductionDay, employee_salary.absentAmount, employee_salary.lunchMeal,
                                                            employee_salary.timesheetmiss, employee_salary.advanceSalary, employee_salary.lossOfService,
                                                            SUM(Salary - deductionDay - absentAmount -lunchMeal - 
                                                            timesheetmiss -advanceSalary -lossOfService) AS NetSalary FROM employee_salary
                                                            INNER JOIN emp_jobinfo ON employee_salary.EMP_ID = emp_jobinfo.EMP_ID 
                                                            AND employee_salary.EMP_Id='$decryption' GROUP BY id ORDER BY issueDate DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  
													echo "<tr><td>".$row["issueDate"]."</td>
																<td>".$row["Salary"]."</td> 
														 		<td>".$row["deductionDay"]."</td>						
														 		<td>".$row["absentAmount"]."</td>
																 <td>".$row["lunchMeal"]."</td>
                                                                 <td>".$row["advanceSalary"]."</td>						
														 		<td>".$row["timesheetmiss"]."</td>
																 <td>".$row["lossOfService"]."</td>
                                                                 <td>".$row["NetSalary"]."</td>
																<td><a href='SalaryView.php?empId=$encryption' class='btn btn-primary'> Print </a><td>
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