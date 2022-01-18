<?php

include '../config.php';
include('../session.php');

$BankId = $_GET['getBankId'];


//Employee Info
$Bank_Name;
$Bank_Branch;
$Bank_Acccount;


$sql = "SELECT * FROM `bank` WHERE bankId ='$BankId' ORDER By id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$Bank_Name = $row["bankname"];	
        $Bank_Branch = $row["branchname"];	
        $Bank_Acccount = $row["bankaccno"];       							
 }
}

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
							<h3 class="page-title">Credit  Details</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Bank Credit</li>
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
									<h4 class="card-title">Account Details</h4>

								</div>
                                
								
								<div class="card-body">
                                <h6><?php echo $Bank_Branch; ?> </h6>
                                <h6>ACC/No: <?php echo $Bank_Acccount; ?> </h6>
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Debit Date</th>
													<th>Debit Amount</th>
													<th>Description</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

												$sql = "SELECT id, debit, debitComment, DATE(debitDate) as date FROM bank WHERE bankId ='$BankId' AND debit > 0 ORDER BY date ASC";
												$result = $conn->query($sql);
											
												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													  $creditId = $row["id"];												  													 
													echo "<tr><td>".$row["date"]."</td>
                                                            <td>".$row["debit"]."</td> 
															<td>".$row["debitComment"]."</td>
															<td><a href='BankDebitEdit.php?getDebitId=$creditId' class='btn btn-success'> Edit </a>
															<a href='BankDebitEdit.php?getDebitId=$creditId' class='btn btn-danger'> Delete </a><td>
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