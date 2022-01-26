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

 $price1;

 if (array_key_exists("SQT",$_GET) && array_key_exists("PaxNo",$_GET)  && array_key_exists("PaxName",$_GET) && array_key_exists("Airlines",$_GET) 
 && array_key_exists("From",$_GET) && array_key_exists("To",$_GET) && array_key_exists("Type",$_GET) 
 && array_key_exists("Cost",$_GET) && array_key_exists("Way",$_GET) && array_key_exists("ClientName",$_GET) && array_key_exists("Client_Id",$_GET)){  
    $SQT = $_GET['SQT'];
    $PaxNo = $_GET['PaxNo'];
    $Client_Id1 = $_GET['Client_Id'];
    $ClientName1 = $_GET['ClientName'];
    $PaxName = $_GET['PaxName'];
    $Airlines = $_GET['Airlines'];
    $From = $_GET['From'];
    $To = $_GET['To'];
    $Type = $_GET['Type'];
    $price1 = $_GET['Cost'];
    $Way = $_GET['Way'];

}else{
    $PaxName = " ";
    $SQT = " ";
    $PaxNo= " ";

}

?>


<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->
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

                                                                            <?php if(isset($ClientName1)){
                                                                                    echo "<option value=\"$Client_Id1\" selected>".$ClientName1."</option>";  

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
                                                                    <input type="name" name="revofficer" value="<?php echo $userName; ?>" class="form-control"  disabled>
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
                                                                    <input type="text" name="pax1" value="<?php echo $PaxName; ?>" class="form-control" required >
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

                                                                            <?php if(isset($Airlines)){
                                                                                    echo "<option value=\"$Airlines\" selected>".$Airlines."</option>";  

                                                                            }  ?>                                                                          
                                                                                                                                                                                                                                                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>                                                            
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>From</label>
                                                                    <select name="from1" class="select form-control" Required >
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
                                                                                 <?php if(isset($From)){
                                                                                    echo "<option value=\"$From\" selected>".$From."</option>";  

                                                                            }  ?> 
                                                                                                                                                           
                                                                           
                                                                     </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>To</label>
                                                                    <select name="to1" class="select form-control"  required>
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

                                                                            <?php if(isset($To)){
                                                                                    echo "<option value=\"$To\" selected>".$To."</option>";  

                                                                            }  ?> 

                                                                                                                                                                
                                                                            
                                                                </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Date</label>
                                                                        <input type="date" name="date" class="form-control"  required>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label>Flight Time</label>
                                                                        <input type="time" name="time" class="form-control"  required>
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
                                                                            <?php if(isset($Way)){
                                                                                    echo "<option value=\"$Way\" selected>".$Way."</option>";  

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
                                                                            <?php if(isset($Type)){
                                                                                    echo "<option value=\"$Type\" selected>".$Type."</option>";  

                                                                            }  ?> 
                                                                                                                                                      
                                                                        </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label>Deal Price</label>
                                                                    <?php if(!empty($price1)){
                                                                            echo "<input type='number' value='$price1' class='form-control'  disabled>";  

                                                                            }else{
                                                                                echo "<input type='number' name='price1'  class='form-control' required>";

                                                                            }
                                                                            
                                                                    ?>
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

                         <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {


                            $date = date("Y/m/d h:m:i");

                            $text = "https://erp.flyfar.tech/AirInvoice/IssueInvoice.php?INV=$INV_No";
                            $path = 'images/';
                            $file = $path.$INV_No.".png";
                            $ecc = 'L';
                            $pixel_Size = 5;
                            
                            QRcode::png($text, $file, $ecc, $pixel_Size);

                            $csrId = $_POST['client'];
                            $ses_sql = mysqli_query($conn,"select * from customer where CustomerId = '$csrId' "); 
                            $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
                            $Client_Name = $row['name'];

                            $vendor1 = $_POST['vendor1'];
                            $ses_sql1 = mysqli_query($conn,"select * from vendor where vendorId = '$vendor1' "); 
                            $row = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);   
                            $Vendor_Name = $row['name'];

                            $System =  $_POST['system'];
                            $sales = "UPDATE `salesqutation` SET `invoice`='yes' WHERE sqNo='$SQT' AND  PaxNo='$PaxNo'";


                            if (mysqli_query($conn, $sales)) {

                            }


                            $invoice = "INSERT INTO `invoice`(
                                `invNo`,
                                `type`,
                                `sqtNo`,
                                `paxNo`,
                                `clientName`,
                                `vendorName`,
                                `csrId`,
                                `system`,
                                `recofficer`,
                                `createdBy`
                            )
                            VALUES(
                                '$INV_No',
                                'Issue',
                                '$SQT',
                                '$PaxNo',
                                '$Client_Name',
                                '$Vendor_Name',
                                '$csrId',
                                '$System',
                                '$userName',
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
                            $vendor1 = $_POST['vendor1'];
                            $vprice1 = $_POST['vprice1'];
                            $date = $_POST['date'];
                            $time = $_POST['time'];

                            $dateTime = $date." ".$time;

                            if(empty($price1)){
                                $price1 = $_POST['price1'];
                            }



                        }
                            
                            $mrgenerate = "INSERT INTO `airticket`(
                                `invNo`,
                                `type`,
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
                                'Issue',
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
                                '$dateTime'
                                
                            )";

                            if (mysqli_query($conn, $mrgenerate)) {

                                $ses_sql = mysqli_query($conn,"SELECT * FROM client_ledger where CSR_ID='$csrId' ORDER BY DateTime DESC LIMIT 1");
                                $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
                                
                                $Balanced = $row['Balance'] - $price1;       

                                $ClientLedger ="INSERT INTO `client_ledger`(`TxType`,`type`, `CSR_ID`, `PaxName`, `serviceType`, `Details`, `cost`, `Balance`)
                                                VALUES ('$INV_No','Issue','$csrId','$pax1','$type1','$pnr1 ' \n ' $ticket1 ' \n ' $airlines1  ' \n ' $way1 ' \n ' $from1-$to1','$price1','$Balanced')";

                                if (mysqli_query($conn, $ClientLedger)) {

                                    $ses_sql1 = mysqli_query($conn,"SELECT * FROM vendor_ledger where VDR_ID='$vendor1' ORDER BY DateTime DESC LIMIT 1");
                                    $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
                                    
                                    $vBalanced = (int)$row1['balance'] - $vprice1;
                                    $vendorLedger ="INSERT INTO `vendor_ledger`(`txType`,`type`, `VDR_ID`, `pax`, `pnr`, `ticket`, `serviceType`, `details`, `cost`,`balance`)
                                    VALUES ('$INV_No','Issue','$vendor1','$pax1','$pnr1','$ticket1','$type1 Airticket','$airlines1 ' \n ' $way1 ' \n ' $from1-$to1','$vprice1','$vBalanced')";

                                    if (mysqli_query($conn, $vendorLedger)) {

                                        $Cbody="
                                        <html>
                                                <head>
                                                    <style>
                                                        body {
                                                    width: 80% !important;
                                                    height: 100%;
                                                    margin: 0;
                                                    border: 1px solid #868484;
                                                    text-align: center;
                                                    -webkit-text-size-adjust: none;
                                                    }

                                                    table {
                                                    font-family: arial, sans-serif;
                                                    border-collapse: collapse;
                                                    width: 80%;
                                                    }

                                                    th {
                                                    background-color: #b3aeae;
                                                    border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;
                                                    }
                                                    td {
                                                        
                                                    border: 1px solid #dddddd;
                                                    text-align: left;
                                                    padding: 8px;
                                                    }

                                                    .leftbar {
                                                    float: left;
                                                    padding: 20px;
                                                    width: 50%;

                                                    }

                                                    .rightbar {
                                                    padding: 20px;
                                                    width: 50%;

                                                    }

                                                    .footer {
                                                        background-color: antiquewhite;
                                                    }

                                                    </style>

                                                </head>
                                                <body>
                                                <center>
                                                <img src='https://erp.flyfar.tech/logo.gif'><br/>
                                                <h3>Invoice Created Date : $date</h3><br/>


                                                <h3><b> Hi $Client_Name </b> This is an invoice for your recent purchase. <br/></h3>


                                                <div class='header'>
                                                    <div class='leftbar'>
                                                        <h2> #$INV_No</h2>

                                                    </div>
                                                    <div class='rightbar'>
                                                        <h5>Created By : $userName</h5>
                                                        
                                                    </div>
                                                </div>
                                                

                                                    <table>
                                                        <tr>
                                                        <th>Pax Name</th>
                                                        <th>PNR</th>
                                                        <th>Ticket No</th>
                                                        <th>From - To</th>
                                                        <th>Service Type</th>
                                                        <th>Cost</th>
                                                        </tr>
                                                        <tr>
                                                        <td>$pax1</td>
                                                        <td>$pnr1</td>
                                                        <td>$ticket1</td>
                                                        <td>$from1 - $to1</td>
                                                        <td>$type1</td>
                                                        <td>$price1</td>
                                                        </tr>
                                                        <tr>
                                                        <td rowspan='3' colspan='4' style='text-align:left;'></td>
                                                        <td>Discount</td>
                                                        <td>0,00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total</td>
                                                            <td>$price1</td>
                                                            </tr>
                                                    </table>

                                                    <h3> Verify your Invoice</h3>
                                                    <img src='https://erp.flyfar.tech/AirInvoice/images/$INV_No.png' >
                                                </center>
                                                    <center>   
                                                    <h4> If you have any questions about this invoice, simply reply to this email or reach out to our support team ( {{ support_url }} ) for help. </h4>
                                                        
                                                        <h3>Cheers, <br>
                                                        The Fly Far Team</h3>
                                                        
                                                        <p>If you’re having trouble with the button above, copy and paste the URL below into your web browser.<br/>
                                                        
                                                        {{action_url}} </p>
                                                    </center> 
                                                <div class='footer'>
                                                    <center><p>© 2021 Fly Far International. All rights reserved.<br/>
                                                    
                                                    Ka 11/2A, Jagannathpur, Bashundhora Road, Above Standard Chartered Bank. <br/>
                                                    
                                                    Dhaka, 1229. <br/></p>
                                                </center>
                                                </div>
                                                </body>
                                                </html>";

                                        


                                            $clientsql = mysqli_query($conn,"SELECT * FROM customer where CustomerId='$csrId'");
                                            $row2 = mysqli_fetch_array($clientsql,MYSQLI_ASSOC);
                                            
                                            $Email = $row2['email'];


                                                $mail = new PHPMailer(true);
                                                
                                                // $mail->SMTPDebug = 2;                     
                                                    $mail->isSMTP();                                     
                                                    $mail->Host       = 'SMTP.GMAIL.COM';                    
                                                    $mail->SMTPAuth   = true;                                   
                                                    $mail->Username   = 'mrfawbd@gmail.com';                  
                                                    $mail->Password   = '@Kayes321';                               
                                                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
                                                    $mail->Port       = 465; 
                                                                                
                                                    //Recipients
                                                    $mail->setFrom('noreply@flyfar.tech', 'ERP Software - FLy Far');
                                                    $mail->addAddress($Email, $Client_Name);  
                                                
                                                    $mail->addCC('ceo@flyfarint.com');
                                                    $mail->addBCC('fahim@flyfarint.com');
                                                                        
                                                    $mail->isHTML(true);                              
                                                    $mail->Subject = 'Invoice Created On Your Account';
                                                    $mail->Body    = $Cbody;
                                                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';                        
                                                    $mail->send();

                                                

                                                    //vendor mail

                                                    $vendorsql = mysqli_query($conn,"SELECT * FROM vendor where vendorId='$vendor1'");
                                                    $row3 = mysqli_fetch_array($vendorsql,MYSQLI_ASSOC);
                                                    
                                                    $VendorEmail = $row3['email'];
                                                    $vendor_Name = $row3['name'];



                                                    $Vbody="
                                                    <html>
                                                        <head>
                                                            <style>
                                                                body {
                                                            width: 80% !important;
                                                            height: 100%;
                                                            margin: 0;
                                                            border: 1px solid #868484;
                                                            text-align: center;
                                                            -webkit-text-size-adjust: none;
                                                            }
                                                        
                                                            table {
                                                            font-family: arial, sans-serif;
                                                            border-collapse: collapse;
                                                            width: 80%;
                                                            }
                                                        
                                                            th {
                                                            background-color: #b3aeae;
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                            }
                                                            td {
                                                                
                                                            border: 1px solid #dddddd;
                                                            text-align: left;
                                                            padding: 8px;
                                                            }
                                                        
                                                            .leftbar {
                                                            float: left;
                                                            padding: 20px;
                                                            width: 50%;
                                                        
                                                            }
                                                        
                                                            .rightbar {
                                                            padding: 20px;
                                                            width: 50%;
                                                        
                                                            }
                                                        
                                                            .footer {
                                                                background-color: antiquewhite;
                                                            }
                                                        
                                                            </style>
                                                        
                                                        </head>
                                                        <body>
                                                        <center>
                                                        <img src='https://erp.flyfar.tech/logo.gif'><br/>
                                                        <h3>Invoice Created Date : $date</h3><br/>
                                                        
                                                        
                                                        <h3><b> Hi $vendor_Name </b> This is an Debit Voucher purchase from you. <br/></h3>
                                                        
                                                        
                                                        <div class='header'>
                                                            <div class='leftbar'>

                                                        
                                                            </div>
                                                            <div class='rightbar'>
                                                            
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                            <table>
                                                                <tr>
                                                                <th>Pax Name</th>
                                                                <th>PNR</th>
                                                                <th>Ticket No</th>
                                                                <th>From - To</th>
                                                                <th>Service Type</th>
                                                                <th>Cost</th>
                                                                </tr>
                                                                <tr>
                                                                <td>$pax1</td>
                                                                <td>$pnr1</td>
                                                                <td>$ticket1</td>
                                                                <td>$from1 - $to1</td>
                                                                <td>$type1</td>
                                                                <td>$vprice1</td>
                                                                </tr>
                                                                <tr>
                                                                <td rowspan='3' colspan='4' style='text-align:left;'></td>
                                                                <td>Discount</td>
                                                                <td>0,00</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total</td>
                                                                    <td>$vprice1</td>
                                                                    </tr>
                                                            </table>
                                                        
                                                        </center>
                                                            <center>   
                                                            <h4> If you have any questions about this invoice, simply reply to this email or reach out to our support team ( {{ support_url }} ) for help. </h4>
                                                                
                                                                <h3>Cheers, <br>
                                                                The Fly Far Team</h3>
                                                                
                                                                <p>If youre having trouble with the button above, copy and paste the URL below into your web browser.<br/>
                                                                
                                                                {{action_url}} </p>
                                                            </center> 
                                                        <div class='footer'>
                                                            <center><p>© 2021 Fly Far International. All rights reserved.<br/>
                                                            
                                                            Ka 11/2A, Jagannathpur, Bashundhora Road, Above Standard Chartered Bank. <br/>
                                                            
                                                            Dhaka, 1229. <br/></p>
                                                        </center>
                                                        </div>
                                                        </body>
                                                        </html>";


                                                
                                                        $mail1 = new PHPMailer(true);
                                
                                                        
                                                        // $mail->SMTPDebug = 2;                     
                                                            $mail1->isSMTP();                                     
                                                            $mail1->Host       = 'SMTP.GMAIL.COM';                    
                                                            $mail1->SMTPAuth   = true;                                   
                                                            $mail1->Username   = 'mrfawbd@gmail.com';                  
                                                            $mail1->Password   = '@Kayes321';                               
                                                            $mail1->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
                                                            $mail1->Port       = 465; 
                                                                                        
                                                            //Recipients
                                                            $mail1->setFrom('invoice@flyfar.tech', 'ERP Software - FLy Far');
                                                            $mail1->addAddress($VendorEmail, $vendor_Name);  
                                                        
                                                            $mail1->addCC('ceo@flyfarint.com');
                                                            $mail1->addBCC('fahim@flyfarint.com');
                                                        
                                                        
                                                            $mail1->isHTML(true);                              
                                                            $mail1->Subject = 'Debit Voucher Created On Your Account';
                                                            $mail1->Body    = $Vbody;
                                                            $mail1->AltBody = 'This is the body in plain text for non-HTML mail clients';
                                                        
                                                            $mail1->send();      
                                                    
                                                    


                                                            print '<script>
                                                            swal({
                                                            title: "Success!",
                                                            text: "Invoice Created Successfully!",
                                                            type: "success",
                                                            confirmButtonText: "Cool"
                                                            },
                                                            function(){
                                                                window.location=\'IssueInvoice.php?INV='.$INV_No.'\'
                                                                });
                                                            </script>';
                                                            
                                        
                                        }
                                    
                                    
                                        }
                                
                                
                                }
                            }

                        
                        ?>
                         

                        
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

			
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->