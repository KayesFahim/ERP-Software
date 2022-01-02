<?php

include '../config.php';
include('../session.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';
include '../vendor/phpqrcode/qrlib.php';

  

//Reciept No

$sql1 = "SELECT * FROM `invoice` ORDER By id DESC LIMIT 1";
$result = $conn->query($sql1);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["invNo"]);
        $number= (int)$outputString + 1;
		$INV_No = "INV-$number";									
 }
} else {
    $INV_No ="INV-1000";
 }


$text = "http://erp.flyfar.tech/AirInvoice/IssueInvoice.php?INV=$INV_No";
$path = 'images/';
$file = $path.uniqid().".png";
$ecc = 'L';
$pixel_Size = 5;
  
QRcode::png($text, $file, $ecc, $pixel_Size);



// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $csrId = $_POST['client'];
    $ses_sql = mysqli_query($conn,"select * from customer where CustomerId = '$csrId' "); 
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
    $Client_Name = $row['name'];

    $System =  $_POST['system'];
    $Rev_Officer = $_POST['revofficer'];


    $invoice = "INSERT INTO `invoice`(
        `invNo`,
        `clientName`,
        `csrId`,
        `system`,
        `recofficer`,
        `createdBy`
    )
    VALUES(
        '$INV_No',
        '$Client_Name',
        '$csrId',
        '$System',
        '$Rev_Officer',
        '$userName'
    )";

