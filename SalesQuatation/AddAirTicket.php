<?php

include '../config.php';
include('../session.php');


//Reciept No

$SQ_No ="";
$sql = "SELECT * FROM salesqutation ORDER BY sqNo  DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["sqNo"]);
		$SQ_No = "SQT-".(int)$outputString + 1 ;									
 }
} else {
	$SQ_No ="SQT-1000";

 }



 if ($_SERVER["REQUEST_METHOD"] == "POST") { 	
	 
	$Client_Name = $_POST['client'];
	$Pax_No = $_POST['pax'];
    //Pax
    $pax1 = $_POST['pax1'];
    $route1 = $_POST['route1']; 
    $price1 = $_POST['price1']; 

    //Pax2
    if(isset($_POST['pax2'])){
    $pax2 = $_POST['pax2'];
   
    $route2 = $_POST['route2']; 

    $price2 = $_POST['price2'];
    }else{
        $pax2 = " ";
        $route2 = " ";   
        $price2 = " ";
    }

    //Pax3
    if(isset($_POST['pax3'])){
    $pax3 = $_POST['pax3'];   
    $route3 = $_POST['route3']; 
    $price3 = $_POST['price3'];
    }else{
        $pax3 = " ";
        $route3 = " ";
        $price3 = " ";
    }

     //Pax4
     if(isset($_POST['pax4'])){
     $pax4 = $_POST['pax4'];
     $route4 = $_POST['route4']; 
     $price4 = $_POST['price4'];
     }else{
        $pax4 = " ";
        $route4 = " ";
        $price4 = " ";
     }

     //Pax 5
     if(isset($_POST['pax5'])){
     $pax5 = $_POST['pax5'];
     $route5 = $_POST['route5']; 
     $price5 = $_POST['price5'];
     }else{
        $pax5 = " ";
        $route5 = " ";
        $price5 = " ";

     }

	
    $mrgenerate = "INSERT INTO `salesqutation`(
        `sqNo`,
		`createdBy`,
		`clientName`,
		`pax`,
		`PaxName1`,
		`Route1`,
		`cost1`,
		`PaxName2`,
		`Route2`,
		`cost2`,
		`PaxName3`,
		`Route3`,
		`cost3`,
		`PaxName4`,
		`Route4`,
		`cost4`,
		`PaxName5`,
		`Route5`,
		`cost5`
    )
    VALUES(
        '$SQ_No',
		'$userName',
		'$Client_Name',
		'$Pax_No',
        '$pax1',
        '$route1',
        '$price1',
        '$pax2',
        '$route2',
        '$price2',
        '$pax3',
        '$route3',
        '$price3',
        '$pax4',
        '$route4',
        '$price4',
        '$pax5',
        '$route5',
        '$price5'
    )";

	if (mysqli_query($conn, $mrgenerate)) {
        echo '<script language="javascript">';
		echo 'alert("Successfully Created"); location.href="Invoice.php?SQT='.$SQ_No.'"';
		echo '</script>';		
	} else {
		echo "Error: " . $mrgenerate . "<br>" . mysqli_error($conn);
	}

}	
                                                                           

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Add Sales Quatation</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
					<img src="../logo.png" alt="Logo" width="30" height="30">
				</a>
			</div>
			<!-- /Logo -->

			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<div class="top-nav-search">
				<form>
					<input type="text" name="search" class="form-control" placeholder="Search here">
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
												<p class="noti-details"><span class="noti-title">Farhana </span> Schedule <span class="noti-title">her appointment</span></p>
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
						<span class="user-img"><img class="rounded-circle" src="assets/img/profile.jpg" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profile.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<!-- #Username -->
								<h6> <?php echo $login_session; ?> </h6>
                                <p class="text-muted mb-0"><?php echo $userRole; ?></p>
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
					 <a href='../dashboard.php'><i class='fe fe-home'></i> <span> Dashboard</span></a>
				 </li>
				 
				 <li>
				 <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Sales Quatation</span></a>
					 <ul>
						 <li><a href='SalesQuatation'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
						 
					 </ul>
				  </li>

				 <li>
					 <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Invoice</span></a>
						 <ul>
							 <li><a href='../AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket </span></a></li>
							 
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
			 <a href='salesQuotation.php'><i class='fe fe-layout'></i> <span>Sales Quotation</span></a>
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
			 <a href='moneyReceipt.php'><i class='fe fe-layout'></i> <span>Money Receipt</span></a>
		 </li>

		 <li>
			 <a href='payment.php'><i class='fe fe-layout'></i> <span>Payment</span></a>
		 </li>
		 <li>
			 <a href='Salary/SalarySheet.php'><i class='fe fe-layout'></i> <span>Salary</span></a>
		 </li>
		 <li>
			 <a href='project.php'><i class='fe fe-layout'></i> <span>Project</span></a>
		 </li>
		 <li>
			 <a href='employees.php'><i class='fe fe-layout'></i> <span>Employees</span></a>
		 </li>
		 <li>
			 <a href='Report.php'><i class='fe fe-layout'></i> <span>Report</span></a>
		 </li>

		 <li>
			 <a href='refund.php'><i class='fe fe-layout'></i> <span>Refund</span></a>
		 </li>
		 

	 </ul>
 </div>
