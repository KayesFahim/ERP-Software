<?php

include '../config.php';
include('../session.php');


$SQT = $_GET['SQT'];


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
										<a href="Invoice.php?SQT=<?php echo $SQT; ?>" class="btn btn-primary"> Print +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
                                                    <th>Pax No</th>	
													<th>Issue Date</th>                                                   
													<th>Pax Name</th>													
													<th>Airlines</th>
													<th>From</th>
													<th>To</th>
                                                    <th>Type</th>
													<th>Cost</th>
                                                    <th>Way</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php



												$sql = "SELECT
                                                        sqNo,
                                                        clientName,
                                                        csrId,
                                                        id,paxNo,invoice,
                                                        createdDate,
                                                        PaxName,
                                                        Airlines,
                                                        placeFrom, placeTo, ticketType, cost, way                                                     
                                                    FROM
                                                        `salesqutation`
                                                    wHERE sqNo = '$SQT'                                                   
                                                    ORDER BY paxNo";

												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$SQT = $row["sqNo"];
                                                    $PaxNo = $row["paxNo"];
                                                    $Invoice = $row["invoice"];
                                                    $ClientName = $row["clientName"];
                                                    $Client_Id = $row["csrId"];
                                                    $PaxName = $row["PaxName"];
                                                    $Airlines = $row["Airlines"];
                                                    $From = $row["placeFrom"];
                                                    $To = $row["placeTo"];
                                                    $Type = $row["ticketType"];
                                                    $Cost = $row["cost"];
                                                    $Way = $row["way"];


                                                    $Param = "SQT=$SQT&PaxNo=$PaxNo&ClientName=$ClientName&Client_Id=$Client_Id&PaxName=$PaxName&Airlines=$Airlines&From=$From&To=$To&Type=$Type&Cost=$Cost&Way=$Way";


                                                    
													echo "<tr><td>".$row["paxNo"]."</td>
																<td>".$row["createdDate"]."</td> 
														 		<td><a href='OperationDetails.php?SQT=$SQT&PaxNo=$PaxNo'> ".$row["PaxName"]." </a></td>																
																<td>".$row["Airlines"]."</td>
                                                                <td>".$row["placeFrom"]."</td>
																<td>".$row["placeTo"]."</td>
																<td>".$row["ticketType"]."</td>
																<td>".$row["cost"]."</td>
                                                                <td>".$row["way"]."</td>";
                                                    

                                                    if($Invoice == 'yes'){
                                                        echo "<td><a href=' ' class='btn btn-danger disabled'> Invoiced </a></td></tr>";   

                                                    }else{
                                                        echo "<td><a href='../AirInvoice/Issue.php?$Param' class='btn btn-primary'> Make Invoice </a></td></tr>";   
                                                    }
											
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