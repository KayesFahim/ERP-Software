<?php

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
							<h3 class="page-title">Add Cash</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Cash</li>
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
										<h4 class="text-danger card-title">Cash Information</h4>
										
									</div>
                                    
                                        
									<div class="card-body">
										<form action="#" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														
														<div class="col-md-6">
															<div class="form-group">
																<label>Purpose</label>
																<input type="text" name="purpose" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Name</label>
																<input type="text" name="name" class="form-control">
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
												<button type="submit" class="btn btn-primary"> Add Cash </button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->

							<?php

									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										$name = $_POST['name'];
										$purpose = $_POST['purpose'];							
										$credit = $_POST['credit'];
										$creditDate = date("d/m/Y");
										$creditdt = $_POST['creditdt']; 

										$sqlquery = "INSERT INTO `cash`(                                            
											`TxType`,
											`createdBy`,
											`cashIn`,											
											`dateTime`,
											`cashIndescription`
										)
										VALUES(
											'$purpose',
											'$name',											
											'$credit',
											'$creditDate',
											'$creditdt'
										)";
											
											if ($conn->query($sqlquery) === TRUE) {

												print '<script>
														swal({
														title: "Success!",
														text: "Cash Balanced Added Successfully!",
														type: "success",
														confirmButtonText: "Cool"
														},
														function(){
															window.location=\'HandCash.php\'
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