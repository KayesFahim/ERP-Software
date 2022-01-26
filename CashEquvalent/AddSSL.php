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
							<h3 class="page-title">SSL Account</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add SSL Account</li>
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
										<h4 class="text-danger card-title">SSL Information</h4>
									</div>
                                    
                                        
									<div class="card-body">
										<form action="#" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
																												

                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Opening Balance</label>
																<input type="number"name="credit" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Comments</label>
																<input type="text" name="creditdt" class="form-control">
															</div>
														</div>
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Setup SSL Account </button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->

							<?php

									if ($_SERVER["REQUEST_METHOD"] == "POST") {
										
										$credit = $_POST['credit'];
										$creditDate = date("d/m/Y");
										$creditdt = $_POST['creditdt']; 

										$credit = "INSERT INTO `ssl_commerce`(
											`TxId`,
											`amount`,
											`TxType`,
											`createdBy`
										)
										VALUES(							
											'$creditdt',
											'$credit',
											'Opening Balance',
											'$userName'
										)";
											
											if ($conn->query($credit) === TRUE) {

												print '<script>
														swal({
														title: "Success!",
														text: "SSL balanced Added Successfully!",
														type: "success",
														confirmButtonText: "Cool"
														},
														function(){
															window.location=\'SSLCommerce.php\'
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