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
							<h3 class="page-title">Bank Details</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Bank Details</li>
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
									<h4 class="card-title">Bank Details</h4>
									<div class="text-right">
										<a href="AddNewBank.php" class="btn btn-primary"> Add +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Bank Name</th>
													<th>Account No</th>
													<th>Branch</th>
													<th>Amount</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$sql = "SELECT DISTINCT id, bankId, bankname,bankaccno, branchname, SUM(credit-debit) as Amount FROM bank GROUP BY bankname";
												$result = $conn->query($sql);
												$i=0;
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													  $bankgetID = $row["bankId"];												  													 
													echo "<tr><td>".$row["bankname"]."</td> 
														 		<td>".$row["bankaccno"]."</td>
																<td>".$row["branchname"]."</td>
														 		<td>".$row["Amount"]."</td>
																<td><a href='BankCredit.php?getBankId=$bankgetID' class='btn btn-success'> Credit </a>
																<a href='BankDebit.php?getBankId=$bankgetID' class='btn btn-danger'> Debit </a><td>
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
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->