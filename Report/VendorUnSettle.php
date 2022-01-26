<?php

include '../config.php';
include('../session.php');



if(array_key_exists("Id",$_GET) && array_key_exists("status",$_GET)){
    $Id = $_GET['Id'];
    $Status = $_GET['status'];

    if($Status == 'settle'){
    $ses_sql = mysqli_query($conn,"select * from unsettle_vendor_leadger where id = '$Id'"); 
    $row1 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
    $INV_No = $row1['txType'];
    $Type = $row1['type'];
    $vendor1 = $row1['VDR_ID'];
    $pax1 = $row1['pax'];
    $pnr1 = $row1['pnr'];
    $ticket1 = $row1['ticket'];
    $serviceType = $row1['serviceType'];
    $details = $row1['details'];
    $amount = $row1['amount'];

    $ses_sql1 = mysqli_query($conn,"SELECT * FROM vendor_ledger where VDR_ID='$vendor1' ORDER BY DateTime DESC LIMIT 1");
    $row = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
     
    $vBalanced = (int)$row['balance'] + (int)$amount;


    $vendorLedger ="INSERT INTO `vendor_ledger`(`txType`,`type`, `VDR_ID`, `pax`, `pnr`, `ticket`, `serviceType`, `details`, `deposit`,`balance`)
                                        VALUES ('$INV_No','$Type Refund','$vendor1','$pax1','$pnr1','$ticket1','$serviceType','$details','$amount','$vBalanced')";

        if (mysqli_query($conn, $vendorLedger)) {
            $Delete = "DELETE FROM unsettle_vendor_leadger WHERE id = $Id";
            if (mysqli_query($conn, $Delete)) {

            print '<script>
            swal({
            title: "Success!",
            text: "Refund Amount Settle Successfully!",
            type: "success",
            confirmButtonText: "Cool"
            },
            function(){
                window.location=\'VendorUnSettle.php\'
                });
            </script>';
    
        } 
    }                                 
        
    }else if($Status == 'reject'){
            $Update = "UPDATE FROM unsettle_vendor_leadger SET `status` ='Rejected' WHERE id = $Id";
            if (mysqli_query($conn, $Update)) {
                print '<script>
                swal({
                title: "Error!",
                text: "Refund Rejected !",
                type: "error",
                confirmButtonText: "Ohooo"
                },
                function(){
                    window.location=\'ClientUnSettle.php\'
                    });
                </script>';
    
            }
    
        }        
}



?>

		<!-- Sidebar -->

		<?php
        	include '../header.php';
        ?>
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
							<h3 class="page-title">Vendor Un Settle Statement</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Vendor Report</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Contant -->

                <?php

                    if(array_key_exists("Id",$_GET) && array_key_exists("status",$_GET)){
                        $Id = $_GET['Id'];
                        $Status = $_GET['status'];

                        if($Status == 'settle'){
                        $ses_sql = mysqli_query($conn,"select * from unsettle_vendor_leadger where id = '$Id'"); 
                        $row1 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
                        $INV_No = $row1['txType'];
                        $Type = $row1['type'];
                        $vendor1 = $row1['VDR_ID'];
                        $pax1 = $row1['pax'];
                        $pnr1 = $row1['pnr'];
                        $ticket1 = $row1['ticket'];
                        $serviceType = $row1['serviceType'];
                        $details = $row1['details'];
                        $amount = $row1['amount'];

                        $ses_sql1 = mysqli_query($conn,"SELECT * FROM vendor_ledger where VDR_ID='$vendor1' ORDER BY DateTime DESC LIMIT 1");
                        $row = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
                        
                        $vBalanced = (int)$row['balance'] + (int)$amount;


                        $vendorLedger ="INSERT INTO `vendor_ledger`(`txType`,`type`, `VDR_ID`, `pax`, `pnr`, `ticket`, `serviceType`, `details`, `deposit`,`balance`)
                                                            VALUES ('$INV_No','$Type Refund','$vendor1','$pax1','$pnr1','$ticket1','$serviceType','$details','$amount','$vBalanced')";

                            if (mysqli_query($conn, $vendorLedger)) {
                                $Delete = "DELETE FROM unsettle_vendor_leadger WHERE id = $Id";
                                if (mysqli_query($conn, $Delete)) {

                                print '<script>
                                swal({
                                title: "Success!",
                                text: "Refund Amount Settle Successfully!",
                                type: "success",
                                confirmButtonText: "Cool"
                                },
                                function(){
                                    window.location=\'VendorUnSettle.php\'
                                    });
                                </script>';
                        
                            } 
                        }                                 
                            
                        }else if($Status == 'reject'){
                                $Update = "UPDATE unsettle_vendor_leadger SET `status` ='Rejected' WHERE id = $Id";
                                if (mysqli_query($conn, $Update)) {
                                    print '<script>
                                    swal({
                                    title: "Error!",
                                    text: "Refund Rejected !",
                                    type: "error",
                                    confirmButtonText: "Ohooo"
                                    },
                                    function(){
                                        window.location=\'VendorUnSettle.php\'
                                        });
                                    </script>';
                        
                                }
                        
                            }        
                    }

                ?>
				
					<div class="col-md-12">
						
					</div>
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped" id="table"  data-order=''>
											<thead>
												<tr>
													<th>Date</th>
													<th>Type</th>
                                                    <th>Pax Name</th>													
													<th>Details</th>
                                                    <th>Service</th>
													<th>Amount</th>
                                                    <th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

                                                        
												$sql = "SELECT * FROM `unsettle_vendor_leadger` Order By DateTime DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
                                                    $vendor1 = $row['VDR_ID'];
                                                    $ses_sql1 = mysqli_query($conn,"select * from vendor where vendorId = '$vendor1' "); 
                                                    $row1 = mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);   
                                                    $Vendor_Name = $row1['name'];
                                                    $Id = $row["id"];
                                                    $Status = $row['status']; 
													echo "<tr><td>".$row["dateTime"]."</td>
																<td>".$row["txType"]."</td>
                                                                <td>".$row["pax"]."</td>  																
														 		<td>".$row["details"]."</td>
																<td>".$row["serviceType"]."</td>
														 		<td>".$row["amount"]."</td>";

                                                                if($Status == 'Rejected'){
                                                                    echo "<td><a href=' ' class='btn btn-danger disabled'> Rejected </a>";
                                                                    
                                                                }else{
                                                                    echo "<td> <a href='VendorUnSettle.php?Id=$Id&status=reject' class='btn btn-danger'> Reject </a> ";
                                                                    echo "<a href='VendorUnSettle.php?Id=$Id&status=settle' class='btn btn-success'> Settle </a></td>";

                                                                }


                                                                echo "</tr>";   											
												  }
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
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->