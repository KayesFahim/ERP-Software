<?php

require '../config.php';
require('../session.php');
if($AddPermission !== 'yes'){
    echo '<script language="javascript">';
	echo 'alert("You Have No Pemission On This Page"); location.href="index.php"';
	echo '</script>';
}



$Vendor_Id ="";
$sql = "SELECT * FROM vendor ORDER BY vendorId DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["vendorId"]);
		$Vendor_Id = "VDR-".(int)$outputString + 1;									
 }
} else {
	$Vendor_Id ="VDR-1000";

}

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Role = $_POST['role'];


    $sqlquery = "INSERT INTO `users`(                                            
		`email`,
		`username`,
		`password`,
        `role`
		
    )
    VALUES(
        '$Email',
        '$Name',
        '$Password',
        '$Role'       
    )";
        
        if ($conn->query($sqlquery) === TRUE) {
            $success = "Data Saved successfully";
			echo '<script language="javascript">';
			echo 'alert("Successfully Created"); location.href="index.php"';
			echo '</script>';
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
        }
                                                                                       
}


											
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Add Role</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
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
					<img src="../logo.png" alt="Logo" width="30" height="30">
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
									<a href="">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="../assets/img/profile.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Employee </span> Schedule <span class="noti-title">her appointment</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>

							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
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
								<h6> <?php echo $userName; ?> </h6>
                                <p class="text-muted mb-0"><?php echo $userRole; ?></p>
							</div>
						</div>
						<a class="dropdown-item" href="">My Profile</a>
						<a class="dropdown-item" href="">Settings</a>
						<a class="dropdown-item" href="../logout.php">Logout</a>
					</div>
				</li>
				<!-- /User Menu -->
			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

	     
        <!-- Sidebar -->

        <?php if($userRole == 'reservation'){

            print "<div class='sidebar' id='sidebar'>
                <div class='sidebar-inner slimscroll'>
                    <div id='sidebar-menu' class='sidebar-menu'>
                        <ul>
                            <li class='menu-title'>
                                <span>Main</span>
                            </li>
                            <li>
                                <a href='../Dashboard.php'><i class='fe fe-home'></i> <span> Dashboard</span></a>
                            </li>
                            
                            <li>
                            <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Sales Quatation</span></a>
                                <ul>
                                    <li><a href='../SalesQuatation'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Invoice</span></a>
                                    <ul>
                                        <li><a href='../AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket </span></a></li>
                                        
                                    </ul>
                            </li>
                            <li>
                                <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Role</span></a>
                                    <ul>
                                    <li><a href='index.php'><i class='fe fe-layout'> </i> <span> All Role </span></a></li>
                                        <li><a href='AddRole.php'><i class='fe fe-layout'> </i> <span> Add Role </span></a></li>
                                        
                                    </ul>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>" ;

            }elseif($userRole == 'accounts'){
            print "<div class='sidebar' id='sidebar'>
            <div class='sidebar-inner slimscroll'>
            <div id='sidebar-menu' class='sidebar-menu'>
                <ul>
                    <li class='menu-title'>
                        <span>Main</span>
                    </li>
                    <li>
                        <a href='dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
                    </li>
                    
                    <li>
                        <a href='Bill.php'><i class='fe fe-layout'></i> <span>Bill</span></a>
                    </li>

                    <li>
                        <a href='MoneyReceipt.php'><i class='fe fe-layout'></i> <span>Money Receipt</span></a>
                    </li>
                    
                </ul>
            </div>
            </div>
            </div>" ;


            } elseif($userRole =='developer'){

            echo "<div class='sidebar' id='sidebar'>
            <div class='sidebar-inner slimscroll'>
            <div id='sidebar-menu' class='sidebar-menu'>
                <ul>
                    <li class='menu-title'>
                        <span>Main</span>
                    </li>
                    <li>
                        <a href='dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
                    </li>
                    <li>
                        <a href='SalesQuatation'><i class='fe fe-layout'></i> <span>Sales Quotation</span></a>
                    </li>
                    <li>
                        <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Invoice</span></a>
                            <ul>
                                <li><a href='AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
                                <li><a href='access.php'><i class='fe fe-layout'> </i> <span> Visa</span></a> </li>
                                <li><a href='#'><i class='fe fe-layout'></i> Others</a></li>
                            </ul>
                            </li>
                    <li>
                        <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Accounting</span></a>
                            <ul>
                                <li><a href='CashEquivalent.php'><i class='fe fe-layout'></i> <span>Cash And Cash</span></a></li>
                                <li><a href='access.php'><i class='fe fe-layout'></i> <span>Acces control</span></a> </li>
                                <li><a href='#'><i class='fe fe-layout'></i> Portal</a></li>
                            </ul>
                    </li>
                    <li>
                        <a href='Bill.php'><i class='fe fe-layout'></i> <span>Bill</span></a>
                    </li>
                    <li>
                        <a href='expense.php'><i class='fe fe-layout'></i> <span>Expense</span></a>
                    </li>
                    <li>
                        <a href='MoneyReceipt.php'><i class='fe fe-layout'></i> <span>Money Receipt</span></a>
                    </li>

                    <li>
                        <a href='Customer.php.php'><i class='fe fe-layout'></i> <span>Payment</span></a>
                    </li>
                    <li>
                        <a href='Salary/SalarySheet.php'><i class='fe fe-layout'></i> <span>Salary</span></a>
                    </li>
                    <li>
                        <a href='Customer.php.php'><i class='fe fe-layout'></i> <span>Payment</span></a>
                    </li>
                    <li>
                        <a href='employees.php'><i class='fe fe-layout'></i> <span>Employees</span></a>
                    </li>
                    
                </ul>
            </div>
            </div>
            </div>";
            }elseif($userRole == 'admin'){
            echo "<div class='sidebar' id='sidebar'>
            <div class='sidebar-inner slimscroll'>
            <div id='sidebar-menu' class='sidebar-menu'>
                <ul>
                    <li class='menu-title'>
                        <span>Main</span>
                    </li>

                    <li>
                        <a href='Inventory.php'><i class='fe fe-layout'></i> <span> Inventory</span></a>
                    </li>
                    
                    <li>
                        <a href='Salary/SalarySheet.php'><i class='fe fe-layout'></i> <span>Salary</span></a>
                    </li>
                    <li>
                        <a href='Attandance.php'><i class='fe fe-layout'></i> <span> Attandance</span></a>
                    </li>
                    <li>
                        <a href='Employees.php'><i class='fe fe-layout'></i> <span> Employees</span></a>
                    </li>
                    
                    

                </ul>
            </div>
            </div>
            </div>";

            }
            
            ?>	
            <!--- Sidebar --->

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Add New Role</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Role</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				

				<!-- Contant -->
				<div class="row">					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										
									</div>
                                    
                                     <?php if(isset($success)){
                                        echo "<div class='alert alert-success' role='alert'> $success  </div> ";
                                            }
                                      ?>

									<div class="card-body">
										<form action="#" autocomplete="off" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">														
														<div class="col-md-3">
															<div class="form-group">
																<label>Name</label>
																<input type="text" name="name" class="form-control" required>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Email</label>
																<input type="email" name="email" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Password</label>
																<input type="password" name="password" class="form-control" required>
															</div>
														</div>

                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Role</label>
																<div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                        <select name="role" class="select form-control"  required>
                                                                            <option value="" disabled selected>Select Role</option>
                                                                            
                                                                            <?php if($userRole == 'admin'){
                                                                                echo '<option value="admin">Adminstrator</option>';
                                                                                echo '<option value="manager">Manager</option>';
                                                                                echo '<option value="reservation">Reservation</option>';
                                                                                echo '<option value="accounts">Accounts</option>';
                                                                                echo '<option value="executive">Executive</option>';
                                                                            }elseif($userRole == 'reservation'){                                                                               
                                                                                echo '<option value="reservation">Reservation</option>';
                                                                            }
                                                                             ?>
                                                                           	                                                                           
                                                                        </select>
                                                                        </div>
                                                                    </div>
															</div>
														</div>

                                                       
                                                        
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Add Role </button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->
            
						</div>


					</div>
					<!-- End Contant -->
                    
					</div>	                   
				</div>

				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			<input type="hidden" id="refresh" value="no">

			<script>
				jQuery( document ).ready(function( $ ) {
				//Use this inside your document ready jQuery 
				$(window).on('popstate', function() {
				location.reload(true);
				});

				});
			</script>
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