</div>
</div>";}elseif($userRole == 'admin'){
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
							<h3 class="page-title">Add Sales Quatation</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../project.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Sales Quatation</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Sales Quatation Details</h4>
										<div class="text-right">
										

										<?php if(isset($success)){
                                        echo "<div class='alert alert-success' role='alert'> $success  </div> ";
                                            }
                                      ?>
									</div>

											
									</div>
									<div class="card-body">
										<form action="" method="post">
											<div class="row">
												<div class="col-md-12">
													<h4 class="card-title">Details</h4>
													<div class="row">

													<div class="col-md-4">
															<div class="form-group">
																<label>Reciept No:</label>
																<input type="text" value="<?php echo $SQ_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Bill To:</label>
																<input type="text" name="client" class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Pax No</label>
																<input type="number" name="pax" class="form-control" required>
															</div>
														</div>
														
													</div>
                                                    <div class="row">
                                                    <div class="col-md-4">
															<div class="form-group">
																<label>Pax Name 1</label>
																<input type="text" name="pax1" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Route</label>
																<input type="text" name="route1" class="form-control" required>
															</div>
														</div>
														
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Amount</label>
																<input type="number" name="price1" class="form-control" required>
															</div>
														</div>														
													</div>
                                                    
                                                    <div class="row">
                                                    <div class="col-md-4">
															<div class="form-group">
																<label>Pax Name 2</label>
																<input type="text" name="pax2" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Route</label>
																<input type="text" name="route2" class="form-control" required>
															</div>
														</div>
														
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Amount</label>
																<input type="number" name="price2" class="form-control" required>
															</div>
														</div>
														
													</div>
                                                    <div class="row">
                                                    <div class="col-md-4">
															<div class="form-group">
																<label>Pax Name 3</label>
																<input type="text" name="pax3" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Route</label>
																<input type="text" name="route3" class="form-control" required>
															</div>
														</div>
														
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Amount</label>
																<input type="number" name="price3" class="form-control" required>
															</div>
														</div>
														
													</div>

                                               <div class="row">
                                                    <div class="col-md-4">
															<div class="form-group">
																<label>Pax Name 4</label>
																<input type="text" name="pax4" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Route</label>
																<input type="text" name="route4" class="form-control" required>
															</div>
														</div>
														
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Amount</label>
																<input type="number" name="price4" class="form-control" required>
															</div>
														</div>
														
													</div>
                                               
                                               <div class="row">
                                                    <div class="col-md-4">
															<div class="form-group">
																<label>Pax Name 5</label>
																<input type="text" name="pax5" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Route</label>
																<input type="text" name="route5" class="form-control" required>
															</div>
														</div>
														
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Amount</label>
																<input type="number" name="price5" class="form-control" required>
															</div>
														</div>
														
													</div>
                                               </div>

                                            </div>

											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Generate</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
														
					<!-- End Contant -->
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