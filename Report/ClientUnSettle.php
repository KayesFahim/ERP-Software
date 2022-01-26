<?php
include '../config.php';
include('../session.php');





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
							<h3 class="page-title">Client Unsettle Amount</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Client Report</li>
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
                    $ses_sql = mysqli_query($conn,"select * from client_unsettle_ledger where id = '$Id'"); 
                    $row1 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
                    $INV_No = $row1['TxType'];
                    $Type = $row1['type'];
                    $csrId = $row1['CSR_ID'];
                    $pax1 = $row1['PaxName'];
                    $serviceType = $row1['serviceType'];
                    $details = $row1['Details'];
                    $amount = $row1['amount'];

                    $ses_sql = mysqli_query($conn,"SELECT * FROM client_ledger where CSR_ID='$csrId' ORDER BY DateTime DESC LIMIT 1");
                    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
                                                
                    $Balanced = $row['Balance'] + (int)$amount;


                    $ClientLedger ="INSERT INTO `client_ledger`(`TxType`,`type`, `CSR_ID`, `PaxName`, `serviceType`, `Details`, `deposit`, `Balance`)
                                                                VALUES ('$INV_No','$Type Refund','$csrId','$pax1','$serviceType','$details','$amount','$Balanced')";

                    if (mysqli_query($conn, $ClientLedger)) {

                        $Delete = "DELETE FROM client_unsettle_ledger WHERE id = $Id";
                            if (mysqli_query($conn, $Delete)) {

                                    print '<script>
                                    swal({
                                    title: "Success!",
                                    text: "Refund Settle Successfully!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                    },
                                    function(){
                                        window.location=\'ClientUnSettle.php\'
                                        });
                                    </script>';
                                }
                        
                        
                        }
                    }else if($Status == 'reject'){
                        $Update = "UPDATE client_unsettle_ledger SET `status` ='Rejected' WHERE id = $Id";
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
													<th>Tx Type</th>
                                                    <th>Invoice Type</th>
													<th>Client Name</th>													
													<th>Details</th>
                                                    <th>Service</th>
													<th>Amount</th>
                                                    <th>Action</th>

												</tr>
											</thead>
											<tbody>

												<?php

                                                        
												$sql = "SELECT * FROM `client_unsettle_ledger` Order By DateTime DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {
                                                    $csrId  = $row["CSR_ID"];
                                                    $ses_sql = mysqli_query($conn,"select * from customer where CustomerId = '$csrId' "); 
                                                    $row1 = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
                                                    $Client_Name = $row1['name'];
													$Id = $row["id"];
                                                    $Status = $row['status'];
													echo "<tr><td>".$row["DateTime"]."</td>
																<td>".$row["TxType"]."</td> 
																<td>".$row["type"]."</td>
                                                                <td>".$Client_Name."</td> 
														 		<td>".$row["Details"]."</td>
																<td>".$row["serviceType"]."</td>
														 		<td>".$row["amount"]."</td>";

                                                                if($Status == 'Rejected'){

                                                                    echo "<td><a href='' class='btn btn-danger disabled'> Rejected </a>";
                                                                    

                                                                }else{
                                                                    echo "<td><a href='ClientUnSettle.php?Id=$Id&status=reject' class='btn btn-danger'> Reject </a> ";
                                                                    echo "<a href='ClientUnSettle.php?Id=$Id&status=settle' class='btn btn-success'> Settle </a></td>";

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