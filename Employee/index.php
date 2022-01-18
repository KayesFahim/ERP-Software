<?php

include '../config.php';
include('../session.php');

?>
<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->

		 
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
							<h3 class="page-title">Employees</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Employees</li>
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
									<h4 class="card-title">Employees Detail</h4>
									<div class="text-right">
										<a href="AddEmployee.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Employee ID</th>
													<th>Name</th>
													<th>Email</th>
													<th>Phone</th>
													<th>Department</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$sql = "SELECT id, EMP_ID, email, name, phone, department FROM employee ORDER BY ID DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  
													  $empId = "".$row["EMP_ID"];
													  $ciphering = "AES-128-CTR";
													  $iv_length = openssl_cipher_iv_length($ciphering);
													  $options = 0;
													  $encryption_iv = '1234567891011121';
													  $encryption_key = "FlyFarInterNational";
													  $encryption = openssl_encrypt($empId, $ciphering,
																$encryption_key, $options, $encryption_iv);

													echo "<tr><td>".$row["EMP_ID"]."</td>
																<td>".$row["name"]."</td> 
														 		<td>".$row["email"]."</td>
																<td>".$row["phone"]."</td>
														 		<td>".$row["department"]."</td>
																<td><a href='UpdateEmployee.php?empId=$encryption' class='btn btn-primary'> View </a><td>
																 </tr>";   											
												  }
												} else {
  												echo "0 results";
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