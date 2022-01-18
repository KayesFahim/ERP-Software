<?php

include '../config.php';
include('../session.php');


?>


<! ------------  Header ----------->
<?php include '../header.php'; ?>
<! ------------  Header ----------->

		 
       
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
							<h3 class="page-title">Bills</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Bills</li>
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
									<h4 class="card-title">Bill Details</h4>
									<div class="text-right">
										<a href="AddBill.php" class="btn btn-primary"> Create +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Bill ID</th>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Created By</th>
													<th>Vendor</th>
													<th>Reference No</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT *  FROM `bill` ORDER BY id DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$Bno = $row["billNo"];
													echo "<tr><td>".$row["billNo"]."</td>
																<td>".$row["issueDate"]."</td> 
														 		<td>".$row["amount"]."</td>
																<td>".$row["createdBy"]."</td>
														 		<td>".$row["vendorId"]."</td>
																 <td>".$row["TxId"]."</td>
																<td><a href='Invoice.php?Bno=$Bno' class='btn btn-primary'> View </a><td>
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
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->