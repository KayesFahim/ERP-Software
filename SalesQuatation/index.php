<?php

include '../config.php';
include('../session.php');


?>

<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->
		 
      <!-- Sidebar -->

       
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
							<h3 class="page-title">AirTicket Quatation</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">AirTicket Quatation</li>
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
										<a href="AddAirTicket.php" class="btn btn-primary"> Create +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Quatation No</th>
													<th>Issue Date</th>
													<th>Amount</th>													
													<th>createdBy</th>
													<th>Client Name</th>
													<th>Pax No</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT
                                                        sqNo,
                                                        createdDate,
                                                        createdBy,
                                                        clientName,
                                                        totalPax, SUM(cost)   as Cost                                                     
                                                    FROM
                                                        `salesqutation`
                                                    GROUP BY
                                                        sqNo DESC";

												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$SQT = $row["sqNo"];
													echo "<tr><td>".$row["sqNo"]."</td>
																<td>".$row["createdDate"]."</td> 
														 		<td>".$row["Cost"]."</td>
																<td>".$row["createdBy"]."</td>
																<td>".$row["clientName"]."</td>
																<td>".$row["totalPax"]."</td>
																<td><a href='AirTicketDetails.php?SQT=$SQT' class='btn btn-primary'> View </a></td>																
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