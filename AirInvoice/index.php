<?php

include '../config.php';
include('../session.php');


?>



<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->


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
							<h3 class="page-title">Air Ticket Invoice</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Air Ticket</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Page Header -->
				<!-- Contant -->
				
					<div class="col-md-12">
						
					</div>
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="text-right">
										<a href="Issue.php" class="btn btn-primary"> Create +</a>
									</div>
								</div>
								
							
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Issue Date</th>
													<th>Invoice No</th>
													<th>Type </th>
													<th>Amount</th>
													<th>Vendor Cost</th>
													<th>Profit</th>
													<th>Client Name</th>
													<th>Action</th>
													<th> </th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT
														invoice.id,
														invoice.invNo,
														invoice.createdtime,
														invoice.type,
														airticket.vPrice1,														
														invoice.clientName,
														airticket.cost1
														FROM invoice
														INNER JOIN airticket ON invoice.invNo = airticket.invNo
														Group By id DESC";

												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$INV = $row["invNo"];
													$Profit = $row['cost1'] -  $row['vPrice1'];

													date_default_timezone_set('Asia/Dhaka');
													$startTime = $row['createdtime'];
													$date = date_create($startTime);
													$dataDate = date_format($date,"Y-m-d");													
													$endTime = date("Y-m-d");
													echo "<tr>
																<td>".$row["createdtime"]. "</td>
																<td>".$row["invNo"]. "</td>
																<td>".$row["type"]."</td> 
														 		<td>".$row["cost1"]."</td>
														 		<td>".$row["vPrice1"]."</td>
																<td>".$Profit."</td>
																<td>".$row["clientName"]."</td>";

																if($row["type"] == 'Issue'){														
																	echo "<td><a href='IssueInvoice.php?INV=$INV' class='btn btn-primary'> View </a> ";
																	echo "<a href='ReIssue.php?INV=$INV' class='btn btn-primary'> ReIssue </a> ";
																	echo "<a href='SecondSegment.php?INV=$INV' class='btn btn-primary'> Second Segment </a> ";
																	echo "<a href='Refund.php?INV=$INV' class='btn btn-primary'> Refund </a> ";
																	if($dataDate == $endTime){														
																		echo "<a href='Void.php?INV=$INV' class='btn btn-primary'> Void </a> </td>";																
																	}															
																}else if ($row["type"] == 'Void'){														
																	echo "<td><a href='VoidInvoice.php?INV=$INV' class='btn btn-primary'> View </a> ";
																	
																}else if ($row["type"] == 'Refund'){														
																	echo "<td><a href='IssueInvoice.php?INV=$INV' class='btn btn-primary'> View </a> ";
																}else if($row["type"] == 'ReIssue'){														
																	echo "<td><a href='ReIssueInvoice.php?INV=$INV' class='btn btn-primary'> View </a> ";
																	echo "<a href='ReIssue.php?INV=$INV' class='btn btn-primary'> ReIssue </a> ";
																	echo "<a href='SecondSegment.php?INV=$INV' class='btn btn-primary'> Second Segment </a> ";
																	echo "<a href='Refund.php?INV=$INV' class='btn btn-primary'> Refund </a> ";
																	if($dataDate == $endTime){														
																		echo "<a href='Void.php?INV=$INV' class='btn btn-primary'> Void </a> </td>";																
																	}
																}else if($row["type"] == 'Second Segment'){														
																	echo "<td><a href='SecondSegmentInvoice.php?INV=$INV' class='btn btn-primary'> View </a> ";
																	echo "<a href='ReIssue.php?INV=$INV' class='btn btn-primary'> ReIssue </a> ";
																	echo "<a href='Refund.php?INV=$INV' class='btn btn-primary'> Refund </a> ";
																	if($dataDate == $endTime){														
																		echo "<a href='Void.php?INV=$INV' class='btn btn-primary'> Void </a> </td>";																
																	}
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
			<script>
				
		</script>

<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->