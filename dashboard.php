<?php
   include('session.php');

    // Cash and Cash Equvalent

$bank = "SELECT SUM(credit - debit) as amount from bank";
$mobilebanking = "SELECT SUM(cashIn - cashOut) as amount from mobile_banking GROUP By mb_number";
$ssl = "SELECT * FROM `ssl_commerce`";
$cash = "SELECT SUM(cashIn - cashOut) as amount from cash";




$result = $conn->query($bank);
$result1 = $conn->query($mobilebanking);
$result2 = $conn->query($ssl);
$result3 = $conn->query($cash);


$Bank_Amount;
$MobileBanking_Amount=0;
$SSL_Amount;
$Cash;

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
}else{
    $SSL_Amount = 0;
}

//Cash Balanced

if ($result3->num_rows > 0) {
	while($row = $result3->fetch_assoc()) {
		$Cash = $row["amount"];


	}
}

$Cashequvalent = $Bank_Amount + $MobileBanking_Amount + $SSL_Amount + $Cash;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="assets/css/feathericon.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css">
   

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
                   <h6>FlyFar INT</h6>
                </a>
            </div>
            <!-- /Logo -->

            <a href="javascript:void(0);" id="toggle_btn">
                <i class="fe fe-text-align-left"></i>
            </a>

            
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
                        <a href="Chat" class="dropdown-item" href="Chat">ChatRoom</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
                <!-- /User Menu -->
            </ul>
            <!-- /Header Right Menu -->

        </div>
        <!-- /Header -->

        
        <!--- Sidebar --->

                <?php 

                print "<div class='modal fade bd-example-modal-lg' id='exampleModal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-lg' role='document'>
                    <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Add New Something</h5>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>×</span>
                        </button>
                    </div>
                    <div class='modal-body'>
                        <div class='container-fluid'>
                        <div class='row'>
                        <div class='col-md-6'>
                        <h4> Add New Stuff</h4>
                            <div  class='sidebar-menu'>
                                <a href='SalesQuatation/AddAirTicket.php'><i class='fe fe-plus'> </i> <span> Sales Quatation</span></a><br/>
                                <a href='SalesQuatation/AddPackageQuatation.php'><i class='fe fe-plus'> </i> <span> Package Quatation</span></a><br/>
                                <a href='AirInvoice/AirTicket.php'><i class='fe fe-plus'> </i> <span> Air Ticket Invoice</span></a><br/>
                                <a href='MoneyReciept/AddMoneyReciept.php'><i class='fe fe-plus'> </i> <span> Money Reciept</span></a><br/>
                                <a href='Bill/AddBill.php'><i class='fe fe-plus'> </i> <span> Bill</span></a><br/>
                                <a href='Customer/AddCustomer.php'><i class='fe fe-plus'> </i> <span> Add Customer</span></a><br/>
                                <a href='Vendors/AddVendor.php'><i class='fe fe-plus'> </i> <span> Add Vendor</span></a><br/>
                                <a href='Employee/AddEmployee.php'><i class='fe fe-plus'> </i> <span> Add Employee</span></a><br/>
                            </div>
        
                        </div>
                        <div class='col-md-6'>
                        <h4> Setup Cash Equvalent</h4>
                            <div  class='sidebar-menu'>
                                <a href='CashEquvalent/AddNewBank.php'><i class='fe fe-plus'> </i> <span> Add Bank</span></a><br/>
                                <a href='CashEquvalent/AddMobileBanking.php'><i class='fe fe-plus'> </i> <span> Add Mobile Banking</span></a><br/>
                                <a href='CashEquvalent/AddSSL.php'><i class='fe fe-plus'> </i> <span> Setup SSL</span></a><br/>
                                <a href='CashEquvalent/AddCash.php'><i class='fe fe-plus'> </i> <span> Add Cash</span></a><br/>
                                
                            </div>
        
                        </div>
                        
                    </div>
                        </div>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>               
                    </div>
                    </div>
                </div>
                </div>";



                if($userRole == 'reservation'){

                    print "<div class='sidebar' id='sidebar'>
                        <div class='sidebar-inner slimscroll'>
                            <div id='sidebar-menu' class='sidebar-menu'>
                                <ul>
                                    
                                    <li class='menu-title'>
                                        <span>Main</span>
                                    </li>
                                    <li>
                                        <a href='Dashboard.php'><i class='fe fe-home'></i> <span> Dashboard</span></a>
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
                                                <li><a href='AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket </span></a></li>
                                                
                                            </ul>
                                    </li>
                                    <li>
                                        <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span> Role</span></a>
                                            <ul>
                                            <li><a href='Role'><i class='fe fe-layout'> </i> <span> All Role </span></a></li>
                                                <li><a href='Role/AddRole.php'><i class='fe fe-layout'> </i> <span> Add Role </span></a></li>
                                                
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
                            <li>
                                <a href='Report.php.php'><i class='fe fe-layout'></i> <span> Report</span></a>
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
                            <a data-toggle='modal' class='btn btn-success' data-target='.bd-example-modal-lg'>
                            <i class='fe fe-plus'></i> <span> Add New</span>
                            </a>
                            </li>
                            <li>
                                <a href='Dashboard.php'><i class='fe fe-home'></i> <span>Dashboard</span></a>
                            </li>
                            <li>
                                <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Sales Quatation</span></a>
                                    <ul>
                                        <li><a href='SalesQuatation'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li> 
                                        <li><a href='SalesQuatation/PackageQuatation.php'><i class='fe fe-layout'> </i> <span> Package</span></a></li>                                       
                                    </ul>
                                    </li>
                            <li>
                            <li>
                                <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Invoice</span></a>
                                    <ul>
                                        <li><a href='AirInvoice'><i class='fe fe-layout'> </i> <span> Air Ticket</span></a></li>
                                        
                                    </ul>
                                    </li>
                            <li>
                                <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Accounting</span></a>
                                    <ul>
                                        <li><a href='CashEquvalent'><i class='fe fe-layout'></i> <span>Cash And Cash</span></a></li>
                                        <li><a href='setup.php'><i class='fe fe-layout'></i> <span>Acces control</span></a> </li>
                                        <li><a href='#'><i class='fe fe-layout'></i> Portal</a></li>
                                    </ul>
                            </li>
                            <li>
                                <a href='Bill'><i class='fe fe-layout'></i> <span>Bill</span></a>
                            </li>
                            <li>
                                <a href='Expense'><i class='fe fe-layout'></i> <span>Expense</span></a>
                            </li>
                            <li>
                                <a href='MoneyReciept'><i class='fe fe-layout'></i> <span>Money Receipt</span></a>
                            </li>

                            <li>
                                <a data-toggle='dropdown'><i class='fe fe-layout'></i> <span>Report</span></a>
                                    <ul>
                                        <li><a href='Report/ClientLedger.php'><i class='fe fe-layout'></i> <span>Client Report</span></a></li>
                                        <li><a href='Report/VendorLedger.php'><i class='fe fe-layout'></i> <span>Vendor Report</span></a> </li>
                                                                               
                                    </ul>
                            </li>
                            <li>
                                <a href='Salary'><i class='fe fe-layout'></i> <span>Salary</span></a>
                            </li>
                            <li>
                                <a href='Role'><i class='fe fe-layout'></i> <span>Role</span></a>
                            </li>
                            
                            <li>
                                <a href='Employee'><i class='fe fe-layout'></i> <span>Employees</span></a>
                            </li>
                            <li>
                                <a href='Vendors'><i class='fe fe-layout'></i> <span>Vendor</span></a>
                            </li>
                            <li>
                                <a href='Attendance'><i class='fe fe-layout'></i> <span>Attendance</span></a>
                            </li>
                            <li>
                                <a href='Customer'><i class='fe fe-layout'></i> <span>Customer</span></a>
                            </li>

                            <li>
                            <a type='button' class='btn btn-primary' data-toggle='modal' data-target='#myModal2'>
                                    ChatRoom
                                </a>
                           
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
                                <a href='Inventory'><i class='fe fe-layout'></i> <span> Inventory</span></a>
                            </li>
                            
                            <li>
                                <a href='Salary'><i class='fe fe-layout'></i> <span>Salary</span></a>
                            </li>
                            <li>
                                <a href='Attandance'><i class='fe fe-layout'></i> <span> Attandance</span></a>
                            </li>
                            <li>
                                <a href='Employee'><i class='fe fe-layout'></i> <span> Employees</span></a>
                            </li>
                            
                            

                        </ul>
                    </div>
                </div>
                </div>";

                }elseif($userRole == "employee"){
                    echo "<div class='sidebar' id='sidebar'>
                    <div class='sidebar-inner slimscroll'>
                        <div id='sidebar-menu' class='sidebar-menu'>
                            <ul>
                                <li class='menu-title'>
                                    <span>Main</span>
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
                                    <a href='Attendance'><i class='fe fe-layout'></i> <span> Attandance</span></a>
                                </li>

                                
                                
    
                            </ul>
                        </div>
                    </div>
                    </div>";
    
                    }else{

                        echo '<script language="javascript">';
                        echo 'alert("Successfully Created"); location.href="index.php"';
                        echo '</script>';


                    }
                    
                ?>	

      
        <!--- Sidebar --->



        <!-- Page Wrapper -->
        <<div class='page-wrapper'>
            <div class='content container-fluid'>

                
                <div class='page-header'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h3 class='page-title'>Dashboard</h3>
                            <ul class='breadcrumb'>
                                <li class='breadcrumb-item'> <a href='Dashboard.php'>Dashboard</a></li>
                                <li class='breadcrumb-item active'>Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='row'>
                            <div class='col-md-3'>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-secondary"> Balance Sheet Information</button>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-secondary">Income Statement Information</button>
                                </div>
                            </div>
                            <div class='col-md-3'>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-secondary">Cash And Cash Equivalents Information</button>
                            </div>
                            </div>
                            <div class='col-md-3'>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-secondary">Un Settle Amount Information</button>
                                </diV>
                            </div>
                        </div>
                        <hr>

                        <div class='row'>
                            <div class='col-md-3'>
                            <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Total Payable</option>
                                            <?php

                                            $payList = "SELECT vendor.vendorId, vendor.name, SUM(deposit-cost) as Total FROM vendor_ledger
                                             INNER JOIN vendor ON vendor_ledger.VDR_ID=vendor.vendorId
                                              GROUP BY vendor_ledger.VDR_ID
                                              HAVING Total < 0";
                                            $result = $conn->query($payList);
                                            $Payable = 0;
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $csrId = $row['vendorId'];
                                                $Payable += $row['Total'];
                                                echo "<option value=\"$csrId\">".$row['name']." (".$row['Total']." Taka)</option>";												  
                                                   							
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Payable Taka" ?></b></h6>
                                                            
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Today Sales</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT
                                                            invoice.invNo,
                                                            invoice.createdtime,
                                                            invoice.vendorName,
                                                            invoice.type,
                                                            airticket.vPrice1 AS vCost,
                                                            invoice.clientName,
                                                            airticket.cost1 AS Amount
                                            FROM
                                                invoice
                                            INNER JOIN airticket ON invoice.invNo = airticket.invNo
                                            WHERE invoice.createdtime LIKE '$Today%'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	
                                                    $INV_NO = $row["invNo"];
                                                    $Sales += $row['Amount'];
                                                    echo "<option value=\"$INV_NO\">".$row['clientName']." To ( ".$row['Amount']." Taka )</option>";
                                                    
 											
                                                    }
                                                }else{
                                                    $Sales=0;
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Sales Taka" ?></b></h6>  
                                            
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                        <option>Today Bank Statement</option>
                                        <?php

                                        $BankTotal = 0;
                                        $sql = "SELECT DISTINCT id, bankId, bankname,bankaccno, branchname, SUM(credit-debit) as Amount FROM bank GROUP BY bankname";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {	
                                            $bankgetID = $row["bankId"];
                                            $BankTotal += $row['Amount'];
                                            echo "<option value=\"$bankgetID\">".$row['bankname']." ( ".$row['Amount']." Taka )</option>";
                                            
                                            }
                                        }
                                        ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$BankTotal Taka" ?></b></h6>
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                        <option>Vendor Ticket Voided Amount</option>
                                        <option>Vendor Ticket Voided Amount</option>


                                        <?php

                                            $sql = "SELECT * FROM `unsettle_vendor_leadger` Order By DateTime DESC";
                                            $result = $conn->query($sql);
                                            $Vendor_Refunded=0;
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {													  
                                                    $Vendor_Refunded = $row['amount'];
                                                                                                
                                                }
                                            }

										?>
                                        <option>Vendor Ticket Refunded Amount : <?php echo $Vendor_Refunded ?></option>
                                        
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Vendor_Refunded Taka" ?></b></h6>
                            </div>
                        </div>

                        <hr>

                        <div class='row'>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12 '>
                                        <select class='select form-control'>                                       
                                            <option>Total Receivable</option>
                                            <?php

                                            $recvList = 'SELECT customer.name, SUM(deposit-cost) as Total FROM client_ledger
                                            INNER JOIN customer ON client_ledger.CSR_ID=customer.CustomerId                                        
                                            GROUP BY client_ledger.CSR_ID
                                            HAVING Total < 0';
                                            $result = $conn->query($recvList);
                                            $Rcv = 0;
                                            if ($result->num_rows > 0) {    
                                            while($row = $result->fetch_assoc()){
                                                $csrId = $row['CustomerId'];
                                                $Rcv += $row['Total'];
                                                echo "<option value=\"$csrId\">".$row['name']." (".$row['Total']." Taka)</option>";
												                                                     							
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Rcv Taka" ?></b></h6>
                                                           
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12 '>
                                        <select class='select form-control'>
                                            <option>Today Purchase</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT
                                                invoice.invNo,
                                                invoice.createdtime,
                                                invoice.vendorName,
                                                invoice.type,
                                                airticket.vPrice1 AS vCost,
                                                invoice.clientName,
                                                airticket.cost1 AS Amount
                                            FROM
                                                invoice
                                            INNER JOIN airticket ON invoice.invNo = airticket.invNo
                                            WHERE invoice.createdtime LIKE '$Today%'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	
                                                    $INV_NO = $row["invNo"];
                                                    $Purchase += $row['vCost'];
                                                    echo "<option value=\"$INV_NO\">".$row['vendorName']." From ( ".$row['vCost']." Taka )</option>";
                                                    
 											
                                                    }
                                                }else{
                                                    $Purchase=0;
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Purchase Taka" ?></b></h6>
                                
                                                                  
                                            
                            </div>
                            <div class='col-md-3'>
                             <div class='form-group row'>
                                    <div class='col-lg-12 '>
                                        <select class='select form-control'>
                                            <option disabled selected>Portal Balanced</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT
                                                invoice.invNo,
                                                invoice.createdtime,
                                                invoice.vendorName,
                                                invoice.type,
                                                airticket.vPrice1 AS vCost,
                                                invoice.clientName,
                                                airticket.cost1 AS Amount
                                            FROM
                                                invoice
                                            INNER JOIN airticket ON invoice.invNo = airticket.invNo
                                            WHERE invoice.createdtime LIKE '$Today%'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	
                                                    $INV_NO = $row["invNo"];
                                                    $Purchase += $row['vCost'];
                                                    echo "<option value=\"$INV_NO\">".$row['vendorName']." From ( ".$row['vCost']." Taka )</option>";
                                                    
 											
                                                    }
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Purchase Taka" ?></b></h6>
                                
                                
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                        <option>Clients Ticket Voided Amount</option>

                                        <?php
                                                        
												$sql = "SELECT * FROM `client_unsettle_ledger` Order By DateTime DESC";
												$result = $conn->query($sql);
                                                $Client_Refunded = 0;
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  
													$Client_Refunded = $row['amount'];
													   											
												  }
												} 

										?>
                                        <option>Clients Ticket Refunded Amount : <?php echo $Client_Refunded ?></option>
                                        
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$BankTotal Taka" ?></b></h6>
                                
                            </div>
                        </div>
                        <hr>

                        <div class='row'>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Unearned Revenue</option>
                                            <?php

                                            $recvList = 'SELECT customer.name, SUM(deposit-cost) as Total FROM client_ledger
                                            INNER JOIN customer ON client_ledger.CSR_ID=customer.CustomerId 
                                            GROUP BY client_ledger.CSR_ID
                                            Having Total >  0';
                                            $result = $conn->query($recvList);
                                            $UnEarned = 0;
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {
                                                $csrId = $row['CustomerId'];
                                                $UnEarned += $row['Total'];
                                                echo "<option value=\"$csrId\">".$row['name']." (".$row['Total']." Taka)</option>";
												  
                                                    							
                                                }
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$UnEarned Taka" ?> </b></h6>
                              
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Today Profit/Loss</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT
                                                invoice.invNo,
                                                invoice.createdtime,
                                                invoice.vendorName,
                                                invoice.type,
                                                airticket.vPrice1 AS vCost,
                                                invoice.clientName,
                                                airticket.cost1 AS Amount
                                            FROM
                                                invoice
                                            INNER JOIN airticket ON invoice.invNo = airticket.invNo
                                            WHERE invoice.createdtime LIKE '$Today%'";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	
                                                    $INV_NO = $row["invNo"];
                                                    $Profit = $row['Amount'] - $row['vCost'];
                                                    $TotalProfit += $row['Amount'] - $row['vCost'];

                                                    echo "<option value=\"$INV_NO\">".$row['invNo']." From ( ".$Profit." Taka )</option>";
                                                    
 											
                                                    }
                                                }else{
                                                    $TotalProfit=0;
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$TotalProfit Taka" ?></b></h6>
                                
                                                                                                                                        
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Mobile Banking Balanced</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT id, MB_ID, mb_operator, mb_number, SUM(cashIn-cashOut) as balance FROM `mobile_banking` GROUP By MB_ID";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	
                                                    $Mobile_Banking += $row['balance'];
                                                   
                                                    echo "<option>".$row['mb_operator']." - ".$row['mb_number']." To ( ".$row['balance']." Taka )</option>";
                                                    
 											
                                                    }
                                                }else{
                                                    $Mobile_Banking = 0;
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Mobile_Banking Taka" ?></b></h6>
                                
                            </div>
                            <div class='col-md-3'>                               
                                    <div class='form-group row'>
                                        <div class='col-lg-12'>
                                            <select class='select form-control'>
                                            <option>Bank Unsettle Amount</option>
                                            <?php

                                            $BankTotal = 0;
                                            $sql = "SELECT DISTINCT id, bankId, bankname,bankaccno, branchname, SUM(credit-debit) as Amount FROM bank GROUP BY bankname";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {	
                                                $bankgetID = $row["bankId"];
                                                $BankTotal += $row['Amount'];
                                                echo "<option value=\"$bankgetID\">".$row['bankname']." ( ".$row['Amount']." Taka )</option>";
                                                
                                                }
                                            }
                                            ?>
                                                                                    
                                            </select>
                                        </div>
                                    </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$BankTotal Taka" ?></b></h6>

                                
                            </div>
                        </div>
                        <hr>

                        <div class='row'>
                            <div class='col-md-3'>
                            <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Total Liabilities</option>
                                            <option value='1'><?php echo "Payable ( $Payable Taka )"?></option>
                                            <option value='2'><?php echo "Unearned ( $UnEarned Taka )" ?></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php $TotalLib  = $Payable + $UnEarned; echo "$TotalLib Taka" ?> </b></h6>

                                
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Today Expense</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT
                                                invoice.invNo,
                                                invoice.createdtime,
                                                invoice.vendorName,
                                                invoice.type,
                                                airticket.vPrice1 AS vCost,
                                                invoice.clientName,
                                                airticket.cost1 AS Amount
                                            FROM
                                                invoice
                                            INNER JOIN airticket ON invoice.invNo = airticket.invNo
                                            WHERE invoice.createdtime LIKE '$Today%'";
                                                $result = $conn->query($sql);
                                                $Todayexpense = 0;
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	
                                                    $INV_NO = $row["invNo"];
                                                
                                                    echo "<option value=\"$INV_NO\">".$row['invNo']." From ( ".$Profit." Taka )</option>";
                                                   											
                                                    }
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$Todayexpense Taka" ?></b></h6>

                                            
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option disabled selected>Cash Balanced</option>
                                            <?php
                                            
                                                $Today = date("Y-m-d");
                                                $sql = "SELECT SUM(cashIn - cashOut) as amount from cash ";
                                                $HandCash = 0;
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {	                                                  
                                                    echo "<option>".$row['amount']." Taka </option>";                                                   

                                                    }
                                                }else{
                                                    echo "<option> 0 Taka </option>";
                                                }
                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$HandCash Taka" ?></b></h6>

                                
                            </div>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                        <div class='col-lg-12'>
                                            <select class='select form-control'>
                                            <option>Cash Unsettle Amount</option>
                                            <?php

                                            $BankTotal = 0;
                                            $sql = "SELECT DISTINCT id, bankId, bankname,bankaccno, branchname, SUM(credit-debit) as Amount FROM bank GROUP BY bankname";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                            while($row = $result->fetch_assoc()) {	
                                                $bankgetID = $row["bankId"];
                                                $BankTotal += $row['Amount'];
                                                echo "<option value=\"$bankgetID\">".$row['bankname']." ( ".$row['Amount']." Taka )</option>";
                                                
                                                }
                                            }
                                            ?>
                                                                                    
                                            </select>
                                        </div>
                                    </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$BankTotal Taka" ?></b></h6>
                                
                            </div>
                        </div>
                        <hr>

                        <div class='row'>
                            <div class='col-md-3'>
                                <div class='form-group row'>
                                    <div class='col-lg-12'>
                                        <select class='select form-control'>
                                            <option>Total Pre-Paid</option>
                                            <?php

                                                $payList = "SELECT vendor.vendorId, vendor.name, SUM(deposit-cost) as Total FROM vendor_ledger
                                                INNER JOIN vendor ON vendor_ledger.VDR_ID=vendor.vendorId
                                                GROUP BY vendor_ledger.VDR_ID
                                                HAVING Total > 0";
                                                $result = $conn->query($payList);
                                                $PrePaid = 0;
                                                if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                                    $csrId = $row['vendorId'];
                                                    $PrePaid += $row['Total'];
                                                    echo "<option value=\"$csrId\">".$row['name']." (".$row['Total']." Taka)</option>";
                                                                                          
                                                    }
                                                }

                                                ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <h6 class='text-center'><b style="color:red;"><?php echo "$PrePaid Taka"; ?> </b></h6>
                                
                            </div>
                            <div class='col-md-3'>
                                                               
                                            
                            </div>
                            <div class='col-md-3'>
                               
                            </div>
                            <div class='col-md-3'>
                                
                            </div>
                        </div>

                        
                    </div>


                </div>
                <footer class="container" style="margin-top: 100px;">                           
                            <p align="center"><b>&copy; 2021-2022 All Right Reserved || Developed By Fly Far Tech. </b></p>
                </footer>

                
                               
            </div>

                      
        </div>

        <!-- /Page Wrapper -->

        <!-- Modal -->
        <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel2">All Peps</h4>
                    </div>

                    <div class="modal-body">
                    <div class="card" style="width: 29rem;">
                    <div class="card-header">
                        <h3>Peoples Available For Chat</h3>
                    </div>
                        <ul class="list-group list-group-flush">
                            <?php

                                    $sql = "SELECT *  FROM `users` ORDER BY id DESC";
                                    $result = $conn->query($sql);
                                    $id = $row['id'];
                                    if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {	
                                        
                                        echo  "<a href='Chat/chat.php?$id'><li class='list-group-item'>
                                                    <h4>".$row["fname"]. " ".$row["lname"]."</h4>";
                                                if($row['status'] == 'Active Now'){  
                                                    echo"<span class='dot'></span> <i style='color:green;''>".$row['status']."</i></li>";
                                                }else{
                                                    echo"<span class='dot1'></span> <i style='color:red;''>".$row['status']."</i></li>";
                                                }                                       
                                    }
                                }
                                    ?>
                            
                        </ul>
                    </div>
                        
                    </div>

                </div><!-- modal-content -->
            </div><!-- modal-dialog -->
        </div><!-- modal -->


        <!-- FOOTER -->
    

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