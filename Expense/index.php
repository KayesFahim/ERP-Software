<?php

include '../config.php';
include('../session.php');


?>


<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->

		 
       <!--- Sidebar --->

       <?php include '../sidebar.php'; ?>

      
        <!--- Sidebar --->
		

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Expense</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Expense</li>
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
									<h4 class="card-title">Expense Details</h4>
									<div class="text-right">
										<a href="AddExpense.php" class="btn btn-primary"> Create +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Category</th>
													<th>Description No</th>
													<th>Action</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT *  FROM `expense` ORDER BY id DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$EXP_NO = $row["expNo"];
													echo "<tr>
																<td>".$row["issueDate"]."</td> 
														 		<td>".$row["amount"]."</td>
														 		<td>".$row["category"]."</td>
																 <td>".$row["purpose"]."</td>
																<td><a href='Invoice.php?Exp=$EXP_NO' class='btn btn-primary'> View </a><td>
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
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->