<?php

require('../session.php');


$Vendor_Id ="";
$sql = "SELECT * FROM vendor ORDER BY vendorId DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["vendorId"]);
        $number= (int)$outputString + 1;
		$Vendor_Id = "VDR-$number";								
 }
} else {
	$Vendor_Id ="VDR-1000";

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
							<h3 class="page-title">Add New Vendor</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Vendor</li>
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
										<h4 class="text-danger card-title">Vendor Information</h4>
									</div>
                                    

									<div class="card-body">
										<form action="#" autocomplete="off" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Vendor ID</label>
																<input type="text" value="<?php echo $Vendor_Id ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Vendor Name</label>
																<input type="text" name="vname" class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Vendor Email</label>
																<input type="email" name="vemail" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Vendor Phone</label>
																<input type="number" name="vphone" class="form-control" required>
															</div>
														</div>

                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Address</label>
																<input type="text"name="vaddress" class="form-control" required>
															</div>
														</div>
                                                        
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Opening Balance</label>
																<input type="number" name="balance" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Co Person Name</label>
																<input type="text" name="cpname" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Co Person Phone</label>
																<input type="number" name="cpphone" class="form-control" required>
															</div>
														</div>
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Create </button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->

							<?php

								if ($_SERVER["REQUEST_METHOD"] == "POST") {
									$vName = $_POST['vname'];
									$vEmail = $_POST['vemail'];
									$vPhone = $_POST['vphone'];
									$vAddress = $_POST['vaddress'];
									$Balance = $_POST['balance']; 
									$CoName = $_POST['cpname'];
									$CoPhone = $_POST['cpphone'];


									$sqlquery = "INSERT INTO `vendor`(                                            
										`vendorId`,
										`email`,
										`name`,
										`phone`,		
										`address`,
										`conPername`,
										`conPerPhone`
									)
									VALUES(
										'$Vendor_Id',
										'$vEmail',
										'$vName',
										'$vPhone',
										'$vAddress',
										'$CoName',
										'$CoPhone'
									)";
										
										if ($conn->query($sqlquery) === TRUE) {
											$VendorLedger ="INSERT INTO `vendor_ledger`(`txType`, `VDR_ID`,`serviceType`, `details`,`deposit`,`balance`)
														VALUES ('Open','$Vendor_Id','Account Open','Opening Balanced','$Balance','$Balance')";

										if ($conn->query($VendorLedger) === TRUE) {

											print '<script>
																	swal({
																	title: "Success!",
																	text: "Vendor Added Successfully!",
																	type: "success",
																	confirmButtonText: "Cool"
																	},
																	function(){
																		window.location=\'index.php\'
																		});
																	</script>';
											
											
										}
									
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
			<!-- /Main Wrapper -->
			<input type="hidden" id="refresh" value="no">


			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->