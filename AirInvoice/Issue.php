<?php

include '../config.php';
include('../session.php');


//Reciept No

$INV_No;
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



//Employee Info

if (array_key_exists('SQT', $_GET)){
	$searchvar = $_GET['SQT'];
		
		$sql = "SELECT * FROM salesqutation where sqNo='$searchvar'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
                $Client_Name = $row['clientName'];
                $Client_Id = $row['csrId'];
                $Pax_No = $row['pax'];
				$pax1 = $row['PaxName1'];
                $Airlines1 = $row['Airlines1'];       
                $from1 = $row['from1'];
                $to1 = $row['to1'];
                $type1= $row['type1'];
                $way1= $row['way1']; 
                $price1 = $row['cost1']; 
            
                //Pax2
                $pax2 = $row['PaxName2'];
                $Airlines2 = $row['Airlines2'];
                $from2 = $row['from2'];
                $to2 = $row['to2'];
                $type2 = $row['type2']; 
                $way2 = $row['way2'];        
                $price2 = $row['cost2'];
                
            
                //Pax3

                $pax3 = $row['PaxName3']; 
                $Airlines3 = $row['Airlines3'];   
                $from3 = $row['from3'];
                $to3 = $row['to3'];
                $type3 = $row['type3'];
                $way3 = $row['way3'];    
                $price3 = $row['cost3'];
            
            
                //Pax4

                $pax4 = $row['PaxName4'];
                $Airlines4 = $row['Airlines4'];       
                $from4 = $row['from4'];
                $to4 = $row['to4'];
                $type4 = $row['type4']; 
                $way4 = $row['way4'];    
                $price4 = $row['cost4'];
                
            
                //Pax 5
                $pax5 = $row['PaxName5'];
                $Airlines5 = $row['Airlines5'];
                $from5 = $row['from5'];
                $to5 = $row['to5'];
                $type5= $row['type5'];
                $way5 = $row['way5'];    
                $price5 = $row['cost5'];     								
			}
		} else {
            $Pax_No = " ";
            $pax1 = " ";
            $Airlines1 = " ";         
            $from1 = " ";
            $to1 = " ";
            $type1= " ";
            $way1 = " ";
            $price1 = " "; 
        
            //Pax2
            $pax2 = " ";
            $Airlines2 = " ";
            $from2 = " ";
            $to2 = " ";
            $type2 = " ";
            $way2 = " ";      
            $price2 = " ";
            
        
            //Pax3

            $pax3 = " "; 
            $Airlines3 = " ";
            $from3 = " ";
            $to3 = " ";
            $type3 =" ";
            $way3 = " "; 
            $price3 = " ";
        
        
            //Pax4

            $pax4 = " ";
            $Airlines4 = " ";       
            $from4 = " ";
            $to4 = " ";
            $type4 = " ";
            $way4 = " ";   
            $price4 = " ";
            
        
            //Pax 5
            $pax5 = " ";
            $Airlines5 = " ";
            $from5 = " ";
            $to5 = " ";
            $type5= " ";
            $way5 = " ";  
            $price5 = " ";
            $searchvar= " ";		
		}
		
}else{
        $Pax_No = " ";
	    $pax1 = " ";
        $Airlines1 = " ";         
        $from1 = " ";
        $to1 = " ";
        $type1= " ";
        $way1 = " ";
        $price1 = " "; 
    
        //Pax2
        $pax2 = " ";
        $Airlines2 = " ";
        $from2 = " ";
        $to2 = " ";
        $type2 = " ";
        $way2 = " ";      
        $price2 = " ";
        
    
        //Pax3

        $pax3 = " "; 
        $Airlines3 = " ";
        $from3 = " ";
        $to3 = " ";
        $type3 =" ";
        $way3 = " "; 
        $price3 = " ";
       
    
         //Pax4

         $pax4 = " ";
         $Airlines4 = " ";       
         $from4 = " ";
         $to4 = " ";
         $type4 = " ";
         $way4 = " ";   
         $price4 = " ";
         
    
         //Pax 5
         $pax5 = " ";
         $Airlines5 = " ";
         $from5 = " ";
         $to5 = " ";
         $type5= " ";
         $way5 = " ";  
         $price5 = " ";
         $searchvar= " ";
}



// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $csrId = $_POST['client'];
    $ses_sql = mysqli_query($conn,"select * from customer where CustomerId = '$csrId' "); 
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
    $Client_Name = $row['name'];

    $Pax_No = $_POST['pax'];
    $System =  $_POST['system'];
    $Rev_Officer = $_POST['revofficer'];


    $invoice = "INSERT INTO `invoice`(
        `invNo`,
        `clientName`,
        `csrId`,
        `pax`,
        `system`,
        `recofficer`,
        `createdBy`
    )
    VALUES(
        '$INV_No',
        '$Client_Name',
        '$csrId',
        '$Pax_No',
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


    //Pax2
    if(isset($_POST['pax2'])){
    $pax2 = $_POST['pax2'];
    $pnr2 = $_POST['pnr2'];
    $ticket2 = $_POST['ticket2'];
    $airlines2 = $_POST['airlines2']; 
    $from2 = $_POST['from2'];
    $to2 = $_POST['to2'];
    $way2 = $_POST['way2'];
    $type2 = $_POST['type2'];
    $price2 = $_POST['price2'];
    $vendor2 = $_POST['vendor2'];
    $vprice2 = $_POST['vprice2'];
    $flight2 = $_POST['flight2'];
    }else{
        $pax2 = " ";
        $pnr2 = " ";
        $ticket2 =" ";
        $airlines2 =" ";
        $from2 = " ";
        $to2 =" ";
        $way2 = " ";
        $type2 = " ";
        $price2 = " ";
        $vendor2 = " ";
        $vprice2 = " ";
        $flight2 = " ";
    }
    }

    //Pax3
    if(isset($_POST['pax3'])){
    $pax3 = $_POST['pax3'];
    $pnr3 = $_POST['pnr3'];
    $ticket3 = $_POST['ticket3'];
    $airlines3 = $_POST['airlines3'];
    $from3 = $_POST['from3'];
    $to3 = $_POST['to3'];
    $way3 = $_POST['way3'];
    $type3= $_POST['type3'];
    $price3 = $_POST['price3'];
    $vendor3 = $_POST['vendor3'];
    $vprice3 = $_POST['vprice3'];
    $flight3 = $_POST['flight3'];
    }else{
        $pax3 = " ";
        $pnr3 = " ";
        $ticket3 =" ";
        $airlines3 = " ";
        $from3 = " ";
        $to3 =" ";
        $way3 = " ";
        $type3 = " ";
        $price3 = " ";
        $vendor3 = " ";
        $vprice3 = " ";
        $flight3 = " ";
    }

     //Pax4
     if(isset($_POST['pax4'])){
     $pax4 = $_POST['pax4'];
     $pnr4 = $_POST['pnr4'];
     $ticket4 = $_POST['ticket4'];
     $airlines4 = $_POST['airlines4'];
     $from4 = $_POST['from4'];
     $to4 = $_POST['to4'];
     $way4 = $_POST['way4'];
     $type4 = $_POST['type4'];
     $price4 = $_POST['price4'];
     $vendor4 = $_POST['vendor4'];
     $vprice4 = $_POST['vprice4'];
     $flight4 = $_POST['flight4'];
     }else{
        $pax4 = " ";
        $pnr4 = " ";
        $ticket4 =" ";
        $airlines4 ="";
        $from4 = " ";
        $to4 =" ";
        $way4 = " ";
        $type4= " ";
        $price4 = " ";
        $vendor4 = " ";
        $vprice4 = " ";
        $flight4 = " ";
     }

     //Pax 5
     if(isset($_POST['pax5'])){
     $pax5 = $_POST['pax5'];
     $pnr5 = $_POST['pnr5'];
     $ticket5 = $_POST['ticket5'];
     $airlines5 = $_POST['airlines5'];
     $from5 = $_POST['from5'];
     $to5 = $_POST['to5'];
     $way5 = $_POST['way5'];
     $type5 = $_POST['type5'];
     $price5 = $_POST['price5'];
     $vendor5 = $_POST['vendor5'];
     $vprice5 = $_POST['vprice5'];
     $flight5 = $_POST['flight5'];
     }else{
        $pax5 = " ";
        $pnr5 = " ";
        $ticket5 =" ";
        $airlines5 = " ";
        $from5 = " ";
        $to5 =" ";
        $way5 = " ";
        $type5 = " ";
        $price5 =" ";
        $vendor5 =" ";
        $vprice5 = " ";
        $flight5 = " ";

     }

	
    $mrgenerate = "INSERT INTO `airticket`(
        `invNo`,
        `sqNo`,
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
        `PaxName2`,
        `PNR2`,
        `TicketNo2`,
        `Airlines2`,
        `placeTo2`,
        `placeFrom2`,
        `cost2`,
        `vendor2`,
        `vPrice2`,
        `PaxName3`,
        `PNR3`,
        `TicketNo3`,
        `Airlines3`,
        `placeTo3`,
        `placeFrom3`,
        `cost3`,
        `vendor3`,
        `vPrice3`,
        `PaxName4`,
        `PNR4`,
        `TicketNo4`,
        `Airlines4`,
        `placeTo4`,
        `placeFrom4`,
        `cost4`,
        `vendor4`,
        `vPrice4`,
        `PaxName5`,
        `PNR5`,
        `TicketNo5`,
        `Airlines5`,
        `placeTo5`,
        `placeFrom5`,
        `cost5`,
        `vendor5`,
        `vPrice5`,
        `way1`,
        `way2`,
        `way3`,
        `way4`,
        `way5`,
        `ticketType1`,
        `ticketType2`,
        `ticketType3`,
        `ticketType4`,
        `ticketType5`,
        `flight1`,
        `flight2`,
        `flight3`,
        `flight4`,
        `flight5`

    )
    VALUES(
        '$INV_No',
        '$searchvar',
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
        '$pax2',
        '$pnr2',
        '$ticket2',
        '$airlines2',
        '$from2',
        '$to2',
        '$price2',
        '$vendor2',
        '$vprice2',
        '$pax3',
        '$pnr3',
        '$ticket3',
        '$airlines3',
        '$from3',
        '$to3',
        '$price3',
        '$vendor3',
        '$vprice3',
        '$pax4',
        '$pnr4',
        '$ticket4',
        '$airlines4',
        '$from4',
        '$to4',
        '$price4',
        '$vendor4',
        '$vprice4',
        '$pax5',
        '$pnr5',
        '$ticket5',
        '$airlines5',
        '$from5',
        '$to5',
        '$price5',
        '$vendor5',
        '$vprice5',
        '$way1',
        '$way2',
        '$way3',
        '$way4',
        '$way5',
        '$type1',
        '$type2',
        '$type3',
        '$type4',
        '$type5',
        '$flight1',
        '$flight2',
        '$flight3',
        '$flight4',
        '$flight5'
    )";

	if (mysqli_query($conn, $mrgenerate)) {

        $Client_Cost = $price1 + $price2 + $price3 + $price4 + $price5;
        $ClientLedger ="INSERT INTO `ledger`(`txType`, `personType`, `debit`) VALUES ('$INV_No','$csrId','$Client_Cost')";

        if (mysqli_query($conn, $ClientLedger)) {

            if(!empty($vendor1 && $vprice1)){
                $vendorLedger ="INSERT INTO `ledger`(`txType`, `personType`, `debit`) VALUES ('$INV_No','$vendor1','$vprice1')";

                if (mysqli_query($conn, $vendorLedger)) {
                
                
                }

            } 
            if(!empty($vendor2 && $vprice2)){
                $vendorLedger ="INSERT INTO `ledger`(`txType`, `personType`, `debit`) VALUES ('$INV_No','$vendor2','$vprice2')";

                if (mysqli_query($conn, $vendorLedger)) {
                
                
                }

            } 

            if(!empty($vendor3 && $vprice3)){
                $vendorLedger ="INSERT INTO `ledger`(`txType`, `personType`, `debit`) VALUES ('$INV_No','$vendor3','$vprice3')";

                if (mysqli_query($conn, $vendorLedger)) {
                
                
                }

            } 

            if(!empty($vendor4 && $vprice4)){
                $vendorLedger ="INSERT INTO `ledger`(`txType`, `personType`, `debit`) VALUES ('$INV_No','$vendor4','$vprice4')";

                if (mysqli_query($conn, $vendorLedger)) {
                
                
                }

            } 

            if(!empty($vendor5 && $vprice5)){
                $vendorLedger ="INSERT INTO `ledger`(`txType`, `personType`, `debit`) VALUES ('$INV_No','$vendor5','$vprice5')";

                if (mysqli_query($conn, $vendorLedger)) {
                
                
                }

            } 

            echo '<script language="javascript">';
		    echo 'alert("Successfully Created"); location.href="AirInvoice.php?INV='.$INV_No.'"';
		    echo '</script>';
            
             
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
										

										<?php if(isset($success)){
                                        echo "<div class='alert alert-success' role='alert'> $success  </div> ";
                                            }
                                      ?>
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
                                                                            <option value="" disabled selected>Select Client Name</option>
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

                                                        
														<div class="col-md-1">
															<div class="form-group">
																<label>Pax No</label>
																<input type="number" name="pax" value="<?php echo $Pax_No ?>" min="1" max="5" class="form-control"  required>
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
										<h4 class="text-danger card-title">Pax 1</h4>
									</div>
									<div class="card-body">
										
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name</label>
                                                                    <input type="text" name="pax1" value="<?php echo $pax1 ?>" class="form-control" required >
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
                                                                            <?php if(!empty($Airlines1)){
                                                                                    echo "<option value=\"$Airlines1\" selected>".$Airlines1."</option>";  
                                                                            }  ?>                                                                                                                                                                                                                                 
                                                                        </select>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <select name="from1" class="select form-control"  >
                                                                            <option value="" disabled selected>Place From</option>
                                                                           
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
                                                                                <?php if(!empty($from1)){
                                                                                    echo "<option value=\"$from1\" selected>".$from1."</option>";  
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

                                                                                 <?php if(!empty($to1)){
                                                                                    echo "<option value=\"$to1\" selected>".$to1."</option>";  
                                                                                    }  ?>
                                                                                
                                                                            
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

                                                                            <?php if(!empty($way1)){
                                                                                    echo "<option value=\"$way1\" selected>".$way1."</option>";  
                                                                                    }  ?>                                                                           
                                                                            
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
                                                                            <?php if(!empty($type1)){
                                                                                    echo "<option value=\"$type1\" selected>".$type1."</option>";  
                                                                                    }  ?>
                                                                                                                                                       
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price1" value="<?php echo $price1 ?>" class="form-control"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor1" class="select form-control" required>
                                                                            <option value="" disabled selected>Select Vendor</option>
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
									</div>
								</div>
							</div>
						</div>
                         <!---- Pax 1 -->
                         <!---- Pax! -->
                    
                         <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Pax 2</h4>
									</div>
									<div class="card-body">
										
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name</label>
                                                                    <input type="text" name="pax2" value="<?php echo $pax2 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr2"  class="form-control"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket2" class="form-control"  >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines2" class="select form-control" >
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
                                                                            <?php if(!empty($Airlines2)){
                                                                                    echo "<option value=\"$Airlines2\" selected>".$Airlines2."</option>";  
                                                                            }  ?>                                                                                                                                                                                                                                 
                                                                        </select>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <select name="from2" class="select form-control"  >
                                                                            <option value="" disabled selected>Place From</option>
                                                                           
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
                                                                                <?php if(!empty($from1)){
                                                                                    echo "<option value=\"$from2\" selected>".$from2."</option>";  
                                                                                }
                                                                            ?>                                                                           
                                                                           
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select name="to2" class="select form-control"  >
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

                                                                                 <?php if(!empty($to2)){
                                                                                    echo "<option value=\"$to2\" selected>".$to2."</option>";  
                                                                                    }  ?>
                                                                                
                                                                            
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="date" name="flight2" class="form-control" >
                                                                    </div>
                                                                </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Way:</label>
                                                                    <select name="way2" class="select form-control" >
                                                                            <option value="" disabled selected>Select Way</option>
                                                                            <option value="One Way">One Way</option>
                                                                            <option value="Round Trip">Round Trip</option>	
                                                                            <option value="Multiple City">Multiple City</option>

                                                                            <?php if(!empty($way2)){
                                                                                    echo "<option value=\"$way2\" selected>".$way2."</option>";  
                                                                                    }  ?>                                                                           
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Ticket Type</label>
                                                                    <select name="type2" class="select form-control" >
                                                                            <option value="" disabled selected> Select Ticket Type</option>
                                                                            <option value="Non Refundable">Non Refundable</option>
                                                                            <option value="Refundable">Refundable</option>	
                                                                            <option value="Refund Adjusted">Refund Adjusted </option>
                                                                            <?php if(!empty($type2)){
                                                                                    echo "<option value=\"$type2\" selected>".$type2."</option>";  
                                                                                    }  ?>
                                                                                                                                                       
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price2" value="<?php echo $price2 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor2" class="select form-control">
                                                                            <option value="" disabled selected>Select Vendor</option>
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
                                                                    <input type="number" name="vprice2" class="form-control" >
                                                                </div>
                                                            </div>													
                                                        </div>
									</div>
								</div>
							</div>
						</div>
                         <!---- Pax 2 -->
                         <!---- Pax! -->
                    
                         <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Pax 3</h4>
									</div>
									<div class="card-body">
										
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name</label>
                                                                    <input type="text" name="pax3" value="<?php echo $pax3 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr3"  class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket3" class="form-control" >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines3" class="select form-control" >
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
                                                                            <?php if(!empty($Airlines3)){
                                                                                    echo "<option value=\"$Airlines3\" selected>".$Airlines3."</option>";  
                                                                            }  ?>                                                                                                                                                                                                                                 
                                                                        </select>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <select name="from3" class="select form-control"  >
                                                                            <option value="" disabled selected>Place From</option>
                                                                           
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
                                                                                <?php if(!empty($from3)){
                                                                                    echo "<option value=\"$from3\" selected>".$from3."</option>";  
                                                                                }
                                                                            ?>                                                                           
                                                                           
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select name="to3" class="select form-control"  >
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

                                                                                 <?php if(!empty($to3)){
                                                                                    echo "<option value=\"$to3\" selected>".$to3."</option>";  
                                                                                    }  ?>
                                                                                
                                                                            
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="date" name="flight3" class="form-control" >
                                                                    </div>
                                                                </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Way:</label>
                                                                    <select name="way3" class="select form-control" >
                                                                            <option value="" disabled selected>Select Way</option>
                                                                            <option value="One Way">One Way</option>
                                                                            <option value="Round Trip">Round Trip</option>	
                                                                            <option value="Multiple City">Multiple City</option>

                                                                            <?php if(!empty($way3)){
                                                                                    echo "<option value=\"$way3\" selected>".$way3."</option>";  
                                                                                    }  ?>                                                                           
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Ticket Type</label>
                                                                    <select name="type3" class="select form-control" >
                                                                            <option value="" disabled selected> Select Ticket Type</option>
                                                                            <option value="Non Refundable">Non Refundable</option>
                                                                            <option value="Refundable">Refundable</option>	
                                                                            <option value="Refund Adjusted">Refund Adjusted </option>
                                                                            <?php if(!empty($type3)){
                                                                                    echo "<option value=\"$type3\" selected>".$type3."</option>";  
                                                                                    }  ?>
                                                                                                                                                       
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price3" value="<?php echo $price3 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor3" class="select form-control">
                                                                            <option value="" disabled selected>Select Vendor</option>
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
                                                                    <input type="number" name="vprice3" class="form-control" >
                                                                </div>
                                                            </div>													
                                                        </div>
									</div>
								</div>
							</div>
						</div>
                         <!---- Pax 3 -->
                         <!---- Pax! -->
                    
                         <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Pax 4</h4>
									</div>
									<div class="card-body">
										
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name</label>
                                                                    <input type="text" name="pax4" value="<?php echo $pax4 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr4"  class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket4" class="form-control" >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines4" class="select form-control" >
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
                                                                            <?php if(!empty($Airlines4)){
                                                                                    echo "<option value=\"$Airlines4\" selected>".$Airlines4."</option>";  
                                                                            }  ?>                                                                                                                                                                                                                                 
                                                                        </select>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <select name="from4" class="select form-control"  >
                                                                            <option value="" disabled selected>Place From</option>
                                                                           
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
                                                                                <?php if(!empty($from4)){
                                                                                    echo "<option value=\"$from4\" selected>".$from4."</option>";  
                                                                                }
                                                                            ?>                                                                           
                                                                           
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select name="to4" class="select form-control"  >
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

                                                                                 <?php if(!empty($to4)){
                                                                                    echo "<option value=\"$to4\" selected>".$to4."</option>";  
                                                                                    }  ?>
                                                                                
                                                                            
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="date" name="flight4" class="form-control" >
                                                                    </div>
                                                                </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Way:</label>
                                                                    <select name="way4" class="select form-control" >
                                                                            <option value="" disabled selected>Select Way</option>
                                                                            <option value="One Way">One Way</option>
                                                                            <option value="Round Trip">Round Trip</option>	
                                                                            <option value="Multiple City">Multiple City</option>

                                                                            <?php if(!empty($way4)){
                                                                                    echo "<option value=\"$way4\" selected>".$way4."</option>";  
                                                                                    }  ?>                                                                           
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Ticket Type</label>
                                                                    <select name="type4" class="select form-control" >
                                                                            <option value="" disabled selected> Select Ticket Type</option>
                                                                            <option value="Non Refundable">Non Refundable</option>
                                                                            <option value="Refundable">Refundable</option>	
                                                                            <option value="Refund Adjusted">Refund Adjusted </option>
                                                                            <?php if(!empty($type4)){
                                                                                    echo "<option value=\"$type4\" selected>".$type4."</option>";  
                                                                                    }  ?>
                                                                                                                                                       
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price4" value="<?php echo $price4 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor4" class="select form-control">
                                                                            <option value="" disabled selected>Select Vendor</option>
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
                                                                    <input type="number" name="vprice4" class="form-control" >
                                                                </div>
                                                            </div>													
                                                        </div>
									</div>
								</div>
							</div>
						</div>
                         <!---- Pax 4 -->
                         <!---- Pax! -->
                    
                         <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Pax 5</h4>
									</div>
									<div class="card-body">
										
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Pax Name</label>
                                                                    <input type="text" name="pax5" value="<?php echo $pax5 ?>" class="form-control" >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>PNR</label>
                                                                    <input type="text" name="pnr5"  class="form-control"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Ticket No</label>
                                                                    <input type="text" name="ticket5" class="form-control" >
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Airlines :</label>
                                                                    <select name="airlines5" class="select form-control" >
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
                                                                            <?php if(!empty($Airlines5)){
                                                                                    echo "<option value=\"$Airlines5\" selected>".$Airlines5."</option>";  
                                                                            }  ?>                                                                                                                                                                                                                                 
                                                                        </select>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <select name="from5" class="select form-control"  >
                                                                            <option value="" disabled selected>Place From</option>
                                                                           
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
                                                                                <?php if(!empty($from4)){
                                                                                    echo "<option value=\"$from5\" selected>".$from5."</option>";  
                                                                                }
                                                                            ?>                                                                           
                                                                           
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select name="to5" class="select form-control"  >
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

                                                                                 <?php if(!empty($to5)){
                                                                                    echo "<option value=\"$to5\" selected>".$to5."</option>";  
                                                                                    }  ?>
                                                                                
                                                                            
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="date" name="flight5" class="form-control">
                                                                    </div>
                                                                </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Way:</label>
                                                                    <select name="way5" class="select form-control" >
                                                                            <option value="" disabled selected>Way</option>
                                                                            <option value="One Way">One Way</option>
                                                                            <option value="Round Trip">Round Trip</option>	
                                                                            <option value="Multiple City">Multiple City</option>

                                                                            <?php if(!empty($way5)){
                                                                                    echo "<option value=\"$way5\" selected>".$way5."</option>";  
                                                                                    }  ?>                                                                           
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label> Ticket Type</label>
                                                                    <select name="type5" class="select form-control"  >
                                                                            <option value="" disabled selected> Select Ticket Type</option>
                                                                            <option value="Non Refundable">Non Refundable</option>
                                                                            <option value="Refundable">Refundable</option>	
                                                                            <option value="Refund Adjusted">Refund Adjusted </option>
                                                                            <?php if(!empty($type5)){
                                                                                    echo "<option value=\"$type5\" selected>".$type5."</option>";  
                                                                                    }  ?>
                                                                                                                                                       
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Price</label>
                                                                    <input type="number" name="price5" value="<?php echo $price5 ?>" class="form-control"  >
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
															<div class="form-group">
																<label>Vendor :</label>
																<select name="vendor5" class="select form-control" >
                                                                            <option value="" disabled selected>Select Vendor</option>
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
                                                                    <input type="number" name="vprice5" class="form-control" >
                                                                </div>
                                                            </div>													
                                                        </div>

                                                <div class="text-right">
												    <button type="submit" class="btn btn-primary">Create</button>
											    </div>
									</div>
								</div>
                                
							</div>

                            
						</div>
                         <!---- Pax 5 -->

                         


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