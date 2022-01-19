<?php

include '../config.php';
include('../session.php');


?>


<?php
        	include '../header.php';
        ?>

		
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
							<h3 class="page-title">Money Reciept</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Money Reciept</li>
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
									<h4 class="card-title">Money Reciept Details</h4>
									<div class="text-right">
										<a href="AddMoneyReciept.php" class="btn btn-primary"> Create +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Reciept ID</th>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Created By</th>
													<th>Customer</th>
													<th>Reference No</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT recieptNo, createdBy, customerId, issueDate, TxId, amount, paymentMethod, paymentId   FROM `moneyreciept` ORDER BY id DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$Rno = $row["recieptNo"];
													echo "<tr><td>".$row["recieptNo"]."</td>
																<td>".$row["issueDate"]."</td> 
														 		<td>".$row["amount"]."</td>
																<td>".$row["createdBy"]."</td>
														 		<td>".$row["customerId"]."</td>
																 <td>".$row["TxId"]."</td>
																<td><a href='Moneyreciept/Invoice.php?Rno=$Rno' class='btn btn-primary'> View </a><td>
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