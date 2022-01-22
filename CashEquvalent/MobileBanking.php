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
							<h3 class="page-title">Mobile Banking</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Mobile Banking</li>
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
									<h4 class="card-title">Mobile Banking Detail</h4>
									<div class="text-right">
										<a href="AddMobileBanking.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>No</th>
													<th>Operator Name</th>
													<th>Account No:</th>
													<th>Amount</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$sql = "SELECT id, MB_ID, mb_operator, mb_number, SUM(cashIn-cashOut) as balance FROM `mobile_banking` GROUP By MB_ID;";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  													 
													echo "<tr><td>".$row["MB_ID"]."</td>
																<td>".$row["mb_operator"]."</td> 
														 		<td>".$row["mb_number"]."</td>
																<td>".$row["balance"]."</td>
																<td><a  class='btn btn-primary'> View </a><td>
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
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->