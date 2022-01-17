<?php

include '../config.php';
include('../session.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';
include '../vendor/phpqrcode/qrlib.php';

  

//Reciept No
$csrId;
$vendor1;
$Rev_Officer;

$INV_No= $_GET['INV'];

$sql1 = "SELECT
                invoice.invNo,
                invoice.createdtime,
                invoice.vendorName,
                invoice.type,
                airticket.vPrice1,
                invoice.clientName,
                airticket.cost1,
                airticket.PaxName1,
                airticket.csrId,
                airticket.PNR1,
                airticket.TicketNo1,
                airticket.ticketType1,
                airticket.placeTo1,
                airticket.way1,
                airticket.placeFrom1,
                airticket.Airlines1,
                airticket.flight1,
                airticket.vendor1,
                invoice.recofficer
                FROM invoice
                INNER JOIN airticket ON invoice.invNo = airticket.invNo
                WHERE invoice.type = 'Issue' AND invoice.invNo = '$INV_No'";
$return = $conn->query($sql1);
if ($return->num_rows > 0) {
	while($data = $return->fetch_assoc()) {
        $csrId = $data['csrId'];
        $vendor1 = $data['vendor1'];
        $Rev_Officer = $data['recofficer']; 
        $Client_Name = $data['clientName'];
        $Vendor_Name = $data['vendorName'];
        $pax1 = $data['PaxName1'];
        $pnr1 = $data['PNR1'];
        $ticket1 = $data['TicketNo1'];
        $airlines1 = $data['Airlines1'];
        $from1 = $data['placeFrom1'];
        $to1 = $data['placeTo1'];
        $way1= $data['way1'];
        $type1= $data['ticketType1'];
        $price1 = $data['cost1'];
        $vprice1 = $data['vPrice1'];
        $flight1 = $data['flight1'];
        									
    }
}



// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $date = date("Y/m/d h:m:i");

    $text = "https://erp.flyfar.tech/AirInvoice/IssueInvoice.php?INV=$INV_No";
    $path = 'images/';
    $file = $path.$INV_No.".png";
    $ecc = 'L';
    $pixel_Size = 5;
    
    QRcode::png($text, $file, $ecc, $pixel_Size);

    $New_Ticket = $_POST['newticket'];
    $New_Ticket_price = $_POST['newprice'];
    $Vendor_Price = $_POST['newvprice'];
    $New_Date = $_POST['dateTime'];


    $invoice = "INSERT INTO `invoice`(
        `invNo`,
        `type`,
        `clientName`,
        `vendorName`,
        `csrId`,
        `system`,
        `recofficer`,
        `createdBy`
    )
    VALUES(
        '$INV_No',
        'ReIssue',
        '$Client_Name',
        '$Vendor_Name',
        '$csrId',
        ' ',
        '$Rev_Officer',
        '$userName'
    )";

