<?php

include '../config.php';
include('../session.php');

?>


<?php
        	include '../header.php';
        ?>	
			<!--- Sidebar --->

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
										<a href="ClientUnSettle.php" class="btn btn-primary"> Un Settle Statement</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped"  id="table"  data-order=''>
											<thead>
												<tr>
													<th>Client ID</th>
													<th>Name</th>
													<th>Balance</th>
													<th>Phone</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$sql = "SELECT * FROM `customer`";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  
													  $client_id = "".$row["CustomerId"];
													  $ciphering = "AES-128-CTR";
													  $iv_length = openssl_cipher_iv_length($ciphering);
													  $options = 0;
													  $encryption_iv = '1234567891011121';
													  $encryption_key = "FlyFarInterNational";
													  $encryption = openssl_encrypt($client_id, $ciphering,
																$encryption_key, $options, $encryption_iv);

													echo "<tr><td>".$row["CustomerId"]."</td>
																<td>".$row["name"]."</td> 
																<td>".$row["phone"]."</td>
														 		<td>".$row["email"]."</td>
																<td><a href='ClientLedgerView.php?cId=$encryption' class='btn btn-primary'> View </a><td>
																 </tr>";   											
												  }
												} else {

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
			<script>
				$('#myTable').DataTable( {
					responsive: true
				} );
			</script>
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->