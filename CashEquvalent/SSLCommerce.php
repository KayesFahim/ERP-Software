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
							<h3 class="page-title">SSL Commerce</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">SSL Commerce</li>
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
										<a href="AddSSL.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Type</th>
													<th>Recipant</th>
													<th>Amount</th>
                                                    <th>Username</th>
													<th>createdDate</th>
												</tr>
											</thead>
											<tbody>

											<?php												
												$sql = "SELECT DISTINCT
																		id,
																		userId,
																		TxType,
																		createdDate,
																		createdBy,
																		SUM(amount) AS Amount
																	FROM
																		ssl_commerce
																	GROUP BY
																		id
																	DESC";
												$result = $conn->query($sql);
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {
													echo "<tr>
														 	<td>".$row["TxType"]."</td>
															<td>".$row["userId"]."</td>
														 	<td>".$row["Amount"]."</td>
                                                            <td>".$row["createdBy"]."</td>
                                                            <td>".$row["createdDate"]."</td>
                                                            
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