if (mysqli_query($conn, $invoice)) {
    		
    //Pax
    $pax1 = $_POST['pax1'];
    $pnr1 = $_POST['pnr1'];
    $ticket1 = $_POST['ticket1'];
    $airlines1 = $_POST['airlines1'];
    $from1 = $_POST['from1'];
    $to1 = $_POST['to1'];
    $way1= $_POST['way1'];
    $type1= $_POST['type1'];
    $price1 = $_POST['price1'];
    $vendor1 = $_POST['vendor1'];
    $vprice1 = $_POST['vprice1'];
    $flight1 = $_POST['flight1'];

}
	
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
        '$ticket1',
        '$airlines1',
        '$from1',
        '$to1',
        '$price1',
        '$vendor1',
        '$vprice1',
        '$way1',
        '$type1',
        '$flight1'
        
    )";

	if (mysqli_query($conn, $mrgenerate)) {

        $ses_sql = mysqli_query($conn,"SELECT * FROM client_ledger where CSR_ID='$csrId' ORDER BY DateTime DESC LIMIT 1");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        
        $Balanced = $row['Balance'] - $price1;
        

        $ClientLedger ="INSERT INTO `client_ledger`(`TxType`, `CSR_ID`, `PaxName`, `serviceType`, `Details`, `cost`, `Balance`)
                         VALUES ('$INV_No','$csrId','$pax1','$type1','$pnr1 $ticket1 $airlines1 $way1 $from1-$to1','$price1',' $Balanced')";

        if (mysqli_query($conn, $ClientLedger)) {

            $ses_sql1 = mysqli_query($conn,"SELECT * FROM vendor_ledger where VDR_ID='$vendor1' ORDER BY DateTime DESC LIMIT 1");
            $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
            
            $vBalanced = $row1['balance'] - $vprice1;
             $vendorLedger ="INSERT INTO `vendor_ledger`(`txType`, `VDR_ID`, `pax`, `pnr`, `ticket`, `serviceType`, `details`, `cost`,`balance`)
             VALUES ('$INV_No','$vendor1','$pax1','$pnr1','$ticket1','$type1','$airlines1 ' \n ' $way1 ' \n ' $from1-$to1','$vprice1','$vBalanced')";

            if (mysqli_query($conn, $vendorLedger)) {


                $body="
                <html>
                    <head>                
                        <style>
                            .invoice-box {
                                max-width: 1000px;
                                margin: auto;
                                padding: 30px;
                                border: 1px solid #eee;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                                font-size: 16px;
                                line-height: 24px;
                                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                                color: #555;
                            }
                
                            .invoice-box table {
                                width: 100%;
                                line-height: inherit;
                                text-align: left;
                            }
                
                            .invoice-box table td {
                                padding: 5px;
                                vertical-align: top;
                            }
                
                            .invoice-box table tr td:nth-child(2) {
                                text-align: right;
                            }
                
                            .invoice-box table tr.top table td {
                                padding-bottom: 20px;
                            }
                
                            .invoice-box table tr.top table td.title {
                                font-size: 45px;
                                line-height: 45px;
                                color: #333;
                            }
                
                            .invoice-box table tr.information table td {
                                padding-bottom: 40px;
                            }
                
                            .invoice-box table tr.heading td {
                                background: #eee;
                                border-bottom: 1px solid #ddd;
                                font-weight: bold;
                            }
                
                            .invoice-box table tr.details td {
                                padding-bottom: 20px;
                            }
                
                            .invoice-box table tr.item td {
                                border-bottom: 1px solid #eee;
                            }
                
                            .invoice-box table tr.item.last td {
                                border-bottom: none;
                            }
                
                            .invoice-box table tr.total td:nth-child(2) {
                                border-top: 2px solid #eee;
                                font-weight: bold;
                            }
                
                            @media only screen and (max-width: 600px) {
                                .invoice-box table tr.top table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }
                
                                .invoice-box table tr.information table td {
                                    width: 100%;
                                    display: block;
                                    text-align: center;
                                }
                            }
                

                            .invoice-box.rtl {
                                direction: rtl;
                                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                            }
                
                            .invoice-box.rtl table {
                                text-align: right;
                            }
                
                            .invoice-box.rtl table tr td:nth-child(2) {
                                text-align: left;
                            }
                        </style>
                    </head>
                
                    <body>
                        <div class='invoice-box'>
                            <table cellpadding='0' cellspacing='0'>
                                <tr class='top'>
                                    <td colspan='2'>
                                        <table>
                                            <tr>
                                                <td class='title'>
                                                    <img src='https://erp.flyfar.tech/logo.png' style='width: 100%; max-width: 180px' />
                                                </td>
                
                                                <td>
                                                    #: $INV_No;<br />
                                                    Created By : $userName<br />
                                                    Issue Date: CDate<br />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                
                                <tr class='information'>
                                    <td colspan='3'>
                                        <table>
                                            <tr>
                                                <td>
                                                    Fly Far International<br />
                                                    Ka 11/2A, Jagannathpur,<br />
                                                    Bashundhora Road, Dhaka, 1229 <br/>
                                                </td>
                
                                                <td>
                                                 Paid By :  $Client_Name<br />
                                                  Rev officer :  $Rev_Officer<br/>          
                                                </td>
                                                <td>
                                                <right><img src='".$file."'></right>    
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                
                                <tr class='heading'>
                                <th>Pax Name</th>
                                <th>PNR</th>
                                <th>Ticket Number</th>
                                <th>Airlines</th>
                                <th>Type</th>
                                <th >Place To</th>
                                <th >Place From</th>
                                <th>Way</th>
                                <th>Price</th>
                                </tr>
                
                                <tr class='item'>
                                    <th>$pax1</th>
                                    <td>$pnr1</td>
                                    <td>$ticket1</td>
                                    <td>$airlines1</td>
                                    <td>$type1</td>
                                    <td>$to1</td>
                                    <td>$from1</td>
                                    <td>$way1</td>
                                    <td>$price1</td>
                                </tr>
                
                
                                <tr class='total'>
                                <td></td>

					            <td>Total: $price1</td>
                                    
                                </tr>
                            </table>
                
                            <table>
                                <th>
                                <tr>
                                <tr>
                                </th>
                
                            </table>
                
                
                
                        </div>
                    </body>
                </html>";

                


                    $clientsql = mysqli_query($conn,"SELECT * FROM customer where CustomerId='$csrId'");
                    $row2 = mysqli_fetch_array($clientsql,MYSQLI_ASSOC);
                    
                    $Email = $row2['email'];
                        $mail = new PHPMailer(true);

                           
                           // $mail->SMTPDebug = 2;                     
                            $mail->isSMTP();                                     
                            $mail->Host       = 'flyfar.tech';                    
                            $mail->SMTPAuth   = true;                                   
                            $mail->Username   = 'noreply@flyfar.tech';                  
                            $mail->Password   = '@Flyfar123';                               
                            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
                            $mail->Port       = 465; 
                                                         
                            //Recipients
                            $mail->setFrom('noreply@flyfar.tech', 'ERP Software - FLy Far');
                            $mail->addAddress($Email, $Client_Name);  
                        
                            $mail->addCC('ceo@flyfarint.com');
                            $mail->addBCC('fahim@flyfarint.com');
                        
                        
                            $mail->isHTML(true);                              
                            $mail->Subject = 'Invoice Created On Your Account';
                            $mail->Body    = $body;
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                        
                            $mail->send();                       
                            echo '<script language="javascript">';
		                    echo 'alert("Successfully Created"); location.href="IssueInvoice.php?INV='.$INV_No.'"';
		                    echo '</script>';


              
                
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
							<h3 class="page-title">Invoice</h3>
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

													    <div class="col-md-3">
															<div class="form-group">
																<label>Invoice No:</label>
																<input type="text" value="<?php echo $INV_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Client Name</label>
																<select name="client" class="select form-control" required>
                                                                            <option value="" disabled selected> Select Client Name</option>
                                                                            <?php
                                                                                $sql = "SELECT *  FROM `customer` ORDER BY name DESC";
                                                                                $result = $conn->query($sql);                              
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row['name'];
                                                                                    $csrId= $row['CustomerId'];
                                                                                    
                                                                                    echo "<option value=\"$csrId\">".$row['name']."</option>";                                                                                 
                                                                                }
                                                                            }
                                                                                ?>

                                                                            <?php if(isset($Client_Id)){
                                                                                    echo "<option value=\"$Client_Id\" selected>".$Client_Name."</option>";  

                                                                            }  ?>

                                                                            
                                                                </select>
															</div>
														</div>

                                                        
													
                                                        <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>System</label>
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                        <select name="system" class="select form-control"  required>
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

                                                                                                               
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Reservation officer</label>
                                                                    <input type="name" name="revofficer" class="form-control"  required>
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
                                                                    <input type="text" name="pax1" class="form-control" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr1"  class="form-control" required >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket1" class="form-control"  required>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines1" class="select form-control" required >
                                                                            <option value="" disabled selected>Select Airlines</option>
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
                                                                    <label>From</label>
                                                                    <select name="from1" class="select form-control"  >
                                                                            <option value="" disabled selected> Place From</option>
                                                                           
                                                                            <?php
                                                                                $sql = "SELECT DISTINCT code FROM airports order by code";
                                                                                $result = $conn->query($sql);
                                
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row["code"];	
                                                                                    echo "<option value=\"$vnName\">".$row["code"]."</option>";                                                                                 
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                                                                                           
                                                                           
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select name="to1" class="select form-control"  >
                                                                            <option value="" disabled selected>Place To</option>
                                                                          
                                                                            <?php
                                                                                $sql = "SELECT DISTINCT code FROM airports order by code";
                                                                                $result = $conn->query($sql);
                                
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row["code"];	
                                                                                    echo "<option value=\"$vnName\">".$row["code"]."</option>";                                                                                 
                                                                                    }
                                                                                }
                                                                                ?>

                                                                                                                                                                
                                                                            
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="date" name="flight1" class="form-control"  required>
                                                                    </div>
                                                                </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Way:</label>
                                                                    <select name="way1" class="select form-control" >
                                                                            <option value="" disabled selected>Select Way</option>
                                                                            <option value="One Way">One Way</option>
                                                                            <option value="Round Trip">Round Trip</option>	
                                                                            <option value="Multiple City">Multiple City</option>                                                                         
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Ticket Type</label>
                                                                    <select name="type1" class="select form-control" required >
                                                                            <option value="" disabled selected> Select Ticket Type</option>
                                                                            <option value="Non Refundable">Non Refundable</option>
                                                                            <option value="Refundable">Refundable</option>	
                                                                            <option value="Refund Adjusted">Refund Adjusted </option>
                                                                                                                                                      
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Deal Price</label>
                                                                    <input type="number" name="price1" value="<?php echo $price1 ?>" class="form-control"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor1" class="select form-control" required>
                                                                            <option value="" disabled selected> Select Vendor</option>
                                                                            <?php
                                                                                $sql = "SELECT *  FROM `vendor` ORDER BY name DESC";
                                                                                $result = $conn->query($sql);                              
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row['name'];
                                                                                    $vendorId= $row['vendorId'];
                                                                                    echo "<option value=\"$vendorId\">".$row['name']."</option>";                                                                                 
                                                                                    }
                                                                                }
                                                                                ?>
                                                                                
                                                                            
                                                                </select>
															</div>
                                                             </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Vendor Cost</label>
                                                                    <input type="number" name="vprice1" class="form-control" required >
                                                                </div>
                                                            </div>													
                                                        </div>

                                                        <div class="text-right">
												    <button type="submit" class="btn btn-primary">Generate Invoice</button>
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