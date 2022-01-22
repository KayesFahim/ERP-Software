<?php

include('../session.php');

$sql = "SELECT * FROM mobile_banking ORDER BY MB_ID DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["MB_ID"]);
		$MBankId = "MBK-00".(int)$outputString + 1 ;									
 }
} else {
	$MBankId = "MBK-001";
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
							<h3 class="page-title">Add Mobile Banking</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Mobile Banking</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				

				<!-- Contant -->
				<div class="row">					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Mobile Banking Information</h4>
									</div>
                                    
                                        
									<div class="card-body">
										<form action="#" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Mobile Banking Operator</label>
																<input type="text" name="operator" class="form-control">
															</div>
														</div>
														
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Mobile Number</label>
																<input type="text" name="accno" class="form-control">
															</div>
														</div>

                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Opening Balance</label>
																<input type="number"name="credit" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Comments</label>
																<input type="text" name="creditdt" class="form-control">
															</div>
														</div>
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Add Mobile Banking Account </button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->

							<?php

									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										$name = $_POST['operator'];										
										$accno = $_POST['accno'];
										$credit = $_POST['credit'];
										$creditDate = date("d/m/Y");
										$creditdt = $_POST['creditdt']; 

										$sqlquery = "INSERT INTO `mobile_banking`(                                            
											`MB_ID`,
											`TxType`,
											`mb_operator`,
											`mb_number`,
											`cashIn`,
											`cashInDate`,
											`cashInComment`
										)
										VALUES(
											'$MBankId',
											'Balanced',
											'$name',
											'$accno',
											'$credit',
											'$creditDate',
											'$creditdt'
										)";
											
											if ($conn->query($sqlquery) === TRUE) {

												print '<script>
														swal({
														title: "Success!",
														text: "Added Successfully!",
														type: "success",
														confirmButtonText: "Cool"
														},
														function(){
															window.location=\'MobileBanking.php\'
															});
														</script>';
												

											}
																														
									}

							?>
            
						</div>


					</div>
					<!-- End Contant -->
					</div>	

                   
                    
                    
				</div>

				<!-- /Page Wrapper -->
			</div>
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->