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
							<h3 class="page-title">Customer</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Customer</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Contant -->
				
					<div class="col-md-12">
						
					</div>
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="text-right">
										<a href="AddCustomer.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Date</th>
													<th>Type</th>
													<th>Details</th>
                                                    <th>Service</th>
													<th>Cost</th>
													<th>Deposit</th>
													<th>Last Balanced</th>
                                                    <th></th>

												</tr>
											</thead>
											<tbody>

												<?php

                                                        $encryption = $_GET['cId'];
                                                        $ciphering = "AES-128-CTR";
                                                        $iv_length = openssl_cipher_iv_length($ciphering);
                                                        $options = 0;
                                                        $decryption_iv  = '1234567891011121';
                                                        $decryption_key  = "FlyFarInterNational";
                                                        $decryption=openssl_decrypt ($encryption, $ciphering, 
                                                                $decryption_key, $options, $decryption_iv);

                                                        $Client_Id = $decryption;

												$sql = "SELECT * FROM `client_ledger` WHERE CSR_ID='$Client_Id' Order By DateTime DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  
													  
													echo "<tr><td>".$row["DateTime"]."</td>
																<td>".$row["TxType"]."</td> 
														 		<td>".$row["Details"]."</td>
																<td>".$row["serviceType"]."</td>
														 		<td>".$row["cost"]."</td>
                                                                <td>".$row["deposit"]."</td>
                                                                <td>".$row["Balance"]."</td>
                                                                <td> </td>
                                                                </tr>";   											
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
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->