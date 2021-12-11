<?php

include '../config.php';
include('../session.php');


//Reciept No

$INV_No ="";
$sql1 = "SELECT * FROM `invoice` ORDER By id DESC LIMIT 1";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["invNo"]);
		$INV_No = "INV-".(int)$outputString + 1 ;									
 }
} else {
echo "0 results";
 }



//Employee Info

if (array_key_exists('search', $_GET)){
	$searchvar = $_GET['search'];
		
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

    $Client_Name = $_POST['client'];
    $Vendor_Name = $_POST['vendor'];
    $Pax_No = $_POST['pax'];
    $System =  $_POST['system'];
    $Class =  $_POST['class'];
    $Ticket_Type = $_POST['tickettype'];
    $Rev_Officer = $_POST['revofficer'];


    $invoice = "INSERT INTO `invoice`(
        `invNo`,
        `clientName`,
        `vendorId`,
        `pax`,
        `system`,
        `class`,
        `ticketType`,
        `recofficer`
    )
    VALUES(
        '$INV_No',
        '$Client_Name',
        '$Vendor_Name',
        '$Pax_No',
        '$System',
        '$Class',
        '$Ticket_Type',
        '$Rev_Officer'
    )";

if (mysqli_query($conn, $invoice)) {
    		
    //Pax
    $pax1 = $_POST['pax1'];
    $pnr1 = $_POST['pnr1'];
    $ticket1 = $_POST['ticket1'];
    $airlines1 = $_POST['airlines1'];
    $route1 = $_POST['route1']; 
    $from1 = $_POST['from1'];
    $to1 = $_POST['to1'];
    $price1 = $_POST['price1']; 

    //Pax2
    if(isset($_POST['pax2'])){
    $pax2 = $_POST['pax2'];
    $pnr2 = $_POST['pnr2'];
    $ticket2 = $_POST['ticket2'];
    $airlines2 = $_POST['airlines2'];
    $route2 = $_POST['route2']; 
    $from2 = $_POST['from2'];
    $to2 = $_POST['to2'];
    $price2 = $_POST['price2'];
    }else{
        $pax2 = " ";
        $pnr2 = " ";
        $ticket2 =" ";
        $airlines2 = " ";
        $route2 = " ";
        $from2 = " ";
        $to2 =" ";
        $price2 = " ";
    }

    //Pax3
    if(isset($_POST['pax3'])){
    $pax3 = $_POST['pax3'];
    $pnr3 = $_POST['pnr3'];
    $ticket3 = $_POST['ticket3'];
    $airlines3 = $_POST['airlines3'];
    $route3 = $_POST['route3']; 
    $from3 = $_POST['from3'];
    $to3 = $_POST['to3'];
    $price3 = $_POST['price3'];
    }else{
        $pax3 = " ";
        $pnr3 = " ";
        $ticket3 =" ";
        $airlines3 = " ";
        $route3 = " ";
        $from3 = " ";
        $to3 =" ";
        $price3 = " ";
    }

     //Pax4
     if(isset($_POST['pax4'])){
     $pax4 = $_POST['pax4'];
     $pnr4 = $_POST['pnr4'];
     $ticket4 = $_POST['ticket4'];
     $airlines4 = $_POST['airlines4'];
     $route4 = $_POST['route4']; 
     $from4 = $_POST['from4'];
     $to4 = $_POST['to4'];
     $price4 = $_POST['price4'];
     }else{
        $pax4 = " ";
        $pnr4 = " ";
        $ticket4 =" ";
        $airlines4 = " ";
        $route4 = " ";
        $from4 = " ";
        $to4 =" ";
        $price4 = " ";
     }

     //Pax 5
     if(isset($_POST['pax5'])){
     $pax5 = $_POST['pax5'];
     $pnr5 = $_POST['pnr5'];
     $ticket5 = $_POST['ticket5'];
     $airlines5 = $_POST['airlines5'];
     $route5 = $_POST['route5']; 
     $from5 = $_POST['from5'];
     $to5 = $_POST['to5'];
     $price5 = $_POST['price5'];
     }else{
        $pax5 = " ";
        $pnr5 = " ";
        $ticket5 =" ";
        $airlines5 = " ";
        $route5 = " ";
        $from5 = " ";
        $to5 =" ";
        $price5 = " ";

     }

	
    $mrgenerate = "INSERT INTO `airticket`(
        `invNo`,
        `PaxName1`,
        `PNR1`,
        `TicketNo1`,
        `Airlines1`,
        `Route1`,
        `placeFrom1`,
        `placeTo1`,
        `cost1`,
        `PaxName2`,
        `PNR2`,
        `TicketNo2`,
        `Airlines2`,
        `Route2`,
        `placeFrom2`,
        `placeTo2`,
        `cost2`,
        `PaxName3`,
        `PNR3`,
        `TicketNo3`,
        `Airlines3`,
        `Route3`,
        `placeFrom3`,
        `placeTo3`,
        `cost3`,
        `PaxName4`,
        `PNR4`,
        `TicketNo4`,
        `Airlines4`,
        `Route4`,
        `placeFrom4`,
        `placeTo4`,    
        `cost4`,
        `PaxName5`,
        `PNR5`,
        `TicketNo5`,
        `Airlines5`,
        `Route5`,
        `placeFrom5`,
        `placeTo5`,   
        `cost5`
    )
    VALUES(
        '$INV_No',
        '$pax1',
        '$pnr1',
        '$ticket1',
        '$airlines1',
        '$route1',
        '$from1',
        '$to1',
        '$price1',
        '$pax2',
        '$pnr2',
        '$ticket2',
        '$airlines2',
        '$route2',
        '$from2',
        '$to2',
        '$price2',
        '$pax3',
        '$pnr3',
        '$ticket3',
        '$airlines3',
        '$route3',
        '$from3',
        '$to3',
        '$price3',
        '$pax4',
        '$pnr4',
        '$ticket4',
        '$airlines4',
        '$route4',
        '$from4',
        '$to4',
        '$price4',
        '$pax5',
        '$pnr5',
        '$ticket5',
        '$airlines5',
        '$route5',
        '$from5',
        '$to5',
        '$price5'
    )";

	if (mysqli_query($conn, $mrgenerate)) {
        echo '<script language="javascript">';
		echo 'alert("Successfully Created"); location.href="Airinvoice.php?INV='.$INV_No.'"';
		echo '</script>';		
	} else {
		echo "Error: " . $mrgenerate . "<br>" . mysqli_error($conn);
	}

} else {
    echo "Error: " . $invoice . "<br>" . mysqli_error($conn);
}
	
	
}                                                                                    

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Add Invoice</title>
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

		<?php if($userRole == 'reservation'){
				print "<div class='sidebar' id='sidebar'>
					<div class='sidebar-inner slimscroll'>
						<div id='sidebar-menu' class='sidebar-menu'>
							<ul>
								<li class='menu-title'>
									<span>Main</span>
								</li>
								<li>
									<a href='Dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
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

				}elseif($userRole == 'admin' || $userRole =='developer'){

				echo "<div class='sidebar' id='sidebar'>
				<div class='sidebar-inner slimscroll'>
				<div id='sidebar-menu' class='sidebar-menu'>
					<ul>
						<li class='menu-title'>
							<span>Main</span>
						</li>
						<li>
							<a href='Dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
						</li>
						<li>
							<a href='salesQuotation.php'><i class='fe fe-layout'></i> <span>Sales Quotation</span></a>
						</li>
						<li>
							<a href='invoice.php'><i class='fe fe-layout'></i> <span>Invoice</span></a>
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
				</div>";}

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
										<h4 class="text-danger card-title">Invoice  Details</h4>
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
													<h4 class="card-title">Invoice Details</h4>
													<div class="row">

													<div class="col-md-3">
															<div class="form-group">
																<label>Reciept No:</label>
																<input type="text" value="<?php echo $INV_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Client Name</label>
																<input type="text" name="client" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor" class="select form-control" required>
                                                                            <option value="" disabled selected>Select Vendor</option>
                                                                            <?php
                                                                                $sql = "SELECT *  FROM `vendor` ORDER BY name DESC";
                                                                                $result = $conn->query($sql);
                                
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row["name"];	
                                                                                    echo "<option value=\"$vnName\">".$row["name"]."</option>";                                                                                 
                                                                                }
                                                                            }
                                                                                ?>
                                                                            
                                                                </select>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Pax No</label>
																<input type="number" name="pax" class="form-control" required>
															</div>
														</div>
														
													</div>
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>System</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                        <select name="system" class="select form-control" required>
                                                                            <option value="" disabled selected>Select System</option>
                                                                            <option value="Saber (GDS)">Saber (GDS)</option>
                                                                            <option value="Amadius (GDS)">Amadius (GDS)</option>
                                                                            <option value="Gallileo pee (GDS">Gallileo pee (GDS)</option>	
                                                                            <option value="Portal 1">Portal 1 </option>	
                                                                            <option value="Portal 2">Portal 2</option>	
                                                                            <option value="Portal 3">Portal 3</option>	
                                                                        </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Class</label>
                                                                    <select name="class" class="select form-control" required>
                                                                            <option value="" disabled selected>Cabin Class</option>
                                                                            <option value="Economy">Economy</option>
                                                                            <option value="Premium Economy">Premium Economy</option>	
                                                                            <option value="Business">Business</option>	
                                                                            <option value="First Class">First Class</option>	
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Ticket Type :</label>
                                                                    <select name="tickettype" class="select form-control" required>
                                                                            <option value="" disabled selected>Ticket Type</option>
                                                                            <option value="Non Refundable">Non Refundable</option>
                                                                            <option value="Refundable">Refundable</option>	
                                                                            <option value="Refund Adjusted">Refund Adjusted </option>	
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Reservation officer</label>
                                                                    <input type="name" name="revofficer" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name 1</label>
                                                                    <input type="text" name="pax1" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr1" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket1" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines1" class="select form-control" required>
                                                                            <option value="" disabled selected>*</option>
                                                                            <option value="6E">6E</option>
                                                                            <option value="AI">AI</option>
                                                                            <option value="BG">BG</option>
                                                                            <option value="BS">BS </option>
                                                                            <option value="CX">CX</option>
                                                                            <option value="CZ">CZ</option>
                                                                            <option value="EK">EK</option>
                                                                            <option value="EY">EY</option>
                                                                            <option value="FZ">FZ </option>	
                                                                            <option value="GF">GF </option>
                                                                            <option value="G9">G9 </option>
                                                                            <option value="G8">G8 </option>	
                                                                            <option value="H9">H9</option>
                                                                            <option value="J9">J9</option>
                                                                            <option value="KU">KU</option>
                                                                            <option value="MH">MH</option>
                                                                            <option value="MS">MS </option>	
                                                                            <option value="OD">OD</option>	
                                                                            <option value="OV">OV</option>
                                                                            <option value="QR">QR </option>	
                                                                            <option value="UL">UL</option>                                                                          
                                                                            <option value="UK">UK</option>
                                                                            <option value="SV">SV</option>
                                                                            <option value="SQ">SQ </option>
                                                                            <option value="SL">SL</option>
                                                                            <option value="SG">SG </option>
                                                                            <option value="TK">TK </option>	                                                                       
                                                                            <option value="TG">TG </option>  	
                                                                            <option value="VQ">VQ </option>                                                                                                                                                    
                                                                            <option value="WY">WY</option>
                                                                                                                                                      
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Route</label>
                                                                    <input type="text" name="route1" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <input type="text" name="from1" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <input type="text" name="to1" class="form-control" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price1" class="form-control" required>
                                                                </div>
                                                            </div>														
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name 2</label>
                                                                    <input type="text" name="pax2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines2" class="select form-control">
                                                                            <option value="" disabled selected>*</option>
                                                                            <option value="6E">6E</option>
                                                                            <option value="AI">AI</option>
                                                                            <option value="BG">BG</option>
                                                                            <option value="BS">BS </option>
                                                                            <option value="CX">CX</option>
                                                                            <option value="CZ">CZ</option>
                                                                            <option value="EK">EK</option>
                                                                            <option value="EY">EY</option>
                                                                            <option value="FZ">FZ </option>	
                                                                            <option value="GF">GF </option>
                                                                            <option value="G9">G9 </option>
                                                                            <option value="G8">G8 </option>	
                                                                            <option value="H9">H9</option>
                                                                            <option value="J9">J9</option>
                                                                            <option value="KU">KU</option>
                                                                            <option value="MH">MH</option>
                                                                            <option value="MS">MS </option>	
                                                                            <option value="OD">OD</option>	
                                                                            <option value="OV">OV</option>
                                                                            <option value="QR">QR </option>	
                                                                            <option value="UL">UL</option>                                                                          
                                                                            <option value="UK">UK</option>
                                                                            <option value="SV">SV</option>
                                                                            <option value="SQ">SQ </option>
                                                                            <option value="SL">SL</option>
                                                                            <option value="SG">SG </option>
                                                                            <option value="TK">TK </option>	                                                                       
                                                                            <option value="TG">TG </option>  	
                                                                            <option value="VQ">VQ </option>                                                                                                                                                    
                                                                            <option value="WY">WY</option>
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Route</label>
                                                                    <input type="text" name="route2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <input type="text" name="from2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <input type="text" name="to2" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price2" class="form-control">
                                                                </div>
                                                            </div>														
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name 3</label>
                                                                    <input type="text" name="pax3" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr3" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket3" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines3" class="select form-control">
                                                                            <option value="" disabled selected>* </option>
                                                                            <option value="6E">6E</option>
                                                                            <option value="AI">AI</option>
                                                                            <option value="BG">BG</option>
                                                                            <option value="BS">BS </option>
                                                                            <option value="CX">CX</option>
                                                                            <option value="CZ">CZ</option>
                                                                            <option value="EK">EK</option>
                                                                            <option value="EY">EY</option>
                                                                            <option value="FZ">FZ </option>	
                                                                            <option value="GF">GF </option>
                                                                            <option value="G9">G9 </option>
                                                                            <option value="G8">G8 </option>	
                                                                            <option value="H9">H9</option>
                                                                            <option value="J9">J9</option>
                                                                            <option value="KU">KU</option>
                                                                            <option value="MH">MH</option>
                                                                            <option value="MS">MS </option>	
                                                                            <option value="OD">OD</option>	
                                                                            <option value="OV">OV</option>
                                                                            <option value="QR">QR </option>	
                                                                            <option value="UL">UL</option>                                                                          
                                                                            <option value="UK">UK</option>
                                                                            <option value="SV">SV</option>
                                                                            <option value="SQ">SQ </option>
                                                                            <option value="SL">SL</option>
                                                                            <option value="SG">SG </option>
                                                                            <option value="TK">TK </option>	                                                                       
                                                                            <option value="TG">TG </option>  	
                                                                            <option value="VQ">VQ </option>                                                                                                                                                    
                                                                            <option value="WY">WY</option>
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Route</label>
                                                                    <input type="text" name="route3" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <input type="text" name="from3" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <input type="text" name="to3" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price3" class="form-control">
                                                                </div>
                                                            </div>														
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name 4</label>
                                                                    <input type="text" name="pax4" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr4" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket4" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines4" class="select form-control">
                                                                            <option value="" disabled selected>* </option>
                                                                            <option value="6E">6E</option>
                                                                            <option value="AI">AI</option>
                                                                            <option value="BG">BG</option>
                                                                            <option value="BS">BS </option>
                                                                            <option value="CX">CX</option>
                                                                            <option value="CZ">CZ</option>
                                                                            <option value="EK">EK</option>
                                                                            <option value="EY">EY</option>
                                                                            <option value="FZ">FZ </option>	
                                                                            <option value="GF">GF </option>
                                                                            <option value="G9">G9 </option>
                                                                            <option value="G8">G8 </option>	
                                                                            <option value="H9">H9</option>
                                                                            <option value="J9">J9</option>
                                                                            <option value="KU">KU</option>
                                                                            <option value="MH">MH</option>
                                                                            <option value="MS">MS </option>	
                                                                            <option value="OD">OD</option>	
                                                                            <option value="OV">OV</option>
                                                                            <option value="QR">QR </option>	
                                                                            <option value="UL">UL</option>                                                                          
                                                                            <option value="UK">UK</option>
                                                                            <option value="SV">SV</option>
                                                                            <option value="SQ">SQ </option>
                                                                            <option value="SL">SL</option>
                                                                            <option value="SG">SG </option>
                                                                            <option value="TK">TK </option>	                                                                       
                                                                            <option value="TG">TG </option>  	
                                                                            <option value="VQ">VQ </option>                                                                                                                                                    
                                                                            <option value="WY">WY</option>
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Route</label>
                                                                    <input type="text" name="route4" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <input type="text" name="from4" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <input type="text" name="to4" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price4" class="form-control">
                                                                </div>
                                                            </div>														
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name 5</label>
                                                                    <input type="text" name="pax5" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr5" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket5" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines5" class="select form-control">
                                                                            <option value="" disabled selected>* </option>
                                                                            <option value="6E">6E</option>
                                                                            <option value="AI">AI</option>
                                                                            <option value="BG">BG</option>
                                                                            <option value="BS">BS </option>
                                                                            <option value="CX">CX</option>
                                                                            <option value="CZ">CZ</option>
                                                                            <option value="EK">EK</option>
                                                                            <option value="EY">EY</option>
                                                                            <option value="FZ">FZ </option>	
                                                                            <option value="GF">GF </option>
                                                                            <option value="G9">G9 </option>
                                                                            <option value="G8">G8 </option>	
                                                                            <option value="H9">H9</option>
                                                                            <option value="J9">J9</option>
                                                                            <option value="KU">KU</option>
                                                                            <option value="MH">MH</option>
                                                                            <option value="MS">MS </option>	
                                                                            <option value="OD">OD</option>	
                                                                            <option value="OV">OV</option>
                                                                            <option value="QR">QR </option>	
                                                                            <option value="UL">UL</option>                                                                          
                                                                            <option value="UK">UK</option>
                                                                            <option value="SV">SV</option>
                                                                            <option value="SQ">SQ </option>
                                                                            <option value="SL">SL</option>
                                                                            <option value="SG">SG </option>
                                                                            <option value="TK">TK </option>	                                                                       
                                                                            <option value="TG">TG </option>  	
                                                                            <option value="VQ">VQ </option>                                                                                                                                                    
                                                                            <option value="WY">WY</option>	
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Route</label>
                                                                    <input type="text" name="route5" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <input type="text" name="from5" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <input type="text" name="to5" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price5" class="form-control">
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