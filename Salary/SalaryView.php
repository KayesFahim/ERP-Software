<?php
include '../config.php';
include('../session.php');

$encryption = $_GET['empId'];
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$decryption_iv  = '1234567891011121';
$decryption_key  = "FlyFarInterNational";
$decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);


$sql = ""


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
							<h3 class="page-title">Salary Sheet</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Salary</li>
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
										<a href="CreateSalary.php?empId=<?php echo $encryption; ?>" class="btn btn-primary"> Create Salary +</a>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Issue Date</th>
													<th>Salary</th>
													<th>Late</th>
													<th>Absent</th>
                                                    <th>Lunch</th>
													<th>Advanced</th>
													<th>Missing</th>
													<th>LOS</th>
                                                    <th>Net Salary</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>

												<?php

                                                    $sql = "SELECT * FROM `employee_salary` WHERE EMP_Id='$encryption'";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {													  
													echo "<tr><td>".$row["issueDate"]."</td>
																<td>".$row["Salary"]."</td> 
														 		<td>".$row["deductionDay"]."</td>						
														 		<td>".$row["absentAmount"]."</td>
																 <td>".$row["lunchMeal"]."</td>
                                                                 <td>".$row["advanceSalary"]."</td>						
														 		<td>".$row["timesheetmiss"]."</td>
																 <td>".$row["lossOfService"]."</td>
                                                                 <td>".$row["NetSalary"]."</td>
																<td><a href='SalaryView.php?empId=$encryption' class='btn btn-primary'> Print </a><td>
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

<!------------  Header ----------->
	<?php include '../footer.php'; ?>
<!------------  Header ----------->