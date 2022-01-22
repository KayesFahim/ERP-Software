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
							<h3 class="page-title">Portal </h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Portal</li>
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
									<h4 class="card-title">Portal Detail</h4>
									<div class="text-right">
										<a href="AddSSL.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>SSL No:</th>
													<th>invoiceId</th>
													<th>Amount</th>
                                                    <th>Username</th>
													<th>createdDate</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

											<?php												
												$sql = "SELECT DISTINCT id, sslId, invoiceId, customerId, createdBy, SUM(amount) as Amount FROM ssl_commerce GROUP BY sslId";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {
                                                      $sslId = 	$row["sslId"];

													echo "<tr>
															<td>".$row["sslId"]."</td> 
														 	<td>".$row["invoiceId"]."</td>
															<td>".$row["customerId"]."</td>
														 	<td>".$row["Amount"]."</td>
                                                            <td>".$row["createdBy"]."</td>
                                                            <td>".$row["createdDate"]."</td>
                                                            <td><a href='BankDebitEdit.php?getSslId=$sslId' class='btn btn-success'> Edit </a><td>
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
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->