if (mysqli_query($conn, $invoice)) {
    		
	
    $mrgenerate = "INSERT INTO `airticket`(
        `invNo`,
        `csrId`,
        `PaxName1`,
        `PNR1`,
        `TicketNo1`,
        `Airlines1`,
        `placeTo1`,
        `placeFrom1`,
        `cost1`,
        `vendor1`,
        `vPrice1`,       
        `way1`,
        `ticketType1`,       
        `flight1`

    )
    VALUES(
        '$INV_No',
        '$csrId',
        '$pax1',
        '$pnr1',
        '$New_Ticket',
        '$airlines1',
        '$from1',
        '$to1',
        '$New_Ticket_price',
        '$vendor1',
        '$Vendor_Price',
        '$way1',
        '$type1',
        '$New_Date'
        
    )";

	if (mysqli_query($conn, $mrgenerate)) {

        $ses_sql = mysqli_query($conn,"SELECT * FROM client_ledger where CSR_ID='$csrId' ORDER BY DateTime DESC LIMIT 1");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        
        $Balanced = $row['Balance'] - (int)$New_Ticket_price;
        

        $ClientLedger ="INSERT INTO `client_ledger`(`TxType`,`type`, `CSR_ID`, `PaxName`, `serviceType`, `Details`, `cost`, `Balance`)
                         VALUES ('$INV_No','ReIssue','$csrId','$pax1','$type1','$pnr1 $ticket1 $airlines1 $way1 $from1-$to1','$New_Ticket_price','$Balanced')";

        if (mysqli_query($conn, $ClientLedger)) {

            $ses_sql1 = mysqli_query($conn,"SELECT * FROM vendor_ledger where VDR_ID='$vendor1' ORDER BY DateTime DESC LIMIT 1");
            $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
            
            $vBalanced = (int)$row1['balance'] - (int)$Vendor_Price;


             $vendorLedger ="INSERT INTO `vendor_ledger`(`txType`,`type`, `VDR_ID`, `pax`, `pnr`, `ticket`, `serviceType`, `details`, `cost`,`balance`)
             VALUES ('$INV_No','ReIssue','$vendor1','$pax1','$pnr1','$ticket1','$type1','$airlines1 ' \n ' $way1 ' \n ' $from1-$to1','$Vendor_Price','$vBalanced')";

            if (mysqli_query($conn, $vendorLedger)) {

                echo '<script language="javascript">';
		        echo 'alert("Successfully Created"); location.href="IssueInvoice.php?INV='.$INV_No.'"';
		        echo '</script>';
                         
            }
            
             
        }
        
        
	}
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
                        <span class="user-img"><img class="rounded-circle" src="assets/img/profile.jpg" width="31"
                                alt="Ryan Taylor"></span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/profile.jpg" alt="User Image" class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <!-- #Username -->
                                <h6> <?php echo $userName; ?> </h6>
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

          <!-- SideBar -->

        <?php
        include '../sidebar.php';
        ?>

        <!-- SideBar -->
                    

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Re Issue Invoice</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Invoice</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
					<div class="col-md-12">
                     <form action="#" autocomplete="off" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Invoice  Details</h4>
										<div class="text-right">

									</div>

											
									</div>
									<div class="card-body">
										
											<div class="row">
												<div class="col-md-12">													
													<div class="row">

													    <div class="col-md-2">
															<div class="form-group">
																<label>Invoice No:</label>
																<input type="text" value="<?php echo $INV_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Client Name</label>
																<input type="text" value="<?php echo $Client_Name ?>" class="form-control" disabled>
															</div>
														</div>
                                                       
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label>Reservation officer</label>
                                                                <input type="text" value="<?php echo $Rev_Officer ?>" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                                                                                                         														
													</div>
                                                                                                     											

									</div>
								</div>
							</div>
						</div>
                    
                     <!---- Pax! -->
                    
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Pax Details</h4>
									</div>
									<div class="card-body">
										
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name</label>
                                                                    <input type="text" value="<?php echo $pax1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" value="<?php echo $pnr1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="newticket"  class="form-control">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <input type="text" value="<?php echo $airlines1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <input type="text" value="<?php echo $from1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <input type="text" value="<?php echo $to1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="text" name="dateTime" value="<?php echo $flight1 ?>" class="form-control">
                                                                    </div>
                                                                </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Way:</label>
                                                                    <input type="text" value="<?php echo $way1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Ticket Type</label>
                                                                    <input type="text" value="<?php echo $type1 ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Deal Price</label>
                                                                    <input type="text" name="newprice"  class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<input type="text" value="<?php echo $Vendor_Name ?>" class="form-control" disabled>
															</div>
                                                             </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Vendor Cost</label>
                                                                    <input type="number" name="newvprice" class="form-control" >
                                                                </div>
                                                            </div>													
                                                        </div>

                                                        <div class="text-right">
												    <button type="submit" class="btn btn-primary">Refund Issue</button>
											    </div>
									</div>
								</div>
							</div>
						</div>
                         <!---- Pax 1 -->
                         

                        
					</div>
														
					<!-- End Contant -->

                    </form>

                    
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