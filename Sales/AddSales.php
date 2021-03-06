<?php

include '../config.php';
include('../session.php');


//Reciept No

$Reciept_No ="";
$sql = "SELECT * FROM moneyreciept ORDER BY recieptNo DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["recieptNo"]);
		$Reciept_No = "RCP-".(int)$outputString + 1 ;									
 }
} else {
echo "0 results";
 }



//Employee Info

$searchvar = $_GET['search'];


if(!empty($searchvar)){
$Customer_Name=" ";
$Customer_Email=" ";
$Customer_Address=" ";
$Customer_Phone=" ";
$Customer_Id=" ";


$sql = "SELECT * FROM customer where CustomerId='$searchvar' or phone='$searchvar' or email='$searchvar'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$Customer_Id = $row["CustomerId"];
        $Customer_Name = $row["name"];
        $Customer_Email = $row["email"];
        $Customer_Address = $row["address"];
        $Customer_Phone = $row["phone"];     								
	}
} else {
echo "No Result Found";
 }
}else{
	$Customer_Name=" ";
	$Customer_Email=" ";
	$Customer_Address=" ";
	$Customer_Phone=" ";

}


// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    $amount = $_POST['amount'];
    $payWay = $_POST['paymentway'];
    $payMethod = $_POST['paymentmethod'];
    $issueDate = date("d/m/Y");
    $TxId = $_POST['txid']; 

/*
    $mrgenerate = "INSERT INTO `moneyreciept`(
		`recieptNo`,
		`createdBy`,
		`customerId`,
		`issueDate`,
		`TxId`,
		`amount`,
		`paymentMethod`,
		`paymentId`,
		`comment`
	)
	VALUES(
		'$Reciept_No',
		'[value-2]',
		'$Customer_Id',
		'$issueDate',
		'$TxId',
		'$amount',
		'$payWay',
		'$payMethod',
		'$comment'
	)";
	*/
	
	if($payWay == 'bank'){



	}elseif($payWay == 'cash'){


	}elseif($payWay == 'mobile_banking'){
		

	}elseif($payWay == 'ssl_commerce'){


	}

     /*   
    if ($conn->query($sqlquery) === TRUE) {
            $success = "Record inserted successfully";
    } else {
            $error = "Error: " . $sqlquery . "<br>" . $conn->error;
    }

*/
	
                                                                                       
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Add Money Reciept</title>
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
					<h4>YOUR LOGO</h4>
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
							<h3 class="page-title">Money Receipt</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../project.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Money Receipt</li>
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
										<h4 class="text-danger card-title">Customer Details</h4>
										<div class="text-right">
											<a href="../Customer/AddCustomer.php" class="btn btn-primary"> Add Customer</a>
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
																<input type="text" value="<?php echo $Reciept_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Name:</label>
																<input type="text" value="<?php echo $Customer_Name ?>" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone: </label>
																<input type="phone" value="<?php echo $Customer_Phone ?>" class="form-control">
															</div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-md-4">
																<div class="form-group">
																	<label>Email :</label>
																	<input type="email" value="<?php echo $Customer_Email ?>" class="form-control">
																</div>
															</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>BCC :</label>
																<input type="email" name="bccemail"  class="form-control">
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>Purchase Item Description :</label>
																<input type="text" name="comment" class="form-control">
															</div>
														</div>
												


													</div>
													<div class="row">
														<div class="col-md-3">
																<div class="form-group">
																	<label>Amount :</label>
																	<input type="number" name="amount" class="form-control">
																</div>
															</div>

														<div class="col-md-3">
															<div class="form-group">
																<label>Attachement :</label>
																<input type="file" name="amount" class="form-control">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Address :</label>
																<input type="text" value="<?php echo $Customer_Address ?>" class="form-control">
															</div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Payment Method:</label>
																<div class="form-group row">
																	<div class="col-lg-12">																	
																	<select name="paymentway" class="select form-control">
																		<option value="" disabled selected>Select Payment Way</option>
																		<option value="cash">Cash</option>
																		<option value="bank">Bank</option>
																		<option value="ssl_commerce">SSL_commerce</option>
																		<option value="mobile_banking">Mobile Banking</option>
																	</select>

																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Payment A/C:</label>
																<div class="form-group row">
																	<div class="col-lg-12">
																	<select name="paymentmethod" class="select form-control">
																		<option value="" disabled selected>Select Payment Method</option>
																		<option value="cash">Cash</option>
																		<option value="ssl_commerce">SSL_commerce</option>
																		<option value="city">City Bank Limited</option>	
																		<option value="brac">Brac Bank </option>	
																		<option value="islami">Islami Bank</option>	
																		<option value="sonali">Sonali Bank</option>	
																		<option value="dutch">Dutch Bangla Bank</option>	
																		<option value="commercial">Commercial Bank</option>	
																		<option value="ncc">NCC Bank</option>	
																		<option value="modhumoti">Modhumoti Bank</option>	
																		<option value="mobile_banking">Mobile Banking</option>
																		

																	</select>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Reference No:</label>
																<input type="text" name="txid" class="form-control">
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
					

					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Expense Detail</h4>
								</div>
								<div class="card-body">

									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Reciept No:</th>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Created By</th>
													<th>Customer</th>
                                                    <th>Payment Method</th>
													
                                                    <th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

													$sql = "SELECT recieptNo, createdBy, customerId, issueDate, TxId, amount, paymentMethod, paymentId   FROM `moneyreciept` ORDER BY id DESC LIMIT 5";
													$result = $conn->query($sql);

													if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {	
														$Rno = $row["recieptNo"];
														echo "<tr><td>".$row["recieptNo"]."</td>
																	<td>".$row["issueDate"]."</td> 
																	<td>".$row["amount"]."</td>
																	<td>".$row["createdBy"]."</td>
																	<td>".$row["customerId"]."</td>
																	<td>".$row["paymentMethod"]."</td>
																	<td><a href='Invoice.php?Rno=$Rno' class='btn btn-primary'> <i class='fe fe-print'></i> </a>
																	<a href='Invoice.php?Rno=$Rno' class='btn btn-success'> <i class='fe fe-edit'></i> </a>
																	<a href='Invoice.php?Rno=$Rno' class='btn btn-danger'> <i class='fe fe-trash'></i> </a>
																	<a href='Invoice.php?Rno=$Rno' class='btn btn-danger'> <i class='fe fe-mail'></i> </a>
																	</tr>";   											
													}
													} else {
													echo "0 results";
													}
													?>
                                                    </td>
												</tr>
											</tbody>
										</table>
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
			<script>
			jQuery(function($) {
				var locations = {
					'Bank': ['City Bank Limited', 'Brac Bank', 'Islami Bank', 'Sonali Bank', 'Dutch Bangla Bank','Commercial Bank', 'NCC Bank', 'Modhumoti Bank' ],
					'Cash' : ['Hand Cash'],
					'SSL_commerce' : ['Total Payable'],
					'Mobile Banking': ['Bkash', 'Nagad', 'Rocket']
					
				}

				var $locations = $('#paymentmethod');
				$('#paymentway').change(function () {
					var country = $(this).val(), lcns = locations[country] || [];

					var html = $.map(lcns, function(lcn){
						return '<option value="' + lcn + '">' + lcn + '</option>'
					}).join('');
					$locations.html(html)
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